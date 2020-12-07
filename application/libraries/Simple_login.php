<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        // Load data model user
        $this->ci->load->model('User_model');
    }

    // Fungsi login
    public function login($username,$password)
    {
        $check = $this->ci->User_model->login($username,$password);
        if($check) {
            $id_user        = $check->id_user;
            $nama           = $check->nama;
            $akses_level    = $check->akses_level;
            $this->ci->session->set_userdata('id_user',$id_user);
            $this->ci->session->set_userdata('nama',$nama);
            $this->ci->session->set_userdata('username',$username);
            $this->ci->session->set_userdata('akses_level',$akses_level);

            redirect(base_url('admin/dasbor'),'refresh');
        }else{
            $this->ci->session->set_flashdata('warning', 'Username atau password salah');
            redirect(base_url('login'),'refresh');
        }
    }

    // Fungsi cek login
    public function cek_login()
    {
        if($this->ci->session->userdata('username') == "") {
            $this->ci->session->set_flashdata('warning', 'Anda belum login');
            redirect(base_url('login'), 'refresh');
        }
    }

    // Fungsi logout
    public function logout()
    {
        $this->ci->session->unset_userdata('id_user');
        $this->ci->session->unset_userdata('nama');
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('akses_level');
        $this->ci->session->set_flashdata('sukses', 'Anda berhasil logout');
        redirect(base_url('login'), 'refresh');
    }
}