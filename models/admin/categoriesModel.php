<?php

class CategoriesModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        return $this->db->getAll($sql);
    }

    public function getOneCategories($id)
    {
        $sql = "SELECT * FROM categories WHERE id = $id";

        return $this->db->getOne($sql);
    }

    public function editCategories($id, $name, $status_categories)
    {
        $sql = "UPDATE categories SET `name`='$name',`status_categories`='$status_categories' WHERE id = $id";

        return $this->db->insert($sql);
    }
}
