

<div class="col-md-12 col-lg-12 ">
<!-- <h4 class="text-center">Laporan Keuangan</h4>
				<hr> -->
			  <h2 class="text-right" style="float: right; font-size: 25px;">Laporan Keuangan </h2>
       
        
        <center><canvas id="myChart" style="width:100%; max-width:700px min-width: 100px;" class="row-md-12"></canvas></center> 
       
       <br>
				<div class="row">
        <div class="mb-3 card-title col-md-4">
            <label>Tanggal Awal</label>
            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
        </div>

        <div class="mb-3 card-title col-md-4">
            <label>Tanggal Akhir</label>
            <input type="date" class="form-control" id="tgl_awal" name="tgl_akhir">
        </div>

        <div class="mb-3 card-title col-md-4">
          <label>Kategori</label>
          <select class="form-select" aria-label="Default select example" name="id_kategori" id="id_kategori">
						  <option value="">--Pilih--</option>
						  <?php foreach($kategori as $row) : ?>
                <option value="<?= $row['id_kategori'];?>"><?= $row['nama_kategori']; ?></option>
              <?php endforeach;?>
					</select>
        </div>
        </div>
        
        <br>
          <a href="tambah.php"><button class="btn btn-success btn-sm "><i class="fas fa-eye fa-sm"></i> Tampilkan</button></a>
          <a href="export.php"><button class="btn btn-success btn-sm"><i class="fas fa-download fa-sm"></i> Ekspor ke Excel</button></a>        
                
        <br>

				<div class="card-body tab table-responsive" style="height: 500px;">
					<table class="table table-hover table-responsive overflow-scroll">
					  <thead>
						<tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Jumlah Pengeluaran</th>
              <th scope="col">Aksi</th>
            </tr>
					  </thead>
            
            <?php
						  $laporan = mysqli_query($koneksi, "SELECT * FROM catatan_pengeluaran JOIN anggaran ON catatan_pengeluaran.id_anggaran = anggaran.id_anggaran JOIN kategori ON catatan_pengeluaran.id_kategori=kategori.id_kategori WHERE catatan_pengeluaran.id_kategori = kategori.id_kategori AND catatan_pengeluaran.id_anggaran = anggaran.id_anggaran AND catatan_pengeluaran.id_catatan AND catatan_pengeluaran.id_mhs=$id_mhs GROUP BY catatan_pengeluaran.id_kategori");

              $no = 1;
              $total = 0;
              while($data = mysqli_fetch_assoc($laporan)) {
                $nominal = $data['nominal_catatan'];
                $nominal_anggaran = $data['nominal'];
                $total += $nominal;


                // if($data['nama_kategori'] == $data['nama_kategori']){
                //   echo $data['nama_kategori'];
                // }else{
                //   return false;
                // }
            ?>

					  <tbody>
						<tr>
              <td><?= $no++;?></td>
              <td><?= $data['nama_kategori']?></td>
              <td><?= "Rp. ".number_format("$nominal", 2, ",", ".")?></td>
              <td>
                <a href="?page=laporan&id_catatan=<?= $data['id_catatan'];?>" data-bs-toggle="modal" data-bs-target="#detail">Detail</a>
              </td>
            </tr>

					  </tbody>
              <?php
                  }
                ?>
            <div class="row">
              <a style="text-align: right; float: right; color: red;"><strong>Total Pengeluaran : <?= "Rp. ".number_format("$total", 2, ",", ".")?></strong></a>        
              <a style="text-align: right; float: right; color: green; margin-right:15px;"><strong>Total Anggaran : <?= "Rp. ".number_format("$nominal_anggaran", 2, ",", ".")?></strong></a>  
            </div>
					</table>
          <!-- <nav aria-label="Page navigation example" style="margin-left: 170px;">
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
          </nav> -->
				</div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Makanan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card-body tab table-responsive">
          <table class="table table-hover bordered bordered-1">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <th>No</th>
                <th>Tanggal Catatan</th>
                <th>Keterangan</th>
                <th>Nominal</th>
              </tr>

              <?php

                $rincian = mysqli_query($koneksi, "SELECT * FROM catatan_pengeluaran JOIN anggaran ON catatan_pengeluaran.id_anggaran = anggaran.id_anggaran JOIN kategori ON catatan_pengeluaran.id_kategori=kategori.id_kategori WHERE catatan_pengeluaran.id_kategori = kategori.id_kategori AND catatan_pengeluaran.id_anggaran = anggaran.id_anggaran AND catatan_pengeluaran.id_catatan AND catatan_pengeluaran.id_mhs=$id_mhs GROUP BY catatan_pengeluaran.id_kategori=kategori.id_kategori");  
                $no2 = 1;
                while($data = mysqli_fetch_assoc($rincian)) {

              ?>
              <tr>
                <td><?= $no2++?></td>
                <td><?= date('d-m-Y', strtotime($data['tgl_catatan']));?></td>
                <td><?= $data['keterangan'];?></td>
                <td><?= "Rp. ".number_format("$nominal", 2, ",", ".");?></td>
              </tr>
      
             
 
            </tbody>
                <?php
                }
                ?>
               <tr>
                <td></td>
                <td></td>
                <td rowspan="3"><b>Jumlah Pengeluaran</b></td>
                
                <td> <b>1.500.000</b></td>
              </tr>
          </table>
      </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        
      </div>
    </div>
  </div>
</div>

<script>
var xValues = ["Makanan", "Transportasi", "Asuransi", "Belanja", "Elektronik"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    responsive: true,
    title: {
      display: true,
      text: "Budget Buddy"
    }
  }
});
</script>