<?php

class ColorModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllColor()
    {
        $sql = "SELECT * FROM color";
        return $this->db->getAll($sql);
    }

    public function getOneColor($id)
    {
        $sql = "SELECT * FROM color WHERE id = $id";
        return $this->db->getOne($sql);
    }

    public function editColor($id, $name, $status)
    {
        $sql = "UPDATE `color` SET `name`='$name',`status`='$status' WHERE id = $id";
        return $this->db->insert($sql);
    }

    public function deleteColor($id)
    {
        $sql = "DELETE FROM `color` WHERE id = $id";
        // var_dump($sql);die;
        return $this->db->getOne($sql);
    }

    public function insertColor($name, $status)
    {
        $sql = "INSERT INTO `color`(`name`, `status`) VALUES ('$name','$status')";
        return $this->db->insert($sql);
    }

    public function getColorDetails()
    {
        $sql = "SELECT 
                c.id AS color_id,
                c.name AS color_name,
                MAX(v.id_color) AS varianti_id
            FROM 
                color c
            JOIN 
                varianti v ON c.id = v.id_color
            GROUP BY 
                c.id, c.name;";
        return $this->db->getAll($sql);
    }
}
