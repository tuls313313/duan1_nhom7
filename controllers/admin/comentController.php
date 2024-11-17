<?php 

class ComentController{
    public $cmt;

    public function __construct(){
        $this->cmt = new CommentModel();
    }

    public function listCmt(){
        $listCmt  = $this->cmt->getAllCmt();
        require_once './views/admin/comment/list.php';
    }

    public function addCmt(){
        $listAccount = $this->cmt->getAllAccount();
        $listProduct = $this->cmt->getAllProduct();
        require_once './views/admin/comment/add.php';
    }

    public function nextAddCmt(){
        if(empty($_POST['submit'])){
            $error = [];
            if(empty($_POST['conten'])){
                $error[]= 'conten trống';
            }
            if(empty($error)){
                $this->cmt->addCmt($_POST['id_user'],$_POST['id_pro'],$_POST['conten']);
                header('location: ?act=admin/comment/list');
            }else{
                $_SESSION['errors'] = $error;
                header('location: ?act=admin/comment/add');
            }
           
        }
    }

    public function editCmt(){

        $id_cmt = $_GET['id_cmt'];
        $dataOneCmt = $this->cmt->getOneCmt($id_cmt);
        $listAccount = $this->cmt->getAllAccount();
        require_once './views/admin/comment/edit.php';
       
    }

    public function nextEditCmt(){
        if(empty($_POST['submit'])){
            // $id_cmt = $_GET['id_cmt'];
            $this->cmt->updateCmt( $_GET['id_cmt'] ,$_POST['id_user'],$_POST['id_pro'],$_POST['conten'],$_POST['status']);
            // var_dump($_GET['id_cmt'] ,$_POST['id_user'],$_POST['id_pro'],$_POST['conten'],$_POST['status']); die();
            header('location: ?act=admin/comment/list&success');
        }
    }

    public function delCmt(){
        $id_cmt = $_GET['id_cmt'];
        $this->cmt->deleteCmt($id_cmt);
        header('location: ?act=admin/comment/list&success');
    }

}
?>