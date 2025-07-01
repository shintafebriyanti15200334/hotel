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


        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-check"></i>
              </div>
              <div class="mr-5"> TOTAL CHECK-IN </div>
              <?php echo $this->db->query('SELECT * from reservasi where status_reservasi=1')->num_rows(); ?>
            </div>

          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header bg-secondary text-white">
            <center>
              <i class="fas fa-table"></i>
              Pemesanan
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
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th width="15%">Status</th>
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Kode Reservasi</th>
                    <th width="12%">Tgl Masuk</th>
                    <th width="12%">Tgl Keluar</th>
                    <th>Kamar</th>
                    <th>Akun</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($reservasi as $r) {
                    $cek_kamar = $this->db->get_where('kamar', ['no_kamar' => $r->no_kamar])->row_array();
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td style="display: flex; flex-direction: column; text-align: center;">
                        <?php
                        $alasan_batal = $this->db->get_where('reservasi_batal', ['id_reservasi' => $r->id_reservasi])->row_array();
                        if ($r->status_reservasi == 0) { ?>
                          <?php if ($cek_kamar['status_kamar'] == 1) { ?>
                            <a class="btn btn-secondary" href="#"> Kamar Tidak Tersedia</a>
                          <?php } else { ?>
                            <a style="margin-bottom: 2px;" class="btn btn-success" href="<?php echo base_url() . 'admin/new_reservasi_in/' . $r->id_reservasi ?>/1">Proses Check-IN</a>
                          <?php } ?>
                          <a class="btn btn-danger" href="<?php echo base_url() . 'admin/new_reservasi_cancel/' . $r->id_reservasi ?>"> CANCEL</a>
                        <?php
                        } else if ($r->status_reservasi == 1) { ?>
                          <a style="margin-bottom: 2px;" class="btn btn-warning" href="<?php echo base_url() . 'admin/new_reservasi_out/' . $r->id_reservasi ?>/2"> Proses Check-OUT</a>
                          <a class="btn btn-primary" href="<?php echo base_url() . 'admin/new_reservasi_perpanjang/' . $r->id_reservasi ?>">PERPANJANG</a>
                        <?php
                        } else if ($r->status_reservasi == 2) { ?>
                          <span class="label label-success">CHECK OUT SUCCESS</span>
                        <?php } else { ?>
                          <span style="display: inline-block; margin-bottom: 5px; background-color: red; color: white;">DIBATALKAN</span>
                          <span style="display: inline-block;">Alasan Pembatalan: </span>
                          <p><?php echo $alasan_batal['alasan_batal'] ?></p>
                        <?php } ?>
                      </td>
                      <td><?php echo $r->nama_reservasi; ?></td>
                      <td><?php echo $r->tlp_reservasi; ?></td>
                      <td><?php echo $r->kode_reservasi; ?></td>
                      <td><?php echo $r->tgl_reservasi_masuk; ?></td>
                      <td><?php echo $r->tgl_reservasi_keluar; ?></td>
                      <td><?php echo $r->no_kamar; ?></td>
                      <td><?php echo $r->username_user; ?></td>
                    </tr>
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