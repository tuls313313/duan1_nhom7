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
        $dataDonHang = $this->donHang->getAllDonHang();
        require_once './views/admin/DonHang/donHang.php';
    }
}