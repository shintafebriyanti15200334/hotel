<!DOCTYPE html>
<html lang="en">

<title> Invoice </title>

<head>
    <?php $this->load->view("user/head.php") ?>
</head>
<center>
<body id="page-top">

    <div id="wrapper">

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Icon Cards-->
                <div class="properties">
                    <div class="col-lg-7 mb-3 center">
                        <div class="properties" style="background-color: white; padding:10px">
                            <div class="text-black font-weight-bold center" style="padding: 15px;">
                                <h3>BUKTI PEMBAYARAN</h3>
                                <h2><?php echo $bukti['kode_reservasi'] ?></h2>
                                <h3>Ruang: <?php echo $bukti['no_kamar'] ?></h3>
                                <hr>
                                <h4><?php echo $bukti['nama_reservasi'] ?></h4>
                                <h4><?php echo $bukti['tgl_reservasi_masuk'] ?></h4>
                                <h4><?php echo $bukti['tgl_reservasi_keluar'] ?></h4>
                                <h4>Total Biaya <?php echo rupiah($bukti['nominal_pembayaran']) ?></h4>
                                <h4>Uang Bayar: <?php echo rupiah($bukti['uang_bayar']) ?></h4>
                                <h4>kembalian: <?php echo rupiah($bukti['kembalian']) ?></h4>
                                <br>
                                <h2 style="color:black">Thank You for Staying!</h2>
                                <p><i class="fa fa-home"></i> <?php echo SITE_NAME ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.iron-card -->


            </div>
            <!-- /.content-wrapper -->

        </div>
        <script type="text/javascript">
    window.print();
  </script>

</body>

</html>