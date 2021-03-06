<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rekening_model');

        $this->simple_login->cek_login();
    }
    public function index()
    {
        $rekening = $this->Rekening_model->listing();

        $data = array( 'title' => 'Data Rekening',
                        'rekening' => $rekening,
                        'isi' => 'admin/rekening/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    
    public function tambah()
    {
        $valid = $this->form_validation;

        $valid->set_rules('nama_bank','Nama rekening', 'required',
            array(  'required' => '%s harus diisi'));

        $valid->set_rules('nama_pemilik','Nama Pemilik', 'required',
            array(  'required' => '%s harus diisi'));

        $valid->set_rules('nomor_rekening','Nomor rekening', 'required|is_unique[rekening.nomor_rekening]',
            array(  'required' => '%s harus diisi',
                    'is_unique' => '%s sudah ada. Buat rekening baru!'));
        
        if($valid->run()===FALSE){
            
        $data = array( 'title' => 'Tambah Rekening',
                        'isi' => 'admin/rekening/tambah'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;
            $slug_rekening = url_title($this->input->post('nama_bank'), 'dash', TRUE);

            $data = array(  'nama_bank'      => $i->post('nama_bank'),
                            'nomor_rekening' => $i->post('nomor_rekening'),
                            'nama_pemilik'   => $i->post('nama_pemilik')
                    );
            $this->Rekening_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/rekening'),'refresh');
        }
    }

    public function edit($id_rekening)
    {
        $rekening = $this->Rekening_model->detail($id_rekening);

        $valid = $this->form_validation;

        $valid->set_rules('nama_bank','Nama rekening', 'required',
            array( 'required' => '%s harus diisi'));
        
        if($valid->run()===FALSE){
            
        $data = array(  'title' => 'Edit Rekening',
                        'rekening' => $rekening,
                        'isi' => 'admin/rekening/edit'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;
            
            $data = array(  'id_rekening'   => $id_rekening,
                            'nama_bank'      => $i->post('nama_bank'),
                            'nomor_rekening' => $i->post('nomor_rekening'),
                            'nama_pemilik'   => $i->post('nama_pemilik')
                    );
            $this->Rekening_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/rekening'),'refresh');
        }
    }

    public function delete($id_rekening)
    {
        $data = array('id_rekening' => $id_rekening);
        $this->Rekening_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/rekening'),'refresh');
    }
}

/* End of file Rekening.php */
