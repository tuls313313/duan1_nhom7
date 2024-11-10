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

    
}