<!DOCTYPE html>
<html lang="en">
<title>Data Reservasi</title>
<head>
    <?php $this->load->view("user/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("user/navbar1.php") ?>

    <div id="wrapper">

        <div id="content-wrapper">

            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header bg-secondary text-white">
                        <center> <i class="fas fa-table"></i> Pemesanan</div>

            <div class="container-fluid">
                <div class="table-responsive" id="tabel-data-reservasi">
                    <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                        <br>
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="10%">Nama</th>
                                <th width="10%">Telp</th>
                                <th width="12%">Kode Reservasi</th>
                                <th width="10%">Tgl Masuk</th>
                                <th width="10%">Tgl Keluar</th>
                                <th width="5%">Kamar</th>
                                <th width="15%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($reservasi as $r) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $r->nama_reservasi; ?></td>
                                    <td><?php echo $r->tlp_reservasi; ?></td>
                                    <td><?php echo $r->kode_reservasi; ?></td>
                                    <td><?php echo $r->tgl_reservasi_masuk; ?></td>
                                    <td><?php echo $r->tgl_reservasi_keluar; ?></td>
                                    <td><?php echo $r->no_kamar; ?></td>
                                    <td> <?php $alasan_batal = $this->db->get_where('reservasi_batal', ['id_reservasi' => $r->id_reservasi])->row_array();
                                            if ($r->status_reservasi == 0) { ?>

                                            <a class="btn btn-warning" href="<?php echo base_url() . 'user/detail_reservasi/' . $r->id_reservasi ?>">CETAK KARTU</a>
                                            <a class="btn btn-danger" href="<?php echo base_url() . 'user/batal_reservasi/' . $r->id_reservasi ?>">BATALKAN</a>
                                        <?php
                                            } else if ($r->status_reservasi == 1) { ?>
                                            <span class="label label-success">SEDANG MENGINAP</span>
                                        <?php
                                            } else if ($r->status_reservasi == 2) { ?>
                                            <a class="btn btn-success" href="<?php echo base_url() . 'user/bukti_reservasi/' . $r->id_reservasi ?>">BUKTI PEMBAYARAN</a>
                                        <?php } else { ?>
                                            <span style="display: inline-block; margin-bottom: 5px; background-color: red; color: white;">DIBATALKAN</span><br>
                                            <span style="display: inline-block;">Alasan Pembatalan: </span>
                                            <p><?php echo $alasan_batal['alasan_batal'] ?></p>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
</center>
                <!-- Sticky Footer -->
                <?php $this->load->view("tamu/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->


        <?php $this->load->view("tamu/scrolltop.php") ?>
        <?php $this->load->view("tamu/modal.php") ?>
        <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>