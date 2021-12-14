<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Producto_controller extends CI_Controller{
		
		function __construct() 
		{
			parent::__construct();
			$this ->load->model('producto_model');
			
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
		function index()
		{
			if($this->_veri_log()){
			$data = array('titulo' => 'Productos');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$dat = array('productos' => $this->producto_model->get_productos() );
				
			$this->load->view('front-end/head_view',$data);
			$this->load->view('front-end/navbar_view',$data);
			$this->load->view('productos/muestraproductos_view',$dat);
			$this->load->view('front-end/footer_view');
			}else{
			redirect('login', 'refresh'); }
		}

		/**
	    * < ------ Mostrar paginacion------------------------>
	    */

	/*	public function paginacion(){
		$this->load->library('pagination');
	}
			public function products($type='',$offset='') {
			$limit = 6; //cantidad minima de registros

		//se obtiene el total de productos
		$total =$this->producto_model->count_products($type);
			//se obtienen los productos para pasar a la vista 
		$prod_stock_activo=$this->producto_model->list_products($type,$limit,$offset);

		// se configura la paginacion
		$config['base_url'] = base_url().'products/'.$type;
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		//se inicializa el paginador
		$this->pagination->initialize($config);
		$data -array(
			'content'=> 'productos/muestraproductos_view', //ubucacion del contenido a cargar
			'title'=>'Products',
			'categorys'=>$cat =$this->categorys(),//ontiene las categorias para los botones de la vista
			'products'=>$prod_stock_activo,
			'pag_links=>$his->pagination->create_links()
			);
		echo $this->pagination->create_links();
		
			
		}*/


		/**
	    * Muestra todos los  en tabla
	    */
		function muestra_computacion()
		{
			if($this->_veri_log()){
			$data = array('titulo' => 'COMPUTADORAS Y MONITORES');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$dat = array('productos' => $this->producto_model->get_computadoras() );

			$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view', $data);
			$this->load->view('productos/computacion_view', $dat);
			$this->load->view('front-end/footer_view');
			}else{
			redirect('login', 'refresh'); }
		}

		/**
	    * Muestra todos los productos en tabla
	    */
		function muestra_accesorios()
		{
			if($this->_veri_log()){
			$data = array('titulo' => 'ACCESORIOS');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$dat = array('productos' => $this->producto_model->get_accesorios() );

			$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('productos/accesorios_view', $dat);
			$this->load->view('front-end/footer_view');
			}else{
			redirect('login', 'refresh'); }
		}
		
		function buscar()
		{
			if($this->_veri_log()){
			$data = array('titulo' => 'ACCESORIOS');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$dat = array('productos' => $this->producto_model->get_accesorios() );

			$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('productos/accesorios_view', $dat);
			$this->load->view('front-end/footer_view');
			}else{
			redirect('login', 'refresh'); }
		}
		/**
	    * Muestra formulario para agregar producto
	    */
		function form_agrega_producto()  	//Si se modifica, modificar (agrega_producto) tambien
		{
			if($this->_veri_log()){
			$data = array('titulo' => 'Agregar Producto');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
		
			$dat = array('productos' => $this->producto_model->get_categoria());
			$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('productos/agregaproducto_view',$dat);
			$this->load->view('front-end/footer_view');
			}else{
			redirect('login', 'refresh'); }
		}

		/**
	    * Verifica datos ingresados en el formulario para agregar producto
	    */
		function agregar_producto()
		{
			//Genero las reglas de validacion
			$this->form_validation->set_rules('descripcion', 'Descripcion', 'required|is_unique[productos.descripcion]');
			$this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
			$this->form_validation->set_rules('precio_costo', 'Precio Costo', 'required|numeric');
			$this->form_validation->set_rules('precio_venta', 'Precio Venta', 'required|numeric');
			$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
			$this->form_validation->set_rules('stock_min', 'Stock Minimo', 'required|numeric');
			$this->form_validation->set_rules('filename', 'Imagen', 'required|callback__image_upload');

			//Mensaje de error si no pasan las reglas
			$this->form_validation->set_message('required',
										'<div class="alert alert-danger">El campo %s es obligatorio</div>');

			$this->form_validation->set_message('is_unique',
										'<div class="alert alert-danger">El campo %s ya existe</div>');

			$this->form_validation->set_message('numeric',
							'<div class="alert alert-danger">El campo %s debe contener un valor numérico</div>');


			if (!$this->form_validation->run())
			{
				$data = array('titulo' => 'Error de formulario');
		
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				
				$this->load->view('front-end/head_view', $data);
				$this->load->view('front-end/navbar_view');
				$this->load->view('productos/agregaproducto_view');
				$this->load->view('front-end/footer_view');
			}
			else
			{
				$this->_image_upload();			
			}
		}
		
		/**
		* Obtiene los datos del archivo imagen.
		* Permite archivos gif, jpg, png
		* Verifica si los datos son correcto en conjunto con la imagen y lo inserta en la tabla correspondiente
		* En la tabla guarda la URL de donde se encuentra la imagen.
		*/
		function _image_upload()
		{
			$this->load->library('upload');
	 
            //Comprueba si hay un archivo cargado
            if (!empty($_FILES['filename']['name']))
            {
                // Especifica la configuración para el archivo
                $config['upload_path'] = 'assets/img/nuevoProdu/';
                $config['allowed_types'] = 'gif|jpg|JPEG|png';

                $config['max_size'] = '2048';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';       
 
                // Inicializa la configuración para el archivo 
                $this->upload->initialize($config);
				//if ($this->upload->do_upload('image'))
                if ($this->upload->do_upload('filename'))
                {
                	// Mueve archivo a la carpeta indicada en la variable $data
                    $data = $this->upload->data();

                    // Path donde guarda el archivo..
					//$url =$base-uri + "./assets/img/nuevaProdu/".$_FILES['image']['name'];
                    $url ="./assets/img/nuevoProdu/".$_FILES['filename']['name'];

                    // Array de datos para insertar en productos
                    $data = array(
						'descripcion'=>$this->input->post('descripcion',true),
						'categoria_id'=>$this->input->post('categoria_id',true),
						'precio_costo'=>$this->input->post('precio_costo',true),
						'precio_venta'=>$this->input->post('precio_venta',true),
						'stock'=>$this->input->post('stock',true),
						'stock_min'=>$this->input->post('stock_min',true),
						'imagen'=>$url,
						'baja'=>'NO'
					);
					/* $data =array( 'image' =>$url); y sin return true; */

					$productos = $this->producto_model->add_producto($data);

					redirect('produ', 'refresh');

					return TRUE;
                }
                else
                {
                	//Mensaje de error si no existe imagen correcta
                    $imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';//$this->upload->display_errors();
					$this->form_validation->set_message('_image_upload',$imageerrors );
					
					return false;
                }
 
            }
            else
            {
            	redirect('verifico_nuevoproducto');
		        	
            }
		}

		/**
	    * Muestra para modificar un producto
	    */
		function muestra_modificar_producto($id)
		{
			$id = $this->uri->segment(2);
			$datos_producto = $this->producto_model->edit_producto($id);

			if ($datos_producto != FALSE) {
				foreach ($datos_producto->result() as $row) 
				{
					$descripcion = $row->descripcion;
					$categoria_id = $row->categoria_id;
					$precio_costo = $row->precio_costo;
					$precio_venta = $row->precio_venta;
					$stock = $row->stock;
					$stock_min = $row->stock_min;
					$imagen = $row->imagen;	
				}

				$dat = array('producto' =>$datos_producto,
					'id'=>$id,
					'descripcion'=>$descripcion,
					'categoria_id'=>$categoria_id,
					'precio_costo'=>$precio_costo,
					'precio_venta'=>$precio_venta,
					'stock'=>$stock,
					'stock_min'=>$stock_min,
					'imagen'=>$imagen,
				);
			} 
			else 
			{
				return FALSE;
			}
			if($this->_veri_log()){
			$data = array('titulo' => 'Modificar Producto');
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('productos/modificaproducto_view', $dat);
			$this->load->view('front-end/footer_view');
			}else{
			redirect('login', 'refresh');}
		}

		/**
	    * Verifica datos para modificar un producto
	    */
		function modificar_producto()
		{
			//Validación del formulario
			$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
			$this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
			$this->form_validation->set_rules('precio_costo', 'Precio Costo', 'required|numeric');
			$this->form_validation->set_rules('precio_venta', 'Precio Venta', 'required|numeric');
			$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
			$this->form_validation->set_rules('stock_min', 'Stock Minimo', 'required|numeric');
			

			//Mensaje del form_validation
			$this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio, al intentar modificar estaba vacio</div>');

			$this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico, al intentar modificar estaba vacio</div>'); 

			$id = $this->uri->segment(2);
			$datos_producto = $this->producto_model->edit_producto($id);

			foreach ($datos_producto->result() as $row) 
			{
				$imagen = $row->imagen;
			}

			$dat = array(
				'id'=>$id,
				'descripcion'=>$this->input->post('descripcion',true),
				'categoria_id'=>$this->input->post('categoria_id',true),				
				'precio_costo'=>$this->input->post('precio_costo',true),
				'precio_venta'=>$this->input->post('precio_venta',true),
				'stock'=>$this->input->post('stock',true),
				'stock_min'=>$this->input->post('stock_min',true),
				'imagen'=>$imagen // ver va coma
			);

			if ($this->form_validation->run()==FALSE)
			{
				$data = array('titulo' => 'Error de formulario');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$this->load->view('front-end/head_view', $data);
				$this->load->view('front-end/navbar_view');
				$this->load->view('productos/modificaproducto_view', $dat);
				$this->load->view('front-end/footer_view');
			}
			else
			{
				$this->_image_modif();		
			}
			
		}

		/**
		* Obtiene los datos del archivo imagen.
		* Permite archivos gif, jpg, png
		* Verifica si los datos son correcto en conjunto con la imagen y lo inserta en la tabla correspondiente
		* Si el campo imagen se encuentra vacio asume que la imagen no fue moficado.
		* En la tabla guarda la URL de donde se encuentra la imagen.
		*/
		
	    function _image_modif()
	    {
			//Cargo la libreria para subir archivos
	    	$this->load->library('upload');

			// Obtengo el id del producto
	    	$id = $this->uri->segment(2);

	        // Array de datos para obtener datos de productos sin la imagen 
	    	$dat = array(
				'id'=>$id,
				'descripcion'=>$this->input->post('descripcion',true),
				'categoria_id'=>$this->input->post('categoria_id',true),
				'precio_costo'=>$this->input->post('precio_costo',true),
				'precio_venta'=>$this->input->post('precio_venta',true),
				'stock'=>$this->input->post('stock',true),
				'stock_min'=>$this->input->post('stock_min',true)
			);

			// Si la iamgen esta vacia se asume que no se modifica
	    	if (!empty($_FILES['filename']['name']))
	    	{            
	            // Especifica la configuración para el archivo
	    		$config['upload_path'] = 'assets/img/nuevoProdu/';
	    		$config['allowed_types'] = 'gif|jpg|jpeg|png';

	    		$config['max_size'] = '2048';
	    		$config['max_width']  = '1024';
	    		$config['max_height']  = '768';       

	            // Inicializa la configuración para el archivo 
	    		$this->upload->initialize($config);

	    		if ($this->upload->do_upload('filename'))
	    		{
	                	// Mueve archivo a la carpeta indicada en la variable $data
	    			$data = $this->upload->data();

	                    // Path donde guarda el archivo..
	    			$url ="assets/img/nuevoProdu/".$_FILES['filename']['name'];

	                 	// Agrego la imagen si se modifico.  
	    			$dat['imagen']=$url;

						// Actualiza datos el producto
	    			$this->producto_model->update_producto($id, $dat);
	    			redirect('produ', 'refresh');
	    		}
	    		else
	    		{
	                	//Mensaje de error si no existe imagen correcta
	    			$imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';
	    			$this->form_validation->set_message('_image_modif',$imageerrors );
	    			return false;
	    		} 
	    	}
	    	else
	    	{
	    		$this->producto_model->update_producto($id, $dat);
	    		redirect('produ', 'refresh');
	    	}
	    }


	    /*
		* Obtiene los datos del producto a eliminar
		$ this-> uri-> segment (n)

		Permite recuperar un segmento específico. Donde n es el número de segmento que desea recuperar. Los segmentos están numerados de izquierda a derecha. 

		*/
	    function eliminar_producto(){
	    	$id = $this->uri->segment(2); 
	    	$data = array(
	    		'baja'=>'SI'
	    	);

	    	$this->producto_model->estado_producto($id, $data);
	    	redirect('produ', 'refresh');
	    }

	    /**
		* Obtiene los datos del producto a activar
		*/
	    function activar_producto(){
	    	$id = $this->uri->segment(2);
	    	$data = array(
	    		'baja'=>'NO'
	    	);

	    	$this->producto_model->estado_producto($id, $data);
	    	redirect('produ', 'refresh');
	    }

	    /**
		* Productos eliminados logicamente
		*/
	    function muestra_eliminados()
	    {    	
	    	if($this->_veri_log()){
	    	$data = array('titulo' => 'Productos eliminados');
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			
			$dat = array(
		        'productos' => $this->producto_model->not_active_productos()
			);

			$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('productos/muestraeliminados_view', $dat);
			$this->load->view('front-end/footer_view');
			}else{
			redirect('login', 'refresh');}
		}
	    
 	function listar_ventas()
	    { 
             if($this->_veri_log()){
			$data = array('titulo' => 'Ventas');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
		//	$data['id_usuario'] = $session_data['id_usuario'];
			
			$dat = array('ventas_cabecera' => $this->producto_model->get_ventas_cabecera());//aca $data
		//$dat = array('ventas_cabecera' => $this->producto_model->get_ventas_cabecera($data['idusuario'],$data['perfil_id']));
			$this->load->view('front-end/head_view',$data);
			$this->load->view('front-end/navbar_view',$data);//aca $data agregue
			$this->load->view('back/muestra_ventas_view',$dat);
			$this->load->view('front-end/footer_view');
            }else{
			redirect('login', 'refresh');
            }
         }
        
        
        function muestra_detalle($id_ventas)
		{
             if($this->_veri_log()){
			$data = array('titulo' => 'Detalle');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
                 
			$dat = array('ventas_detalle' => $this->producto_model->get_ventas_detalle($id_ventas));

			$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view', $data);
			$this->load->view('back/muestraventasdetalle_view', $dat);
			$this->load->view('front-end/footer_view');
            }else{
			redirect('login', 'refresh');
            }
        }
		
		function buscar_productos(){

			$data = array('titulo' => 'Productos ');
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			$dat=array();
			$query=$this->input->get_where('query',TRUE);		
			if($_POST){
				$result= $this->input->post('query');
						
			  if($result!=false){
					$data=array('result'=>$result);
				}else{
					$data=array('result'=>'');
				}
			}else{
				//$data=array('result'=>'');
				$result='';
			}
			$dat['productos'] =$this->producto_model->get_buscar_productos($result);
			$this->load->view('front-end/navbar_view', $data);
			$this->load->view('productos/muestraproductos_view', $dat);
			$this->load->view('front-end/footer_view');
		}

		function detalleunacompra($id_ventas)
	    { 
            $session_data = $this->session->userdata('logged_in');
            if($this->_veri_log()){
		    if($session_data['perfil_id'] == '1'){
			$data = array('titulo' => 'Venta');
		    }
			if($session_data['perfil_id'] == '2'){
			$data = array('titulo' => 'Compra');
		    }	
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			$data['apellido'] = $session_data['apellido'];
			$dat = array('ventas_cabecera' => $this->producto_model->get_ventas_cabecera_una($id_ventas));


			$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view', $data);
			$this->load->view('back/dunacompra',$dat);
			$this->load->view('front-end/footer_view');
            }else{
			redirect('login', 'refresh');
            }
		}

	
	}
/* End of file
*/