<?php
class ProductModel{
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
        $sql = "SELECT * FROM product order by id desc limit 4";
        return $this->db->getAll($sql);
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
        if($img){
            $sql = "UPDATE `product` SET `name`='$name',`price`='$price',`img`='$img',`description`='$description',`id_categories`='$id_categories',`status`='$status' WHERE id=$id ";

        }
        else{
            $sql = "UPDATE `product` SET `name`='$name',`price`='$price',`description`='$description',`id_categories`='$id_categories',`status`='$status' WHERE id=$id ";

        }
        return $this->db->insert($sql);
    }
}



