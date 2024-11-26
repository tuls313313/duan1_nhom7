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
        }
    </style>
</head>

<body>
    <div class="container centered-form">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Quên mật khẩu</h3>
            <form action="?act=user/changeMK" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Nhập email của bạn</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com"
                        autocomplete="off">
                </div>
                <?php if (isset($data)) {
                    echo 'Mật khẩu của bạn là: ' . ($data['password'] ?? 'Email không tồn tại');
                } else {
                    echo 'Email không tồn tại.';
                } ?>

                <button type="submit" name="submit" class="btn btn-primary w-100">Gửi</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>