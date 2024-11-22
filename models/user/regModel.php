<?php 

class RegModel{

    public $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function insertUser($user,$password,$email,$address,$tel){
        $sql = "INSERT INTO `account`(`user`, `password`, `email`, `address`, `tel`) 
        VALUES ('$user', '$password', '$email', '$address', '$tel')";
        return $this->db->insert($sql);
    }
}