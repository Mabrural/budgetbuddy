

<div class="col-md-12 col-lg-12 ">
<h4 class="text-center">Laporan Keuangan</h4>
				<hr>
        
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
              <select class="form-select" aria-label="Default select example">
                  <option value="1">Semua</option>
                  <option value="1">Makanan</option>
                  <option value="2">Transportasi</option>
                  <option value="3">Asuransi</option>
                  <option value="3">Belanja</option>
                  <option value="3">Elektronik</option>
                  <option value="3">Hadiah</option>
                  <option value="3">Hewan Peliharaan</option>
                  <option value="3">Hiburan</option>
                  <option value="3">Kantor</option>
                  <option value="3">Kecantikan</option>
                  <option value="3">Bayi</option>
                  <option value="3">Kesehatan</option>
                  <option value="3">Olahraga</option>
                  <option value="3">Pajak</option>
                  <option value="3">Pendidikan</option>
                  <option value="3">Rumah</option>
                  <option value="3">Tagihan</option>
              </select>
        </div>
        </div>
          <a href="tambah.php"><button class="btn btn-success btn-sm "><i class="fas fa-eye fa-sm"></i> Tampilkan</button></a>
          <a href="export.php"><button class="btn btn-success btn-sm"><i class="fas fa-download fa-sm"></i> Ekspor ke Excel</button></a>        
        <br>

				<div class="card-body tab table-responsive" style="height: 500px;">
					<table class="table table-hover table-responsive overflow-scroll">
					  <thead>
						<tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Total Pengeluaran</th>
              <th scope="col">Aksi</th>
            </tr>
					  </thead>
					  <tbody>
						<tr>
              <td>1</td>
              <td>Makanan</td>
              <td>1.500.000</td>
              <td>
                <!-- Button trigger modal -->
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal1">Detail</a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <tr>
                                <td>1</td>
                                <td>23/10/2023</td>
                                <td>Nasi Ayam Penyet 2</td>
                                <td>30.000</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>24/10/2023</td>
                                <td>Nasi Ayam Bakar 2</td>
                                <td>30.000</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>25/10/2023</td>
                                <td>Nasi Ayam Sambal 2</td>
                                <td>30.000</td>
                              </tr>
                              <tr>
                                <td>4</td>
                                <td>26/10/2023</td>
                                <td>Nasi Ayam Penyet 2</td>
                                <td>30.000</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td rowspan="3"><b>Total Pengeluaran</b></td>
                                
                                <td> <b>1.500.000</b></td>
                              </tr>
                              
                              
                              
                            </tbody>
                          </table>
                      </div>  
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>

            <tr>
              <td>2</td>
              <td>Transportasi</td>
              <td>500.000</td>
              <td><a href="#">Detail</a></td>
            <tr>
              <td>3</td>
              <td>Pendidikan</td>
              <td>1.000.000</td>
              <td><a href="#">Detail</a></td>
            </tr>
            
            
  
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