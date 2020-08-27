<?php defined('BASEPATH') OR exit('No direct script access allowed');

// $config = array(
//     'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
//     'smtp_host' => 'smtp.mailtrap.io', 
//     'smtp_port' => 465,
//     'smtp_user' => '60766bee4c08b8',
//     'smtp_pass' => '9b2b3ffaa0fbcd',
//     'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
//     'mailtype' => 'html', //plaintext 'text' mails or 'html'
//     'smtp_timeout' => '6', //in seconds
//     'charset' => 'iso-8859-1',
//     'wordwrap' => TRUE
// );
$config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.mailtrap.io',
    'smtp_port' => 2525,
    'smtp_user' => '60766bee4c08b8',
    'smtp_pass' => '9b2b3ffaa0fbcd',
    'crlf' => "\r\n",
    'newline' => "\r\n"
  );


