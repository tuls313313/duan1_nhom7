<?php

class PromotionController
{

    public $promotion;

    public function __construct()
    {
        $this->promotion = new PromotionModel();
    }

    public function list()
    {
        $datapromotion = $this->promotion->getAllPromotion();
        require_once './views/admin/promotion/list.php';
    }

    public function add()
    {
        require_once './views/admin/promotion/add.php';
    }

    public function nextadd()
    {
        if (isset($_POST['submit'])) {
            $error = false;
            if (empty($_POST['code'])) {
                $_SESSION['code'] = 'Mã code không được để trống';
                $error = true;
            }
            if (empty($_POST['start_date'])) {
                $_SESSION['start_date'] = 'Ngày bắt đầu không được để trống';
                $error = true;
            }
            if (empty($_POST['end_date'])) {
                $_SESSION['end_date'] = 'Ngày kết thúc không được để trống';
                $error = true;
            }
            if (empty($_POST['quantity'])) {
                $_SESSION['quantity'] = 'Số lượng không được để trống';
                $error = true;
            }
            if (empty($_POST['min_money'])) {
                $_SESSION['min_money'] = 'Số tiền áp dụng không được để trống';
                $error = true;
            }
            if (empty($_POST['discount_value'])) {
                $_SESSION['discount_value'] = 'Giá trị giảm giá không được để trống';
                $error = true;
            }
            if (empty($error)) {
                $this->promotion->insertPromotion(
                    code: $_POST['code'],
                    start_date: $_POST['start_date'],
                    end_date: $_POST['end_date'],
                    quantity: $_POST['quantity'],
                    min_money: $_POST['min_money'],
                    discount_value: $_POST['discount_value'],
                    status: $_POST['status']
                );
                $_SESSION['success'] = 'Thêm mã giảm giá thành công';
                unset($_SESSION['promotion']);
                header('location: ?act=admin/promotion/list');
            } else {
                $_SESSION['promotion'] = $_POST;
                header('location: ?act=admin/promotion/add');
            }
        }
    }

    public function update(){
        $id = $_GET['id'];
        $dataPromotion = $this->promotion->getOnePromotion($id);
        require_once './views/admin/promotion/edit.php';
    }

    public function nextUpdate(){
        if (isset($_POST['submit'])) {
            $error = false;
            $id = $_GET['id'];
            if (empty($_POST['code'])) {
                $_SESSION['code'] = 'Mã code không được để trống';
                $error = true;
            }
            if (empty($_POST['start_date'])) {
                $_SESSION['start_date'] = 'Ngày bắt đầu không được để trống';
                $error = true;
            }
            if (empty($_POST['end_date'])) {
                $_SESSION['end_date'] = 'Ngày kết thúc không được để trống';
                $error = true;
            }
            if (empty($_POST['quantity'])) {
                $_SESSION['quantity'] = 'Số lượng không được để trống';
                $error = true;
            }
            if (empty($_POST['min_money'])) {
                $_SESSION['min_money'] = 'Số tiền áp dụng không được để trống';
                $error = true;
            }
            if (empty($_POST['discount_value'])) {
                $_SESSION['discount_value'] = 'Giá trị giảm giá không được để trống';
                $error = true;
            }
            if (empty($error)) {
                $this->promotion->updatePromotion($id,
                    code: $_POST['code'],
                    start_date: $_POST['start_date'],
                    end_date: $_POST['end_date'],
                    quantity: $_POST['quantity'],
                    min_money: $_POST['min_money'],
                    discount_value: $_POST['discount_value'],
                    status: $_POST['status']
                );
                $_SESSION['success'] = "cập nhật thành công id = $id";
                header('location: ?act=admin/promotion/list');
            } else {
                header("location: ?act=admin/promotion/update&id=$id");
            }
        }
    }

    public function delete(){
        $id = $_GET['id'];
        $dataPromotion = $this->promotion->deletePromotin($id);
        $_SESSION['success'] = "Xóa thành công id=$id";
        header('location: ?act=admin/promotion/list');

    }

}