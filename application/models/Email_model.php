<?php 

class Email_model extends CI_Model{
	public function sendEmailSuccessRegistration($fullname, $email){
    // Konfigurasi email
    $config = [
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'protocol'  => 'smtp',
      'smtp_host' => 'mail.baptistyouth.id',
      'smtp_user' => 'info@baptistyouth.id',  // Email gmail
      'smtp_pass'   => '@b4pt1st@',  // Password gmail
      'smtp_crypto' => 'ssl',
      'smtp_port'   => 465,
      'crlf'    => "\r\n",
      'newline' => "\r\n"
    ];

    // Load library email dan konfigurasinya
    $this->load->library('email', $config);

    // Email dan nama pengirim
    $this->email->from('info@baptistyouth.id', 'No-Reply');

    // Email penerima
    $this->email->to($email); // Ganti dengan email tujuan
    $this->email->bcc('onez.sumlang@gmail.com');

    // Lampiran email, isi dengan url/path file
    // $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

    // Subject email
    $this->email->subject('[Baptist Youth] Confirm your email address');

    // Isi email
    $message = "
      Hi, ".$fullname."<br/><br/>
      Terima kasih telah melakukan pendaftaran di website Baptist Youth, silahkan klik atau salin link dibawah ini untuk konfirmasi email Anda.
      <br/><br/>
      <a href='".base_url()."auth/email_confirmation/".md5($email)."'>".base_url()."auth/email_confirmation/".md5($email)."</a>
      <br/><br/>
      Regards,<br/>
      Indonesian Baptist Youth<br/><br/>
      ===========================================================<br/></br>
      Hi, ".$fullname."<br/><br/>
      Thank you for your registration on Baptist Youth website, please click or copy link below to confirm your email.
      <br/><br/>
      <a href='".base_url()."auth/email_confirmation/".md5($email)."'>".base_url()."auth/email_confirmation/".md5($email)."</a>
      <br/><br/>
      Regards,<br/>
      Indonesian Baptist Youth<br/><br/>
    ";
    $this->email->message($message);

    // Tampilkan pesan sukses atau error
    if ($this->email->send()) {
      return true;
    } else {
      return false;
    }
  }
}

?>