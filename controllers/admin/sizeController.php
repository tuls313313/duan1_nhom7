<?php

class SizeController
{
    public $size;

    public function __construct()
    {
        $this->size = new SizeModel();
    }

    public function listSize()
    {
        $listSize = $this->size->getAllSize();
        require_once './views/admin/size/listSize.php';
    }

    public function editSize()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit_Size = $this->size->getOneSize($id);
            require_once './views/admin/size/editSize.php';
        }
    }

    public function nexteditSize()
    {
        if(isset($_POST['editSize'])){
            $error = [];
            $id = $_GET['id'];
            $name = $_POST['name'];
            $status = $_POST['status'];
            if(empty($error)){
                $this->size->editSize($id, $name, $status);
                header("Location: ?act=admin/size&message=success");
            }else{
                header("Location: ?act=admin/size&message=error");
            }
        }else{
            header("Location: ?act=admin/size&message=error.");
        }
    }

    public function deleteSize()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = $this->size->deleteSize($id);
            header("Location: ?act=admin/size&message=success");
        }
    }

    public function formSize()
    {
        require_once './views/admin/size/addSize.php';
    }

    public function addSize()
    {
        if(empty($_POST['submit_size'])){
            $error = [];
            if(empty($_POST['name'])){
                $error[] = "Size không được để trống";
            }
            if(empty($error)){
                $this->size->insertSize($_POST['name'], $_POST['status']);
                header("Location: ?act=admin/size&message=success");
            }else{
                $_SESSION['error'] = $error;
                header("Location: ?act=admin/size/addSize");
            }
        }else{
            header("Location: ?act=admin/size&message=error.");
        }
    }
}