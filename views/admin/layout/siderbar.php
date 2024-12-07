<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./views/admin/asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="?act=admin/user/list" class="d-block">Quản trị viên</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a href="?act=admin/statistical" class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/duan1_nhom7/?act=admin/statistical') ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt nav-icon"></i>
                Quản lý thống kê
              </a>
            </li>
            <li class="nav-item">
              <a href="?act=admin/categories" class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/duan1_nhom7/?act=admin/categories') ? 'active' : ''; ?>">
                <i class="fas fa-th-large nav-icon"></i>
                Quản lý danh mục
              </a>
            </li>
            <li class="nav-item">
              <a href="?act=admin/comment/list" class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/duan1_nhom7/?act=admin/comment/list') ? 'active' : ''; ?>">
                <i class="fas fa-comment nav-icon"></i>
                Quản lý bình luận
              </a>
            </li>
            <li class="nav-item">
              <a href="?act=admin/order" class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/duan1_nhom7/?act=admin/order') ? 'active' : ''; ?>">
                <i class="fas fa-store nav-icon"></i>
                Quản lý đơn hàng
              </a>
            </li>
            <li class="nav-item">
              <a href="?act=admin/product/list" class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/duan1_nhom7/?act=admin/product/list') ? 'active' : ''; ?>">
                <i class="fas fa-warehouse nav-icon"></i>
                Quản lý sản phẩm
              </a>
            </li>
            <li class="nav-item">
              <a href="?act=admin/user/list" class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/duan1_nhom7/?act=admin/user/list') ? 'active' : ''; ?>">
                <i class="fas fa-users nav-icon"></i>
                Quản lý thành viên
              </a>
            </li>
            <li class="nav-item">
              <a href="?act=admin/promotion/list" class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/duan1_nhom7/?act=admin/promotion/list') ? 'active' : ''; ?>">
                <i class="fas fa-fill-drip nav-icon"></i>
                Quản lý khuyến mãi
              </a>
            </li>
            <li class="nav-item">
              <a href="?act=admin/varianti/list" class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/duan1_nhom7/?act=admin/varianti/list') ? 'active' : ''; ?>">
                <i class="fas fa-fill-drip nav-icon"></i>
                Quản lý biến thể
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>
