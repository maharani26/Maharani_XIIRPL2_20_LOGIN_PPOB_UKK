

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_sepeda','mbk');
	}

	public function index()
	{

	}


	public function tambah_cart($kode_sepeda){

		$bk = $this->mbk->ambilsepedacart($kode_sepeda);

		$stok =$bk->stok;

		if($stok == 0){

			$this->session->set_flashdata('pesan', 'Maaf stok Anda Habis Silahkan Hubungi Admin');
			redirect('Transaksi','refresh');

		}else{

			$data = array(
				'id'      => $bk->kode_sepeda,
				'qty'     => 1,
				'price'   => $bk->harga,
				'name'    => $bk->nama_sepeda,

				);

			$this->cart->insert($data);
			redirect('Transaksi','refresh');

		}

	}


	public function hapus_cart($kode_cart){
		$data = array(
			'rowid' => $kode_cart,
			'qty'   => 0
			);

		$this->cart->update($data);


		redirect('Transaksi','refresh');
	}


	public function hapus_semua_cart(){

		$this->cart->destroy();
		redirect('Transaksi','refresh');
	}



}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */

?>
