<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Listado_clientes extends MX_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
        $this->load->library('grocery_CRUD_extended');
        $this->layout->setLayout("admin/layout");
    }
    
	function index()
	{
		$this->load->view((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function show()
	{
		try{
			$crud = new grocery_CRUD_extended();
      		$crud->unset_jquery();
      		$crud->unset_jquery_ui();
      
			$crud->set_subject('CLIENTE');
			$crud->set_theme('flexigrid');
			$crud->set_table('CC_Clientes');
			$crud->unset_columns(array('cli_password'));

			$crud->display_as('cli_identificacion', 'N. IDENTIFICACION')
				->display_as('cli_nombre', 'NOMBRES')
				->display_as('gen_codigo_genero', 'GENERO')
				->display_as('cli_direccion', 'DIRECCION')
				->display_as('cli_telefono', 'TELEFONO')
				->display_as('cli_email', 'E-MAIL')
				->display_as('cli_imagen', 'IMAGEN')
				->display_as('cli_password', 'PASSWORD')
				->display_as('cli_fecha_nacimiento', 'FECHA NACIMIENTO');
			$crud->required_fields('cli_identificacion', 'cli_nombre','cli_fecha_nacimiento');
			$crud->unique_fields('cli_identificacion');
			$crud->set_field_upload('cli_imagen','assets/admin/uploads/main');
			$crud->set_relation('gen_codigo_genero', 'CC_Generos', 'gen_nombre_genero');
			$crud->edit_fields('cli_identificacion', 'cli_nombre', 'gen_codigo_genero', 'cli_fecha_nacimiento', 'cli_direccion', 'cli_telefono', 'cli_email', 'cli_imagen', 'cli_password');
			$crud->field_type('cli_password', 'password');
			$crud->unset_read();
			/*
			$crud->field_type('tiene_boton', 'dropdown', array('1' => 'SI', '0' => 'NO'));
			*/
			/*
			$crud->unset_print();
			$crud->unset_export();
			$crud->unset_edit();
			*/
			
			$output = $crud->render();
			
		  $data['title_for_layout'] = "LISTADO DE CLIENTES";
		  $data['grocery'] = true;
		  $data['grocery_crud'] = $output;
		  $this->layout->view('pages/listado_clientes', $data);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
