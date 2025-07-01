<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
	<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
		<th>ID Pembayaran</th>
		<th>ID Resevasi</th>
        <th>Total Bayar</th>
        <th>Tanggal Pembayaran</th>
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
    		$no++;
    	}
    }
    $total  = $this->db->query("SELECT SUM(nominal_pembayaran) FROM reservasi_pembayaran ")->row_array()
    ?>
    <tr>
        <td colspan="6">Total Penghasilan : <?php echo rupiah($total["SUM(nominal_pembayaran)"]) ?></td>
        <?php if ($total["SUM(nominal_pembayaran)"] == 0) { ?>
        <?php echo $total["SUM(nominal_pembayaran)"] ?>
        <?php } else { ?>
        <?php } ?>
      </tr>

	</table>
</body>
</html>
