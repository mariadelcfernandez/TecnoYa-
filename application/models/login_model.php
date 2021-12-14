<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
    public function __construct()
        {
            parent::__construct();
        }
     function valid_user($username, $password,$session_data)
    {
        $query = $this->db->get_where('usuarios',array('usuario'=>$username,'pass'=>$password,'baja'=>'NO'), 1);
        // compara q el username sea igual al usuario y lo mismo el pass y q solo cargue 1 registro.
        if($query->num_rows() == 1)
        {
           
                 return $query->result();
        }
        else
        {
        return false;
        }
        }
}
/* End of file
*/ 