<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carrito_model extends CI_Model
{

	/*
    * Constructor de la clase
    */
	public function __construct()
	{
		parent::__construct();
	}

	public function insert_venta($data)
	{
		$this->db->insert('ventas_cabecera', $data);
		$id = $this->db->insert_id();
		//isset — Determina si una variable está definida y no es NULL
		return (isset($id)) ? $id : FALSE;
	}

	public function insert_venta_detalle($data)
	{
		$this->db->insert('ventas_detalle', $data);
	}

	/* Retorna el stock del producto a comprar */
	

	function get_stock_producto($id)
    {    
  $query = $this->db->get_where('productos', array('id' => $id));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

   /**
    * Retorna todos los productos
    */
    function get_productos()
    {
        $query = $this->db->get_where('productos', array('baja' => 'NO'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }
       
}
