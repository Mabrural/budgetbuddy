

<div class="col-md-12 col-lg-12 ">
	<div class="table table-responsive">
			<a href="?page=tambahCatatan" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahCatatan"><i class="fas fa-plus fa-sm"></i> Tambah</a> <br><br>
			<form class="d-flex col-lg-4 col-md-4 col-sm-12" role="search" action="" method="post">
	        	<input class="form-control me-2" type="search" placeholder="Pencarian" aria-label="Search" name="keyword">
	       		<button class="btn btn-outline-dark bg-dark" type="submit" name="cari"><i class="fa-solid fa-magnifying-glass bg-dark text-white fa-sm"></i></button>
	    	</form>
			<br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Tanggal Catatan</th>
						<th scope="col">Nominal</th>
						<th scope="col">Anggaran</th>
						<th scope="col">Kategori</th>
						<th scope="col">Keterangan</th>
						<th colspan="3" scope="col">Aksi</th>
					</tr>
				</thead>

				<?php 

						$query = mysqli_query($koneksi, "SELECT * FROM catatan_pengeluaran JOIN anggaran ON catatan_pengeluaran.id_anggaran = anggaran.id_anggaran JOIN kategori ON catatan_pengeluaran.id_kategori=kategori.id_kategori WHERE catatan_pengeluaran.id_kategori = kategori.id_kategori AND catatan_pengeluaran.id_anggaran = anggaran.id_anggaran AND catatan_pengeluaran.id_catatan");
						// $query = mysqli_query($koneksi, "SELECT catatan_pengeluaran.tgl_catatan, catatan_pengeluaran.nominal, anggaran.nama_anggaran, kategori.nama_kategori, catatan_pengeluaran.keterangan FROM catatan_pengeluaran JOIN anggaran ON JOIN kategori WHERE catatan_pengeluaran.id_kategori = kategori.id_kategori AND catatan_pengeluaran.id_anggaran = anggaran.id_anggaran AND catatan_pengeluaran.id_catatan");
						$no = 1;
						while($data = mysqli_fetch_assoc($query)) {

				?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $data['tgl_catatan']; ?></td>
					<td><?= $data['nominal']; ?></td>
					<td><?= $data['nama_anggaran']; ?></td>
					<td><?= $data['nama_kategori']; ?></td>
					<td><?= $data['keterangan']; ?></td>
					<td>
						<i class="fas fa-edit bg-warning p-2 text-white rounded"></i>
						<a href="?page=ubahCatatan&id_catatan=<?= $data['id_catatan'];?>" data-bs-toggle="modal" data-bs-target="#ubahCatatan<?= $no; ?>">Edit</a>
						<i class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i>
						<a href="?form=hapusCatatan&id_catatan=<?= $data['id_catatan'];?>" data-bs-toggle="modal" data-bs-target="#hapusCatatan<?= $no; ?>">Delete</a>
					</td>
				</tr>

<!-- Ubah dengan Modals -->
<form action="index.php?form=ubahCatatan" method="post">
	<div class="modal fade" id="ubahCatatan<?= $no; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Anggaran</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        
			<div class="form-row">
				<input type="hidden" name="aksi" value="ubah">
				<input type="hidden" name="id_anggaran_lama" value="<?= $data["id_anggaran"];?>">
				<div class="form-group col-md-12">
					<label >Nama Anggaran</label>
					<input type="text" name="nama_anggaran" class="form-control" id="nama_anggaran" value="<?= $data["nama_anggaran"];?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label >Nominal</label>
					<input type="text" name="nominal" class="form-control" id="nominal" value="<?= $data["nominal"];?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label >Tanggal Mulai</label>
					<input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" value="<?= $data["tgl_mulai"];?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label >Tanggal Selesai</label>
					<input type="date" name="tgl_akhir" class="form-control" id="tgl_anggaran" value="<?= $data["tgl_akhir"];?>" required>
				</div>
			</div>
			<br>
		
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="submit">Ubah</button>
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
	      </div>
	    </div>
	</div>
	</div>
</form>
<!-- Ubah dengan Modals -->

<!-- hapus dengan modals -->
<form action="index.php?form=hapusAnggaran" method="post">
	 <div class="modal fade" id="hapusAnggaran<?= $no; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body" align="center">

	        <h5 align="center">Apakah anda yakin ingin menghapus? </h5>
	        <input type="hidden" name="id_anggaran" value="<?= $data['id_anggaran'] ?>">
	        <span class="text-danger"><?= $data['nama_anggaran']?> - <?= $data['nama_anggaran']?></span><br><br>
	        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Tidak</button>
	        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="submit"><i class="fa-solid fa-check"></i> Yakin</button>
	        
	      </div>

	    </div>
	  </div>
	</div>
</form>
<!-- hapus dengan modlas -->

				<?php 
					}
				 ?>
			</table>
	</div>
</div>









