<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Info extends TUTORIALIZAME_Rest_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('example_model', 'user');
    }

    public function index_get()
    {
        $users = array(
            'status_code' => 200,
            'app' => 'CarroCompras API',
            'version' => '1.0',
            'environment' => 'development'
        );
        $this->output->set_status_header('200');
        echo json_encode($users);
    }    
}
