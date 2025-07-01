<?php

class User extends CI_Controller
{
	public function index()
	{
		$data['judul']			= 'User!';
		$data['kamar'] 			= $this->m_tamu->kamarall();
		$data['kelas_kamar'] 	= $this->m_hotel->get_data('kelas_kamar');
		$this->load->view('user/index', $data);
	}

	public function cari()
	{

		$id = $this->input->post('id_kelas_kamar');
		$data['judul']			= 'Daftar Kamar';
		$data['kamar'] = $this->m_tamu->kamarallkelas($id);
		$data['kelas_kamar'] = $this->m_hotel->get_data('kelas_kamar');
		$this->load->view('user/index', $data);
	}

	public function detailkamar()
	{
		$id = $this->uri->segment(3);
		$data['judul']			= 'Detail Kamar';
		$data['kamar'] 			= $this->m_tamu->KamarDetail($id);
		$data['kamar_gambar'] 	= $this->m_tamu->KamarGambarId($id);
		$data['kelas_kamar'] 	= $this->m_hotel->get_data('kelas_kamar');
		$this->load->view('detail_kamar', $data);
	}

	public function reservasi()
	{
		$this->form_validation->set_rules('tgl_reservasi_masuk', 'Tanggal Masuk', 'required');
		$this->form_validation->set_rules('tgl_reservasi_keluar', 'Tanggal Keluar', 'required');
		$this->form_validation->set_rules('nama_reservasi', 'Nama', 'required');
		$this->form_validation->set_rules('tlp_reservasi', 'Tlp', 'required');
		$this->form_validation->set_rules('jumlah_malam', 'Alamat', 'required');

		if ($this->form_validation->run() == FALSE) {
			$id = $this->input->post('id_kamar');
			$data['kamar'] 			= $this->m_tamu->KamarDetail($id);
			$data['kamar_gambar'] 	= $this->m_tamu->KamarGambarId($id);
			$data['kelas_kamar'] 	= $this->m_hotel->get_data('kelas_kamar');
			redirect(base_url() . 'user/detailkamar/' . $id);
		} else {

			$tgl_reservasi_masuk 	= $this->input->post('tgl_reservasi_masuk');
			$tgl_reservasi_keluar 	= $this->input->post('tgl_reservasi_keluar');
			$id_kamar 				= $this->input->post('id_kamar');
			$nama_reservasi 		= $this->input->post('nama_reservasi');
			$tlp_reservasi			= $this->input->post('tlp_reservasi');

			$data = array(
				'tgl_reservasi_masuk' => $tgl_reservasi_masuk,
				'tgl_reservasi_keluar' => $tgl_reservasi_keluar,
				'id_kamar' => $id_kamar,
				'nama_reservasi' => $nama_reservasi,
				'tlp_reservasi' => $tlp_reservasi,
				'kode_reservasi' => bin2hex(random_bytes(10)),
				'status_reservasi' 	=> 0,
				'id_user' => $_SESSION['id_user']
			);

			$this->m_tamu->insert_data($data, 'reservasi');

			$this->session->set_flashdata('berhasil', 'OK');
			$id = $this->input->post('id_kamar');
			// redirect(base_url() . 'user/detail_reservasi/' . $id);
			$this->load->view('user/detail_reservasi', $data);
		}
	}

	public function detail_reservasi()
	{
		$id = $this->uri->segment(3);

		$data['detail'] = $this->db->query("select a.*,b.*,c.* from reservasi a 
	 	join kamar b on a.id_kamar=b.id_kamar join user c on a.id_user=c.id_user where a.id_reservasi='$id'")->row_array();

		$this->load->view('user/detail_reservasi1', $data);
	}

	function batal_reservasi()
	{
		$data['id_reservasi'] 		= $this->uri->segment(3);

		$this->load->view('user/reservasi_batal', $data);
	}

	public function data_reservasi()
	{
		$id = $_SESSION['id_user'];

		$data['reservasi'] = $this->db->query("select a.*,b.*,c.* from reservasi a 
		 join kamar b on a.id_kamar=b.id_kamar join user c on a.id_user=c.id_user where c.id_user='$id'")->result();

		$this->load->view('user/data_reservasi', $data);
	}

	function batal_reservasi_aksi()
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
		redirect('user/data_reservasi');
	}

	public function bukti_reservasi()
	{
		$id = $this->uri->segment(3);

		$data['bukti'] = $this->db->query("SELECT a.*,b.*,c.* FROM reservasi a 
		JOIN kamar b ON a.id_kamar=b.id_kamar JOIN reservasi_pembayaran c ON a.id_reservasi=c.id_reservasi WHERE a.id_reservasi='$id'")->row_array();

		$this->load->view('user/bukti_reservasi', $data);
	}


	public function ubah_akun()
	{
		$this->load->view('user/ubah_akun');
	}

	public function ubah_akun_aksi()
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

			redirect(base_url() . 'user/ubah_akun/?alert=sukses');
		} else {
			redirect(base_url() . 'user/ubah_akun');
		}
	}
}
