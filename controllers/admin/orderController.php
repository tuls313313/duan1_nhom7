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
            $status_order = $_POST['status_order'];
            $payment = $_POST['payment'];
            $total_amount = $_POST['total_amount'];
            $total_money = $_POST['total_money'];
            $shipping_address = $_POST['shipping_address'];
            if (empty($error)) {
                $this->order->editOrder($id_order, $user_id, 
                $status_order, $payment, $total_amount, 
                $total_money, $shipping_address);
                header("Location: ?act=admin/order&message=success");
            }else{
                header("Location: ?act=admin/order&message=error");
            }
        }else{
            header("Location: ?act=admin/order&message=error.");
        }
    }
}
