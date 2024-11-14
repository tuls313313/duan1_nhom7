<?php

class OrderModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllOrder()
    {
        $sql = "SELECT * FROM orders";
        return $this->db->getAll($sql);
    }

    public function detailOrder($id_order)
    {
        $sql = "SELECT orders.*, account.*, orders.update_at AS update_at_orders , orders.create_at as create_at_orders FROM orders
                INNER JOIN account ON orders.user_id = account.id
                WHERE orders.id_order = $id_order";

        // var_dump($sql);die;
        
        // $sql = "SELECT * FROM orders WHERE id=$id";
        return $this->db->getOne($sql);
    }

    public function getOneOrder($id_order)
    {
        $sql = "SELECT * FROM orders WHERE id_order=$id_order";
        return $this->db->getOne($sql);
    }

    public function editOrder(
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
