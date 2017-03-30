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
      
			$crud->set_theme('flexigrid');
			$crud->set_table('CC_Clientes');
			$crud->display_as('cli_identificacion', 'N. IDENTIFICACION');
			$crud->display_as('cli_nombre', 'NOMBRES');
			$crud->display_as('gen_codigo_genero', 'GENERO');
			$crud->display_as('cli_fecha_nacimiento', 'FECHA NACIMIENTO');
			$crud->display_as('cli_fecha_nacimiento', 'FECHA NACIMIENTO');
			$crud->required_fields('cli_identificacion', 'cli_nombre','cli_fecha_nacimiento');
			$crud->unique_fields('cli_identificacion');
			$crud->set_field_upload('cli_imagen','assets/admin/uploads/main');
			$crud->set_relation('gen_codigo_genero', 'CC_Generos', 'gen_nombre_genero');
			/*
			$crud->set_subject('');
			$crud->field_type('tiene_boton', 'dropdown', array('1' => 'SI', '0' => 'NO'));
			$crud->columns('cli_identificacion', 'cli_nombre', 'gen_codigo_genero', 'cli_fecha_nacimiento', 'cli_direccion', 'cli_telefono', 'cli_email');
			*/
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
			
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
