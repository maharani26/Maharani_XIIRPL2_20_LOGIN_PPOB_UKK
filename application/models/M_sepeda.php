
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sepeda extends CI_Model {

	public function ambilsepeda(){
			$ambilsepeda = $this->db->join('kategori', 'kategori.kode_kategori = sepeda.kode_kategori')->get('sepeda')->result();

			return $ambilsepeda;
	}


	public function ambilkategori(){

			$ambilkategori = $this->db->get('kategori')->result();

			return $ambilkategori;
	}

	public function tambah($nama_file){

	if($nama_file == ""){

			$tambah = array(
				'nama_sepeda' => $this->input->post('nama_sepeda'),
				'kode_kategori' => $this->input->post('kategori'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
				'merk' => $this->input->post('merk'),
				 );

	}else{

		$tambah = array(
				'nama_sepeda' => $this->input->post('nama_sepeda'),
				'kode_kategori' => $this->input->post('kategori'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
				'merk' => $this->input->post('merk'),
				'cover' => $nama_file,
				 );

	}
	return $this->db->insert('sepeda', $tambah);
	}

public function tampil_ubah_sepeda($kode_sepeda){
		return $this->db->join('kategori', 'kategori.kode_kategori = sepeda.kode_kategori')->where('kode_sepeda',$kode_sepeda)->get('sepeda')->row();

	}



public function update(){
			$ubah = array(
				'nama_sepeda' => $this->input->post('nama_sepeda'),
				'kode_kategori' => $this->input->post('kategori'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
				'merk' => $this->input->post('merk'),
				 );

			return $this->db->where('kode_sepeda',$this->input->post('kode_sepeda'))->update('sepeda', $ubah);

}


public function update_ft($nama_file){
				$ubah = array(
				'nama_sepeda' => $this->input->post('nama_sepeda'),
				'kode_kategori' => $this->input->post('kategori'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
				'merk' => $this->input->post('merk'),
				'cover' => $nama_file,
				 );

		return $this->db->where('kode_sepeda',$this->input->post('kode_sepeda'))->update('sepeda', $ubah);





}


public function hapus($kode_sepeda ){
	return $this->db->where('kode_sepeda',$kode_sepeda)->delete('sepeda');
}




public function ambilsepedacart($kode_sepeda){
	return $this->db->where('kode_sepeda',$kode_sepeda )->get('sepeda')->row();

}

}

/* End of file M_sepeda.php */
/* Location: ./application/models/M_sepeda.php */

?>
