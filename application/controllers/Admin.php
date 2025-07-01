<?php

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != "loginadmin") {
			redirect(base_url());
		}
	}

	function index()
	{

		$data['kamar'] = $this->m_hotel->kamarkosong()->result();

		$data['reservasi'] = $this->db->query("select a.*,b.*,c.* from reservasi a 
		join kamar b on a.id_kamar=b.id_kamar join user c on a.id_user=c.id_user where a.status_reservasi='0' order by a.status_reservasi desc")->result();
		$this->load->view('admin/overview.php', $data);
	}

	//user mulai
	function user()
	{

		$data['user'] = $this->db->query('SELECT a.*, b.* from user a join user_group b on a.id_user_group=b.id_user_group')->result();
		$this->load->view('admin/user.php', $data);
	}

	function user_delete($id_user)
	{
		$where = array('id_user' => $id_user);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where, 'user');
		redirect(base_url() . 'admin/user');
	}
	//user selesai

	function ubah_akun()
	{
		$this->load->view('admin/ubah_akun.php');
	}

	function ubah_akun_aksi()
	{
		$password_baru = $this->input->post('password_baru');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nomor_telepon = $this->input->post('nomor_telepon');

		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|matches[password_ulang]');
		$this->form_validation->set_rules('password_ulang', 'Ulangi Password', 'required');

		if ($this->form_validation->run() != false) {

			$this->db->set('nama_user', $nama_lengkap);
			$this->db->set('tlp_user', $nomor_telepon);
			$this->db->set('password_user', md5($password_baru));
			$this->db->where('id_user', $_SESSION['id_user']);
			$this->db->update('user');
			$_SESSION['nama_user'] = $nama_lengkap;

			redirect(base_url() . 'admin/ubah_akun/?alert=sukses');
		} else {
			redirect(base_url() . 'admin/ubah_akun');
		}
	}

	function new_reservasi()
	{
		$data['reservasi'] = $this->db->query('select a.*,b.*,c.* from reservasi a 
	 	join kamar b on a.id_kamar=b.id_kamar join user c on a.id_user=c.id_user order by a.id_reservasi desc')->result();

		$this->load->view('admin/reservasi', $data);
	}

	function all_reservasi()
	{
		$data['reservasi'] = $this->db->query('select a.*,b.*,c.* from reservasi a 
	 	join kamar b on a.id_kamar=b.id_kamar join reservasi_pembayaran c on a.id_reservasi=c.id_reservasi where a.status_reservasi=2 order by a.status_reservasi desc')->result();

		$this->load->view('admin/all_reservasi', $data);
	}

	function new_reservasi_in()
	{
		$id['id_reservasi'] 		= $this->uri->segment(3);
		$up['status_reservasi'] 	= $this->uri->segment(4);

		$this->db->update("reservasi", $up, $id);

		$id = $this->uri->segment(3);

		$query = $this->m_hotel->ReservasiId($id);

		foreach ($query->result_array() as $value) {
			$id_kamar['id_kamar'] = $value['id_kamar'];
		}

		$up2['status_kamar'] 	= $this->uri->segment(4);

		$this->db->update("kamar", $up2, $id_kamar);

		$this->session->set_flashdata('in', 'OK');
		redirect('admin/new_reservasi');
	}

	function new_reservasi_cancel()
	{
		$data['id_reservasi'] 		= $this->uri->segment(3);

		$this->load->view('admin/reservasi_batal', $data);
	}

	function new_reservasi_cancel_aksi()
	{
		$id['id_reservasi'] 		= $this->uri->segment(3);
		$up['status_reservasi'] 	= $this->uri->segment(4);
		$alasan_batal				= $this->input->post('alasan_batal');

		$data = array(
			'alasan_batal' => $alasan_batal,
			'id_reservasi' => $id['id_reservasi']
		);

		$this->db->insert('reservasi_batal', $data);

		$this->db->update("reservasi", $up, $id);
		redirect('admin/new_reservasi');
	}

	function new_reservasi_out($id)
	{
		// $id['id_reservasi'] 		= $this->uri->segment(3);
		$query						=  $this->m_hotel->ReservasiId($id);

		foreach ($query->result_array() as $value) {
			$data['id_reservasi'] 			= $value['id_reservasi'];
			$data['nama_reservasi']	 		= $value['nama_reservasi'];
			$data['tlp_reservasi'] 			= $value['tlp_reservasi'];
			$data['kode_reservasi'] 		= $value['kode_reservasi'];
			$data['tgl_reservasi_masuk']	= $value['tgl_reservasi_masuk'];
			$data['tgl_reservasi_keluar'] 	= $value['tgl_reservasi_keluar'];
			$data['id_kamar'] 				= $value['id_kamar'];
			$data['no_kamar'] 				= $value['no_kamar'];
			$data['harga_kamar'] 			= $value['harga_kamar'];
			$data['status_kamar'] 			= $value['status_kamar'];
			$data['waktu'] 					= $value['waktu'];
		}
		$data['status_reservasi']	= $this->uri->segment(4);

		$this->load->view('admin/reservasi_out', $data);
	}

	function new_reservasi_out_simpan()
	{
		$id['id_reservasi'] 		= $this->input->post("id_reservasi");
		$up['status_reservasi'] 	= $this->input->post("status_reservasi");
		$this->db->update("reservasi", $up, $id);


		//Update Status Kamar
		$id_kamar['id_kamar'] 	= $this->input->post("id_kamar");
		$up2['status_kamar'] 	= 0;
		$this->db->update("kamar", $up2, $id_kamar);


		//Insert into reservasi pembayaran
		$in['tgl_pembayaran'] 		= date('Y-m-d');
		$in['nominal_pembayaran'] 	= $this->input->post("total_bayar");
		$in['uang_bayar'] 			= $this->input->post("uang_bayar");
		$in['kembalian'] 			= $this->input->post("kembalian");
		$in['id_reservasi'] 		= $this->input->post("id_reservasi");
		$this->db->insert("reservasi_pembayaran", $in);


		$this->session->set_flashdata('out', 'OK');
		redirect("admin/new_reservasi");
	}

	function new_reservasi_perpanjang()
	{
		$id		= $this->uri->segment(3);

		$query						=  $this->m_hotel->ReservasiId($id);

		foreach ($query->result_array() as $value) {
			$data['id_reservasi'] 			= $value['id_reservasi'];
			$data['nama_reservasi']	 		= $value['nama_reservasi'];
			$data['tlp_reservasi'] 			= $value['tlp_reservasi'];
			$data['kode_reservasi'] 		= $value['kode_reservasi'];
			$data['tgl_reservasi_masuk']	= tgl_balik($value['tgl_reservasi_masuk']);
			$data['tgl_reservasi_keluar'] 	= tgl_balik($value['tgl_reservasi_keluar']);
			$data['id_kamar'] 				= $value['id_kamar'];
			$data['no_kamar'] 			= $value['no_kamar'];
			$data['harga_kamar'] 			= $value['harga_kamar'];
			$data['status_kamar'] 			= $value['status_kamar'];
			$data['waktu'] 					= $value['waktu'];
		}



		$this->load->view('admin/reservasi_perpanjang', $data);
	}

	function new_reservasi_perpanjang_simpan()
	{
		$id['id_reservasi'] 		= $this->input->post("id_reservasi");
		$up['tgl_reservasi_masuk'] 	= tgl_luar($this->input->post("tgl_reservasi_masuk"));
		$up['tgl_reservasi_keluar'] = tgl_luar($this->input->post("tgl_reservasi_keluar"));
		$this->db->update("reservasi", $up, $id);

		$this->session->set_flashdata('perpanjang', 'OK');
		redirect("admin/new_reservasi");
	}

	function kamar_kelas()
	{

		$data['kelas_kamar'] = $this->m_hotel->get_data('kelas_kamar')->result();
		$this->load->view('admin/kamar_kelas.php', $data);
	}

	function kamar_kelas_tambah()
	{
		$this->load->view('admin/kamar_kelas_tambah.php');
	}

	function kamar_kelas_tambah_aksi()
	{
		$nama_kelas_kamar = $this->input->post('nama_kelas_kamar');

		$data = array(
			'nama_kelas_kamar' => $nama_kelas_kamar

		);

		$this->m_hotel->insert_data($data, 'kelas_kamar');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url() . 'admin/kamar_kelas');
	}

	function kamar_kelas_edit($id_kelas_kamar)
	{
		$where = array('id_kelas_kamar' => $id_kelas_kamar);
		// mengambil data dari database sesuai id
		$data['kelas_kamar'] = $this->m_hotel->edit_data($where, 'kelas_kamar')->result();
		$this->load->view('admin/kamar_kelas_edit.php', $data);
	}

	function kamar_kelas_edit_aksi()
	{
		$id_kelas_kamar = $this->input->post('id_kelas_kamar');
		$nama_kelas_kamar = $this->input->post('nama_kelas_kamar');

		$where = array(
			'id_kelas_kamar' => $id_kelas_kamar
		);

		$data = array(
			'nama_kelas_kamar' => $nama_kelas_kamar
		);

		$this->m_hotel->update_data($where, $data, 'kelas_kamar');
		redirect(base_url() . 'admin/	kamar_kelas');
	}

	function kamar_kelas_delete($id_kelas_kamar)
	{
		$where = array('id_kelas_kamar' => $id_kelas_kamar);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where, 'kelas_kamar');
		redirect(base_url() . 'admin/	kamar_kelas');
	}

	function kamar()
	{

		$data['kamar'] = $this->db->query("SELECT kelas_kamar.id_kelas_kamar, kelas_kamar.nama_kelas_kamar, kamar.id_kamar, kamar.no_kamar, kamar.harga_kamar, kamar.fasilitas_kamar, kamar.status_kamar, kamar.id_kelas_kamar FROM kamar INNER JOIN kelas_kamar ON kamar.id_kelas_kamar=kelas_kamar.id_kelas_kamar")->result();
		$this->load->view('admin/kamar.php', $data);
	}

	function kamar_tambah()
	{

		$data['kelas_kamar'] = $this->m_hotel->get_data('kelas_kamar')->result();
		$this->load->view('admin/kamar_tambah.php', $data);
	}

	function kamar_edit($id_kamar)
	{
		$where = array('id_kamar' => $id_kamar);
		// mengambil data dari database sesuai id
		$data['kamar'] = $this->db->query("SELECT kelas_kamar.id_kelas_kamar, kelas_kamar.nama_kelas_kamar, kamar.id_kamar, kamar.no_kamar, kamar.harga_kamar, kamar.fasilitas_kamar, kamar.status_kamar, kamar.id_kelas_kamar FROM kamar , kelas_kamar  where kamar.id_kelas_kamar=kelas_kamar.id_kelas_kamar and kamar.id_kamar=$id_kamar ")->result();
		$data['kelas_kamar'] = $this->m_hotel->get_data('kelas_kamar')->result();
		$this->load->view('admin/kamar_edit.php', $data);
	}

	function kamar_edit_aksi()
	{
		$id_kamar = $this->input->post('id_kamar');
		$id_kelas_kamar = $this->input->post('id_kelas_kamar');
		$no_kamar = $this->input->post('no_kamar');
		$harga_kamar = $this->input->post('harga_kamar');
		$fasilitas_kamar = $this->input->post('fasilitas_kamar');


		$where = array(
			'id_kamar' => $id_kamar
		);

		$data = array(
			'id_kelas_kamar' => $id_kelas_kamar,
			'no_kamar' => $no_kamar,
			'harga_kamar' => $harga_kamar,
			'fasilitas_kamar' => $fasilitas_kamar
		);

		$this->m_hotel->update_data($where, $data, 'kamar');
		redirect(base_url() . 'admin/kamar');
	}
	
	function kamar_gambar($id_kamar)
	{
		$where = array('id_kamar' => $id_kamar);
		// mengambil data dari database sesuai id
		$data['kamar_gambar'] = $this->m_hotel->KamarGambar($id_kamar);

		$query =  $this->m_hotel->KamarId($id_kamar);

		foreach ($query->result_array() as $value) {
			$data['id_kamar'] 			=  $value['id_kamar'];
			$data['no_kamar'] 			=  $value['no_kamar'];
			$data['harga_kamar'] 		=  $value['harga_kamar'];
			$data['fasilitas_kamar'] 	=  $value['fasilitas_kamar'];
			$data['id_kelas_kamar'] 	=  $value['id_kelas_kamar'];
			$data['nama_kelas_kamar'] 	=  $value['nama_kelas_kamar'];
		}

		$this->load->view('admin/kamar_gambar.php', $data);
	}

	function kamar_gambar_tambah_aksi()
	{
		$id_kamar = $this->input->post('id_kamar');

		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = 'nama_kamar_gambar' . time();

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('nama_kamar_gambar')) {
			$image = $this->upload->data();
			$gambar = $image['file_name'];

			$data = array(
				'id_kamar' => $id_kamar,
				'nama_kamar_gambar' => $gambar
			);
			$this->m_hotel->insert_data($data, 'kamar_gambar');
			redirect(base_url() . 'admin/kamar');
		} else {
			print_r($this->upload->display_errors());
		}
	}

	function kamar_gambar_delete($id_kamar_gambar)
	{
		$where = array('id_kamar_gambar' => $id_kamar_gambar);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where, 'kamar_gambar');
		redirect(base_url() . 'admin/kamar');
	}

	function kamar_delete($id_kamar)
	{
		$where = array('id_kamar' => $id_kamar);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where, 'kamar');
		redirect(base_url() . 'admin/kamar');
	}

	function kamar_tambah_aksi()
	{
		$id_kelas_kamar = $this->input->post('id_kelas_kamar');
		$no_kamar = $this->input->post('no_kamar');
		$harga_kamar = $this->input->post('harga_kamar');
		$content = $this->input->post('fasilitas_kamar');

		$this->form_validation->set_rules('no_kamar', 'Nomor Kamar', 'required|is_unique[kamar.no_kamar]', [
			'is_unique' => 'Nomor Kamar Sudah Terdaftar'
		]);

		if ($this->form_validation->run() == false) {
			redirect(base_url() . 'admin/kamar');
		} else {

			$data = array(
				'id_kelas_kamar' => $id_kelas_kamar,
				'no_kamar' => $no_kamar,
				'harga_kamar' => $harga_kamar,
				'fasilitas_kamar' => $content
			);

			$this->m_hotel->insert_data($data, 'kamar');

			// mengalihkan halaman ke halaman data anggota
			redirect(base_url() . 'admin/kamar');
		}
	}

	function cetak_laporan_reservasi_harian()
	{
		$currentDate = date('Y-m-d');

		$data = array(
			'title' => 'Laporan Tanggal: '. date('l jS \of F Y'),
			'admin' => $this->db->query("SELECT a.*,b.*,c.* FROM reservasi a 
	 	JOIN kamar b ON a.id_kamar=b.id_kamar JOIN reservasi_pembayaran c ON a.id_reservasi=c.id_reservasi WHERE c.tgl_pembayaran='$currentDate' ORDER BY a.status_reservasi DESC")->result(),
			'total'	=> $this->db->query("SELECT SUM(nominal_pembayaran) FROM reservasi_pembayaran WHERE tgl_pembayaran='$currentDate'")->row_array()
		);
		$this->load->view('admin/laporan_print_reservasi', $data);
	}

	function cetak_laporan_reservasi_bulanan()
	{
		$currentMonth = date('Y-m');

		$data = array(
			'title' => 'Laporan Bulan: '. date('F'),
			'admin' => $this->db->query("SELECT a.*,b.*,c.* FROM reservasi a 
	 	JOIN kamar b ON a.id_kamar=b.id_kamar JOIN reservasi_pembayaran c ON a.id_reservasi=c.id_reservasi WHERE CONCAT(YEAR(c.tgl_pembayaran),'-',MONTH(c.tgl_pembayaran))='$currentMonth' ORDER BY a.status_reservasi DESC")->result(),
			'total'	=> $this->db->query("SELECT SUM(nominal_pembayaran) FROM reservasi_pembayaran WHERE CONCAT(YEAR(tgl_pembayaran),'-',MONTH(tgl_pembayaran))='$currentMonth'")->row_array()
		);
		$this->load->view('admin/laporan_print_reservasi', $data);
	}

	function cetak_laporan_reservasi_tahunan()
	{
		$currentYear = date('Y');

		$data = array(
			'title' => 'Laporan Tahun: '. $currentYear,
			'admin' => $this->db->query("SELECT a.*,b.*,c.* FROM reservasi a 
	 	JOIN kamar b ON a.id_kamar=b.id_kamar JOIN reservasi_pembayaran c ON a.id_reservasi=c.id_reservasi WHERE YEAR(c.tgl_pembayaran)='$currentYear' ORDER BY a.status_reservasi DESC")->result(),
			'total'	=> $this->db->query("SELECT SUM(nominal_pembayaran) FROM reservasi_pembayaran WHERE YEAR(tgl_pembayaran)='$currentYear'")->row_array()
		);
		$this->load->view('admin/laporan_print_reservasi', $data);
	}

	function cetak_laporan_reservasi()
	{
		$data = array(
			'title' => 'Seluruh Laporan',
			'admin' => $this->db->query("SELECT a.*,b.*,c.* FROM reservasi a 
	 	JOIN kamar b ON a.id_kamar=b.id_kamar JOIN reservasi_pembayaran c ON a.id_reservasi=c.id_reservasi WHERE a.status_reservasi=2 ORDER BY a.status_reservasi DESC")->result(),
			'total'	=> $this->db->query("SELECT SUM(nominal_pembayaran) FROM reservasi_pembayaran")->row_array()
		);
		$this->load->view('admin/laporan_print_reservasi', $data);
	}

	function cetak_struk()
	{
		$id = $this->uri->segment(3);

		$data['bukti'] = $this->db->query("SELECT a.*,b.*,c.* FROM reservasi a 
		JOIN kamar b ON a.id_kamar=b.id_kamar JOIN reservasi_pembayaran c ON a.id_reservasi=c.id_reservasi WHERE a.id_reservasi='$id'")->row_array();
		$this->load->view('admin/struk_pembayaran', $data);
	}
}
