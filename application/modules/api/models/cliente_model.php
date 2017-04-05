<?php
Class Cliente_model extends CI_Model
{
    private $tabla;
    function __construct()
    {
        parent::__construct();
        $this->tabla = "CC_Clientes";
    }
    
    function crear($datos)
    {
        return $this->db->insert($this->tabla, $datos);
    }
}
?>
