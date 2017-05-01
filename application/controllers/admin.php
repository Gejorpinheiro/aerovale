<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->helper('function');
			$this->load->library('form_validation');
			$this->load->model('user_model', 'user');
			$this->load->model('content_model', 'content');
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
						$this->session->set_userdata('usuario', $dados['user']);

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

		public function user(){
			verifica_login();

			$this->form_validation->set_rules('usuario', '', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('senha', '', 'trim|required|min_length[6]');

			if ($this->form_validation->run() == FALSE) {
				if(validation_errors()){
					set_msg(validation_errors());
				}
			} else {
				$user = $this->input->post();

				if($this->user->update_info($user['usuario'], $user['senha'])){
					set_msg('<p>dados alterados com sucesso</p>');
					$this->session->set_userdata('usuario', $user['usuario']);
				} else{
					set_msg('<p>erro ao alterar os dados</p>');
				}
			}

			$dados['usuario'] = $this->session->userdata('usuario');
			$dados['tela'] = 'settings';
			$this->load->view('painel/index', $dados);
		}

		public function logOut(){
			$this->session->unset_userdata('logged');
			$this->session->unset_userdata('usuario');
			redirect('admin/','refresh');
		}

		public function main(){
			verifica_login();

			$this->form_validation->set_rules('titulo', '', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('texto', '', 'trim|required|min_length[6]');

			if ($this->form_validation->run() == FALSE) {
				if(validation_errors()){
					set_msg(validation_errors());
				}
			} else {
				$this->load->library('upload', config_upload());
				
				if ( ! $this->upload->do_upload('header')){
					$error = $this->upload->display_errors();

					set_msg($error);
				}
				else{
					$file = $this->upload->data('file_name');
					$dados = $this->input->post();

					$old_img = $this->content->get_content();
					unlink('./uploads/'.$old_img->imagem);

					$update['titulo'] = $dados['titulo'];
					$update['texto'] = $dados['texto'];
					$update['imagem'] = $file;

					if(!$this->content->update_content($update)){
						set_msg('<p>erro ao cadastrar o conteúdo</p>');
					} else{
						set_msg('<p>conteudo cadastrado com sucesso</p>');
					}
				}
			}

			$dados['conteudo'] = $this->content->get_content();
			$dados['tela'] = 'main';
			$this->load->view('painel/index', $dados);
		}

		public function box(){
			verifica_login();
			
			$dados['tela'] = 'box';
			$this->load->view('painel/index', $dados);
		}
	}
?>