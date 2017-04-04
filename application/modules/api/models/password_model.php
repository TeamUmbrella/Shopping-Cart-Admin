<?php
Class Password_model extends CI_Model
{
    private $tabla;
    function __construct()
    {
        parent::__construct();
        $this->tabla = "CC_Clientes";
    }
    
    function validar_cliente_by_email($email)
    {
        $this->db->select('cli_email');
        $this->db->from($this->tabla);
        $this->db->where('cli_email', $email);
        $result = $this->db->get()->result();
        if (count($result) > 0)
            return true;
        else 
            return false;
    }

    function actualizar_password_by_email($email, $password){
        $this->db->where('cli_email', $email);
        $this->db->update($this->tabla, array('cli_password' => $password));
    }
    
}
?>
