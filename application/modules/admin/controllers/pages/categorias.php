<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorias extends MX_Controller
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
      $crud->set_table('CC_Categorias');

      $crud->display_as('cat_categoria_id','Id de laCategoria');
      $crud->required_fields('cat_categoria_id', 'cat_descripcion', 'cat_nombre');
      $crud->unique_fields('cat_categoria_id');
      $crud->set_relation('cat_categoria_id','CC_Producto','cat_codigo');
      /*$crud->set_subject('');
      $crud->field_type('tiene_boton', 'dropdown', array('1' => 'SI', '0' => 'NO'));
      $crud->columns('titulo', 'subtitulo', 'orden', 'imagen');

      $crud->unset_export();
      $crud->unset_print();
      $crud->unset_read();*/
      
      $output = $crud->render();
      
      $data['title_for_layout'] = "CATEGORIAS";
      $data['grocery'] = true;
      $data['grocery_crud'] = $output;
      $this->layout->view('pages/Categorias', $data);
      
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
  }
}
