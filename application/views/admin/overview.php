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

        <!-- Icon Cards-->
        <center>
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-home"></i>
                  </div>
                  <div class="mr-5"> TOTAL KAMAR SELURUHNYA</div>
                  <?php echo $this->m_hotel->get_data('kamar')->num_rows(); ?>
                </div>

              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-user-minus"></i>
                  </div>
                  <div class="mr-5"> TOTAL KAMAR KOSONG</div>
                  <?php echo $this->m_hotel->kamarkosong()->num_rows(); ?>
                </div>

              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-user-plus"></i>
                  </div>
                  <div class="mr-5"> TOTAL KAMAR TERISI</div>
                  <?php echo $this->m_hotel->kamarisi()->num_rows(); ?>
                </div>

              </div>
            </div>
          </div>
        </center>

        <!-- Area Chart Example-->
        <hr style="border: 1px solid">
        <div class="card text-white mb-3">
          <div class="card-header bg-secondary">
            <center> <i class="fas fa-book"></i> New Order
          </div>
          </center>

          <div class="card-body">
            <div class="table-responsive">

              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <br>
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th width="13%">Aksi</th>
                    <th width="15%">Nama</th>
                    <th width="15%">Telp</th>
                    <th width="14%">Kode Reservasi</th>
                    <th width="15%">Tgl Masuk</th>
                    <th width="15%">Tgl Keluar</th>
                    <th width="14%">Kamar</th>
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
                      <td style="display: flex;">
                        <?php if ($cek_kamar['status_kamar'] == 1) { ?>
                          <a class="btn btn-secondary" href="#"> Kamar Tidak Tersedia</a>
                        <?php } else { ?>
                          <a style="margin-right: 2px;" class="btn btn-success" href="<?php echo base_url() . 'admin/new_reservasi_in/' . $r->id_reservasi ?>/1"> IN</a>
                        <?php } ?>
                        <a class="btn btn-danger" href="<?php echo base_url() . 'admin/new_reservasi_cancel/' . $r->id_reservasi ?>"> CANCEL</a>
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
        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header bg-secondary text-white">
            <center> <i class="fas fa-book"></i> Data Kamar Kosong
          </div>
          </center>

          <div class="card-body">
            <div class="table-responsive">

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th width="13%">No Kamar</th>
                    <th width="15%">Harga Kamar</th>
                    <th width="15%">Kelas Kamar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($kamar as $k) {
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $k->no_kamar; ?></td>
                      <td><?php echo rupiah($k->harga_kamar); ?></td>
                      <td><?php echo $k->nama_kelas_kamar; ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
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