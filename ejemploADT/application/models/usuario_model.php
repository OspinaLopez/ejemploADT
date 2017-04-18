<?php if (! defined('BASEPATH')) exit('No direct acript access allowed') {

/**
* 
*/
class Usuario_model  extends CI_Model {
	
 
 public $variable;

	public function __construct()
	{
		parent::__construct();

	}
	public function login($nombre, $clave)


	$this->db->where('nombre' , $nombre);
	$this->db->where('clave', $clave);
	$q = $this->db->get('usuarios');
	if ($q->num_rows()>0)
	 {
	return true;

	}else
{
	return false;
}
}
}