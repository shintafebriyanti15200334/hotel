<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('TransaksiModel');
	}

	public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl_pembayaran = $_GET['tanggal'];

                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl_pembayaran));
                $url_cetak = 'transaksi/cetak?filter=1&tanggal='.$tgl_pembayaran;
                $reservasi_pembayaran = $this->TransaksiModel->view_by_date($tgl_pembayaran); // Panggil fungsi view_by_date yang ada di TransaksiModel
        
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)transaksi
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'transaksi/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $reservasi_pembayaran = $this->TransaksiModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'transaksi/cetak?filter=3&tahun='.$tahun;
                $reservasi_pembayaran = $this->TransaksiModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'transaksi/cetak';
            $reservasi_pembayaran = $this->TransaksiModel->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('index.php/'.$url_cetak);
		$data['reservasi_pembayaran'] = $reservasi_pembayaran;
        $data['option_tahun'] = $this->TransaksiModel->option_tahun();
		$this->load->view('view', $data);
	}

	public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl_pembayaran = $_GET['tanggal'];

                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl_pembayaran));
                $reservasi_pembayaran = $this->TransaksiModel->view_by_date($tgl_pembayaran); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $reservasi_pembayaran = $this->TransaksiModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun '.$tahun;
                $reservasi_pembayaran = $this->TransaksiModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $reservasi_pembayaran = $this->TransaksiModel->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['reservasi_pembayaran'] = $reservasi_pembayaran;

		ob_start();
		$this->load->view('print', $data);
		$html = ob_get_contents();
        ob_end_clean();

		require './assets/html2pdf/autoload.php';

		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Data Transaksi.pdf', 'D');
	}
}
