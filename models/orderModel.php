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
    public function getOneOrder_detail($id)
    {
        $sql = "SELECT * FROM order_items WHERE id=$id";
        return $this->db->getOne($sql);
    }

    public function editOrder($id_order,$user_id,$status_order,$payment,$total_amount,$total_money,$shipping_address,)
    {
        $sql = "UPDATE `orders` SET `user_id` = '$user_id', `status_order` = '$status_order', `payment` = '$payment', `total_amount` = '$total_amount', 
        `total_money` = '$total_money', `shipping_address` = '$shipping_address' 
        WHERE `id_order` = $id_order";
        if($status_order ==3){
            $sql_tran = "UPDATE transactions SET status=1 WHERE id = 6";
            $this->db->insert($sql_tran);
        }
        return $this->db->insert($sql);
    }

    public function insertOrder($user_id, $id_promotion , $name, $tel, $shipping_address, $payment, $total_amount, $total_money,
    $product_id,$id_color,$id_size,$quantity,$price) {
       $name = "' $name'";
       $shipping_address = "' $shipping_address'";
       $sql = "INSERT INTO `orders` (`user_id`, `id_promotion`, `name`, `tel`, `shipping_address`, `payment`, `total_amount`, `total_money`) 
                VALUES ($user_id, $id_promotion, $name, $tel, $shipping_address, $payment, $total_amount, $total_money)";
       $order_id = $this->db->insert($sql);

       $sql_tran = "INSERT INTO `transactions`( `id_order`) VALUES ('$order_id')";

       $id_tran = $this->db->insert($sql_tran);
    $_SESSION['id_tran'] =  $id_tran;
       $sql_s = "INSERT INTO `order_items`(`order_id`, `product_id`, `id_color`, `id_size`, `quantity`, `price`) 
       VALUES ('$order_id','$product_id','$id_color','$id_size','$quantity','$price')";
       return $this->db->insert($sql_s);


    }

    
    
}
