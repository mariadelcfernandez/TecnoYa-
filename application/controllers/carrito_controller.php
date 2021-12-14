<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carrito_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('carrito_model');
		$this->load->model('producto_model');
        $this->load->library('cart');
	}

	public function index()
	{
		
	}


	
	public function catalogo(){

		$dat = array('productos' => $this->producto_model->get_productos());

		$data = array('titulo' => 'Todos los Productos');
		
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
		

		$this->load->view('front-end/head_view', $data);
		$this->load->view('front-end/navbar_view');
		
   		if ($session_data) 
		{
			$this->load->view('productos/carritoparte_view' );
		}
		
		$this->load->view('productos/productos_catalogo', $dat);
		$this->load->view('front-end/footer_view');
	}


	//Este método llama a la página Productos, con el carrito si está logueado
	public function computacion()
	{
		
		$dat = array('productos' => $this->producto_model->get_computadoras());
		$data = array('titulo' => 'Computacion');
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
	

		$this->load->view('front-end/head_view', $data);
		$this->load->view('front-end/navbar_view');
	
		if ($session_data) 
		{
			$this->load->view('productos/carritoparte_view' );
		}
		
		$this->load->view('productos/productos_catalogo', $dat);
		$this->load->view('front-end/footer_view');
	}


	
	public function monitores()
	{
		$dat = array('productos' => $this->producto_model->get_monitores());

		$data = array('titulo' => 'Monitores');
		
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
	
		if ($session_data) 
		{
			$this->load->view('productos/carritoparte_view' );
		}
		$this->load->view('front-end/head_view', $data);
		$this->load->view('front-end/navbar_view');
		$this->load->view('productos/productos_catalogo', $dat);
		$this->load->view('front-end/footer_view');
	}

	public function almacenamientos()
	{
		$dat = array('productos' => $this->producto_model->get_almacenamientos());
		
		$data = array('titulo' => 'Computacion');
		
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
		

		$this->load->view('front-end/head_view', $data);
		$this->load->view('front-end/navbar_view');
		if ($session_data) 
		{
			$this->load->view('productos/carritoparte_view' );
		}
		$this->load->view('productos/productos_catalogo', $dat);
		$this->load->view('front-end/footer_view');
	}


	public function audiosvideos()
	{
		//$dat = array('productos' => $this->producto_model->get_computadoras());
		$dat = array('productos' => $this->producto_model->get_audiosvideos());

		$data = array('titulo' => 'Audios-Videos');
		
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
		


		$this->load->view('front-end/head_view', $data);
		$this->load->view('front-end/navbar_view');
		if ($session_data) 
		{
			$this->load->view('productos/carritoparte_view' );
		}
	
		$this->load->view('productos/productos_catalogo', $dat);
		$this->load->view('front-end/footer_view');
	}
	public function accesorios()
	{
		
		$dat = array('productos' => $this->producto_model->get_accesorios());

		$data = array('titulo' => 'Accesorios');
		
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
		


		$this->load->view('front-end/head_view', $data);
		$this->load->view('front-end/navbar_view');
		if ($session_data) 
		{
			$this->load->view('productos/carritoparte_view' );
		}
		$this->load->view('productos/productos_catalogo', $dat);
		$this->load->view('front-end/footer_view');
	}


		
	//Agrega elemento al carrito
	function add()
	{
        // Genera array para insertar en el carrito
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('descripcion'),
			'price' => $this->input->post('precio_venta'),
			'imagen' => $this->input->post('imagen'),
			'qty' => 1
			);	

        // Inserta elemento al carrito
		$this->cart->insert($insert_data);
	    
        // Redirige a la misma página que se encuentra
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

	
	//Elimina elemento del carrito o el carrito entero
	function remove($rowid) {
        //Si $rowid es "all" destruye el carrito
		if ($rowid==="all")
		{
			$this->cart->destroy();
		}
		else //Sino destruye sola fila seleccionada
		{ 
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
				);
            // Actualiza los datos
			$this->cart->update($data);
		}
		
        // Redirige a la misma página que se encuentra
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	


	public function carrito()
	{
		
		//$dat = array('productos' => $this->producto_model->get_computadoras());
		//$datat = array('titulo' => 'Computación');
		
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];


		$this->load->view('front-end/head_view', $data);
		$this->load->view('front-end/navbar_view');
	
		if ($session_data) 
		{
			$this->load->view('productos/carritoparte_view' );
		}
		
	     $this->load->view('productos/productos_catalogo');
		$this->load->view('front-end/footer_view');
	}


	//PRUEBA DE CORRECCIÓN DE DESCUENTO DE STOCK POR SOBRE LA EXISTENCIA
	// function actualiza_carrito()
 //    {        
	//     // Recibe los datos del carrito, calcula y actualiza
 //       	$cart_info =  $_POST['cart'];
	
	// 		foreach( $cart_info as $id => $cart)
	// 		{	
	// 		    $rowid = $cart['rowid'];
	// 	    	$price = $cart['price'];
	// 	    	$amount = $price * $cart['qty'];
	// 	    	$qty = $cart['qty'];
		    
	// 	    	$data = array(
	// 					'rowid'   => $rowid,
	// 	                'price'   => $price,
	// 	                'amount' =>  $amount,
	// 					'qty'     => $qty
	// 					);
		        
	// 	    	$cantidad = $data['qty'];

 //       			$stock_producto = $this->producto_model->get_stock_producto($id['id_producto']);

	// 	        if ($stock_producto <= $cantidad) {
		         	
	// 	        	echo "Error";
		        	

	// 	         } else {
	// 	         	$this->cart->update($data);
	// 	         }
		          
				
	// 		}
       	

 //       		//Mensaje de error si no existe imagen correcta
 //             //$error = '<div class="alert alert-danger">El campo %s es incorrecto, extención incorrecta o excede el tamaño permitido que es de: 2MB </div>';//$this->upload->display_errors();

 //            // $error['mensaje']='Su cantidad elegida excede el stock del producto.';

 //            // $this->load->view('actualiza_carrito',$error);
			
	// 		//$this->form_validation->set_message('_image_upload',$imageerrors );
					
	// 		//return false;
       	

	// 	// Redirige a la misma página que se encuentra
	// 	header('Location: '.$_SERVER['HTTP_REFERER']);
	// }



	//Actualiza el carrito que se muestra
	function actualiza_carrito()
    {        
	    // Recibe los datos del carrito, calcula y actualiza
       	$cart_info =  $_POST['cart'];

		foreach( $cart_info as $id => $cart)
		{	
		    $rowid = $cart['rowid'];
	    	$price = $cart['price'];
	    	$amount = $price * $cart['qty'];
	    	$qty = $cart['qty'];
	    
	    	$data = array(
					'rowid'   => $rowid,
	                'price'   => $price,
	                'amount' =>  $amount,
					'qty'     => $qty
					);
	         
			//$this->cart->update($data);
	
		
	    	$stock_producto = $this->carrito_model->get_stock_producto($id);
        foreach ($stock_producto->result() as $row) 
          {
                $stock2 = $row->stock;}
           // aca compara la cnatidad 'qty' que trae el carrito a comprar con $tock2 que trae la BD

	    	if($stock2>$qty){
	    		
                //echo "hay stock";
                $data = array(
					'rowid'   => $rowid,
	                'price'   => $price,
	                'amount' =>  $amount,
					'qty'     => $qty
					);    
	    	}else{
	    		$qty=$stock2;
	    		$data = array(
					'rowid'   => $rowid,
	                'price'   => $price,
	                'amount' =>  $amount,
					'qty'     => $qty
					);
	    	print '<script type="text/javascript">
	    	alert("No disponemos de la cantidad de productos que necesita.");
	    	window.history.back(-1);
	    	</script>';
	    	echo '<div align="center"><img src="assets\img\carritovacio.png" alt="Sin productos" width="70%" height="75%"><br>Volver al carrito para ver la cantidad de productos disponibles.<div>';
die();
	
	    		//echo "NOOOO hay stock";
	    	}
		}
		$this->cart->update($data);
		// Redirige a la misma página que se encuentra
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	
//Muestra los detalles de la venta y confirma(función guarda_compra())
	function muestra_compra()
	{
		$this->actualiza_carrito();
	
		$data = array('titulo' => 'Confirmar compra');
		
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
		
		$this->load->view('front-end/head_view', $data);
		$this->load->view('front-end/navbar_view', $data);
		$this->load->view('productos/compra_view', $data);
		$this->load->view('front-end/footer_view');

    }


	
	
	

    //Guarda los datos de la venta en la base de datos    
    public function guarda_compra()
	{
		
		$session_data = $this->session->userdata('logged_in');
		
		$data['id_usuario'] = $session_data['id_usuario'];
		$total = $this->cart->total();
		date_default_timezone_set('America/Argentina/Buenos_Aires'); $f= date('Y-m-d H:i:s', time());
		$venta = array(
		
			'fecha' 		=> date('Y-m-d'),
			'id_usuario' 	=> $data['id_usuario'],
			'total_venta'	=> $total
		);	
		$venta_id = $this->carrito_model->insert_venta($venta); //inserta en la tabla venta_cabecera
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$venta_detalle = array(
					'id_ventas' 		=> $venta_id,
					'id' 	        => $item['id'],  //producto
					'cantidad' 		=> $item['qty'],
					'precio' 		=> $item['price'],
					'total' 		=> $item['subtotal']
					);	
            
            	$cust_id = $this->carrito_model->insert_venta_detalle($venta_detalle); //inserta en la tabla venta_detalle

            	//Descuenta del stock y lo guarda en la base de datos
            	$producto = $this->producto_model->edit_producto($item['id']);
            	foreach ($producto->result() as $row) 
				{
					$stock = $row->stock;//SCTOK PRODUCTO
				}

            	$stock_edit = $stock - 	$item['qty'];

            	$stock_nuevo = array(
            		'stock'	=> $stock_edit
            		);

            	$modifica = $this->producto_model->update_producto($item['id'], $stock_nuevo);

			endforeach;
	
	    

		$data = array('titulo' => 'Compra Finalizada');

		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];

        $this->load->view('front-end/head_view', $data);
		$this->load->view('front-end/navbar_view');
		$this->load->view('productos/compra_view',$venta_detalle);
		$this->load->view('front-end/footer_view');
	endif;
		$final = $this->cart->destroy();

	}

	function borrar_carrito() 
	{
		$this->cart->destroy();
			
        // Redirige a la misma página que se encuentra
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}


function registro_pago(){
	$id = $this->uri->segment(2);
	$data = array(
		'estado'=>'PAGO'
	);

	$this->producto_model->update_venta_pago($id, $data);
	echo "<script>alert('Pago registrado!!!');</script>";

	redirect('carro', 'refresh');
}
}
