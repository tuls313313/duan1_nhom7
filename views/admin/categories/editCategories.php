<?php include_once './views/admin/layout/header.php'; ?>

<!-- Navbar -->
<?php include_once './views/admin/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include_once './views/admin/layout/siderbar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Trang Admin Danh Mục</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Form Sửa Danh Mục</h3>
            </div>
            <section class="content">
              <form action="?act=admin/categories/editCategories&id=<?= $edit_Categories['id'] ?>" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Sửa Thông Tin Danh Mục: <?= $edit_Categories['name'] ?>
                        </h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="id">Id</label>
                          <input type="number" name="id" class="form-control"
                            value="<?= $edit_Categories['id'] ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" class="form-control"
                            value="<?= $edit_Categories['name'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="status_categories">Status_categories</label>
                          <select name="status_categories" class="form-control">
                            <option value="1" <?= $edit_Categories['status_categories'] == 1 ? 'selected' : '' ?>>
                              Hoạt Động</option>
                            <option value="2" <?= $edit_Categories['status_categories'] == 2 ? 'selected' : '' ?>>
                              Không Hoạt Động</option>
                          </select>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit"
                    onclick="return confirm('Bạn có chắc muốn sửa cho danh mục: <?= $edit_Categories['name'] ?>')">
                    Submit
                  </button>
                </div>
              </form>
            </section>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once './views/admin/layout/footer.php'; ?>

