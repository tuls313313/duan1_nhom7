<?php
class UserModels{
    public $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllUser(){
        $sql = "SELECT * FROM account order by id desc";
        return $this->db->getAll($sql);
    }

    public function getOneUser($id){
        $sql = "SELECT * FROM account WHERE id=$id";
        return $this->db->getOne($sql);
    }
    public function deleteUser($id){
        $sql = "DELETE FROM account WHERE id=$id";
        return $this->db->getOne($sql);
    }

    public function insertUser($user,$password,$email,$address,$tel){
        $sql = "INSERT INTO `account`(`user`, `password`, `email`, `address`, `tel`) 
        VALUES ('$user', '$password', '$email', '$address', '$tel')";
        return $this->db->insert($sql);
    }

    public function editUser($id,$user,$password,$email,$address,$tel,$role,$status){
        $sql ="UPDATE `account` SET `user`='$user',`password`='$password',
        `email`='$email',`address`='$address',`tel`='$tel',`role`='$role',`status`='$status' WHERE id=$id ";
        return $this->db->insert($sql);
    }

}