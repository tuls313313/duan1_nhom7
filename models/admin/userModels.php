<?php
class UserModels{
    public $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllUser(){
        $sql = "SELECT * FROM account";
        return $this->db->getAll($sql);
        
    }
}