<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente extends TUTORIALIZAME_Rest_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index_post()
    {
        $data_cliente = $this->post();
        $this->cliente->crear_cliente();
        $this->output->set_status_header('200');
        $response = array(
            'status' => true,
            'message' => 'Usuario registrado exitosamente!'
        );
        echo json_encode($response);
    }
}
