<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sepeda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_sepeda','mbk');
	}

	public function index()
	{
		if($this->session->userdata('level')){

			$data['kategori']=$this->mbk->ambilkategori();
			$data['sepeda']=$this->mbk->ambilsepeda();
			$data['konten']='v_sepeda';
			$this->load->view('template',$data);
		}else{
			redirect('Login','refresh');
		}
	}


	public function tambah(){
		$this->form_validation->set_rules('nama_sepeda', 'nama_sepeda', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('merk', 'merk', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$config['upload_path'] = './assets/gambar';
			$config['allowed_types'] = 'jpg|png';

			if($_FILES['cover']['name'] != ""){

				$this->load->library('upload', $config);


				if(!$this->upload->do_upload('cover')){

					$this->session->set_flashdata('pesan', $this->upload->display_errors());
					redirect('sepeda','refresh');

				}else{

					if($this->mbk->tambah($this->upload->data('file_name'))){

						$this->session->set_flashdata('pesan', 'anda berhasil menambah barang');
					}else{
						$this->session->set_flashdata('pesan', 'anda gagal menambah barang');
					}

					redirect('sepeda','refresh');


				}

			}else{

				if($this->mbk->tambah('')){
					$this->session->set_flashdata('pesan', 'anda berhasil menambah barang');
				}else{
					$this->session->set_flashdata('pesan', 'anda gagal menambah barang');
				}
				redirect('sepeda','refresh');
			}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('sepeda','refresh');
			}
		}

	public function tampil_ubah_sepeda($kode_sepeda){
		$data =  $this->mbk->tampil_ubah_sepeda($kode_sepeda);
		echo json_encode($data);
	}

	public function update(){

		if($this->input->post('update')){

			if($_FILES['cover']['name']==""){

				if($this->mbk->update()){

					$this->session->set_flashdata('pesan', 'sukses ubah data ');
				}else{

					$this->session->set_flashdata('pesan', 'gagal ubah data ');
				}
				redirect('sepeda','refresh');


			}else{


				$config['upload_path'] = './assets/gambar/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('cover')){

					$this->session->set_flashdata('pesan', $this->upload->display_errors());
					redirect('sepeda','refresh');

				}else{


					if($this->mbk->update_ft($this->upload->data('file_name'))){

						$this->session->set_flashdata('pesan', 'sukses ubah data ');

					}else{

						$this->session->set_flashdata('pesan', 'gagal ubah data ');

					}


					redirect('sepeda','refresh');

}
}
				}
			}

	public function hapus($kode_sepeda){
		if($this->mbk->hapus($kode_sepeda)){

			$this->session->set_flashdata('pesan', 'anda berhasil menghapus data sepeda');
			redirect('sepeda','refresh');

		}else{

			$this->session->set_flashdata('pesan', 'anda gagal menghapus data sepeda');
			redirect('sepeda','refresh');
		}
	}
}

/* End of file sepeda.php */
/* Location: ./application/controllers/sepeda.php */


?>
