<?php

class ColorController
{
    public $color;

    public function __construct()
    {
        $this->color = new colorModel();
    }

    public function listColor()
    {
        $listColor = $this->color->getAllColor();
        require_once './views/admin/colors/listColor.php';
    }

    public function editColor()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = $this->color->getOneColor($id);
            require_once './views/admin/colors/editColor.php';
        }
    }

    public function nexteditColor()
    {
        if(isset($_POST['editColor'])){
            $error = [];
            $id = $_GET['id'];
            // var_dump($id);die;
            $name = $_POST['name'];
            $status = $_POST['status'];
            if(empty($error)){
                $this->color->editColor($id, $name, $status);
                header("Location: ?act=admin/color&message=success");
            }else{
                header("Location: ?act=admin/color&message=error");
            }
        }else{
            header("Location: ?act=admin/color&message=error.");
        }
    }

    public function deleteColor()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            // var_dump($id);die;
            $delete = $this->color->deleteColor($id);
            header("Location: ?act=admin/color&message=success");
        }
    }

    public function formColor()
    {
        require_once './views/admin/colors/addColor.php';
    }

    public function addColor()
    {
        if(empty($_POST['submit_color'])){
            $error = [];
            if(empty($_POST['name'])){
                $error[] = "Tên màu không được để trống";
            }
            if(empty($error)){
                $this->color->insertColor($_POST['name'], $_POST['status']);
                header("Location: ?act=admin/color&message=success");
            }else{
                $_SESSION['error'] = $error;
                header("Location: ?act=admin/color/addColor");
            }
        }else{
            header("Location: ?act=admin/color&message=error.");
        }
    }
}