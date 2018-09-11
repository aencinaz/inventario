<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('usuario_model');
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('usu_login', 'Login', 'required');
		$this->form_validation->set_rules('usu_password', 'Contraseña', 'required');

		if ($this->form_validation->run() == FALSE)
			{
			$data['mensaje']='';//necesario para establecer el menu activo en la cabecera
			$this->load->view('login',$data);

			}
		else
		{
			

				$user_data=$this->usuario_model->get_usuario_access($this->input->post('usu_login'));
				if($user_data == TRUE)
				{
					if($user_data['usu_password']== ($this->input->post('usu_password')))
					{
						$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'id' 	=> 		$user_data['usu_id'],
	                'perfil'		=>		$user_data['usu_perfil'],
	                'nombre' 		=> 		$user_data['usu_nombre'],
	                'apellido' 		=> 		$user_data['usu_apellido'],
	                'login' 		=> 		$user_data['usu_login']

            		);	
						$this->session->set_userdata($data);
						
							$data['menu']='';//necesario para establecer el menu activo en la cabecera
							$this->load->view('cabecera',$data);
							$this->load->view('blank');
							$this->load->view('pie');

					}
					else
					{
						$data['mensaje'] = 'Acceso Denegado passes';
						$this->load->view('login', $data);						
					}
				}
				else
				{		
					$data['mensaje'] = 'Acceso Denegado';
					$this->load->view('login', $data);
				}			



			

		}

	}
	public function cerrar()
	{	
		$data = array(
	                'is_logued_in',
	                'id',
	                'perfil',
	                'nombre',
	                'apellido',
	                'login'
	                );

		$this->session->unset_userdata($data);
		  redirect(base_url()."login");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */