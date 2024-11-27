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
        $sql = "SELECT * FROM cart";
        return $this->db->getAll($sql);
    }
    
}