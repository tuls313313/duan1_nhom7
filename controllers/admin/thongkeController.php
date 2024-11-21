<?php 
class ThongkeController{

    public $thongke;

    public function __construct(){
        $this->thongke = new ThongkeModel();
    }
    public function statistical ()
    {
        //thong ke user
        $datatv = $this->thongke->tongThanhVien();
        $datatvactive = $this->thongke->tongThanhVienActive();
        $datatvlocked = $this->thongke->tongThanhVienLocked();
        //thongke order-đơn hàng
        $datadh = $this->thongke->tongDonHang();
        $tongdoanhthu = $this->thongke->tongDoanhThu();
        $ttdc = $this->thongke->tongDonDangCho();
        $ttdg = $this->thongke->tongDonDangGiao();
        $ttht = $this->thongke->tongDonHoanThanh();
        require_once './views/admin/thongKe/thongke.php';
    }
}

?>