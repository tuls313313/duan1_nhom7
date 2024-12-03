<?php

class CartModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCart() {
        $sql = "SELECT * FROM cart WHERE status = 0";
        return $this->db->getAll($sql);
    }

    public function addToCart($userId,$total_money,$id_pro,$id_color,$id_size,$quantity,$money) {
        $sql = "INSERT INTO `cart`(`id_user`,`total_money`) 
        VALUES ($userId,$total_money)";
        $id_cart = $this->db->insert($sql);
        
        $sqlDetails = "INSERT INTO `cart_details`( `id_cart`, `id_pro`, `id_color`, `id_size`, `Quantity`, `money`) 
        VALUES ('$id_cart','$id_pro','$id_color','$id_size','$quantity','$money')";
        return $this->db->insert($sqlDetails);
    }

    public function getAllDetailCart($userId)
    {
        $sql = "SELECT 
                    c.id_cart AS cart_id,
                    c.status AS cart_status,
                    c.total_money AS cart_total_money,
                    cd.id_detail AS cart_detail_id,
                    cd.quantity AS product_quantity,
                    cd.money AS product_price,
                    p.id AS product_id,
                    p.name AS product_name,
                    p.img AS product_image,
                    col.id AS color_id,
                    col.name AS color_name,
                    s.id AS size_id,
                    s.name AS size_name
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

    public function deleteCart($cart_detail_id,$cart_id) 
    {
        $sql_cart_details = "DELETE FROM `cart_details` WHERE id_detail = $cart_detail_id";
        $this->db->excute($sql_cart_details); 
        $sql_cart = "DELETE FROM cart WHERE id_cart = $cart_id";
        return $this->db->excute($sql_cart);
    }

    public function congCartDetails($id){
        $sql = "UPDATE `cart_details` SET `Quantity` = `Quantity` + 1 WHERE id_detail = $id;";
        return $this->db->excute($sql);
    }
    public function truCartDetails($id){
        $sql = "UPDATE `cart_details` SET `Quantity` = `Quantity` - 1 WHERE id_detail = $id;";
        return $this->db->excute($sql);
    }


}
