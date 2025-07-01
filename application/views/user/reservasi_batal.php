<!DOCTYPE html>
<html lang="en">
<title>Pembatalan</title>
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
                        Batal Reservasi
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" action="<?php echo base_url() . 'user/batal_reservasi_aksi/'  . $id_reservasi ?>/3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Alasan Pembatalan</label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control" placeholder="" name="alasan_batal"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-danger " value="BATALKAN">
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