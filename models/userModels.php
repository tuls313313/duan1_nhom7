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
                o.status_order as status,
                o.payment as payment,
                o.total_amount as amount,
                o.total_money as money,
                o.create_at as create_at
        FROM account a
        INNER JOIN orders o ON a.id = o.user_id
        INNER JOIN order_items oi ON o.id_order = oi.order_id
        WHERE a.id = $id";
        return $this->db->getAll($sql);
    }
}