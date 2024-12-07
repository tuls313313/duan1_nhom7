<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <!-- CSS của Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Căn giữa form */
        .centered-form {
            min-height: 100vh;
            /* Chiều cao tối thiểu chiếm toàn màn hình */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
            background-image: url('http://localhost/duan1_nhom7/uploads/upimg/z6070082608776_57d52e9b9afecc4fccee66a5818783cf.jpg');

        }
       
    </style>
</head>

<body>
    <div class="centered-form">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Quên mật khẩu</h3>
            <form action="?act=user/changeMK" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Nhập email của bạn</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com"
                        >
                    <h4 class="text-success mt-2"><?php if (isset($_SESSION['data_success'])) { echo $_SESSION['data_success']; 
                    unset($_SESSION['data_success']);} ?></h4>
                    <h4 class="text-danger mt-2"><?php if (isset($_SESSION['data_err'])) { echo $_SESSION['data_err'];
                    unset($_SESSION['data_err']);}?></h4>
                </div>
                <div class="row">
                <div class="col-6"> <button type="submit" name="submit" class="btn btn-primary w-100">Gửi</button> </div>
                <div class="col-6"> <a class="btn btn-primary w-100" href="?act=user/dangnhap">Quay lại</a> </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>