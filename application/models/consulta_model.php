<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');


class Consulta_model extends CI_Model
{
	
	/* Constructor de la Clase */
	function __construct()
	{
		parent::__construct();
	}

	/* ----------------------- Inserta una consulta ----------------------- */

	function add_consulta($data)
	{
	
		$consultas=$this->db->insert('consultas', $data);
		
	}

	function get_consultas()
    {
        $query = $this->db->get_where('consultas');
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }
	

	function estado_consulta($consulta_id, $data){
	    $this->db->where('consulta_id', $consulta_id);
	    $query = $this->db->update('consultas', $data);
	    if($query) {
	        return TRUE;
	    } else {
	        return FALSE;
	    }
	}

	function update_consulta($consulta_id, $data)
	{
		$this->db->where('id_usuario', $consulta_id);
        $query = $this->db->update('consultas', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
	}


}
