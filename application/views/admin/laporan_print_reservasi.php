<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>

<body>
  <style type="text/css">
    .table-data {
      width: 100%;
      border-collapse: collapse;
    }

    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 11pt;
      font-family: Verdana;
      padding: 10px 10px 10px 10px;
    }

    h3 {
      font-family: Verdana;
    }
  </style>
  <h3>
    <?php echo $title ?>
  </h3>
  <br />
  <table class="table-data">
    <thead>
      <tr>
        <th width="8%">No</th>
        <th width="13%">Nama Customer</th>
        <th width="13%">No Telp</th>
        <th width="13%">Kode Reservasi</th>
        <th width="13%">Kamar</th>
        <th width="13%">Tgl Pembayaran</th>
        <th width="13%">Nominal Bayar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($admin as $r) {
      ?>
        <tr>
          <th scope="row"><?= $no++; ?></th>
          <td><?php echo $r->nama_reservasi; ?></td>
          <td><?php echo $r->tlp_reservasi; ?></td>
          <td><?php echo $r->kode_reservasi; ?></td>
          <td><?php echo $r->no_kamar; ?></td>
          <td><?php echo $r->tgl_pembayaran; ?></td>
          <td><?php echo rupiah($r->nominal_pembayaran); ?></td>
        </tr>
      <?php
      }
      ?>
      <tr>
        <td colspan="6">Total Penghasilan</td>
        <?php if ($total["SUM(nominal_pembayaran)"] == 0) { ?>
          <td><?php echo $total["SUM(nominal_pembayaran)"] ?></td>
        <?php } else { ?>
          <td><?php echo rupiah($total["SUM(nominal_pembayaran)"]) ?></td>
        <?php } ?>
      </tr>
    </tbody>
  </table>
  <script type="text/javascript">
    window.print();
  </script>
</body>

</html>