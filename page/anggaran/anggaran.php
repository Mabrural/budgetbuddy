<?php 

$anggaran = query("SELECT * FROM anggaran ORDER BY id_anggaran ASC");

?>


        <div class="card-container mt-2 p-5 bg-body rounded">
        <h4 class="text-center"><strong>Data Anggaran</strong></h4>
				<hr>
				
				<a href="tambah.php"><button class="btn btn-success btn-sm"><i class="fas fa-plus fa-sm"></i> Tambah</button></a>
        <br>
				<div class="card-body tab table-responsive" style="height: 500px;">
					<table class="table table-hover table-responsive overflow-scroll">
					  <thead>
						<tr>
						  <th scope="col">No</th>
						  <th scope="col">Nama Anggaran</th>
						  <th scope="col">Nominal</th>
						  <th scope="col">Tanggal Mulai</th>
						  <th scope="col">Tanggal Selesai</th>
						  <th scope="col">Aksi</th>
						  <th scope="col">Aksi</th>
						</tr>
					  </thead>
					  <tbody>

          <?php $i = 1; ?>
          <?php foreach($anggaran as $row) : ?>
            
						<tr>
						  <td><?= $i ;?></td>
						  <td><?= $row["nama_anggaran"]; ?></td>
						  <td><?= $row["nominal"]; ?></td>
						  <td><?= $row["tgl_mulai"]; ?></td>
						  <td><?= $row["tgl_akhir"]; ?></td>
						  <td><a href="ubah.php?id_anggaran=<?= $row["id_anggaran"];?>"><button class="btn btn-warning btn-sm"><i class="fas fa-edit fa-sm"></i> Ubah</button></a></td>
						  <td><a href="hapus.php?id_anggaran=<?= $row["id_anggaran"]; ?>" onclick="return confirm('yakin?');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash fa-sm"></i> Hapus</button></a></td>
						</tr>
            <?php $i++ ;?>
          <?php endforeach;?>
  
					  </tbody>
					</table>
          <nav aria-label="Page navigation example" style="margin-left: 170px;">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
				</div>
        <br><br>
             
        </div><br><br>
     
      


     