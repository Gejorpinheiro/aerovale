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
}
?>