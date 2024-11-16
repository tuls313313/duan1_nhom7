<?php

class CategoriesModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCategory()
    {
        $sql = "SELECT * FROM categories";
        return $this->db->getAll($sql);
    }

    public function getOneCategory($id)
    {
        $sql = "SELECT * FROM categories WHERE id = $id";

        return $this->db->getOne($sql);
    }

    public function editCategory($id, $name, $status_categories)
    {
        $sql = "UPDATE categories SET `name`='$name',`status_categories`='$status_categories' WHERE id = $id";

        return $this->db->insert($sql);
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM categories WHERE id = $id";

        return $this->db->getOne($sql);
    }

    public function inserCategory($name, $status_categories)
    {
        $sql = "INSERT INTO categories (`name`, `status_categories`) VALUES ('$name','$status_categories')";
        $sql1 = " INSERT INTO `categories`(`name`, `status_categories`) VALUES ('$name','$status_categories') ";
        // var_dump($sql);die;
        return $this->db->insert($sql1);
    }
}
