<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function index()
	{
		$data['konten']="Kontak";
		$this->load->view('template', $data);
	}

}
?>
