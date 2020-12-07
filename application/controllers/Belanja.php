<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->load->model('Konfigurasi_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Header_transaksi_model');
        $this->load->model('Transaksi_model');
        // load helper random string
        $this->load->helper('string');
        
        
    }

    // HALAMAN BELANJA
    public function index()
    {
        $keranjang = $this->cart->contents();

        $data = array(  'title'     => 'Keranjang Belanja',
                        'keranjang'  => $keranjang,
                        'isi'        => 'belanja/list'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function sukses()
    {
        $data = array(  'title'     => 'Belanja Berhasil',
                        'isi'        => 'belanja/sukses'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // Checkout
    public function checkout()
    {
        // check pelanggan sudah login
        if($this->session->userdata('email')) {
            $email          = $this->session->userdata('email');
            $nama_pelanggan = $this->session->userdata('nama_pelanggan');
            $pelanggan      = $this->Pelanggan_model->sudah_login($email,$nama_pelanggan);

            $keranjang = $this->cart->contents();

            $valid = $this->form_validation;

            $valid->set_rules('nama_pelanggan','Nama lengkap', 'required',
                array( 'required' => '%s harus diisi'));
            
            $valid->set_rules('telepon','Nomor telepon','required',
                array( 'required' => '%s harus diisi'));

            $valid->set_rules('alamat','Alamat','required',
                array( 'required' => '%s harus diisi'));

            $valid->set_rules('email','Email', 'required|valid_email',
                array(  'required'       => '%s harus diisi',
                        'valid_email'   => '%s tidak valid'
                    ));

        if($valid->run()===FALSE){
                
            $data = array(  'title'      => 'Checkout',
                            'keranjang'  => $keranjang,
                            'pelanggan'  => $pelanggan,
                            'isi'        => 'belanja/checkout'
                        );
            $this->load->view('layout/wrapper', $data, FALSE);
        }else{
            $i = $this->input;
            $data = array(  'id_pelanggan'      => $pelanggan->id_pelanggan,
                            'nama_pelanggan'    => $i->post('nama_pelanggan'),
                            'email'             => $i->post('email'),
                            'telepon'           => $i->post('telepon'),
                            'alamat'            => $i->post('alamat'),
                            'kode_transaksi'    => $i->post('kode_transaksi'),
                            'tanggal_transaksi' => $i->post('tanggal_transaksi'),
                            'jumlah_transaksi'  => $i->post('jumlah_transaksi'),
                            'status_bayar'      => 'Belum',
                            'tanggal_post'      => date('Y-m-d H:i:s')
                    );
            //  Masuk header transaksi
            $this->Header_transaksi_model->tambah($data);
            //  proses masuk ke table transaksi
            foreach($keranjang as $keranjang) {
                $sub_total = $keranjang['price'] * $keranjang['qty'];
                $data = array(  'id_pelanggan'      => $pelanggan->id_pelanggan,
                                'kode_transaksi'    => $i->post('kode_transaksi'),
                                'id_produk'         => $keranjang['id'],
                                'harga'             => $keranjang['price'],
                                'jumlah'            => $keranjang['qty'],
                                'total_harga'       => $sub_total,
                                'tanggal_transaksi' => $i->post('tanggal_transaksi')
                            );
                $this->Transaksi_model->tambah($data);
            }
            // End proses
            // keranjang dikosongkan
            $this->cart->destroy();
            // End create session
            $this->session->set_flashdata('sukses', 'Check out berhasil');
            redirect(base_url('belanja/sukses'),'refresh');
        }
        }else{
            $this->session->set_flashdata('sukses', 'Silahkan login atau registrasi terlebih dahulu');
            redirect(base_url('registrasi'),'refresh');
        }
    }

    // Tambahkan ke keranjang belanja
    public function add()
    {
        // Ambil data dari form
        $id             = $this->input->post('id');
        $qty            = $this->input->post('qty');
        $price          = $this->input->post('price');
        $name           = $this->input->post('name');
        $redirect_page  = $this->input->post('redirect_page');
        // Proses memasukkan ke keranjang belanja
        $data = array(  'id'      => $id,
                        'qty'     => $qty,
                        'price'   => $price,
                        'name'    => $name,
        );
        $this->cart->insert($data);
        // Redirect page
        redirect($redirect_page, 'refresh');
    }

    //  Update cart
    public function update_cart($rowid)
    {
        //  Jika ada data rowid
        if($rowid){
            $data = array(  'rowid'      => $rowid,
                            'qty'     => $this->input->post('qty')
                        );
            $this->cart->update($data);
            $this->session->set_flashdata('sukses','Data keranjang telah diupdate');
            redirect(base_url('belanja'),'refresh');
        }else
            redirect(base_url('belanja'),'refresh');
    }

    // Hapus isi keranjang
    public function hapus($rowid='')
    {
        // Hapus per item
        if($rowid) {
            $this->cart->remove($rowid);
            $this->session->set_flashdata('sukses', 'Data Keranjang belanja telah dihapus');
            redirect(base_url('belanja'),'refresh');
        }else{
            // Hapus semua
            $this->cart->destroy();
            $this->session->set_flashdata('sukses', 'Data Keranjang belanja telah dihapus');
            redirect(base_url('belanja'),'refresh');
        }
    }
}

/* End of file Belanja.php */
