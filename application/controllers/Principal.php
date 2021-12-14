<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Principal extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			
		
		}
		
		

		public function index(){
			$data = array('titulo' =>'TecnoYA!');
			// esta linea se agrega para que podamos variar el titulo de las paginas
			
			if($this->session->userdata('logged_in')==TRUE){
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id']=$session_data['perfil_id'];
			$data['nombre']=$session_data['nombre'];
			$data['apellido'] = $session_data['apellido'];
			$data['email'] = $session_data['email'];
		
			}
			$this->load->view('front-end/head_view',$data);//cargamos las vistas
			$this->load->view('front-end/navbar_view');
			$this->load->view('Contenido/principal_view');//cargamos carpeta y vista
			$this->load->view('front-end/footer_view');		


		}

		
		
		public function somos(){
			
			$data = array('titulo' =>'Quienes somos');

			if($this->session->userdata('logged_in')==TRUE){					
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			$data['email'] = $session_data['email'];
			}
			$this->load->view('front-end/head_view',$data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('Contenido/qsomos');
			$this->load->view('front-end/footer_view');	
		}
		public function tecnologia(){
			$data= array('titulo' =>'Tecnologia');
			if($this->session->userdata('logged_in')==TRUE){			
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			$data['email'] = $session_data['email'];
			}
			$this->load->view('front-end/head_view',$data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('Contenido/computacion');
			$this->load->view('front-end/footer_view');	
		}
		public function servicios(){
			$data= array('titulo' =>'Servicios');
			if($this->session->userdata('logged_in')==TRUE){
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			$data['email'] = $session_data['email'];
			}	

			$this->load->view('front-end/head_view',$data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('Contenido/servicio');
			$this->load->view('front-end/footer_view');	

		}
		public function consultas(){
			$data= array('titulo' =>'Consulta');
								
			if($this->session->userdata('logged_in')==TRUE){
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id']=$session_data['perfil_id'];
				$data['nombre']=$session_data['nombre'];
				$data['apellido'] = $session_data['apellido'];
				$data['email'] = $session_data['email'];
						
				}

			$this->load->view('front-end/head_view',$data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('Contenido/consultas');
			$this->load->view('front-end/footer_view');			
		}




		public function infocontacto(){
			$data= array('titulo' =>'Contacto');

			if($this->session->userdata('logged_in')==TRUE){						
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			$data['email'] = $session_data['email'];
			
			}
			
			$this->load->view('front-end/head_view',$data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('Contenido/infocontactos');
			$this->load->view('front-end/footer_view');	
		}
		
		
		public function terminos(){
			$data = array('titulo' =>'Terminos y Usos');
			if($this->session->userdata('logged_in')==TRUE){					
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			}
			$this->load->view('front-end/head_view',$data);
			$this->load->view('front-end/navbar_view');
			$this->load->view('Contenido/termyusos');
			$this->load->view('front-end/footer_view');	
		}

	/*	
		}*/
		

		public function login(){
			$data = array('titulo'=>'Ingresar'); 
			if($this->session->userdata('logged_in')==TRUE){			
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			$data['email'] = $session_data['email'];
			$data['id_usuario'] = $session_data['id_usuario'];
						
			}
			$this->load->view('front-end/head_view',$data);
			$this->load->view('front-end/navbar_view'); 
			$this->load->view('Contenido/login'); 
			$this->load->view('front-end/footer_view');
			}
			
			public function us_logueado(){
				$data=array('titulo'=>'Usuario Logueado'); 
				
				//- agregamos la secion data y asiganmos un nombre logged_in y el perfil-->
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
				$data['email'] = $session_data['email'];
				$data['id_usuario'] = $session_data['id_usuario'];
				$data['satisfatorio'] = $session_data['satisfactorio'];	
				$this->load->view('front-end/head_view',$data);
				$this->load->view('front-end/navbar_view');
				$this->load->view('Contenido/principal_view'); 
				$this->load->view('front-end/footer_view');
				}


		public function registrar(){
			$data=array('titulo'=>'Registrarse');
			
			if($this->session->userdata('logged_in')==TRUE){
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			$data['email'] = $session_data['email'];
						
			}
			$this->load->view('front-end/head_view',$data);
			$this->load->view('front-end/navbar_view'); 
			$this->load->view('Contenido/registrar'); 
			$this->load->view('front-end/footer_view');
			}

			public function logout()
		{    //salir
			$this->session->unset_userdata('logged_in');
        	session_destroy();
			//Pagina que carga despues del logout
			redirect('principal_view');
		}

	public function fpago_compra(){
			$data = array('titulo' => 'Confirmar compra');
	
	$session_data = $this->session->userdata('logged_in');
	$data['perfil_id'] = $session_data['perfil_id'];
	$data['nombre'] = $session_data['nombre'];
	$data['apellido'] = $session_data['apellido'];
	$data['email'] = $session_data['email'];

	

	$this->load->view('head', $data);
	$this->load->view('navbar'); 
	$this->load->view('pagocompra', $data);
	$this->load->view('footer');
}

	

	/*<!----------------------------------------admin y cliente-------->*/
 
	
	}