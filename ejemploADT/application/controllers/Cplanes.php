<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cplanes extends CI_Controller {

	var $user;

	function __construct() {
        parent::__construct();
    }

	public function index() {
		redirect('Abmin/home');
	}

	public function home() {		
		$this->load->view('admin/home', $data );
	}

	public function planes() {
		$data['listAreas'] = $this->Planes->listar();
		$this->load->view('admin/planes', $data );
	}

	// INICIO FUNCIONES DE AREAS

	public function agregar() {
		if ( ! $this->input->post('descripcion', 'valor'))
		{
			redirect('index.php/Abmin/planes');
		} else {
			$descripcion = $this->input->post('descripcion');
			if (! $this->input->post('idd')) {
				if(!$this->Area->existe(0, $descripcion)) {
					$dat = array('descripcion' => $descripcion);
					$this->Area->insertar($dat);
				} else {
					//$this->session->set_userdata('msg', 'Equipo ya existe. Verifique datos');
				}
			} else {
				$idd = $this->input->post('idd');
				$dat = array('descripcion' => $descripcion);
				$this->Area->actualizar($dat, $idd);
				//$this->session->set_userdata('msg', 'Equipo '. $nombre . '(' . $region . ') editado correctamente');
			}
			redirect('index.php/Abmin/planes');
		}
	}

	public function listarFiltroPlanes() {
		if ($this->input->post('key')) {
			$data = $this->Planes->listar_filtro($this->input->post('key'));
			foreach ($data as $valor) {
			    echo $valor['area_id'] . "::::" . $valor['descripcion'] . "----";
			}
			
		}
	}

	public function eliminar() {
		if ($this->input->post('key')) {
			$idd = $this->input->post('key');
			$this->Planes->eliminar($idd);
		}
	}
}
