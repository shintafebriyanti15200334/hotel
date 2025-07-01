<?php

class Registrasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('v_registrasi');
    }

    function aksi_registrasi()
    {
        $data = [
            'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
            'email_user' => htmlspecialchars($this->input->post('email_user', true)),
            'tlp_user' => htmlspecialchars($this->input->post('tlp_user', true)),
            'username_user' => htmlspecialchars($this->input->post('username_user', true)),
            'password_user' => md5($this->input->post('password_user')),
            'id_user_group' => 2
        ];

        $this->db->insert("user", $data);
        redirect('user');
    }
}
