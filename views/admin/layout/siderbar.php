<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <!-- <a href="" class="brand-link">
    <img src="./views/admin/asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a> -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./views/admin/asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="?act=admin/user/list" class="d-block">Quản trị viên</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../../index.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
              </a>
            </li>
          </ul>
        </li> -->
        <li class="nav-item">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a href="?act=admin/statistical" class="nav-link" id="category-link">
                <i class="fas fa-tachometer-alt nav-icon"></i>
                Quản lý thống kê
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="?act=admin/thongketheongay" class="nav-link" id="category-link">
                <i class="fas fa-tachometer-alt nav-icon"></i>
                Quản lý thống kê v2
              </a>
            </li> -->
            <li class="nav-item">
              <a href="?act=admin/categories" class="nav-link" id="category-link">
                <i class="fas fa-th-large nav-icon"></i>
                Quản lý danh mục
              </a>
            </li>
            <li class="nav-item">
              <a href="?act=admin/comment/list" class="nav-link" id="comment-link">
                <i class="fas fa-comment nav-icon"></i>
                Quản lý bình luận
              </a>
            </li>
            <li class="nav-item">
              <a href="?act=admin/order" class="nav-link" id="order-link">
                <i class="fas fa-store nav-icon"></i>
                Quản lý đơn hàng
              </a>
            </li>
            <li class="nav-item">
              <a href="?act=admin/product/list" class="nav-link" id="comment-link">
                <i class="fas fa-warehouse nav-icon"></i>
                Quản lý sản phẩm
              </a>
            </li>
            <li class="nav-item">
              <a href="?act=admin/user/list" class="nav-link" id="user-link">
                <i class="fas fa-users nav-icon"></i>
                Quản lý thành viên
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>