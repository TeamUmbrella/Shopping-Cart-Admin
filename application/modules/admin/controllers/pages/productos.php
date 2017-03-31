<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productos extends MX_Controller
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
      $crud->set_table('CC_Producto');

      $crud->display_as('pro_codigo','Código Producto');
      $crud->display_as('pro_nombre','Nombre Producto');
      $crud->display_as('cat_codigo','Categoria Producto');
      $crud->display_as('cat_codigo','Categoria Producto');
      $crud->display_as('pro_imagen','Imagen Producto');
      $crud->display_as('pro_descripcion','Descripción Producto');
      $crud->display_as('pro_precio','Precio Producto');
      $crud->display_as('pro_stock','Stock Producto');
      $crud->display_as('pro_material','Material Producto');
      $crud->display_as('pro_color','Color Producto');
      $crud->display_as('pro_largo','Largo Producto');
      $crud->display_as('pro_ancho','Ancho Producto');
      $crud->display_as('pro_alto','Alto Producto');
      $crud->required_fields('pro_nombre', 'pro_descripcion','pro_precio','pro_stock');
      $crud->unique_fields('pro_codigo');
      $crud->set_field_upload('pro_imagen','assets/admin/uploads/main');
      //$crud->set_relation('cat_codigo','CC_Categorias','cat_nombre');
      /*$crud->set_subject('');
      $crud->field_type('tiene_boton', 'dropdown', array('1' => 'SI', '0' => 'NO'));
      $crud->columns('titulo', 'subtitulo', 'orden', 'imagen');

      $crud->unset_export();
      $crud->unset_print();
      $crud->unset_read();*/
      
      $output = $crud->render();
      
      $data['title_for_layout'] = "PRODUCTOS";
      $data['grocery'] = true;
      $data['grocery_crud'] = $output;
      $this->layout->view('pages/Productos', $data);
      
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
  }
}
