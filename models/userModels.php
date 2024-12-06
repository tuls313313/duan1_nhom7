<?php
class UserModels
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUser()
    {
        $sql = "SELECT * FROM account order by id desc";
        return $this->db->getAll($sql);
    }

    public function getOneUser($id)
    {
        $sql = "SELECT * FROM account WHERE id=$id";
        return $this->db->getOne($sql);
    }
    public function checklogin($email, $password)
    {
        $sql = "SELECT * FROM account WHERE email='$email' AND  password='$password' ";
        return $this->db->getOne($sql);
    }
    public function deleteUser($id)
    {
        $sql = "DELETE FROM account WHERE id=$id";
        return $this->db->getOne($sql);
    }

    public function insertUser($user, $password, $email, $address, $tel)
    {
        $sql = "INSERT INTO `account`(`user`, `password`, `email`, `address`, `tel`) 
        VALUES ('$user', '$password', '$email', '$address', '$tel')";
        return $this->db->insert($sql);
    }

    public function editUser($id, $user, $password, $email, $address, $tel, $role, $status)
    {
        $sql = "UPDATE `account` SET `user`='$user',`password`='$password',
        `email`='$email',`address`='$address',`tel`='$tel',`role`='$role',`status`='$status' WHERE id=$id ";
        return $this->db->insert($sql);
    }

    public function editUser1($id, $password)
    {
        $sql = "UPDATE `account` SET `password`='$password' WHERE id=$id ";
        return $this->db->insert($sql);
    }

    public function changeQuenMk($email)
    {
        $sql = "SELECT password FROM account WHERE email = '$email'";
        return $this->db->getOne($sql);
    }

    public function order_history($id)
    {
        $sql = "SELECT a.user as name,
                a.email as email,
                a.tel as tel,
                o.id_order as id_o,
                o.name as name_o,
                o.tel as tel_o,
                o.shipping_address as ship_o,
                o.status_order as status_o,
                o.payment as payment,
                o.total_amount as amount,
                o.total_money as money,
                o.create_at as create_at,
                o.payment as payment_or,
                t.status as payment_status
        FROM account a
        INNER JOIN orders o ON a.id = o.user_id
        LEFT JOIN transactions t ON o.id_order = t.id_order
        WHERE a.id = $id 
        ORDER BY o.id_order DESC;";

        return $this->db->getAll($sql);
    }

    public function history_order($id_oi)
    {
        $sql = "SELECT a.user as name,
                o.id_order as id_o,
                o.name as name_o,
                o.tel as tel_o,
                o.shipping_address as ship_o,
                o.status_order as status_o,
                o.payment as payment,
                o.total_amount as amount,
                o.total_money as money,
                o.create_at as create_at,
                o.payment as payment_or,
                t.status as payment_status,
                p.name as name_p,
                oi.id_color as color_oi,
                oi.id_size as size_oi,
                oi.quantity as quantity_oi,
                oi.price as price_oi
        FROM account a
        INNER JOIN orders o ON a.id = o.user_id
        INNER JOIN order_items oi On o.id_order = oi.order_id
        INNER JOIN transactions t ON o.id_order = t.id_order
        INNER JOIN product p ON oi.product_id = p.id
        WHERE o.id_order = $id_oi;";
        return $this->db->getAll($sql);
    }
    public function history_order_one($id_oi)
    {
        $sql = "SELECT 
                a.user as name_a,
                a.tel as tel_a,
                a.address as ship_a,
                o.id_order as id_o,
                o.name as name_o,
                o.tel as tel_o,
                o.shipping_address as ship_o,
                o.status_order as status_o,
                o.payment as payment,
                o.total_amount as amount,
                o.total_money as money,
                o.create_at as create_at,
                o.payment as payment_or,
                t.status as payment_status,
                p.name as name_p,
                oi.id_color as color_oi,
                oi.id_size as size_oi,
                oi.quantity as quantity_oi,
                oi.price as price_oi
        FROM account a
        INNER JOIN orders o ON a.id = o.user_id
        INNER JOIN order_items oi On o.id_order = oi.order_id
        INNER JOIN transactions t ON o.id_order = t.id_order
        INNER JOIN product p ON oi.product_id = p.id
        WHERE o.id_order = $id_oi;";
        return $this->db->getOne($sql);
    }

    public function huydon($id){
        $sql = "UPDATE `orders` SET status_order = 4 WHERE id_order = $id";
        return $this->db->insert($sql);
    }
}
