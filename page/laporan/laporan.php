<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: ../../login.php");
	exit;
}

require "../../functions.php";


?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Budget Buddy</title>
    <!-- bootstrap css repository offline-->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../font-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- untuk repository online -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    
</head>


<style>
    p{
        text-align: justify;
        color: #313238;
    }
    h1{
        color: #313238;
    }
</style>

<body class="bg-light">
    <!-- bootstrap js repository offline -->
    <script src="../../js/bootstrap.bundle.min.js"></script>

    <!-- bootstrap js repository online -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


<nav class="navbar navbar-expand-lg bg-success fixed-top shadow-sm">
  <div class="container col-md-6">
    <a class="navbar-brand" href="#" style="color: white;"><i class="fas fa-solid fas fa-wallet fa-lg"></i> BudgetBuddy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav navbar-text">
        <li class="nav-item">
          <a class="nav-link" style="color: white;" aria-current="page" href="../../index.php"><i class="fas fa-home fa-lg"></i> Menu Utama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: white;" href="../anggaran/anggaran.php"><i class="fas fa-sitemap fa-lg"></i> Anggaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: white;" href="../tagihan/tagihan.php"><i class="fas fa-money-bill-wave fa-lg"></i> Tagihan</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lainnya
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../catatan/catatan.php"><i class="fas fa-pen fa-sm"></i> Pencatatan Pengeluaran</a></li>
            <li><a class="dropdown-item" href="../laporan/laporan.php"><i class="fas fa-solid fa-chart-bar fa-sm"></i> Laporan Keuangan</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-regular fa-circle-user fa-lg"></i> Saya
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"> Username</a></li>
            <li><a class="dropdown-item" href="../profil/profil.php"><i class="fas fa-user-pen fa-sm"></i> Profil</a></li>
            <li><a class="dropdown-item" href="../../logout.php"><i class="fas fa-right-to-bracket"></i> Keluar</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="color: white;" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-bell fa-lg"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Notifikasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>


<div class="container-fluid py-5 bg-primary-subtle">
  <div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12">
          <div class="card-container mt-0 p-2 bg-transparent rounded">
            <div class="mx-auto" style="width: 18rem;">
              <br>
              <div class="accordion" id="accordionExample" style="width: 18rem;">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseZero" aria-expanded="false" aria-controls="collapseZero">
                      Halo, Username
                    </button>
                  </h2>
                  <div id="collapseZero" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body" >
                      <strong>Selamat datang</strong> di Budget Buddy, website yang membantu Anda dalam mengelola keuangan Anda dengan lebih baik. Budget Buddy mempunyai fitur yang dapat membantu Anda membuat anggaran, melacak pengeluaran, dan mencapai tujuan keuangan Anda.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      <div class="col-lg-6 col-md-12 col-sm-12">
        <br>
        <div class="card-container mt-2 p-5 bg-body rounded">
        <h4 class="text-center"><strong>Laporan Keuangan</strong></h4>
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
        <br><br>
             
        </div><br><br>
      </div>
      


      <div class="col-lg-3 col-md-12 col-sm-12">
        <br>
        <div class="card-container mt-0 p-2 bg-transparent rounded overflow-auto">
          <div class="card mx-auto" style="width: 18rem;">
            <div class="accordion" id="accordionExample" style="width: 18rem;">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Daftar Akun
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Pertama-tama anda harus mendaftarkan akun terlebih dahulu. Silahkan klik daftar akun lalu lengkapi form yang tersedia dengan benar, jika sudah klik daftar akun. Apabila daftar akun berhasil akan muncul pop up "Akun berhasil dibuat!". Namun, jika gagal, silahkan cek kembali form yang anda inputkan apakah sudah benar, dan tidak boleh ada form yang kosong.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Login
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Jika anda sudah mempunyai akun, anda bisa mengisi form username dan password yang tersedia di halaman login. Jika username dan password yang dinputkan benar, maka anda akan diarahkan ke halaman utama.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Membuat Anggaran
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Setelah berada di menu utama, anda bisa masuk ke menu anggaran. Setelah itu, anda bisa menambahkan, mengubah, dan menghapus data anggaran.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Membuat Tagihan
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Pada menu tagihan, Anda bisa membuat tagihan baru, mengubah data tagihan, dan bisa menghapus data tagihan. pada menu tagihan ini akan ada notifikasi apabila tanggal yang anda inputkan sudah jatuh tempo. 
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Membuat Catatan Pengeluaran
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Untuk mengelola pengeluaran harian, Anda bisa masuk ke menu Lainnya>Pencatatan Pengeluaran. Kemudian anda bisa menambah catatan, mengubah catatan, dan menghapus catatan pengeluaran.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Melihat Laporan Keuangan
                  </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Untuk melihat laporan keuangan, anda bisa masuk ke menu Lainnya>Laporan Keuangan. Kemudian anda bisa melihat grafik pengeluaran dan anda bisa mengekspor filenya menjadi format excel dengan mengklik tombol Ekspor ke Excel.
                  </div>
                </div>
              </div>
             
            
            </div>

          </div>
        </div><br><br><br><br><br><br>
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




</body>

<footer class="py-3 my-0 pt-4 pb-2 fixed-bottom bg-dark">
    <p class="text-center" style="color: white; font-size: 9pt;">© 2023 Kelompok 1 - Teknologi Rekayasa Perangkat Lunak</p>
</footer>

</html>