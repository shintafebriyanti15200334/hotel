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

        <!-- Area Chart Example-->
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-check"></i>
              </div>
              <div class="mr-5"> TOTAL CHECK-OUT</div>
              <?php echo $this->db->query('SELECT * from reservasi where status_reservasi=2')->num_rows(); ?>
            </div>

          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header bg-secondary text-white">
            <center>
              <i class="fas fa-table"></i>
              Semua Reservasi Selesai
          </div>
          </center>
          <?php

          if ($this->session->flashdata('in')) {
            echo "<div class='alert alert-success'>
                                           <span>Pemesanan Check IN SUCCESS</span>  
                                        </div>";
          } else if ($this->session->flashdata('out')) {

            echo "<div class='alert alert-success'>
                                           <span>Pemesanan Check OUT SUCCESS</span>  
                                        </div>";
          } else if ($this->session->flashdata('berhasil')) {

            echo "<div class='alert alert-success'>
                                           <span>Pemesanan Baru SUCCESS</span>  
                                        </div>";
          } else if ($this->session->flashdata('perpanjang')) {

            echo "<div class='alert alert-success'>
                                           <span>Perpanjang SUCCESS</span>  
                                        </div>";
          }


          ?>

          <div class="card-body">
            <div class="table-responsive">
              <a class="btn btn-warning " href="<?= base_url('admin/cetak_laporan_reservasi_harian'); ?>">Cetak Laporan Harian <i class="fas fa-print"></i></a>
              <a class="btn btn-info " href="<?= base_url('admin/cetak_laporan_reservasi_bulanan'); ?>">Cetak Laporan Bulanan <i class="fas fa-print"></i></a>
              <a class="btn btn-primary " href="<?= base_url('admin/cetak_laporan_reservasi_tahunan'); ?>">Cetak Laporan Tahunan <i class="fas fa-print"></i></a>
              <a class="btn btn-success " href="<?= base_url('admin/cetak_laporan_reservasi'); ?>">Cetak Seluruh Laporan <i class="fas fa-print"></i></a><br>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th width="13%">Nama</th>
                    <th width="13%">Telp</th>
                    <th>Kode Reservasi</th>
                    <th width="12%">Tgl Pembayaran</th>
                    <th width="13%">Nominal Bayar</th>
                    <th width="5%">Kamar</th>
                    <th width="5%">Struk</th>
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
                      <td><?php echo $r->tgl_pembayaran; ?></td>
                      <td><?php echo rupiah($r->nominal_pembayaran); ?></td>
                      <td><?php echo $r->no_kamar; ?></td>
                      <td><a class="btn btn-success" href="<?php echo base_url() . 'admin/cetak_struk/' . $r->id_reservasi ?>/1"><i class="fas fa-print"></i></a></td>
                    <?php
                  }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <hr style="border: 1px solid">

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