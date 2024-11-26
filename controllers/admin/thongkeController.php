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

    public function thongketheongay(){
        $error = [];
        if(empty($_POST['start_date'])){
            $error[] = 'vui lòng chọn ngày bắt đầu';
        }
        if(empty($_POST['end_date'])){
            $error[] = 'vui lòng chọn ngày Kết thúc';
        }
        if(empty($error)){
            $tktn = $this->thongke->thongketheongay($_POST['start_date'],$_POST['end_date'],$_POST['status_order']);
            require_once './views/admin/thongKe/thongkev2.php';
        }
        else{
            $_SESSION['error'] = $error;
            header('location: ?act=admin/statistical');
        }
        
    }
}

?>