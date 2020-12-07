<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->model('Header_transaksi_model');
        $this->load->model('Transaksi_model');
        $this->load->model('Rekening_model');
        
        
        // proteksi halaman
        $this->simple_pelanggan->cek_login();
        
    }
    
    public function index()
    {
        // Ambil data login
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->Header_transaksi_model->pelanggan($id_pelanggan);

        $data = array(  'title'     => 'Halaman Dashboard Pelanggan',
                        'header_transaksi' => $header_transaksi,
                        'isi'       => 'dasbor/list'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
        
    }

    public function belanja()
    {
        // Ambil data login
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->Header_transaksi_model->pelanggan($id_pelanggan);

        $data = array(  'title'     => 'Riwayat Belanja',
                        'header_transaksi' => $header_transaksi,
                        'isi'       => 'dasbor/belanja'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function detail($kode_transaksi)
    {
        // Ambil data login
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->Header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi      = $this->Transaksi_model->kode_transaksi($kode_transaksi);
        // pelanggan hanya mampu mengakses data transaksinya
        if($header_transaksi->id_pelanggan != $id_pelanggan) {
            $this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
        redirect(base_url('masuk'));
        }

        $data = array(  'title'     => 'Detail Riwayat Belanja',
                        'header_transaksi' => $header_transaksi,
                        'transaksi' => $transaksi,
                        'isi'       => 'dasbor/detail'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // Profil
    public function profil()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $pelanggan = $this->Pelanggan_model->detail($id_pelanggan);

        $valid = $this->form_validation;

        $valid->set_rules('nama_pelanggan','Nama lengkap', 'required',
            array( 'required' => '%s harus diisi'));

        $valid->set_rules('alamat','Alamat', 'required',
            array( 'required' => '%s harus diisi'));

        $valid->set_rules('telepon','Nomor Telepon', 'required',
            array( 'required' => '%s harus diisi'));

        if($valid->run()===FALSE){
        
        $data = array(  'title'     => 'Profil Saya',
                        'pelanggan' => $pelanggan,
                        'isi'       => 'dasbor/profil'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;
            // Kalau password lebih dari 6, ganti pass
            if(strlen($i->post('password')) >= 6) {
                $data = array(  'id_pelanggan'      => $id_pelanggan,
                                'nama_pelanggan'    => $i->post('nama_pelanggan'),
                                'password'          => md5($i->post('password')),
                                'telepon'           => $i->post('telepon'),
                                'alamat'            => $i->post('alamat')
                        );
            }else{
                $data = array(  'id_pelanggan'      => $id_pelanggan,
                                'nama_pelanggan'    => $i->post('nama_pelanggan'),
                                'telepon'           => $i->post('telepon'),
                                'alamat'            => $i->post('alamat')
                        );
            }
            $this->Pelanggan_model->edit($data);
            // End create session
            $this->session->set_flashdata('sukses', 'Update profil berhasil');
            redirect(base_url('dasbor/profil'),'refresh');
        }
    }
    // Konfirmasi pembayaran
    public function konfirmasi($kode_transaksi)
    {
        $header_transaksi   = $this->Header_transaksi_model->kode_transaksi($kode_transaksi);
        $rekening           = $this->Rekening_model->listing();

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_bank','Nama Bank', 'required',
            array( 'required' => '%s harus diisi'));
        
        $valid->set_rules('rekening_pembayaran','Nomor Rekening', 'required',
            array( 'required' => '%s harus diisi'));

        $valid->set_rules('rekening_pelanggan','Nama Pemilik Rekening', 'required',
            array( 'required' => '%s harus diisi'));
        
        $valid->set_rules('tanggal_bayar','Tanggal Pembayaran', 'required',
            array( 'required' => '%s harus diisi'));

        $valid->set_rules('jumlah_bayar','Jumlah Pembayaran', 'required',
            array( 'required' => '%s harus diisi'));
        
        if($valid->run()){
            // Check jika gambar diganti
            if(!empty($_FILES['bukti_bayar']['name'])) {
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2400'; //Dalam kb
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';
            
            $this->load->library('upload', $config);
            
        if ( ! $this->upload->do_upload('bukti_bayar')){                
            
        $data = array(  'title'     => 'Konfirmasi Pembayaran',
                        'header_transaksi'  => $header_transaksi,
                        'rekening'          => $rekening,
                        'error' => $this->upload->display_errors(),
                        'isi'       => 'dasbor/konfirmasi'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
        
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

            $data = array(  'id_header_transaksi'   => $header_transaksi->id_header_transaksi,
                            'status_bayar'          => 'Konfirmasi',
                            'jumlah_bayar'          => $i->post('jumlah_bayar'),
                            'rekening_pembayaran'   => $i->post('rekening_pembayaran'),
                            'rekening_pelanggan'    => $i->post('rekening_pelanggan'),
                            'bukti_bayar'           => $upload_gambar['upload_data']['file_name'],
                            'id_rekening'           => $i->post('id_rekening'),
                            'tanggal_bayar'         => $i->post('tanggal_bayar'),
                            'nama_bank'             => $i->post('nama_bank')
                    );
            $this->Header_transaksi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
            redirect(base_url('dasbor'),'refresh');
        }}else{
            //edit produk tanpa ganti gambar
            $i = $this->input;

            $data = array(  'id_header_transaksi'   => $header_transaksi->id_header_transaksi,
                            'status_bayar'          => 'Konfirmasi',
                            'jumlah_bayar'          => $i->post('jumlah_bayar'),
                            'rekening_pembayaran'   => $i->post('rekening_pembayaran'),
                            'rekening_pelanggan'    => $i->post('rekening_pelanggan'),
                            'id_rekening'           => $i->post('id_rekening'),
                            'tanggal_bayar'         => $i->post('tanggal_bayar'),
                            'nama_bank'             => $i->post('nama_bank')
                    );
            $this->Header_transaksi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
            redirect(base_url('dasbor'),'refresh');
        }}
        $data = array(  'title'     => 'Konfirmasi Pembayaran',
                        'header_transaksi'  => $header_transaksi,
                        'rekening'          => $rekening,
                        'isi'       => 'dasbor/konfirmasi'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Dasbor.php */
