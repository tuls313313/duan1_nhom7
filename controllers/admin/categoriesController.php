<?php

class CategoriesController
{
    public $categories;

    public function __construct()
    {
        $this->categories = new categoriesModel();
        
    }

    public function getAllCategories()
    {
        $listCategories = $this->categories->getAllCategories();
        require_once './views/admin/categories/listCategories.php';
    }

    public function editCategories()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit_Categories = $this->categories->getOneCategories($id);
            require_once './views/admin/categories/editCategories.php';
        }
    }

    public function postCategories()
    {
        if(isset($_POST['id'])){
            $error = [];
            $id = $_POST['id'];
            $name = $_POST['name'];
            $status_categories = $_POST['status_categories'];
            if(empty($error)){
                $this->categories->editCategories($id, $name, $status_categories);
                header("Location: ?act=admin/categories&message=success");
            }else{
                header("Location: ?act=admin/categories&message=error");
            }
        }else{
            header("Location: ?act=admin/categories&message=error.");
        }
    }
}