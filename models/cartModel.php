<?php

class CartModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCart()
    {
        $sql = "SELECT * FROM cart WHERE status = 0";
        return $this->db->getAll($sql);
    }

    public function addToCart($userId, $total_money, $id_pro, $id_color, $id_size, $quantity, $money)
    {
        $sql = "INSERT INTO `cart`(`id_user`,`total_money`) 
        VALUES ($userId,$total_money)";
        $id_cart = $this->db->insert($sql);

        $sqlDetails = "INSERT INTO `cart_details`( `id_cart`, `id_pro`, `id_color`, `id_size`, `Quantity`, `money`, `total_money`) 
        VALUES ('$id_cart','$id_pro','$id_color','$id_size','$quantity','$money','$total_money')";
        return $this->db->insert($sqlDetails);
    }

    public function getAllDetailCart($userId)
    {
        // $sql = "SELECT DISTINCT 
        //                 c.id_cart AS cart_id,
        //                 p.name AS product_name,
        //                 p.img AS product_image,
        //                 v.price AS product_price,
        //                 cd.Quantity,
        //                 s.name AS size_name,
        //                 col.name AS color_name,
        //                 (cd.quantity * v.price) AS total_price
        //             FROM 
        //                 cart c
        //             JOIN 
        //                 cart_details cd ON c.id_cart = cd.id_cart
        //             JOIN 
        //                 varianti v ON cd.id_pro = v.id_pro
        //             JOIN 
        //                 product p ON v.id_pro = p.id
        //             JOIN 
        //                 size s ON v.id_size = s.id
        //             JOIN 
        //                 color col ON v.id_color = col.id
        //             WHERE 
        //                 c.status = 0 AND c.id_user = $userId";
        $sql = "SELECT 
                    cd.id_detail AS cart_detail_id,
                    c.id_cart AS cart_id,
                    c.status AS cart_status,
                    c.total_money AS cart_total_money,
                    p.id AS product_id,
                    p.name AS product_name,
                    p.price AS product_price,
                    p.img AS product_image,
                    col.id AS color_id,
                    col.name AS color_name,
                    s.id AS size_id,
                    s.name AS size_name,
                    cd.quantity AS product_quantity,
                    cd.money AS product_unit_price,
                    cd.total_money AS product_total_price,
                    cd.created_at AS detail_created_at,
                    cd.updated_at AS detail_updated_at
                FROM 
                    cart_details cd
                JOIN 
                    cart c ON cd.id_cart = c.id_cart
                JOIN 
                    product p ON cd.id_pro = p.id
                JOIN 
                    color col ON cd.id_color = col.id
                JOIN 
                    size s ON cd.id_size = s.id
                WHERE 
                    c.status = 0 
                    AND c.id_user = $userId";
        return $this->db->getAll($sql);
    }

    public function deleteCart($cart_id, $detail_id)
    {
        $sqlCartDetails = "DELETE FROM `cart_details` WHERE id_detail = $detail_id";
        $this->db->getOne($sqlCartDetails); 

        $sqlCart = "DELETE FROM `cart` WHERE id_cart = $cart_id";
        return $this->db->getOne($sqlCart);
    }

    // public function editCart($cart_id, $userId, $total_money, $id_pro, $id_color, $id_size, $quantity, $money) 
    // {
    //     $sql = "";
    //     return $this->db->insert($sql);
    // }
}
