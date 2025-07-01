<!DOCTYPE html>
<html lang="en">
<title>Ubah Akun</tittle>
<head>
    <?php $this->load->view("user/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("user/navbar1.php") ?>

    <div id="wrapper">

        <div id="content-wrapper">

            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-key"></i>
                        Ubah Data Akun
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" action="<?php echo base_url() . 'user/ubah_akun_aksi'; ?>">
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
                                        <input type="password" class="form-control" placeholder="" name="password_baru">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" placeholder="" name="password_ulang">
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
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->


        <?php $this->load->view("tamu/scrolltop.php") ?>
        <?php $this->load->view("tamu/modal.php") ?>
        <?php $this->load->view("tamu/js.php") ?>

</body>

</html>