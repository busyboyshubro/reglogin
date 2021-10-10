<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    // 'from' => 'team@magixproperty.com',
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    // 'smtp_host' => 'smtp.gmail.com', 
    'smtp_host' => 'smtp.hostinger.in', 
    'smtp_port' => 587,
    'smtp_user' => 'team@magixproperty.com',
    // 'smtp_user' => 'shubropurkait2@gmail.com',
    'smtp_pass' => 'namDe*8520*',
    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '7', //in seconds
    'charset' => 'utf-8',
    'wordwrap' => TRUE,
    'CRLF' => "\r\n",
    'set_newline' => "\r\n",
);