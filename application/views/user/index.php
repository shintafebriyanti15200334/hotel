<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("user/head.php") ?>
</head>

<body id="page-top">

  <?php $this->load->view("user/navbar.php") ?>

  <div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">


        <!-- search box-->
        <div class="container-fluid">
          <div class="search-form">
            <h4><span class="fa fa-search"></span> Search for</h4>
            <?php echo form_open('user/cari'); ?>
            <div class="row">
              <div class="col-lg-12">
                <select class="form-control" name="id_kelas_kamar">
                  <option value="">Pilih Kelas Kamar</option>
                  <?php
                  foreach ($kelas_kamar->result_array() as $value) { ?>
                    <option value="<?php echo $value['id_kelas_kamar']; ?>"><?php echo $value['nama_kelas_kamar'] ?></option>
                  <?php
                  }
                  ?>

                </select>
              </div>
            </div>
            <button class="btn btn-info">Find Now</button>

            <?php echo form_close(); ?>
          </div>
          <hr style="border: 1px solid">
          <!--end search box-->


          <!-- Icon Cards-->
          <div class="row">

            <?php foreach ($kamar->result_array() as $value) { ?>
              <div class="col-xl-4 col-sm-6 mb-3">

                <div class="properties" style="background-color: white; padding:10px">
                  <div class="text-black font-weight-bold center">
                    <img src="<?php echo base_url(); ?>/assets/images/<?php echo $value['nama_kamar_gambar']; ?>" class="img-responsive" alt="properties" style="width:100%; height:305px; object-fit: cover;">
                    <div class="status btn-info">
                      <?php if ($value['status_kamar'] == 1) { ?>
                        <div style="color: white;"> Not Available</div>
                      <?php } else { ?>
                        <div style="color: white;"> Available</div>

                      <?php } ?>
                    </div>


                    <h3><a href="<?php echo base_url(); ?>user/detailkamar/<?php echo $value['id_kamar']; ?>"><?php echo $value['no_kamar']; ?></a></h3>
                    <hr>
                    <h5>
                      <p class="price">Harga: <?php echo rupiah($value['harga_kamar']); ?></p>
                    </h5>
                    <hr>
                    <div class="listing-detail"><?php echo $value['nama_kelas_kamar']; ?> </div>
                    <a class="btn btn-info" href="<?php echo base_url(); ?>user/detailkamar/<?php echo $value['id_kamar']; ?>">Selengkapnya</a>
                  </div>
                </div>
              </div>

            <?php
            }
            ?>

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

</html>