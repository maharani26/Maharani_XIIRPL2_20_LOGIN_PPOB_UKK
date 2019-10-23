<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body style="margin-top: 0px; margin-left:250px; background-image: url(<?=base_url()?>assets/bg/p.png); background-size:cover;">

		<h1 style="margin-top:90px;">KATALOG SPORT.ID</h1>

		<?php if($this->session->flashdata('pesan')): ?>


			<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>


		<?php endif?>



		<?php if($this->session->userdata('level')=="admin"){?>
		<br><a href="#tambah" class="btn btn-primary" data-toggle="modal" style="float: right;">Tambah</a><br><br>

		<?php }?>
		<table class="table table-hover table-stripped">

			<thead>

				<tr>

					<td>No</td>
					<td>Kode sepeda</td>
					<td>Nama sepeda</td>
					<td>Kategori</td>
					<td>Merk</td>
					<td>Foto Sepeda</td>
					<td>Stok</td>
					<td>Harga</td>
					<!-- <td>Aksi</td> -->

				</tr>

			</thead>

			<tbody>


				<?php $no = 0; foreach($sepeda as $bk): $no++;?>

				<tr>

					<td><?=$no?></td>
					<td><?=$bk->kode_sepeda?></td>
					<td><?=$bk->nama_sepeda?></td>
					<td><?=$bk->nama_kategori?></td>
					<td><?=$bk->merk?></td>
					<td><img src="<?=base_url('assets/gambar/'.$bk->cover)?>" style="width:60px; height:50px;"></td>
					<td><?=$bk->stok?></td>
					<td><?=$bk->harga?></td>


					<td><?php if($this->session->userdata('level')=="admin"){?>
					<a href="#ubah" data-toggle="modal" onclick="edit(<?=$bk->kode_sepeda?>)"  class="btn btn-warning">Ubah</a>
					<?php }else{ 		echo ""; }?></td>

					<td><?php if($this->session->userdata('level')=="admin"){?>
					<a href="<?=base_url('index.php/sepeda/hapus/'.$bk->kode_sepeda)?>" onclick="return confirm('Are you sure?')"
					class="btn btn-danger">Hapus</a><?php }else{ echo ""; }?></td>

				</tr>
			<?php endforeach?>

		</tbody>
		</table>


		<div class="modal fade" id="tambah" >
			<div class="modal-dialog">

				<div class="modal-content">
					<div class="modal-header">


					<div class="row">

					<div class="col-md-6">
						<div class="modal-title">Tambah sepeda</div>
					</div>
					<div class="col-md-6">
						<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
						</div>

						</div>

					</div>

					<div class="modal-body">


						<form action="<?=base_url('index.php/sepeda/tambah')?>" method="post" enctype="multipart/form-data">

							<table>

								<tr>
									<td>Nama sepeda</td>
									<td><input type="text" name="nama_sepeda" style="margin-left: 20px;"></td>
								</tr>

								<!-- <tr>
									<td>Size</td>
									<td><input type="number" name="size" style="margin-left: 20px;"></td>
								</tr> -->

								<tr>
									<td>Kategori</td>
									<td>


										<select name="kategori" style="margin-left: 20px; ">
											<?php foreach ($kategori as $kt): ?>

												<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
											<?php endforeach?>
										</select>
									</td>
								</tr>

								<tr>
									<td>Merk</td>
									<td><input type="text" name="merk" style="margin-left: 20px;"></td>
								</tr>

								<tr>
									<td>Foto Sepeda</td>
									<td><input type="file" name="cover" style="margin-left: 20px;"></td>
								</tr>

								<tr>
									<td>Stok</td>
									<td><input type="number" name="stok" style="margin-left: 20px;"></td>
								</tr>

								<tr>
									<td>Harga</td>
									<td><input type="number" name="harga" style="margin-left: 20px;"></td>
								</tr>

							</table>


							<center><input type="submit" name="tambah" value="tambah" class="btn btn-warning" style="margin-top: 30px;"></center>

						</form>

					</div>
				</div>
			</div>

		</div>



		<div class="modal fade" id="ubah" >
			<div class="modal-dialog">

				<div class="modal-content">
					<div class="modal-header">

						<div class="row">

					<div class="col-md-6">
						<div class="modal-title">Ubah sepeda</div>
					</div>
					<div class="col-md-6">
						<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
						</div>

						</div>
					</div>

					<div class="modal-body">


						<form action="<?=base_url('index.php/sepeda/update')?>" method="post" enctype="multipart/form-data">

							<table>

								<input type="hidden" name="kode_sepeda" required id="kode_sepeda" style="margin-left: 20px;">

								<tr>
									<td>Nama sepeda</td>
									<td><input type="text" name="nama_sepeda"  required  id="nama_sepeda" style="margin-left: 20px;"></td>
								</tr>

								<tr>
									<td>Kategori</td>
									<td>


										<select name="kategori" style="margin-left: 20px; " id="kategori" required >
											<?php foreach ($kategori as $kt): ?>

												<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
											<?php endforeach?>
										</select>
									</td>
								</tr>

								<tr>
									<td>Merk</td>
									<td><input type="text" name="merk"  required id="merk" style="margin-left: 20px;"></td>
								</tr>

								<tr>
									<td>Foto Sepeda</td>
									<td><input type="file" name="cover" style="margin-left: 20px;"></td>
								</tr>


								<tr>
								<td>Stok</td>
								<td><input type="number" name="stok" required  id="stok" style="margin-left: 20px;"></td>
								</tr>

								<tr>
									<td>Harga</td>
									<td><input type="number" name="harga" required  id="harga" style="margin-left: 20px;"></td>
								</tr>


							</table>


							<center><input type="submit" value="Ubah" name="update" required  class="btn btn-warning" style="margin-top: 30px;"></center>

						</form>

					</div>
				</div>
			</div>

		</div>


		<script >


			function edit(kode_sepeda){
				$.ajax({
					type:"post",
					url:"<?=base_url()?>index.php/sepeda/tampil_ubah_sepeda/"+kode_sepeda,
					dataType:"json",


					success:function(data){
						$("#kode_sepeda").val(data.kode_sepeda);
						$("#nama_sepeda").val(data.nama_sepeda);
						$("#kategori").val(data.kode_kategori);
						$("#merk").val(data.merk);
						$("#stok").val(data.stok);
						$("#harga").val(data.harga);

					}
				});
			}

		</script>


	</body>
</html>
