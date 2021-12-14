<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Buscar_model extends CI_Model{

	
     
            private function _veri_log()
            {
                if ($this->session->userdata('logged_in')) 
                {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
            
            /**
            * Muestra todos los productos en tabla */
          public  function buscar_productos($dat)
            {
                if($this->_veri_log()){
                $data = array('titulo' => 'Buscando');}

                
                    $this->db->like('id',$dat);
                    $this->db->or_like('desripcion',$dat);
                    $this->db->or_like('categoria_id',$dat);
                    $this->db->or_like('precio_costo',$dat);
                    $this->db->or_like('precio_venta',$dat);
                    $this->db->or_like('stock',$dat);
                    $this->db->or_like('stock_min',$dat);
                    $query=$this->db->get('productos');
                    return $query->$result()
               
               
          }
  
}