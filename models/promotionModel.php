<?php

class PromotionModel{
    public $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllPromotion(){
        $sql = "SELECT * FROM promotion order by id desc";
        return $this->db->getAll($sql);
    }

    public function getOnePromotion($id){
        $sql = "SELECT * FROM promotion where id=$id";
        return $this->db->getOne($sql);
    }

    public function deletePromotin($id){
        $sql = "DELETE FROM promotion where id=$id";
        return $this->db->getOne($sql);
    }


    public function insertPromotion($code,$start_date,$end_date,$quantity,$min_money,$discount_value,$status){
        $sql = "INSERT INTO `promotion`( `code`, `start_date`, `end_date`, `quantity`, `min_money`, `discount_value`, `status`) 
        VALUES ('$code','$start_date','$end_date','$quantity','$min_money','$discount_value','$status')";
        $this->db->insert($sql);
    }

    public function updatePromotion($id,$code,$start_date,$end_date,$quantity,$min_money,$discount_value,$status){
        $sql = "UPDATE `promotion` SET `code`='$code',`start_date`='$start_date',`end_date`='$end_date',
        `quantity`='$quantity',`min_money`='$min_money',`discount_value`='$discount_value',`status`='$status' WHERE `id`='$id'";
        $this->db->insert($sql);
    }
}