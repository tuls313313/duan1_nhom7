<?php

class OrderModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllOrder() {
        $sql = "SELECT 
                o.*, 
                a.user AS user_name
            FROM orders o
            LEFT JOIN account a ON o.user_id = a.id 
            ORDER BY o.id_order DESC";
        return $this->db->getAll($sql);
    }
    

    public function detailOrder($id_order)
    {
        $sql = "SELECT 
                    o.*,
                    a.user AS account_user,
                    a.email AS account_email,
                    a.address AS account_address,
                    a.tel AS account_tel,
                    oi.quantity AS order_item_quantity,
                    oi.price AS order_item_price,
                    p.name AS product_name,
                    p.price AS product_price,
                    p.img AS product_image,
                    c.name AS color_name,
                    s.name AS size_name
                FROM 
                    orders o
                INNER JOIN 
                    account a ON o.user_id = a.id
                INNER JOIN 
                    order_items oi ON o.id_order = oi.order_id
                INNER JOIN 
                    product p ON oi.product_id = p.id
                INNER JOIN 
                    color c ON oi.id_color = c.id
                INNER JOIN 
                    size s ON oi.id_size = s.id
                WHERE
                    o.id_order = $id_order;
                ";
        // var_dump($sql);die;
        return $this->db->getOne($sql);
    }

    public function detailOrderItem($id_order)
    {
        $sql = "SELECT 
                    o.*,
                    a.user AS account_user,
                    a.email AS account_email,
                    a.address AS account_address,
                    a.tel AS account_tel,
                    oi.quantity AS order_item_quantity,
                    oi.price AS order_item_price,
                    p.name AS product_name,
                    p.price AS product_price,
                    p.img AS product_image,
                    c.name AS color_name,
                    s.name AS size_name
                FROM 
                    orders o
                INNER JOIN 
                    account a ON o.user_id = a.id
                INNER JOIN 
                    order_items oi ON o.id_order = oi.order_id
                INNER JOIN 
                    product p ON oi.product_id = p.id
                INNER JOIN 
                    color c ON oi.id_color = c.id
                INNER JOIN 
                    size s ON oi.id_size = s.id
                WHERE
                    o.id_order = $id_order
                ";
        // var_dump($sql);die;
        return $this->db->getAll($sql);
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
    $product_id,$id_color,$id_size,$quantity,$price,$id_var) {
       $name = "' $name'";
       $shipping_address = "' $shipping_address'";
       $sql = "INSERT INTO `orders` (`user_id`, `id_promotion`, `name`, `tel`, `shipping_address`, `payment`, `total_amount`, `total_money`) 
                VALUES ($user_id, $id_promotion, $name, $tel, $shipping_address, $payment, $total_amount, $total_money)";
       $order_id = $this->db->insert($sql);

       $sql_tran = "INSERT INTO `transactions`( `id_order`) VALUES ('$order_id')";

       $id_tran = $this->db->insert($sql_tran);
       $_SESSION['id_tran'] =  $id_tran;

       $sql = "UPDATE `varianti` SET `quantity`= `quantity` - $quantity  WHERE id_var = $id_var";
       $sql_s = "INSERT INTO `order_items`(`order_id`, `product_id`, `id_color`, `id_size`, `quantity`, `price`) 
       VALUES ('$order_id','$product_id','$id_color','$id_size','$quantity','$price')";
       return $this->db->insert($sql_s);
    }

    public function insertGioHang($user_id, $id_promotion, $name, $tel, $shipping_address, $payment, $total_amount, $total_money, 
    $cart_id_str) {

        $name = "'$name'";
        $shipping_address = "'$shipping_address'";

        $sql_o = "INSERT INTO `orders` (`user_id`, `id_promotion`, `name`, `tel`, `shipping_address`, `payment`, `total_amount`, `total_money`) 
                  VALUES ($user_id, $id_promotion, $name, $tel, $shipping_address, $payment, $total_amount, $total_money)";
        $id_o = $this->db->insert($sql_o);
        $_SESSION['id_o'] = $id_o;
        if (!$id_o) {
            return false; 
        }
        $sql_tran = "INSERT INTO `transactions` (`id_order`) VALUES ('$id_o')";
        $id_tran = $this->db->insert($sql_tran);
        $_SESSION['id_tran'] = $id_tran;
    
        if (!$id_tran) {
            return false; 
        }
        if (!is_array($cart_id_str)) {
            $cart_id = [$cart_id_str]; 
        }
        $cart_id_str = implode(",", $cart_id);
        $sql_oi = "INSERT INTO `order_items` (`order_id`, `cart_id`, `product_id`, `id_color`, `id_size`, `quantity`, `price`)
                   SELECT $id_o, cd.id_cart, cd.id_pro, cd.id_color, cd.id_size, cd.Quantity, cd.money
                   FROM cart_details cd
                   WHERE cd.id_cart IN ($cart_id_str)";

        $this->db->insert($sql_oi);
        $sql_update = "UPDATE cart SET status = 1 WHERE id_cart IN ($cart_id_str);";
        return $this->db->excute($sql_update);
    }  
    
}
