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
                    <div class="card-header">
                        Batal Reservasi
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" action="<?php echo base_url() . 'admin/new_reservasi_cancel_aksi/' . $id_reservasi ?>/3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Alasan Pembatalan</label>
                                    <div class="col-md-9">
                                        <textarea type="password" class="form-control" placeholder="" name="alasan_batal" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-danger" value="BATALKAN">
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