<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskon extends CI_controller {

  public function index()
  {
    $data['konten']="Diskon";
$this->load->view('template', $data);
	}
}
 ?>
