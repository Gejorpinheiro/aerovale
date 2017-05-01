<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	if(!function_exists('set_msg')){
		function set_msg($msg = NULL){
			$ci =& get_instance();
			$ci->session->set_userdata('aviso', $msg);
		}
	}

	if(!function_exists('get_msg')){
		function get_msg($destroy = TRUE){
			$ci =& get_instance();
			$retorno = $ci->session->userdata('aviso');
			if($destroy) $ci->session->unset_userdata('aviso');
			return $retorno;
		}
	}

	if(!function_exists('verifica_login')){
		function verifica_login($redirect = 'admin/'){
			$ci =& get_instance();
			if($ci->session->userdata('logged') != TRUE){
				set_msg('<p>acesso restrito, faça login</p>');
				redirect($redirect,'refresh');
			}else{
				return true;
			}
		}
	}

	if(!function_exists('config_upload')){
		function config_upload($path = './uploads/', $types = 'jpg|png', $size = 800){
			$config['upload_path'] = $path;
			$config['allowed_types'] = $types;
			$config['max_size']  = $size;
			return $config;
		}
	}

	if(!function_exists('toDb')){
		function toDb($string = NULL){
			return htmlentities($string);
		}
	}

	if(!function_exists('toHtml')){
		function toHtml($string = NULL){
			return html_entity_decode($string);
		}
	}
?>