<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require "functions.php";



// tombol cari ditekan
// if (isset($_POST['cari'])){
// 	$mahasiswa = cari($_POST["keyword"]);
// }


 ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Budget Buddy</title>
    <!-- bootstrap css repository offline-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.min.css">
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

<body>
    <!-- bootstrap js repository offline -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- bootstrap js repository online -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

<nav class="navbar navbar-expand-lg bg-success fixed-top shadow-sm navbar-dark">
  <div class="container col-md-6">
    <a class="navbar-brand" href="#" style="color: white;"><i class="fas fa-solid fas fa-wallet fa-lg"></i> BudgetBuddy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav navbar-text">
        <li class="nav-item">
          <a class="nav-link" style="color: white;" aria-current="page" href="index.php"><i class="fas fa-home fa-lg"></i> Menu Utama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: white;" href="page/anggaran/anggaran.php"><i class="fas fa-sitemap fa-lg"></i> Anggaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: white;" href="page/tagihan/tagihan.php"><i class="fas fa-money-bill-wave fa-lg"></i> Tagihan</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lainnya
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="page/catatan/catatan.php"><i class="fas fa-pen fa-sm"></i> Pencatatan Pengeluaran</a></li>
            <li><a class="dropdown-item" href="page/laporan/laporan.php"><i class="fas fa-solid fa-chart-bar fa-sm"></i> Laporan Keuangan</a></li>
          </ul>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-regular fa-circle-user fa-lg"></i> Saya
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"> Username</a></li>
            <li><a class="dropdown-item" href="page/profil/profil.php"><i class="fas fa-user-pen fa-sm"></i> Profil</a></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-right-to-bracket"></i> Keluar</a></li>
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
                   Halo,  username 
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
        <div class="card-container mt-2 p-5 bg-body-tertiary rounded">
          <div id="carouselExample" class="carousel slide offset-lg-0">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/picture1.jpg" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img src="img/picture2.jpg" class="d-block w-100">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <br>
          <h1>Budget Buddy</h1>
          <p>Budget Buddy adalah sebuah aplikasi berbasis website yang dibuat untuk membantu individu dan keluarga mengelola keuangannya dengan lebih baik. 
          Pengelolaan keuangan yang baik dapat membantu pengguna untuk melacak pengeluaran secara akurat.</p>

          <p>Saat ini, masih banyak individu dan keluarga yang belum memiliki sistem untuk mengelola keuangannya. Akibatnya, mereka sering mengalami kesulitan untuk melacak pengeluaran dan melihat laporan keuangannya. Sistem aplikasi berbasis website Budget Buddy diharapkan dapat menjadi solusi untuk mengatasi masalah tersebut. 
          Sistem ini menawarkan fitur-fitur yang mudah digunakan dan dapat membantu pengguna untuk mengelola keuangannya dengan lebih baik.
          </p>
        </div>
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
        </div><br><br> <br><br>
      </div>
      
  




    </div>
  </div>
</div>
  


                






</body>

<br><br>
<footer class="py-3 my-0 pt-4 pb-2 fixed-bottom bg-dark">
    <p class="text-center" style="color: white; font-size: 9pt;">© 2023 Kelompok 1 - Teknologi Rekayasa Perangkat Lunak</p>
</footer>

</html>