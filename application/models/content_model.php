<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function update_content($dados){
		$query = $this->db->get('content', 1);
		
		if($query->num_rows() > 0){
			$this->db->set('titulo', $dados['titulo']);
			$this->db->set('texto', $dados['texto']);
			$this->db->set('imagem', $dados['imagem']);
			$this->db->update('content');
			return $this->db->affected_rows();
		} else{
			$this->db->insert('content', $dados);
			return $this->db->insert_id();
		}
	}

	public function get_content(){
		$query = $this->db->get('content');

		if($query->num_rows() > 0){
			return $query->row();
		} else{
			return false;
		}
	}
}
?>