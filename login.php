<?php 

session_start();

if (isset($_SESSION["login"])) {
    
	header("Location: index.php");
	exit;
}

require 'koneksi.php';

if (isset($_POST['login'])) {
	

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username = '$username'");

	// cek username
	if (mysqli_num_rows($result) === 1 ) {

		//cek password
		$row = mysqli_fetch_assoc($result);
		if  (password_verify($password, $row["password"])){
			// set session
			$_SESSION["login"] = true;
            
            echo 
            "<script>
                alert('Login berhasil!');
                document.location.href = 'index.php';
            </script>";
			// header("Location: index.php");
			exit;
		}
	}

	$error = true;
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Budget Buddy</title>
    <!-- bootstrap css repository offline-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.min.css">

    <!-- untuk repository online -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    
</head>

<body class="login">
    <!-- bootstrap js repository offline -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <div class="global-container mx-auto">
        <div class="card login-form">
            <div class="card-body">
    
                <h2><center>Budget Buddy</center></h2>
            </div>

            <?php if(isset($error)) :?>
               <center> <p style="color: red; font-style: italic;">Username / password salah</p> </center>
            <?php endif; ?>
            
            <form action="" method="post">
                <div class="card-text">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="username" placeholder="" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                <br>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" name="login">Masuk</button>
                </div>
                <br>
                <p>Belum punya akun? <a href="register.php" style=""> Daftar Akun</a></p>
            </form>
           
        </div><br><br>

    </div>
    <br><br><br>
</body>



</html>