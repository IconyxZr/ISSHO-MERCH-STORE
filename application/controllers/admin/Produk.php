<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->simple_login->cek_login();
    }
    public function index()
    {
        $produk = $this->Produk_model->listing();

        $data = array( 'title' => 'Data Pengguna',
                        'produk' => $produk,
                        'isi' => 'admin/produk/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function gambar($id_produk)
    {
        $produk = $this->Produk_model->detail($id_produk);
        $gambar = $this->Produk_model->gambar($id_produk);
        
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('judul_gambar','Judul/Nama Gambar', 'required',
            array( 'required' => '%s harus diisi'));
        
        if($valid->run()){
            
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2400'; //Dalam kb
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';
            
            $this->load->library('upload', $config);
            
        if ( ! $this->upload->do_upload('gambar')){                
            
            $data = array( 'title' => 'Tambah Gambar Produk : '.$produk->nama_produk,
                            'produk' => $produk,
                            'gambar' => $gambar,
                            'error' => $this->upload->display_errors(),
                            'isi' => 'admin/produk/gambar'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());
            
            //Create thumbnail gambar
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            $config['new_image']        = './assets/upload/image/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 250;//ukuran pixel
            $config['height']           = 250;//ukuran pixel
            $config['thumb_marker']     = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            
            $i = $this->input;

            $data = array(  'id_produk'         => $id_produk,
                            'judul_gambar'      => $i->post('judul_gambar'),
                            // Disimpan nama file gambar
                            'gambar'            => $upload_gambar['upload_data']['file_name']
                    );
            $this->Produk_model->tambah_gambar($data);
            $this->session->set_flashdata('sukses', 'Data gambar telah ditambah');
            redirect(base_url('admin/produk/gambar/'.$id_produk),'refresh');
        }}
            $data = array( 'title' => 'Tambah Gambar Produk : '.$produk->nama_produk,
                                'produk' => $produk,
                                'gambar' => $gambar,
                                'isi' => 'admin/produk/gambar'
                            );
                $this->load->view('admin/layout/wrapper', $data, FALSE);

    }

    // tambah produk
    public function tambah()
    {
        // Ambil data kategori
        $kategori = $this->Kategori_model->listing();

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk','Nama Produk', 'required',
            array( 'required' => '%s harus diisi'));
        
        $valid->set_rules('kode_produk','Kode Produk', 'required|is_unique[produk.kode_produk]',
            array( 'required' => '%s harus diisi',
                    'is_unique' => '%s sudah ada. Buat kode produk baru'));

        if($valid->run()){
            
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2400'; //Dalam kb
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';
            
            $this->load->library('upload', $config);
            
        if ( ! $this->upload->do_upload('gambar')){                
            
            $data = array( 'title' => 'Tambah Produk',
                            'kategori' => $kategori,
                            'error' => $this->upload->display_errors(),
                            'isi' => 'admin/produk/tambah'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());
            
            //Create thumbnail gambar
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            $config['new_image']        = './assets/upload/image/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 250;//ukuran pixel
            $config['height']           = 250;//ukuran pixel
            $config['thumb_marker']     = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //SLUG PRODUK
            $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

            $i = $this->input;

            $data = array(  'id_user'           => $this->session->userdata('id_user'),
                            'id_kategori'       => $i->post('id_kategori'),
                            'kode_produk'       => $i->post('kode_produk'),
                            'nama_produk'       => $i->post('nama_produk'),
                            'slug_produk'       => $slug_produk,
                            'keterangan'        => ($i->post('keterangan')),
                            'keywords'          => $i->post('keywords'),
                            'harga'             => $i->post('harga'),
                            'stok'              => $i->post('stok'),
                            // Disimpan nama file gambar
                            'gambar'            => $upload_gambar['upload_data']['file_name'],
                            'berat'             => $i->post('berat'),
                            'ukuran'            => $i->post('ukuran'),
                            'status_produk'     => $i->post('status_produk'),
                            'tanggal_post'      => date('Y-m-d H:i:s')
                    );
            $this->Produk_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/produk'),'refresh');
        }}
        $data = array( 'title' => 'Tambah Produk',
                            'kategori' => $kategori,
                            'isi' => 'admin/produk/tambah'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);

    }

    public function edit($id_produk)
    {
        $produk = $this->Produk_model->detail($id_produk);
        $kategori = $this->Kategori_model->listing();

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk','Nama Produk', 'required',
            array( 'required' => '%s harus diisi'));
        
        $valid->set_rules('kode_produk','Kode Produk', 'required',
            array( 'required' => '%s harus diisi'));

        if($valid->run()){
            // Check jika gambar diganti
            if(!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2400'; //Dalam kb
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';
            
            $this->load->library('upload', $config);
            
        if ( ! $this->upload->do_upload('gambar')){                
            
            $data = array( 'title' => 'Edit Produk :'.$produk->nama_produk,
                            'kategori' => $kategori,
                            'produk' => $produk,
                            'error' => $this->upload->display_errors(),
                            'isi' => 'admin/produk/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());
            
            //Create thumbnail gambar
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            $config['new_image']        = './assets/upload/image/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 250;//ukuran pixel
            $config['height']           = 250;//ukuran pixel
            $config['thumb_marker']     = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //SLUG PRODUK
            $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

            $i = $this->input;

            $data = array(  'id_produk'          => $id_produk,
                            'id_user'           => $this->session->userdata('id_user'),
                            'id_kategori'       => $i->post('id_kategori'),
                            'kode_produk'       => $i->post('kode_produk'),
                            'nama_produk'       => $i->post('nama_produk'),
                            'slug_produk'       => $slug_produk,
                            'keterangan'        => ($i->post('keterangan')),
                            'keywords'          => $i->post('keywords'),
                            'harga'             => $i->post('harga'),
                            'stok'              => $i->post('stok'),
                            // Disimpan nama file gambar
                            'gambar'            => $upload_gambar['upload_data']['file_name'],
                            'berat'             => $i->post('berat'),
                            'ukuran'            => $i->post('ukuran'),
                            'status_produk'     => $i->post('status_produk')
                    );
            $this->Produk_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/produk'),'refresh');
        }}else{
            //SLUG PRODUK
            $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
            //edit produk tanpa ganti gambar
            $i = $this->input;

            $data = array(  'id_produk'          => $id_produk,
                            'id_user'           => $this->session->userdata('id_user'),
                            'id_kategori'       => $i->post('id_kategori'),
                            'kode_produk'       => $i->post('kode_produk'),
                            'nama_produk'       => $i->post('nama_produk'),
                            'slug_produk'       => $slug_produk,
                            'keterangan'        => ($i->post('keterangan')),
                            'keywords'          => $i->post('keywords'),
                            'harga'             => $i->post('harga'),
                            'stok'              => $i->post('stok'),
                            'berat'             => $i->post('berat'),
                            'ukuran'            => $i->post('ukuran'),
                            'status_produk'     => $i->post('status_produk')
                    );
            $this->Produk_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/produk'),'refresh');
        }}
        $data = array( 'title' => 'Edit Produk : '.$produk->nama_produk,
                            'kategori' => $kategori,
                            'produk' => $produk,
                            'isi' => 'admin/produk/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function delete($id_produk)
    {
        // Proses hapus gambar
        $produk = $this->Produk_model->detail($id_produk);
        unlink('./assets/upload/image/'.$produk->gambar);
        unlink('./assets/upload/image/thumbs/'.$produk->gambar);

        // End proses hapus
        $data = array('id_produk' => $id_produk);
        $this->Produk_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/produk'),'refresh');
    }

    public function delete_gambar($id_produk,$id_gambar)
    {
        // Proses hapus gambar
        $gambar = $this->Produk_model->detail_gambar($id_gambar);
        unlink('./assets/upload/image/'.$gambar->gambar);
        unlink('./assets/upload/image/thumbs/'.$gambar->gambar);

        // End proses hapus
        $data = array('id_gambar' => $id_gambar);
        $this->Produk_model->delete_gambar($data);
        $this->session->set_flashdata('sukses', 'Data gambar telah dihapus');
        redirect(base_url('admin/produk/gambar/'.$id_produk),'refresh');
    }
}

/* End of file Peoduk.php */
