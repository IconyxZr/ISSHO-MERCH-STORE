<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Kategori_model');
        $this->load->model('Produk_model');
        $this->simple_login->cek_login();
    }
    
    public function index()
    {
        $user = $this->User_model->listing();
        $kategori = $this->Kategori_model->listing();
        $produk = $this->Produk_model->listing();

        $data = array( 'title' => 'Halaman Administrator',
                        'user' => $user,
                        'kategori' => $kategori,
                        'produk' => $produk,
                        'isi' => 'admin/dasbor/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        
    }
}

/* End of file Dasbor.php */
