<?php

class DonHangModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllDonHang()
    {
        $sql = "SELECT * FROM orders";
        return $this->db->getAll($sql);
    }

    public function detailDonHang($id)
    {
        $sql = "SELECT * FROM orders
                INNER JOIN account ON orders.user_id = account.id
                WHERE orders.id = $id
                ";
        return $this->db->getOne($sql);
    }

    // public function updateDoHang()
    // {

    // }
}