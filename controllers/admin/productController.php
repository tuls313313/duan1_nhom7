<?php
class ProductController
{


    public $product;

    public function __construct()
    {
       $this->product=new AdminProductModels();
    }
    public function getAllProduct()
    {   
        $listProduct = $this->product->getAllProduct();
        if ($listProduct) {
            require_once './views/admin/product/listProduct.php';
        }
    }


    public function insertProduct()
    {
        if (isset($_POST['addProduct'])) {
            $error = [];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $img = $_FILES['img'];
            $upload = './upimgs/' . basename($img['tmp_name']);
            move_uploaded_file($img['name'],$upload);
            // var_dump($img); die();
            $description = $_POST['description'];
            $id_categories = $_POST['id_categories'];
            if(empty($id_categories)){
                $error[] = 'ghfj';
            }
            if (empty($error)) {
                $this->product->insertProduct( $name, $price, $img['name'],
                 $description, 
                 $id_categories);
                header("Location: ?act=admin/product/list&message=success");
            } else {
                header("Location: ?act=admin/product/list&message=error");
            }
        } else {
            header("Location: ?act=admin/product/list&message=error.");
        }
    }
   

    // Hàm lấy địa chỉ IP của người dùng
   public function DeleteProduct()
   {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $dataOneProduct= $this ->product->deleteProduct($id);
        header("Location: ?act=admin/product/list&message=success");
    }
   }



    public function editProduct()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dataOneProduct = $this->product->getOneProduct($id);
            require_once './views/admin/product/editProduct.php';
            print_r($id);die();
        }
    }
    public function nexteditProduct()
    {
        if (isset($_POST['editProduct'])) {
            $error = [];
            $id = $_GET['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $img = $_POST['img'];
            $description = $_POST['description'];
            $id_categories = $_POST['id_categories'];
            $status = $_POST['status'];
            if (empty($error)) {
                $this->product->editProduct($id, $name, $price, $img,
                 $description, 
                 $id_categories, $status);
                header("Location: ?act=admin/product/list&message=success");
            } else {
                header("Location: ?act=admin/product/list&message=error");
            }
        } else {
            header("Location: ?act=admin/product/list&message=error.");
        }
    }



}
