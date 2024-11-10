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

    public function getEditDonHang($id)
    {
        $sql = "SELECT orders";
        return $this->db->getAll($sql);
    }

    public function getListSpDonHang($id)
    {
        $sql = "";

        return $this->db->getAll($sql);
    }
}