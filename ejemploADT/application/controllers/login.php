<?php if (! defined('BASEPATH')) exit('No direct acript access allowed') {

/**
* 
*/
class Login  extends CI_Controller{
	
 


	public function __construct()
	{
		parent::__construct();

	}
	public function index(){


		if (isset($_POST['password'])) {
		$this->load->model('usuario_model');
		if($this->usuario_model->login($_POST['Userame'],md5($_POST['Password']))){
			redirect('welcome');


		}else{
			redirect('login#bad-password')

		}

}


		$this->load->view('pagina/login/login/login');


	}