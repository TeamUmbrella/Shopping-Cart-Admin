<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');
class productos extends TUTORIALIZAME_Rest_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('productos_model');
    }
    
    public function obtener_productos_get()
    {
        if (!$this->get('parametros')) {
            $this->response(array(
                'error' => 'User could not be found'
            ), 404);
        }
        $productos = $this->productos_model->get_producto_por_codigo_nombre($this->get('parametros'));

        if ($productos) {
            $this->response($productos, 200);
        }
        else {
            $this->response(array(
                'error' => 'User could not be found'
            ), 404);
        }
    }
    public function productos_por_categoria_get($id_categoria)
    {
        if($id_categoria == null || $id_categoria == undefined){
            $this->response(NULL, 404);
        }
        $producto = $this->productos->get_productos_por_categoria($id_categoria);
    }

}
