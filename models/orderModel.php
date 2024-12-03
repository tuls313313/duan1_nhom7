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

    public function insertGiohang($id_cart, $user_id, $id_promotion, $name, $tel, $address, $payment) {
        $name = "'$name'";
        $address = "'$address'";
    
        $id_cart_arr = explode(",", $id_cart);
        $order_ids = []; 
    
        foreach ($id_cart_arr as $id) {
            $sql_o = "INSERT INTO orders (user_id, id_promotion, name, tel, shipping_address, total_amount, total_money, payment)
                      SELECT $user_id, $id_promotion, $name, $tel, $address, SUM(cd.Quantity), SUM(cd.total_money), $payment
                      FROM cart_details cd
                      JOIN cart c ON c.id_cart = cd.id_cart
                      WHERE cd.id_cart = $id
                      GROUP BY cd.id_cart;";
    
            $data_o = $this->db->insert($sql_o); 
            if ($data_o) {
                $sql_oi = "INSERT INTO order_items (order_id, product_id, id_color, id_size, quantity, price)
                           SELECT
                               $data_o AS order_id,
                               cd.id_pro,
                               cd.id_color,
                               cd.id_size,
                               cd.Quantity,
                               cd.money
                           FROM cart_details cd
                           WHERE cd.id_cart = $id;";
                $this->db->insert($sql_oi);
    
                $sql_tran = "INSERT INTO transactions (id_order, status)
                             VALUES ($data_o, 0);";
                $this->db->excute($sql_tran);
    
                $sql_cart = "UPDATE cart
                             SET status = 1
                             WHERE id_cart = $id;";
                $this->db->excute($sql_cart);
    
                $order_ids[] = $data_o;
            }
        }
    
        $_SESSION['data_o'] = $order_ids;
        return $order_ids;
    }
    
    
    
    

    
    
}
