<?php

class CategoriesController
{
    public $categories;

    public function __construct()
    {
        $this->categories = new categoriesModel();
    }

    public function getAllCategory()
    {
        $listCategories = $this->categories->getAllCategory();
        require_once './views/admin/categories/listCategories.php';
    }

    public function editCategory()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit_Categories = $this->categories->getOneCategory($id);
            require_once './views/admin/categories/editCategories.php';
        }
    }

    public function postCategory()
    {
        if(isset($_POST['submit'])){
            $error = [];
            $id = $_GET['id'];
            $name = $_POST['name'];
            $status_categories = $_POST['status_categories'];
            if(empty($error)){
                $this->categories->editCategory($id, $name, $status_categories);
                header("Location: ?act=admin/categories&message=success");
            }else{
                header("Location: ?act=admin/categories&message=error");
            }
        }else{
            header("Location: ?act=admin/categories&message=error.");
        }
    }

    public function deleteCategory()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = $this->categories->deleteCategory($id);
            header('Location: ?act=admin/categories&message=success');
        }
    }

    public function formAddCategory()
    {
        require_once "./views/admin/categories/addCategories.php";
    }

    public function addCategory()
    {
        if(empty($_POST['submit'])){
            $error = [];
            // $name = $_POST['name'];
            if(empty($_POST['name'])){
                $error[] = "Tên danh mục không được để trống";
            }
            if(empty($error)){
                $this->categories->inserCategory($_POST['name'],$_POST['status_categories']);
                header("Location: ?act=admin/categories&message=success");
            }else{
                $_SESSION['error'] = $error;
                header("Location: ?act=admin/categories/addCategories");
            }
        }else{
            header("Location: ?act=admin/categories&message=error.");
        }
    }
}