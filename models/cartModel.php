<?php

class CartModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCart() {
        $sql = "SELECT * FROM cart";
        return $this->db->getAll($sql);
    }

    public function addToCart($userId, $productId, $quantity) {
        $sql = "
            INSERT INTO cart (id_user, status, total_money, created_at)
            VALUES ($userId, 0, 
                (SELECT price * $quantity 
                 FROM product 
                 WHERE id = $productId), 
                NOW()
            )
        ";
         $this->db->insert($sql);
        
        $sqlDetails = "
            INSERT INTO cart_details (id_cart, id_pro, quantity, money, total_money)
            VALUES (
                (SELECT id_cart FROM cart WHERE id_user = $userId ORDER BY created_at DESC LIMIT 1),
                $productId,
                $quantity,
                (SELECT price FROM product WHERE id = $productId),
                (SELECT price * $quantity FROM product WHERE id = $productId)
            )
        ";
        return $this->db->insert($sqlDetails);
    }
}
