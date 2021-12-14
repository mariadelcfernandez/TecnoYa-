<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Producto_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna todos los productos
     */
    function get_productos()
    {
        $query = $this->db->get_where('productos', array('baja' => 'NO'));

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
   
        public  function get_buscar_productos($result)
        {
            
         
                $this->db->like('id',$result);
                $this->db->or_like('desripcion',$result);
                $this->db->or_like('categoria_id',$result);
                $this->db->or_like('precio_costo',$result);
                $this->db->or_like('precio_venta',$result);
                $this->db->or_like('stock',$result);
                $this->db->or_like('stock_min',$result);
                $this->db->or_like('imagen',$result);
                $query=$this->db->get_where('productos');
               return $query->resul();
      
         }
    function get_categoria()
    {
        $query = $this->db->get_where('categoria', array('categoria_id' => 'descripcion'));

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /**
     * Retorna todos los segun categoria
     */
    function get_computadoras()
    {
        $query = $this->db->get_where('productos', array('baja' => 'NO', 'categoria_id' => '1'));

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    function get_monitores()
    {
        $query = $this->db->get_where('productos', array('baja' => 'NO', 'categoria_id' => '2'));

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    function get_almacenamientos()
    {
        $query = $this->db->get_where('productos', array('baja' => 'NO', 'categoria_id' => '3'));

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /* Retorna todos los productos por categoria */
    function get_accesorios()
    {
        $query = $this->db->get_where('productos', array('baja' => 'NO', 'categoria_id' => '4'));

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    function get_audiosvideos()
    {
        $query = $this->db->get_where('productos', array('baja' => 'NO', 'categoria_id' => '5'));

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function count_products($type)
    {
        if(!empty($type)){
            $this->db->where('categoria_id',$type);
        }
        return$this->db->count_all_results('productos_activos');
    }

    public function list_products($type, $limite,$offset)
    {
        if(!empty($type)){
            $this->db->where('categoria_id',$type);
        }
        $this->db->limite($limite,$offset);
    }

        public function list_prod_abm($type,$limit,$offset){
            if($type=='act'){
                $this->db->where('baja','NO');
            }else{
                $this->db->where('baja','SI');
            }
            $this->db->limit($limit.$offset);
            $query=$this->db->get('productos');
            return $query->result();
        }
    /**
     * Inserta un producto
     */
    public function add_producto($data)
    {
        $this->db->insert('productos', $data);
    }

    /**
     * Retorna todos los datos de un producto
     */
    function edit_producto($id)
    {

        $query = $this->db->get_where('productos', array('id' => $id), 1);

        if ($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /**
     * Actualiza los datos de un producto
     */
    function update_producto($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('productos', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

       /**
    * Actualiza el pago de una venta
    */
    function update_venta_pago($id, $datpago){
        $this->db->where('id_ventas', $id);
        $query = $this->db->update('ventas_cabecera', $datpago);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    /**
     * Eliminación y activación logica de un producto
     */
    function estado_producto($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('productos', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Retorna todos los productos inactivos o eliminados
     */
    function not_active_productos()
    {
        $query = $this->db->get_where('productos', array('baja' => 'SI'));
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    function get_ventas_cabecera()
    {
       //select * from ventas_cabecera; obtrngo todas las ventas agrupadas por el id ventas con nombre usuario, productos
        $this->db->join('usuarios', 'usuarios.id_usuario = ventas_cabecera.id_usuario');
        $this->db->join('productos', 'productos.id = ventas_detalle.id');
        $this->db->group_by('ventas_cabecera.id_ventas'); //agrupado por id_ventas de la tabla ventas_cabecera
        //select * from ventas_detalle donde el id de ventas-cabera es igual a ventas_detalle
        $query = $this->db->get_where('ventas_cabecera, ventas_detalle',' ventas_detalle.id_ventas = ventas_cabecera.id_ventas');

       
       // $query = $this->db->get_where('ventas_detalle');

             if ($query->num_rows() > 0) {
                 return $query;
             } else {
                 return FALSE;
             }
 
 
        }

    function get_ventas_detalle($id)
    {
        //select * from ventas_detalle de ese id ventas
        $query = $this->db->get_where('ventas_detalle',array('id_ventas'=>$id));


        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

     /////Obtengo los datos para mostrar una venta
     function get_ventas_cabecera_una($id_ventas)
     {
        /* $this->db->join('usuarios','usuarios.id = ventas_cabecera.id') ;   
         //select * from ventas_cabecera;
         $query = $this->db->get('ventas_cabecera', 'usuarios.nombre','usuarios.apellido');*/
        $query = $this->db->get_where('ventas_cabecera', array('id_ventas' => $id_ventas,'fecha'));
 
         if($query->num_rows()>0) {
             return $query;
         } else {
             return FALSE;
         }
     }
}
