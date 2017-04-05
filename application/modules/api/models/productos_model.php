<?php
Class Productos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function get_producto_por_codigo_nombre($parametros)
    {   
        $this->db->select('*');
        $this->db->from('CC_Producto');
        $this->db->like('pro_codigo',$parametros);
        $this->db->or_like('pro_nombre',$parametros);
        $resultado = $this->db->get()->result_array();
        return @$resultado;
    }

    public function get_productos_por_categoria($id_categoria)
    {
        $this->db->select('*');
        $this->db->from('CC_Producto');
        $this->db->where('cat_categoria_id',$id_categoria);
        $resultado = $this->db->get()->result_array();
        return @$resultado;
    }
    
}
?>
