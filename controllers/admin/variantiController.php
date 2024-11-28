<?php 

class VariantiController{
    public $varianti,$product,$color,$size;
    public function __construct(){
        $this->varianti = new VariantiModel();
        $this->product = new ProductModel();
        $this->color = new ColorModel();
        $this->size = new SizeModel();
    }

    public function listVar(){
        $dataVar = $this->varianti->getAllVarianti();
        require_once './views/admin/varianti/list.php';
    }

    public function addVar(){
        $dataProduct = $this->product->getAllProduct();
        $dataColor = $this->color->getAllColor();
        $dataSize = $this->size->getAllSize();
        require_once './views/admin/varianti/add.php';
    }
    public function nextAddVar(){
        if(isset($_POST['addVariant'])){
            $err = false;
            $id_pro = $_POST['id_pro'];
            $id_color = $_POST['id_color'];
            $id_size = $_POST['id_size'];
            $price = $_POST['price'];
            if(empty($price)){
                $_SESSION['err_p'] = 'Vui lòng nhập số lượng';
                $err = true;
            }
            $quantity = $_POST['quantity'];
            if(empty($quantity)){
                $_SESSION['err_q'] = 'Vui lòng nhập số lượng';
                $err = true;
            }
            $img = $_FILES['img'];
            if(empty($img['name'])){
                $_SESSION['err_i'] = 'Vui lòng Chọn ảnh';
                $err = true;
            }
            $upimg = './uploads/var/' . basename($img['name']);
            move_uploaded_file($img['tmp_name'],$upimg);
            if(!$err){
                $this->varianti->addVarianti($id_pro,$id_color,$id_size,$price,$quantity,$img['name']);
                $_SESSION['success'] = 'Thêm mới varianti thành công';
                header('location: ?act=admin/varianti/list&msg=success');
            }
            else{
                header('location: ?act=admin/varianti/add&msg=err');
            }
        }
    }

    public function editVar(){
        $dataProduct = $this->product->getAllProduct();
        $dataColor = $this->color->getAllColor();
        $dataSize = $this->size->getAllSize();
        $id = $_GET['id'];
        $dataOne = $this->varianti->getOneVarianti($id);
        require_once './views/admin/varianti/edit.php';
    }

    public function nextEditVar(){
        if(isset($_POST['editVariant'])){
            $err = false;
            $id_var= $_GET['id'];
            $id_pro = $_POST['id_pro'];
            $id_color = $_POST['id_color'];
            $id_size = $_POST['id_size'];
            $price = $_POST['price'];
            if(empty($price)){
                $_SESSION['err_p'] = 'Vui lòng nhập số lượng';
                $err = true;
            }
            $quantity = $_POST['quantity'];
            if(empty($quantity)){
                $_SESSION['err_q'] = 'Vui lòng nhập số lượng';
                $err = true;
            }
            $img = $_FILES['img'];
            // if(empty($img['name'])){
            //     $_SESSION['err_i'] = 'Vui lòng Chọn ảnh';
            //     $err = true;
            // }
            $upimg = './uploads/var/' . basename($img['name']);
            move_uploaded_file($img['tmp_name'],$upimg);
            if(!$err){
                $this->varianti->edit($id_pro,$id_color,$id_size,$price,$quantity,$img['name'],$id_var);
                $_SESSION['success'] = 'edit varianti thành công';
                header('location: ?act=admin/varianti/list&msg=success');
            }
            else{
                header('location: ?act=admin/variant/edit&id='.$id_var.'&msg=err');
            }
        }
    }

    public function delVar(){
        $id = $_GET['id'];
        $this->varianti->deL($id);
        $_SESSION['success'] = 'Xóa varianti thành công';
        header('location: ?act=admin/varianti/list&msg=success');

    }

}