<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Utils_email
{
    function __construct()
    {
        
    }
    
    public function send($destino, $titulo, $subject, $mensaje)
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'eset.ecu@gmail.com',
            'smtp_pass' => 'eset!@#ABC',
            'mailtype' => 'html',
            'wordwrap' => TRUE,
            'charset' => 'utf-8'
        );
        $CI =& get_instance();
        $CI->load->library('email', $config);
        $CI->email->set_newline("\r\n");
        $CI->email->from('eset.ecu@gmail.com', $titulo);
        $CI->email->to($destino);
        $CI->email->subject($subject);
        $CI->email->message($mensaje);
        $CI->email->send();
    }
    
    function generate_password($length = 8)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);
        
        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }
        
        return $result;
    }
}
