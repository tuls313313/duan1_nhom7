<?php

class OrderModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllOrder() {
        $sql = "
        SELECT 
                o.*, 
                a.user AS user_name
            FROM orders o
            LEFT JOIN account a ON o.user_id = a.id
        ";
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
        $status_order,
        $payment,
        $total_amount,
        $total_money,
        $shipping_address,
    ) {
        $sql = "UPDATE `orders` SET `user_id` = '$user_id', `status_order` = '$status_order', 
        `payment` = '$payment', `total_amount` = '$total_amount', 
        `total_money` = '$total_money', `shipping_address` = '$shipping_address' 
        WHERE `id_order` = $id_order";
        // var_dump($sql); die; 
        return $this->db->insert($sql);
    }
}
