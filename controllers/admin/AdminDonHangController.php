<?php

class AdminDonHangController
{
    public $donHang;

    public function __construct()
    {
        $this->donHang = new donHangModel();
    }

    public function getAllDonHang()
    {
        $listDonHang = $this->donHang->getAllDonHang();
        if($listDonHang){
            require_once './views/admin/DonHang/litsDonHang.php';
        }
    }

    public function detailDonHang()
    {
        $id = $_GET['id'];
        // var_dump($id);die;

        $detail = $this->donHang->detailDonHang($id);
        // var_dump($detail); die;
        // if($detail){
            require_once './views/admin/DonHang/detailDonHang.php';
        // }
    }

    public function editDonHang()
    {
        $id = $_GET['id'];

        $edit = $this->donHang->detailDonHang($id);

        if($edit){
            require_once './views/admin/DonHang/editDonHang.php';
        }else{
            header("Location:" . '?act=admin/donHang');
            exit();
        }
    }

    public function postDonHang()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $user_id = $_POST['user_id'] ?? '';
            $order_date = $_POST['order_date'] ?? '';
            $status = $_POST['status'] ?? '';
            $payment = $_POST['payment'] ?? '';
            $total_amount = $_POST['total_amount'] ?? '';
            $total_money = $_POST['total_money'] ?? '';
            $shipping_address = $_POST['shipping_address'] ?? '';
            $create_at = $_POST['create_at'] ?? '';
            $update_at = $_POST['update-at'] ?? '';

            $errors = [];
            if(empty($user_id)){
                $errors['user_id'] = 'Id';
            }
        }   
    }
}