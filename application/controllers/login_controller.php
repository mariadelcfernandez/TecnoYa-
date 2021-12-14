<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }
    function index()
    { //Reglas de validación
        $this->form_validation->set_rules('usuario', 'Usuario', 'trim|required');
        $this->form_validation->set_rules('pass', 'Contraseña', 'trim|required|callback__valid_login');
        //Mensajes en caso de error, ademas el valid_login es una funcion que va a validar valid_user  le pasa a la consulta de usuario el password y username, si existe recien ahi arma la variable 
        $this->form_validation->set_message('required', 'elcampo %s es requerido');
        $this->form_validation->set_message('_valid_login', 'El usuario o contraseña son incorrectos');
        $this->form_validation->set_message('is_unique', 'El campo %s ya existe');
        //Forma en que muestra los mensajes de error
        $this->form_validation->set_error_delimiters('<ul><li>', '</li></ul>');
        

        if (($this->form_validation->run() == FALSE)){ //En caso de que falle la validacion vuelve acargar la pagina de Login
            $data = array('titulo' => 'Error de datos');
            $this->load->view('front-end/head_view', $data);
            $this->load->view('front-end/navbar_view');
            $this->load->view('Contenido/login');
            $this->load->view('front-end/footer_view');
        } else { //Pagina que carga despues de loguearse
            //redirect(current_url()); ---> Vuelve a lapagina que estaba antes de loguearse
           // redirect('panel');
            redirect('panel');
        }
    }
   public function _valid_login($password)
    {
        //Se validaron los campos exitosamente. Se valida con la base de datos
        $username = $this->input->post('usuario');
       $session_data=$this->input->post('baja');
        //Consulta a la base
        $result = $this->login_model->valid_user($username,$password,$session_data);
        if ($result) { //Si el resultado es correcto lo asigna a la variable session

            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id_usuario' => $row->id_usuario,
                    'apellido' => $row->apellido, //todos los rows seria el nombre de los atributos de la tabla 
                    'nombre' => $row->nombre,
                    'email' => $row->email,
                    'usuario' => $row->usuario,
                    'perfil_id' => $row->perfil_id,
                    'baja'=> $row->baja='NO',
                    'satisfactorio'=>'El usuario se a logueado correctamente',
                );
                $this->session->set_userdata('logged_in', $sess_array);
               
            }
            return TRUE;
        } else //Sino devuelve que los datos no coinciden
        {
            $this->form_validation->set_message('check_database', '<div class="alert alertdanger">Usuario o Contraseña invalido</div>');
            return false;
        }
    }


    
}
/* End of file login_controller.php */
/* Location: ./application/controllers/back/login_controller.php */