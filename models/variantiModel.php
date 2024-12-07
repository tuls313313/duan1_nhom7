<?php 

class VariantiModel{
    public $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllVarianti(){
        $sql = "SELECT 
            v.id_var AS variation_id,
            p.name AS product_name,
            s.name AS size_name,
            col.name AS color_name,
            v.quantity AS variation_quantity,
            v.img AS variation_image
        FROM varianti v
        LEFT JOIN product p ON v.id_pro = p.id
        LEFT JOIN size s ON v.id_size = s.id
        LEFT JOIN color col ON v.id_color = col.id
        ORDER BY v.id_var DESC
        ";
        return $this->db->getAll($sql);
    }
    
    public function getOneVarianti($id){
        $sql = "SELECT 
        v.id_var AS variation_id,
        p.name AS product_name,
        p.id AS product_id,
        s.id AS size_id,
        s.name AS size_name,
        col.id AS color_id,
        col.name AS color_name,
        v.quantity AS variation_quantity,
        v.img AS variation_image
    FROM varianti v
    LEFT JOIN product p ON v.id_pro = p.id
    LEFT JOIN size s ON v.id_size = s.id
    LEFT JOIN color col ON v.id_color = col.id
    where v.id_var = $id
    ";
        return $this->db->getOne($sql);
    }
    public function addVarianti($id_pro,$id_color,$id_size,$quantity,$img){
        $sql = "INSERT INTO `varianti`(`id_pro`, `id_color`, `id_size`, `quantity`, `img`)
         VALUES ('$id_pro','$id_color','$id_size','$quantity','$img')";
        return $this->db->insert($sql);
    }
    function edit($id_var,$id_pro,$id_color,$id_size,$quantity,$img){
        if($img==''){
            $sql = "UPDATE `varianti` SET `id_pro`='$id_pro',`id_color`='$id_color',`id_size`='$id_size',
            `quantity`='$quantity' WHERE id_var=$id_var";
        }else{
            $sql = "UPDATE `varianti` SET `id_pro`='$id_pro',`id_color`='$id_color',`id_size`='$id_size',
            `quantity`='$quantity',`img`='$img' WHERE `id_var`='$id_var'";    
        }
       
        return $this->db->insert($sql);
    }
    public function deL($id_var){
        $sql = "DELETE FROM `varianti` WHERE id_var=$id_var";
        return $this->db->getAll($sql);
    }
}