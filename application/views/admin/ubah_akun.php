<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

  <?php $this->load->view("admin/_partials/navbar.php") ?>

  <div id="wrapper">

    <?php $this->load->view("admin/_partials/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">
        <div class="card mb-3">
          <div class="card-header  bg-secondary text-white">
            <center><i class="fas fa-key"></i>
            Ubah Akun</center>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <form method="post" action="<?php echo base_url() . 'admin/ubah_akun_aksi'; ?>">
                <div class="form-group">
                  <label class="control-label col-md-3">Nama Lengkap</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="" name="nama_lengkap">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Nomor Telepon</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="" name="nomor_telepon">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Password Baru</label>
                  <div class="col-md-9">
                    <input type="password" class="form-control" placeholder="" name="password_baru" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Confirm Password</label>
                  <div class="col-md-9">
                    <input type="password" class="form-control" placeholder="" name="password_ulang" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-9">
                    <input type="submit" class="btn btn-success " value="SIMPAN">
                  </div>
                </div>
              </form>

            </div>
          </div>

        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <?php $this->load->view("admin/_partials/scrolltop.php") ?>
  <?php $this->load->view("admin/_partials/modal.php") ?>
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>