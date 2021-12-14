<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');


class Usuario_model extends CI_Model
{
	
	/* Constructor de la Clase */
	function __construct()
	{
		parent::__construct();
	}

	/* ----------------------- Retorna todos los Usuarios ----------------------- */
	
	function get_usuarios()
	{
        $query = $this->db->get_where('usuarios', array('baja' => 'NO'));

		if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
	}

	/* ----------------------- Retorna todos los Usuarios No Eliminados ----------- */

	function get_usuarios_no_elim()
    {
        $query = $this->db->get_where('usuarios', array('baja' => 'NO'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

	/* ----------------------- Retorna todos los Administradores ----------------------- */

	function get_administradores()
	{
	    $query = $this->db->get_where('usuarios', array('baja' => 'NO', 'perfil_id' => '1'));
	    
	    if($query->num_rows()>0) {
	        return $query;
	    } else {
	        return FALSE;
	    }        
	}

	/* ----------------------- Retorna todos los Usuarios-Clientes ----------------------- */

	function get_usuarios_clientes()
	{
	    $query = $this->db->get_where('usuarios', array('baja' => 'NO', 'perfil_id' => '2'));
	    
	    if($query->num_rows()>0) {
	        return $query;
	    } else {
	        return FALSE;
	    }        
	}
	
	/* ----------------------- Inserta un Usuario ----------------------- */

	function add_usuario($data)
	{
		$this->db->insert('usuarios', $data);
	}
	
	/* ----------------------- Método para editar un usuario ----------------------- */
	function edit_usuario($id_usuario)
	{
		$query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario),1);
                
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
	}
	
	/* ----------------------- Método para actualizar un usuario ----------------------- */
	function update_usuario($id_usuario, $data)
	{
		$this->db->where('id_usuario', $id_usuario);
        $query = $this->db->update('usuarios', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	/* ----------------------- Eliminación y activación logica de un Usuario ----------------------- */

	function estado_usuario($id_usuario, $data){
	    $this->db->where('id_usuario', $id_usuario);
	    $query = $this->db->update('usuarios', $data);
	    if($query) {
	        return TRUE;
	    } else {
	        return FALSE;
	    }
	}

	/* ----------------------- Retorna todos los Usuarios inactivos o eliminados ----------------------- */

	function not_active_usuarios()
	{
	    $query = $this->db->get_where('usuarios', array('baja' => 'SI'));
	    if($query->num_rows()>0) {
	        return $query;
	    } else {
	        return FALSE;
	    }        
	}


	/* ----------------------- Método para borrar un Usuario ----------------------- */
	function delete_usuario($id_usuario)
	{			
		$this->db->where('id_usuario', $id_usuario);
		$query = $this->db->delete('usuarios'); 
		return true;	
	}

}