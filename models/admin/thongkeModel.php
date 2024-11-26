<?php

class ThongkeModel
{

    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    // thống kê user
    public function tongThanhVien()
    {
        $sql = "SELECT COUNT(*) as tongthanhvien FROM account";
        return $this->db->getOne($sql);
    }
    public function tongThanhVienActive()
    {
        $sql = "SELECT COUNT(*) as tongthanhvienactive FROM account where status = 0";
        return $this->db->getOne($sql);
    }
    public function tongThanhVienlocked()
    {
        $sql = "SELECT COUNT(*) as tongthanhvienlocked FROM account where status = 1";
        return $this->db->getOne($sql);
    }
    // thống kê order-đơn hàng
    public function tongDonHang()
    {
        $sql = "SELECT COUNT(*) as tongsoluong FROM orders";
        return $this->db->getOne($sql);
    }

    public function tongDoanhThu()
    {
        $sql = "SELECT SUM(total_money) as tongdoanhthu FROM orders WHERE status_order = 2";
        // 0 đang chờ,1 đang giao,2 hoàn thành
        // chỉ thống kê các đơn hoàn thành
        return $this->db->getOne($sql);
    }

    public function tongDonDangCho()
    {
        $sql = "SELECT COUNT(*) AS tongDonDangCho FROM orders where status_order = 1 ";
        return $this->db->getOne($sql);
    }
    public function tongDonDangGiao()
    {
        $sql = "SELECT COUNT(*) AS tongDonDanggiao FROM orders where status_order = 2 ";
        return $this->db->getOne($sql);
    }
    public function tongDonHoanThanh()
    {
        $sql = "SELECT COUNT(*) AS tongDonHoanThanh FROM orders where status_order = 3 ";
        return $this->db->getOne($sql);
    }

    public function thongketheongay($start = '', $end = '', $status_order = null) {
        $sql = "SELECT 
                    SUM(total_money) AS total_money,
                    COUNT(total_amount) AS total_amount,
                    SUM(CASE WHEN status_order = 1 THEN 1 ELSE 0 END) AS dangcho,
                    SUM(CASE WHEN status_order = 2 THEN 1 ELSE 0 END) AS danggiao,
                    SUM(CASE WHEN status_order = 3 THEN 1 ELSE 0 END) AS hoanthanh
                FROM orders
                WHERE DATE(create_at) BETWEEN '$start' AND '$end'";
    
        if (!empty($status_order)) {
            $sql .= " AND status_order = '$status_order'";
        }
    
        return $this->db->getOne($sql);
    }

    
    
    
}
?>