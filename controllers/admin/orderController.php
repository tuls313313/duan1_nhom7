<?php

class OrderController
{
    public $order;
    public $user;

    public function __construct()
    {
        $this->order = new OrderModel();
        $this->user = new UserModels();
    }

    public function listOder()
    {
        $listOrder = $this->order->getAllOrder();
        if ($listOrder) {
            require_once './views/admin/Orders/litsOrder.php';
        }
    }

    public function detailOrder()
    {
        $id_order = $_GET['id'];
        // var_dump($id_order);die;

        $detail = $this->order->detailOrder($id_order);
        // var_dump($detail); die;
        // if($detail){ 
        require_once './views/admin/Orders/detailOrder.php';
        // }
    }

    public function editOrder()
    {
        if (isset($_GET['id'])) {
            $id_order = $_GET['id'];
            $dataUser = $this->user->getAllUser();
            // var_dump($dataUser); die();
            $edit = $this->order->getOneOrder($id_order);
            require_once './views/admin/Orders/editOrder.php';
        }
    }

    public function postOrder()
    {
        if (isset($_POST['editOrder'])) {
            $error = [];
            // var_dump(value: $_POST['editDonHang']); die;
            $id_order = $_GET['id_order'];
            $user_id = $_POST['user_id'];

            $status_order = intval($_POST['status_order']);
            // if ($status_order == 1) {
            //     $error[] = "Trạng thái mới không hợp lệ. Bạn chỉ có thể chọn 'Đang giao' hoặc 'Hoàn thành'.";
            // } elseif ($status_order == 2) {
            //     $error[] = "Trạng thái mới không hợp lệ. Bạn chỉ có thể chọn 'Hoàn thành'.";
            // } elseif ($status_order == 3) {
            //     $error[] = "Đơn hàng đã hoàn thành, không thể thay đổi trạng thái.";
            // } else {
            //     $error[] = "Trạng thái mới không hợp lệ.";
            // }

            // $status_order = $_POST['status_order'];
            // if ($status_order == 3 && !$status_order == 2 && !$status_order == 1) {
            //     $error[] = "ent";
            // } 
            
            if ($status_order == 3) {
                // Trạng thái 3 không thể chuyển thành 1 hoặc 2
                $error[] = "Lỗi: Không thể thay đổi từ trạng thái 3 sang trạng thái 1 hoặc 2.";
            } elseif ($status_order == 1 || $status_order == 2) {
                // Trạng thái 1 và 2 có thể chuyển qua lại, hoặc chuyển lên 3
                // Không có lỗi ở đây
            } elseif ($status_order != 1 && $status_order != 2 && $status_order != 3) {
                // Nếu trạng thái không phải là 1, 2 hoặc 3, báo lỗi
                $error[] = "Trạng thái đơn hàng không hợp lệ.";
            }

            // var_dump($status_order);die;
            $payment = $_POST['payment'];
            $total_amount = $_POST['total_amount'];
            $total_money = $_POST['total_money'];
            $shipping_address = $_POST['shipping_address'];
            if (empty($error)) {
                $this->order->editOrder(
                    $id_order,
                    $user_id,
                    $status_order,
                    $payment,
                    $total_amount,
                    $total_money,
                    $shipping_address
                );
                header("Location: ?act=admin/order&message=success");
            } else {
                $_SESSION['error'] = $error;
                header("Location: ?act=admin/order&message=error");
            }
        } else {
            header("Location: ?act=admin/order&message=error.");
        }
    }
}
