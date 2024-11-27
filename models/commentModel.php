<?php

class CommentModel{
    public $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllCmt() {
        $sql = "SELECT 
                c.*, 
                u.user AS user_name, 
                p.name AS product_name
            FROM comment c
            LEFT JOIN account u ON c.id_user = u.id
            LEFT JOIN product p ON c.id_pro = p.id
            ORDER BY c.id_cmt DESC
        ";
        return $this->db->getAll($sql);
    }
    
    public function getAllAccount(){
        $sql = "SELECT * FROM account";
        return $this->db->getAll($sql);
    }
    public function getAllProduct(){
        $sql = "SELECT * FROM product";
        return $this->db->getAll($sql);
    }

    public function addCmt($id_user,$id_pro,$conten,$rating){
        $sql = "INSERT INTO `comment`(`id_user`, `id_pro`, `conten`, `rating`) 
        VALUES ('$id_user','$id_pro','$conten','$rating')";
        $this->db->insert($sql);
    }

    public function getOneCmt($id_cmt){
        $sql = "SELECT * FROM comment WHERE id_cmt=$id_cmt";
        return $this->db->getOne($sql);
    }

    public function updateCmt($id_cmt,$id_user,$id_pro,$conten,$status){
        $sql = "UPDATE `comment` SET `id_user`='$id_user',`id_pro`='$id_pro',
        `conten`='$conten',`status`='$status' WHERE id_cmt = $id_cmt";
        return $this->db->insert($sql);
    }

    public function deleteCmt($id_cmt){
        $sql = "DELETE FROM `comment` WHERE id_cmt=$id_cmt";
        return $this->db->getOne($sql);
    }

    public function commentProduct($id){
        $sql = "SELECT comment.*, account.user 
            FROM comment
            INNER JOIN account ON comment.id_user = account.id
            WHERE comment.id_pro = $id AND comment.status = 1";
        return $this->db->getAll($sql);
    }

}
?>