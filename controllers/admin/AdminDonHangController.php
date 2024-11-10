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

    public function editDonHang()
    {
        $don_hang_id = $_GET['id'];

        $detailDonHang = $this->donHang->getEditDonHang($don_hang_id);

        $sanPhamDonHang = $this->donHang->getListSpDonHang($don_hang_id);

        if($detailDonHang){
            require_once './views/admin/DonHang/editDonHang.php';
        }
    }
}