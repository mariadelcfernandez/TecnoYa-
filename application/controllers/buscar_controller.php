<<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Buscar_controller extends CI_Controller {

	public function __construct()
	{
		        
                parent::__construct();
                $this ->load->model('producto_model');
                $this ->load->model('usurios_model');
                $this ->load->model('consultas_model');
                $this ->load->model('ventas_model');
                $this ->load->model('categorias_model');
     }
     
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
          public  function buscar()
            {
                if($this->_veri_log()){
                $data = array('titulo' => 'Buscando');}

                if($_POST){

                    $buscar=$this->input->post('busqueda');
                } else{
                    $buscar='';
                }
                $dat['productos'] =$this->buscar_model->buscar_productos($buscar);
                $this->load->view('productos',$dat);
    }

}