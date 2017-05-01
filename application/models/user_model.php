<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function get_info($user){
		$this->db->where('usuario', $user);
		$query= $this->db->get('user');
		if($query->num_rows() == 1){
			$row = $query->row();
			return array('usuario' => $row->usuario, 'senha' => $row->senha);
		}
	}

	public function update_info($user, $password){
		$this->db->where('usuario', $this->session->userdata('usuario'));
		$query= $this->db->get('user');
		if($query->num_rows() == 1){
			$this->db->set('usuario', $user);
			$this->db->set('senha', $password);
			$this->db->update('user');
			return $this->db->affected_rows();
		} else{
			return NULL;
		}
	}
}
?>