<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class module extends TUTORIALIZAME_Rest_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('example_model', 'user');
    }
    
    function user_get()
    {
        if (!$this->get('id')) {
            $this->response(NULL, 404);
        }
        
        $user = $this->user->get_user_by_id($this->get('id'));
        
        if ($user) {
            $this->response($user, 200);
        }
        
        else {
            $this->response(array(
                'error' => 'User could not be found'
            ), 404);
        }
    }
    
    function users_get()
    {
        $users = $this->user->get_users($this->get('limit'));
        
        if ($users) {
            $this->response($users, 200);
        }
        
        else {
            $this->response(array(
                'error' => 'Couldn\'t find any users!'
            ), 404);
        }
    }

	  public function send_email_get()
	  {
        $this->load->library('utils_email');
	      $cliente = array("nombres" => "Marco Vinicio", "apellidos" => "Teran Tabango");
		    $password = $this->utils_email->generate_password(6);
		    $data = array(
		        "title_mail" => "Nueva Contraseña",
		        "subtitle_mail" => '',
		        "message_header_mail" => "Estimado(a), ".$cliente['nombres']." ".$cliente['apellidos'],
		        "message_title_mail" => 'INFORMACIÓN',
		        "message_deta_mail" => '<hr>Has solicitado recientemente restablecer tu contraseña.
		                                <br>Se genero una contraseña temporal con la cual usted podrá acceder a la tienda y cambiarla.
		                                <hr>
		                                <center>Clave Temporal:
		                                <br>
		                                <span style="color:#336699 !important;">
		                                <strong>'.$password.'</strong>
		                                </span>
		                                </center>',
		        "button_title_mail" => 'IR A LA TIENDA',
		        "url_mail" => "https://tutorializa.me"
		    );
			  $titulo = "TUTORIALIZAME";
			  $subject = "RECUPERAR CONTRASEÑA";
			  $mensaje = $this->load->view("emails/default", $data, true);
			
			  $this->utils_email->send("marquin_90@hotmail.com", $titulo, $subject, $mensaje);
	  }
}
