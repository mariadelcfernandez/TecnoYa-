<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Usuario_controller extends CI_Controller{
		
		function __construct() 
		{
			parent::__construct();
			$this ->load->model('usuario_model');
			
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
	    * Muestra todos los usuarios en tabla */
		function index()
		{
			if($this->_veri_log()){
			$data = array('titulo' => 'Usuarios');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$dat = array('usuarios' => $this->usuario_model->get_usuarios() );

			$this->load->view('front-end/head_view',$data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('usuarios/muestrausuario_view',$dat);
			$this->load->view('front-end/footer_view');
			}else{
			redirect('login', 'refresh'); }
		}

		/**
	    * Muestra formulario para agregar usuario
	    */
        function form_agrega_usuario()  	//Si se modifica, modificar (agrega_usuario) tambien
		{
			if($this->_veri_log()){
			$data = array('titulo' => 'Agregar Usuario');
			
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('usuarios/agregausuario_view');
			$this->load->view('front-end/footer_view');
			}else{
			redirect('login', 'refresh'); }
		}

		/**
	    * Verifica datos ingresados en el formulario para agregar producto
	    */
		function agrega_usuario()
		{
			//Genero las reglas de validacion
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

		
			$this->form_validation->set_rules('apellido', 'Apellido', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuarios.email]');
			$this->form_validation->set_rules('usuario', 'Usuario', 
												'trim|required|is_unique[usuarios.usuario]');
			$this->form_validation->set_rules('perfil_id', 'perfil_id', 'required');
			$this->form_validation->set_rules('pass', 'Contraseña','required');
			$this->form_validation->set_rules('re_pass', 'Repetir contraseña', 'required|matches[pass]');
				

			//Mensaje de error si no pasan las reglas
			$this->form_validation->set_message('required',
											'<div class="alert alert-danger">El campo %s es obligatorio</div>');

			$this->form_validation->set_message('matches',
											'<div class="alert alert-danger">Los contraseña ingresada no coincide</div>');

			$this->form_validation->set_message('is_unique',
											'<div class="alert alert-danger">El campo %s ya existe</div>');

			$pass = $this->input->post('re_pass',true);

			//Preparo los datos para guardar en la base, en caso de que pase la validacion
			$data = array(
				
				'apellido'=>$this->input->post('apellido',true),
                'nombre'=>$this->input->post('nombre',true),
				'email'=>$this->input->post('email',true),
				'usuario'=>$this->input->post('usuario',true),
				'perfil_id'=>$this->input->post('perfil_id',true),
				'pass'=>($pass),
                'baja'=>'NO'
			);


			//Si no pasa la validacion de datos
			if ($this->form_validation->run() == FALSE)
			{
				//Muestra la página de registro con el título de error
				$data = array('titulo' => 'Error de formulario');
				$this->load->view('front-end/head_view', $data);
				$this->load->view('front-end/navbar_view');
				$this->load->view('usuarios/agregausuario_view');
				$this->load->view('front-end/footer_view');		
			}
			
			else 	//Pasa la validacion
			{
				//Envio array al metodo insert para registro de datos
				$usuario = $this->usuario_model->add_usuario($data);
				if($data==true){
					//Sesion de una sola ejecución
					$this->session->set_flashdata('correcto', 'Usuario añadido correctamente');
				}else{
					$this->session->set_flashdata('incorrecto', 'Usuario añadido correctamente');
				}
		

				//Redirecciono a la pagina de perfil
				redirect('us','refresh');
			}	
		}

		/**
	    * Muestra para modificar un usuario
	    */
		function muestra_modificar_usuario($id_usuario)
		{
			$id_usuario = $this->uri->segment(2);
			$datos_usuario = $this->usuario_model->edit_usuario($id_usuario);

			if ($datos_usuario != FALSE) {
				foreach ($datos_usuario->result() as $row) 
				{
                    $id_usuario = $row->id_usuario;
					$apellido = $row->apellido;
                    $nombre = $row->nombre;
					$email = $row->email;
					$perfil_id = $row->perfil_id;
                    $baja=$row->baja;

				}
		
                    //ver si escribi bien id_usuario o usuarios//
                    $dat = array('usuarios' =>$datos_usuario,
                                    'id_usuario'=>$id_usuario,
                                    'apellido'=>$apellido,
                                    'nombre'=>$nombre,
                                    'email'=>$email,
                                    'perfil_id'=>$perfil_id,
                                    'baja'=>$baja,

				);
			} 
			else 
			{
				return FALSE;
			}
			if($this->_veri_log()){
			$data = array('titulo' => 'Modificar Usuario');
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('usuarios/modificausuario_view', $dat);
			$this->load->view('front-end/footer_view');
			}else{
			redirect('login', 'refresh');}
		}

		/**
	    * Verifica datos para modificar un producto
	    */
		function modificar_usuario()
		{	
			//Genero las reglas de validacion
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
		
			$this->form_validation->set_rules('apellido', 'Apellido', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			/*-$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|is_unique[usuarios.usuario]');*/
			$this->form_validation->set_rules('perfil_id', 'perfil_id', 'required');
			/*$this->form_validation->set_rules('pass', 'Contraseña','required');
			$this->form_validation->set_rules('re_pass', 'Repetir contraseña', 'required|matches[pass]');*/
				
			//Mensaje de error si no pasan las reglas
			$this->form_validation->set_message('required',	'<div class="alert alert-danger">El campo %s es obligatorio</div>');

			$this->form_validation->set_message('matches',	'<div class="alert alert-danger">Los contraseña ingresada no coincide</div>');

			

			$pass = $this->input->post('re_pass',true);

			//Preparo los datos para guardar en la base, en caso de que pase la validacion
			$data = array(
				
				'apellido'=>$this->input->post('apellido',true),
                'nombre'=>$this->input->post('nombre',true),
				'email'=>$this->input->post('email',true),
				/*'usuario'=>$this->input->post('usuario',true),*/
				'perfil_id'=>$this->input->post('perfil_id',true),
			/*	'pass'=>($pass),*/
                'baja'=>'NO'
			);
			$id_usuario = $this->uri->segment(2);
			$datos_usuario = $this->usuario_model->edit_usuario($id_usuario);

			foreach ($datos_usuario->result() as $row) 
			{
			$id_usuario = $row->id_usuario;}
			

			$dat = array(
				'id_usuario'=>$id_usuario,
				'apellido'=>$this->input->post('apellido',true),
                'nombre'=>$this->input->post('nombre',true),
				'email'=>$this->input->post('email',true),
				'usuario'=>$this->input->post('usuario',true),
				'perfil_id'=>$this->input->post('perfil_id',true),
				'pass'=>($pass),
                'baja'=>'NO'
			);

			if ($this->form_validation->run()==FALSE)
			{
				$data = array('titulo' => 'Error de formulario');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				
				$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('usuarios/modificausuario_view', $dat);
			$this->load->view('front-end/footer_view');
			}
			else
			{

	    		$this->usuario_model->update_usuario($id_usuario, $dat);
	    		redirect('us', 'refresh');
	    	}

		}
			
	    /*
		* Obtiene los datos del producto a eliminar
		$ this-> uri-> segment (n) Permite recuperar un segmento específico. Donde n es el número de segmento que desea recuperar. Los segmentos están numerados de izquierda a derecha. 

		*/
	    function eliminar_usuario(){
	    	$id = $this->uri->segment(2); 
	    	$data = array(
	    		'baja'=>'SI'
	    	);

	    	$this->usuario_model->estado_usuario($id, $data);
	    	redirect('us', 'refresh');
	    }

	    /**
		* Obtiene los datos del producto a activar
		*/
	    function activar_usuario(){
	    	$id = $this->uri->segment(2);
	    	$data = array(
	    		'baja'=>'NO'
	    	);

	    	$this->usuario_model->estado_usuario($id, $data);
	    	redirect('us', 'refresh');
	    }

	    /**
		* Productos eliminados logicamente
		*/
	    function muestra_eliminados()
	    {    	
	    	if($this->_veri_log()){
	    	$data = array('titulo' => 'Usuarios eliminados');
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			
			$dat = array(
		        'usuarios' => $this->usuario_model->not_active_usuarios()
			);

			$this->load->view('front-end/head_view', $data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('usuarios/muestrausuarioseliminados_view', $dat);
			$this->load->view('front-end/footer_view');
			}else{
			redirect('login', 'refresh');}
		}
		
	}