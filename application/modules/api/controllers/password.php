<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Password extends TUTORIALIZAME_Rest_Controller
{
    private $email;
    private $new_password;
    function __construct()
    {
        parent::__construct();
        $this->load->model('password_model', 'password');
        $this->load->library('utils_email');
    }

    public function restaurar_password_by_cliente_get()
    {
        $this->email = $this->get('email');
        $validacion = $this->clientes->validar_cliente_by_email($this->email);
        $msj = "ERROR DESCONOCIDO";
        if ($validacion){
            $this->restaurar_password_cliente();
            $this->enviar_email_restauracion();
            $msj = "RESTAURACION CON EXITO";
        } else {
            $msj = "CLIENTE NO EXISTE";
        }
        $this->output->set_status_header('200');
        echo json_encode($msj);
    }

    private function restaurar_password_cliente()
    {
        $this->new_password = $this->utils_email->generate_password();
        $this->clientes->actualizar_password_by_email($this->email, $this->new_password);
    }

    private function enviar_email_restauracion(){
        $titulo = "CLAVE RESTAURADA - CARRO COMPRAS";
        $subject = "Restauracion Automatica de clave en el sistema";
        $this->utils_email->send($this->email, $titulo, $subject, $this->new_password);
    }
}
