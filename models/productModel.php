<?php
class ProductModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProduct()
    {
        $sql = "SELECT * FROM product order by id desc";
        return $this->db->getAll($sql);
    }

    public function getAllProductHome()
    {
        $sql = "SELECT p.*, SUM(oi.quantity) as total_sold  
                FROM product p
                LEFT JOIN order_items oi on p.id = oi.product_id
                LEFT JOIN orders o on oi.order_id = o.id_order AND o.status_order = 3
                group by p.id
                HAVING p.status = 0
                order by id desc limit 4";
        return $this->db->getAll($sql);
    }
    public function getAllProductHomeViews()
    {
        $sql = "SELECT p.*, 
                       COALESCE(SUM(oi.quantity), 0) AS total_sold
                FROM product p
                LEFT JOIN order_items oi ON p.id = oi.product_id
                LEFT JOIN orders o ON oi.order_id = o.id_order AND o.status_order = 3
                GROUP BY p.id
                HAVING p.status = 0
                ORDER BY p.views DESC
                LIMIT 4";
        return $this->db->getAll($sql);
    }

    public function congView($id)
    {
        $sql = "UPDATE product SET views = views + 1 WHERE id = $id;";
        return $this->db->getOne($sql);
    }


    public function getOneProduct($id)
    {
        $sql = "SELECT * FROM product WHERE id=$id";
        return $this->db->getOne($sql);
    }
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id=$id";
        return $this->db->getOne($sql);
    }

    public function insertProduct($name, $price, $img, $description, $id_categories)
    {
        $sql = "INSERT INTO `product`(`name`, `price`, `img`, `description`, `id_categories`) 
        VALUES ('$name','$price','$img','$description','$id_categories')";
        return $this->db->insert($sql);
    }

    public function editProduct($id, $name, $price, $img, $description, $id_categories, $status)
    {
        if ($img) {
            $sql = "UPDATE `product` SET `name`='$name',`price`='$price',`img`='$img',`description`='$description',`id_categories`='$id_categories',`status`='$status' WHERE id=$id ";
        } else {
            $sql = "UPDATE `product` SET `name`='$name',`price`='$price',`description`='$description',`id_categories`='$id_categories',`status`='$status' WHERE id=$id ";
        }
        return $this->db->insert($sql);
    }

    // public function detailSp($id)
    // {
    //     $sql = "SELECT product.*, categories.name 
    //             FROM product 
    //             INNER JOIN categories ON product.id_categories = categories.id 
    //             WHERE product.id=$id";
    //     return $this->db->getOne($sql);
    // }

    public function getProductDetails($productId)
    {
        $sql = "SELECT 
                p.id AS product_id,
                p.name AS product_name,
                p.price AS base_price,
                p.description AS product_description,
                p.img AS product_image,
                categories.name AS category_name,
                v.price AS variant_price,
                v.quantity AS variant_quantity,
                v.img AS variant_image,
                COALESCE(SUM(oi.quantity), 0) AS total_ordered_quantity
            FROM product p
            LEFT JOIN categories ON p.id_categories = categories.id
            LEFT JOIN varianti v ON p.id = v.id_var
            LEFT JOIN order_items oi ON p.id = oi.product_id
            WHERE p.id = $productId
            GROUP BY p.id, v.id_var, categories.id
        ";
        return $this->db->getOne($sql);
    }

    public function getAllProductsByCategory($categoryId)
    {
        $sql = "SELECT 
            p.id AS product_id,
            p.name AS product_name,
            p.price AS product_price,
            p.img AS product_image,
            p.description AS product_description,
            categories.name AS category_name
        FROM product p
        LEFT JOIN categories ON p.id_categories = categories.id
        WHERE p.id_categories = (
            SELECT id_categories 
            FROM product 
            WHERE id = $categoryId
        ) 
        AND p.id != $categoryId
        LIMIT 4
    ";
        return $this->db->getAll($sql);
    }

    public function getAllProductStatus()
    {
        $sql = "SELECT p.*, SUM(oi.quantity) AS sold_quantity
                FROM product p
                LEFT JOIN order_items oi ON p.id = oi.product_id
                WHERE p.status = 0
                GROUP BY p.id
                ORDER BY p.id DESC;
                ";
        return $this->db->getAll($sql);

    }
}