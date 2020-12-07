<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

     public function send()
     {
          $config['mailtype'] = 'text';
          $config['protocol'] = 'smtp';
          $config['smtp_host'] = 'url_smtp';
          $config['smtp_user'] = 'akun_smtp';
          $config['smtp_pass'] = 'password_smtp';
          $config['smtp_port'] = port_smtp;
          $config['newline'] = "\r\n";

          $this->load->library('email', $config);

          $this->email->from('no-reply@bahasaweb.com', 'Sistem Bahasaweb.com');
          $this->email->to('admin@bahasaweb.com');
          $this->email->subject('Contoh Kirim Email Dengan Codeigniter');
          $this->email->message('Contoh pesan yang dikirim dengan codeigniter');

          if($this->email->send()) {
               echo 'Email berhasil dikirim';
          }
          else {
               echo 'Email tidak berhasil dikirim';
               echo '<br />';
               echo $this->email->print_debugger();
          }

     }

}