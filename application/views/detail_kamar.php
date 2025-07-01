<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("user/head.php") ?>
</head>

<body id="page-top">

  <?php $this->load->view("user/navbar1.php") ?>

  <div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">

        <div class="container-fluid">
          <h2>Info Kamar</h2>
          <hr style="border: 1px solid">
          <?php if (validation_errors()) { ?>
            <div class="alert alert-secondary">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <?php echo validation_errors(); ?>
            </div>
          <?php
          }
          ?>

          <?php

          if ($this->session->flashdata('berhasil')) {

            echo "<div class='alert alert-success'>
                                           <span>Check In SUCCESS</span>  
                                        </div>";
          }


          ?>
          <!--end search box-->






          <div class="row">

            <div class="col-lg-12 col-sm-12 ">

              <?php
              foreach ($kamar->result_array() as $value) {
                $id_kamar         = $value['id_kamar'];
                $no_kamar      = $value['no_kamar'];
                $harga_kamar      = $value['harga_kamar'];
                $fasilitas_kamar  = $value['fasilitas_kamar'];
                $nama_kelas_kamar = $value['nama_kelas_kamar'];
                $status_kamar = $value['status_kamar'];
              }
              ?>

              <h3>Nomor Kamar : <?php echo $no_kamar; ?></h3>
              <div class="row">
                <div class="col-lg-8">
                  <div class="property-images">
                    <!-- Slider Starts -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators hidden-xs">
                        <?php
                        $no = 0;
                        foreach ($kamar_gambar->result_array() as $value) { ?>
                          <?php
                          if ($no == 0) { ?>

                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <?php
                          } else { ?>

                            <li data-target="#myCarousel" data-slide-to="<?php echo $no; ?>" class=""></li>
                          <?php
                          }
                          ?>

                        <?php
                          $no++;
                        }

                        ?>
                      </ol>
                      <div class="carousel-inner">

                        <?php
                        $no = 0;
                        foreach ($kamar_gambar->result_array() as $value) { ?>



                          <?php
                          if ($no == 0) { ?>
                            <div class="item active">
                              <img src="<?php echo base_url(); ?>assets/images/<?php echo $value['nama_kamar_gambar']; ?>" class="properties" alt="properties" />
                            </div>

                          <?php
                          } else { ?>

                            <div class="item">
                              <img src="<?php echo base_url(); ?>assets/images/<?php echo $value['nama_kamar_gambar']; ?>" class="properties" alt="properties" />
                            </div>
                          <?php
                          }
                          ?>

                        <?php
                          $no++;
                        }

                        ?>




                      </div>
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="fa fa-chevron-right"></span></a>
                    </div>
                    <!-- #Slider Ends -->

                  </div>
                  <?php if (empty($_SESSION['nama_user'])) { ?>
                      <script type="text/javascript">
                        function message() {
                        alert("Silahkan Login Jika Ingin Booking") // body...
                      }
                    </script>
                    <body onload="message()">
                    <div class="spacer">
                    </div>
                  <?php } else { ?>
                    <div class="spacer">
                      <h4><span class="fa fa-th-list"></span> Informasi Kamar</h4>
                      <p><?php echo $fasilitas_kamar; ?></p>
                    </div>
                   
                  <?php } ?>



                </div>

                <?php if (empty($_SESSION['nama_user'])) { ?>
                  <div class="col-lg-4">
                    <div class="col-lg-11 col-sm-12">
                      <div class="property-info">
                      
                        <h5><span class="fa fa-home"></span> <?php echo $nama_kelas_kamar; ?></h5><br>
                        <p class="price"><?php echo rupiah($harga_kamar); ?> /Malam</p> <br>
                        <h6><span class="fa fa-th-list"></span> Informasi Kamar</h6>
                        <p><?php echo $fasilitas_kamar; ?></p>
                      </div>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="col-lg-4">
                    <div class="col-lg-11 col-sm-12">
                      <div class="property-info">

                        <h6><span class="fa fa-home"></span> <?php echo $nama_kelas_kamar; ?></h6>
                        <p class="price"><?php echo rupiah($harga_kamar); ?> /Malam</p>
                      </div>
                      <div class="listing-detail">

                      </div>
                      <div class="col-lg col-sm-6 ">
                        <div class="enquiry">

                          <?php

                          if ($status_kamar == 0) { ?>

                            <h6><span class="fa fa-envelope"></span> Pemesanan Kamar</h6>
                            <?php echo form_open('user/reservasi/', 'role="form"'); ?>
                            <input type="hidden" name="id_kamar" value="<?php echo $id_kamar; ?>">
                            <input id="price_input" type="hidden" name="price_input" value="<?php echo $harga_kamar ?>">
                            <input id="dp1" class="form-control" type="date" name="tgl_reservasi_masuk" placeholder="Tanggal Chek In" min="<?= date('Y-m-d') ?>" autocomplete="on">
                            <input id="jumlahMalam" class="form-control" type="number" name="jumlah_malam" min="1" max="30" placeholder="Jumlah malam">
                            <input id="dp2" class="form-control" type="date" name="tgl_reservasi_keluar" placeholder="Tanggal Chek Out" autocomplete="on" readonly>
                            <input type="text" class="form-control" name="nama_reservasi" placeholder="Nama" />
                            <input type="number" class="form-control" name="tlp_reservasi" placeholder="No. Telepon" />
                            <button type="submit" class="btn btn-info" name="Submit">Booking
                              Kamar</button>

                            <?php echo form_close(); ?>

                            <span>Total Harga:</span>
                            <div class="property-info">
                              <p id="total_price" class="price"></p>
                            </div>
                            <div class="dropdown-divider"></div>
                        </div>

                      <?php
                          } else { ?>

                        <div class='alert alert-danger'>
                          <span>Kamar Not Avaliable</span>
                        </div>

                      <?php
                          }

                      ?>
                      </div>
                    </div>
                  </div>
                <?php } ?>


              </div>
            </div>

            <!-- /.iron-card -->
          </div>
          <!-- /.container-fluid -->

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
<script>
    const checkIn = document.getElementById('dp1');
    const jumlahMalam = document.getElementById('jumlahMalam');
    const checkOut = document.getElementById('dp2');

    function hitungCheckOut() {
        const tglMasuk = new Date(checkIn.value);
        const malam = parseInt(jumlahMalam.value);

        if (!isNaN(tglMasuk) && !isNaN(malam) && checkIn.value) {
            const tglKeluar = new Date(tglMasuk);
            tglKeluar.setDate(tglMasuk.getDate() + malam);

            const yyyy = tglKeluar.getFullYear();
            const mm = String(tglKeluar.getMonth() + 1).padStart(2, '0');
            const dd = String(tglKeluar.getDate()).padStart(2, '0');

            checkOut.value = `${yyyy}-${mm}-${dd}`;
        } else {
            checkOut.value = '';
        }
    }

    checkIn.addEventListener('change', hitungCheckOut);
    jumlahMalam.addEventListener('input', hitungCheckOut);
</script>

</html>