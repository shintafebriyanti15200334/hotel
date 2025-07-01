<!DOCTYPE html>
<html lang="en">
<title>Detail Reservasi</title>
<head>
    <?php $this->load->view("user/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("user/navbar3.php") ?>

    <div id="wrapper">

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Icon Cards-->
                <div class="properties">
                    <div class="col-lg-6 mb-3 center">
                        <div class="properties" style="background-color: white; padding:10px">
                            <div class="text-black font-weight-bold center" style="padding: 15px;">
                                <h3>Kode Reservasi:</h3>
                                <h2><?php echo $detail['kode_reservasi'] ?></h2>
                                <p>Tunjukan kode ini kepada resepsionis saat check in.</p>
                                <h3>Ruang: <?php echo $detail['no_kamar'] ?></h3>
                                <hr>
                                <h4><?php echo $detail['nama_reservasi'] ?></h4>
                                <h4>Check-in: <?php echo $detail['tgl_reservasi_masuk'] ?></h4>
                                <h4>Check-out: <?php echo $detail['tgl_reservasi_keluar'] ?></h4>
                                <br>
                                <h2 style="color:black">Enjoy Your Stay ~</h2>
                                <p><i class="fa fa-home"></i> <?php echo SITE_NAME ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.iron-card -->

                <!-- Sticky Footer -->
                <?php $this->load->view("tamu/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->


        <?php $this->load->view("tamu/scrolltop.php") ?>
        <?php $this->load->view("tamu/modal.php") ?>
        <?php $this->load->view("tamu/js.php") ?>

</body>

</html>