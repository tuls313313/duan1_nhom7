<?php

class SizeModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSize()
    {
        $sql = "SELECT * FROM size";
        return $this->db->getAll($sql);
    }

    public function getOneSize($id)
    {
        $sql = "SELECT * FROM size WHERE id = $id";
        return $this->db->getOne($sql);
    }

    public function editSize($id, $name, $status)
    {
        $sql = "UPDATE `size` SET `name`='$name',`status`='$status' WHERE id = $id";
        return $this->db->insert($sql);
    }

    public function deleteSize($id)
    {
        $sql = "DELETE FROM `size` WHERE id = $id";
        return $this->db->getOne($sql);
    }

    public function insertSize($name, $status)
    {
        $sql = "INSERT INTO `size`(`name`, `status`) VALUES ('$name','$status')";
        return $this->db->insert($sql);
    }

    public function getSizeDetails()
    {
        $sql = "SELECT 
                s.id AS size_id,
                s.name AS size_name,
                MAX(v.id_size) AS varianti_id
            FROM 
                size s
            JOIN 
                varianti v ON s.id = v.id_size
            GROUP BY 
                s.id, s.name;";
    return $this->db->getAll($sql);
    }
}