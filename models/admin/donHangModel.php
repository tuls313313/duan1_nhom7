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

    public function detailDonHang($id_order)
    {
        $sql = "SELECT * FROM orders
                INNER JOIN account ON orders.user_id = account.id
                WHERE orders.id_order = $id_order";

        // $sql = "SELECT * FROM orders WHERE id=$id";
        return $this->db->getOne($sql);
    }

    public function getOneDonHang($id_order)
    {
        $sql = "SELECT * FROM orders WHERE id_order=$id_order";
        return $this->db->getOne($sql);
    }

    public function editDonHang(
        $id_order,
        $user_id,
        $order_date,
        $status_order,
        $payment,
        $total_amount,
        $total_money,
        $shipping_address,
        $create_at,
        $update_at
    ) {
        $sql = "UPDATE `orders` SET `user_id` = '$user_id', `order_date` = '$order_date', `status_order` = '$status_order', 
        `payment` = '$payment', `total_amount` = '$total_amount', 
        `total_money` = '$total_money', `shipping_address` = '$shipping_address', 
        `create_at` = '$create_at', `update_at` = '$update_at' WHERE `id_order` = $id_order";
        // var_dump($sql); die; 

        // var_dump($sql); die;
        return $this->db->insert($sql);
    }
}
