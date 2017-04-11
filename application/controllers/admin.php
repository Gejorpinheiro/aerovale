<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
		}

		public function index(){
			$this->form_validation->set_rules('user', '', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('pswd', '', 'trim|required|min_length[6]');

			if ($this->form_validation->run() == FALSE) {
				if(validation_errors()){
					// set_msg(validation_errors());
					echo "erro";
				}
			} else {
				$dados_login = $this->input->post();
				var_dump($dados_login);
			}
			$this->load->view('painel/login');
		}
	}
?>