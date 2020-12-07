<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');

        $this->simple_login->cek_login();
    }
    public function index()
    {
        $kategori = $this->Kategori_model->listing();

        $data = array( 'title' => 'Data Kategori Produk',
                        'kategori' => $kategori,
                        'isi' => 'admin/kategori/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    
    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules('nama_kategori','Nama kategori', 'required|is_unique[kategori.nama_kategori]',
            array(  'required' => '%s harus diisi',
                    'is_unique' => '%s sudah ada. Buat kategori baru!'));
        
        if($valid->run()===FALSE){
            
        $data = array( 'title' => 'Tambah Kategori Produk',
                        'isi' => 'admin/kategori/tambah'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;
            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

            $data = array(  'slug_kategori'      => $slug_kategori,
                            'nama_kategori'      => $i->post('nama_kategori'),
                            'urutan'      => $i->post('urutan')
                    );
            $this->Kategori_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/kategori'),'refresh');
        }
    }

    public function edit($id_kategori)
    {
        $kategori = $this->Kategori_model->detail($id_kategori);

        $valid = $this->form_validation;

        $valid->set_rules('nama_kategori','Nama kategori', 'required',
            array( 'required' => '%s harus diisi'));
        
        if($valid->run()===FALSE){
            
        $data = array(  'title' => 'Edit Kategori Produk',
                        'kategori' => $kategori,
                        'isi' => 'admin/kategori/edit'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;
            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
            
            $data = array(  'id_kategori'   => $id_kategori,
                            'slug_kategori' => $slug_kategori,
                            'nama_kategori' => $i->post('nama_kategori'),
                            'urutan'        => $i->post('urutan')
                    );
            $this->Kategori_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/kategori'),'refresh');
        }
    }

    public function delete($id_kategori)
    {
        $data = array('id_kategori' => $id_kategori);
        $this->Kategori_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/kategori'),'refresh');
    }
}

/* End of file Kategori.php */
