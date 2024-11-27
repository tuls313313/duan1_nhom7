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


    public function editCmt(){

        $id_cmt = $_GET['id_cmt'];
        $dataOneCmt = $this->cmt->getOneCmt($id_cmt);
        $listAccount = $this->cmt->getAllAccount();
        require_once './views/admin/comment/edit.php';
       
    }

    public function nextEditCmt(){
        if(empty($_POST['submit'])){
            $this->cmt->updateCmt( $_GET['id_cmt'] ,$_POST['id_user'],$_POST['id_pro'],$_POST['conten'],$_POST['status']);
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