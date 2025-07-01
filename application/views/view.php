<html>
<head>

  <?php $this->load->view("admin/_partials/head.php") ?>

  <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->

</head>

<body id="page-top">

  <?php $this->load->view("admin/_partials/navbar.php") ?>

  <div id="wrapper">

    <?php $this->load->view("admin/_partials/sidebar.php") ?>

  <div id="wrapper">
    <?php $this->load->view("admin/_partials/js.php") ?>
    
    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->

   <div id="content-wrapper">

      <div class="container-fluid">
        <div class="card mb-3">
          <div class="card-header bg-secondary text-white">
            <center><i class="fas fa-table"></i>
              Laporan Transaksi
          </div>
          </center>
          <div class="card-body">
            <div class="table-responsive">

    <form method="get" action="">
        <label>Filter Berdasarkan</label><br> 
        <select name="filter" id="filter">
            <option value="">Pilih</option> 
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />

        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div>

        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>

        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>'; 
                }
                ?>
            </select>
            <br /><br />
        </div>
        <button type="submit" class="btn btn-info">Tampilkan</button>
        <a class="btn btn-danger" href="<?php echo base_url('transaksi'); ?>">Reset Filter</a>
        <a class="btn btn-success" href="<?php echo $url_cetak; ?>">Cetak Laporan</a><br />
            </form>
  <hr style="border: 1px solid">
    
    <center><b><?php echo $ket; ?></b><br /><br /></center>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
        <th>No</th>
        <th width="25%">ID Pembayaran</th>
        <th width="25%">ID Resevasi</th>
        <th width="25%">Total Bayar</th>
        <th width="25%">Tanggal Pembayaran</th>
    </tr>
    <?php
    if( ! empty($reservasi_pembayaran)){
        $no = 1;
        foreach($reservasi_pembayaran as $data){
            $tgl_pembayaran = date('d-m-Y', strtotime($data->tgl_pembayaran));
            
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$data->id_reservasi_pembayaran."</td>";
            echo "<td>".$data->id_reservasi."</td>";
            echo "<td>".$data->nominal_pembayaran."</td>";
            echo "<td>".$tgl_pembayaran."</td>";
            echo "</tr>";
        }
    }
    $total  = $this->db->query("SELECT SUM(nominal_pembayaran) FROM reservasi_pembayaran WHERE tgl_pembayaran")->row_array()
    ?>
    <tr>
        <td colspan="6">Total Penghasilan : <?php echo rupiah($total["SUM(nominal_pembayaran)"]) ?></td>
        <?php if ($total["SUM(nominal_pembayaran)"] == 0) { ?>
        <?php echo $total["SUM(nominal_pembayaran)"] ?>
        <?php } else { ?>
        <?php } ?>
    </tr>

    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
</table>
 </div>

  <?php $this->load->view("admin/_partials/scrolltop.php") ?>
  <?php $this->load->view("admin/_partials/modal.php") ?>
  </body>
</html>
