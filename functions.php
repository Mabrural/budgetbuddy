<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "78789898", "budget");


function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

function tambah($data) {
	global $conn;
	$nim = htmlspecialchars($data["nim"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	// upload gambar
	$gambar =  upload();
	if (!$gambar) {
		return false;
	}

	$query = "INSERT INTO mahasiswa VALUES
			('', '$nim', '$nama', '$email', '$jurusan', '$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahAnggaran($data) {
	global $conn;
	$nama_anggaran = htmlspecialchars($data["nama_anggaran"]);
	$nominal = htmlspecialchars($data["nominal"]);
	$tgl_mulai = htmlspecialchars($data["tgl_mulai"]);
	$tgl_akhir = htmlspecialchars($data["tgl_akhir"]);


	$query = "INSERT INTO anggaran VALUES
			('', '$nama_anggaran', '$nominal', '$tgl_mulai', '$tgl_akhir')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahTagihan($data) {
	global $conn;
	$nama_tagihan = htmlspecialchars($data["nama_tagihan"]);
	$nominal = htmlspecialchars($data["nominal"]);
	$tgl_due = htmlspecialchars($data["tgl_due"]);


	$query = "INSERT INTO tagihan VALUES
			('', '$nama_tagihan', '$nominal', '$tgl_due')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahCatatan($data) {
	global $conn;
	$tgl_catatan = htmlspecialchars($data["tgl_catatan"]);
	$nominal = htmlspecialchars($data["nominal"]);
	$nama_anggaran = htmlspecialchars($data["nama_anggaran"]);
	$nama_kategori = htmlspecialchars($data["nama_kategori"]);
	$keterangan = htmlspecialchars($data["keterangan"]);


	$query = "INSERT INTO catatan_pengeluaran VALUES
			('$tgl_catatan', '$nominal', '$nama_anggaran', '$nama_kategori', '$keterangan')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function upload(){

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "
			<script>
				alert('pilih gambar terlebih dahulu!');
			</script>
		";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid) ){
		echo "
			<script>
				alert('yang anda upload bukan gambar!');
			</script>
		";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranFile > 1000000){
		echo "
			<script>
				alert('ukuran gambar terlalu besar!');
			</script>
		";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/'. $namaFileBaru);
	return $namaFileBaru;
 }

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");

	return mysqli_affected_rows($conn);

}

function hapusAnggaran($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM anggaran WHERE id_anggaran=$id");

	return mysqli_affected_rows($conn);

}

function hapusTagihan($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tagihan WHERE id_tagihan=$id");

	return mysqli_affected_rows($conn);

}

function ubah($data) {
	global $conn;

	$id = $data["id_user"];
	$nama = htmlspecialchars($data["nama_user"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if ($_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {

		$gambar = upload();
	}

	

	$query = "UPDATE mahasiswa SET
				nim = '$nim',
				nama = '$nama',
				email = '$email',
				jurusan = '$jurusan',
				gambar = '$gambar'
			  WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function ubahAnggaran($data) {
	global $conn;

	$id = $data["id_anggaran"];
	$nama_anggaran = htmlspecialchars($data["nama_anggaran"]);
	$nominal = htmlspecialchars($data["nominal"]);
	$tgl_mulai = htmlspecialchars($data["tgl_mulai"]);
	$tgl_akhir = htmlspecialchars($data["tgl_akhir"]);


	$query = "UPDATE anggaran SET
				nama_anggaran = '$nama_anggaran',
				nominal = '$nominal',
				tgl_mulai = '$tgl_mulai',
				tgl_akhir = '$tgl_akhir'
			  WHERE id_anggaran=$id
			";
			
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function ubahTagihan($data) {
	global $conn;

	$id = $data["id_tagihan"];
	$nama_tagihan= htmlspecialchars($data["nama_tagihan"]);
	$nominal = htmlspecialchars($data["nominal"]);
	$tgl_due = htmlspecialchars($data["tgl_due"]);


	$query = "UPDATE tagihan SET
				nama_tagihan = '$nama_tagihan',
				nominal = '$nominal',
				tgl_due = '$tgl_due'
			  WHERE id_tagihan=$id
			";
			
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function ubahProfil($data) {
	global $conn;

	$id = $data["id_user"];
	$nama = htmlspecialchars($data["nama_user"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$email = htmlspecialchars($data["email"]);
	



	$query = "UPDATE user SET
				nama_user = '$nama',
				username = '$username',
				password = '$password',
				no_hp = '$no_hp',
				alamat = '$alamat'
			  WHERE id_user = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function cari($keyword){
	$query = "SELECT * FROM mahasiswa
				WHERE
			  nama LIKE '%$keyword%' OR 
			  nim LIKE '%$keyword%' OR 
			  email LIKE '%$keyword%' OR
			  jurusan LIKE '%$keyword%'
			";

	return query($query);
}

function registrasi($data){
	global $conn;

    $nama = stripcslashes($data["nama_user"]);
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $no_hp = stripcslashes($data["no_hp"]);
    $alamat = stripcslashes($data["alamat"]);
    $email = stripcslashes($data["email"]);
	

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username= '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "
			<script>
				alert('Username yang dipilih sudah terdaftar!');
			</script>
		";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "
			<script>
				alert('konfirmasi password tidak sesuai!');
			</script>
		";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);


	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('','$nama', '$username', '$password', '$no_hp', '$alamat', '$email')");

	return mysqli_affected_rows($conn);
}


 ?>