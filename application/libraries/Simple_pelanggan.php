<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        // Load data model user
        $this->ci->load->model('Pelanggan_model');
    }

    // Fungsi login
    public function login($email,$password)
    {
        $check = $this->ci->Pelanggan_model->login($email,$password);
        if($check) {
            $id_pelanggan        = $check->id_pelanggan;
            $nama_pelanggan    = $check->nama_pelanggan;
            $this->ci->session->set_userdata('id_pelanggan',$id_pelanggan);
            $this->ci->session->set_userdata('nama_pelanggan',$nama_pelanggan);
            $this->ci->session->set_userdata('email',$email);

            redirect(base_url('dasbor'),'refresh');
        }else{
            $this->ci->session->set_flashdata('warning', 'email atau password salah');
            redirect(base_url('masuk'),'refresh');
        }
    }

    // Fungsi cek login
    public function cek_login()
    {
        if($this->ci->session->userdata('email') == "") {
            $this->ci->session->set_flashdata('warning', 'Anda belum login');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    // Fungsi logout
    public function logout()
    {
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->unset_userdata('nama_pelanggan');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->set_flashdata('sukses', 'Anda berhasil logout');
        redirect(base_url('masuk'), 'refresh');
    }
}