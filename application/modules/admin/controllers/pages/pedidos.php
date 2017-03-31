<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pedidos extends MX_Controller
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
      $crud->set_table('CC_Pedidos');

      $crud->display_as('ped_codigo','Código Pedido');
      $crud->display_as('ped_fecha','Fecha Pedido');
      $crud->display_as('cli_identificacion',' Cliente');
      $crud->display_as('pro_codigo','Codigo Producto');
      $crud->display_as('ped_cantidad','Cantidad Pedido');
      $crud->display_as('ped_iva',' Iva Pedido');
      $crud->display_as('ped_fecha_entrega','Fecha Entrega');
      $crud->unique_fields('ped_codigo');
      //$crud->set_relation('cat_codigo','CC_Categorias','cat_nombre');
      /*$crud->set_subject('');
      $crud->field_type('tiene_boton', 'dropdown', array('1' => 'SI', '0' => 'NO'));
      $crud->columns('titulo', 'subtitulo', 'orden', 'imagen');

      $crud->unset_export();
      $crud->unset_print();
      $crud->unset_read();*/
      
      $output = $crud->render();
      
      $data['title_for_layout'] = "PEDIDOS";
      $data['grocery'] = true;
      $data['grocery_crud'] = $output;
      $this->layout->view('pages/Pedidos', $data);
      
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
  }
}
