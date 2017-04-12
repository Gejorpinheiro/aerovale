<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->helper('function');
			$this->load->library('form_validation');
			$this->load->model('user_model', 'user');
		}

		public function index(){
			$this->form_validation->set_rules('user', '', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('pswd', '', 'trim|required|min_length[6]');

			if ($this->form_validation->run() == FALSE) {
				if(validation_errors()){
					set_msg(validation_errors());
				}
			} else {
				$dados = $this->input->post();
				
				if($result = $this->user->get_info($dados['user'])){
					if($dados['pswd'] == $result['senha']){
						$this->session->set_userdata('logged', TRUE);
						$this->session->set_userdata('usuario', $dados['usuario']);

						redirect('admin/main','refresh');
					} else{
						set_msg("<p>senha incorreta</p>");
					}
				} else {
					set_msg("<p>usuário inexistente</p>");
				}
			}
			$this->load->view('painel/login');
		}

		public function main(){
			$this->load->view('painel/index');
		}
	}
?>