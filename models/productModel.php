<?php
class ProductModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProduct()
    {
        $sql = "SELECT * FROM product order by id desc";
        return $this->db->getAll($sql);
    }

    public function getAllProductHome()
    {
        $sql = "SELECT p.*, SUM(oi.quantity) as total_sold  
                FROM product p
                LEFT JOIN order_items oi on p.id = oi.product_id
                LEFT JOIN orders o on oi.order_id = o.id_order AND o.status_order = 3
                group by p.id
                order by id desc limit 4";
        return $this->db->getAll($sql);
    }
    public function getAllProductHomeViews()
    {
        $sql = "SELECT p.*, 
                       COALESCE(SUM(oi.quantity), 0) AS total_sold
                FROM product p
                LEFT JOIN order_items oi ON p.id = oi.product_id
                LEFT JOIN orders o ON oi.order_id = o.id_order AND o.status_order = 3
                GROUP BY p.id
                ORDER BY p.views DESC
                LIMIT 4";
        return $this->db->getAll($sql);
    }

    public function congView($id){
        $sql = "UPDATE product SET views = views + 1 WHERE id = $id;";
        return $this->db->getOne($sql);
    }
    

    public function getOneProduct($id)
    {
        $sql = "SELECT * FROM product WHERE id=$id";
        return $this->db->getOne($sql);
    }
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id=$id";
        return $this->db->getOne($sql);
    }

    public function insertProduct($name, $price, $img, $description, $id_categories)
    {
        $sql = "INSERT INTO `product`(`name`, `price`, `img`, `description`, `id_categories`) 
        VALUES ('$name','$price','$img','$description','$id_categories')";
        return $this->db->insert($sql);
    }

    public function editProduct($id, $name, $price, $img, $description, $id_categories, $status)
    {
        if ($img) {
            $sql = "UPDATE `product` SET `name`='$name',`price`='$price',`img`='$img',`description`='$description',`id_categories`='$id_categories',`status`='$status' WHERE id=$id ";
        } else {
            $sql = "UPDATE `product` SET `name`='$name',`price`='$price',`description`='$description',`id_categories`='$id_categories',`status`='$status' WHERE id=$id ";
        }
        return $this->db->insert($sql);
    }

    public function detailSp($id)
    {
        $sql = "SELECT product.*, categories.name 
                FROM product 
                INNER JOIN categories ON product.id_categories = categories.id 
                WHERE product.id=$id";
        return $this->db->getOne($sql);
    }

    public function product_categories($id)
    {
        $sql = "SELECT product.*, categories.name 
                FROM product 
                INNER JOIN categories ON product.id_categories = categories.id 
                WHERE product.id=$id";
        return $this->db->getAll($sql);
    }
}