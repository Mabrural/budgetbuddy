<?php 

$host = "localhost";
$user = "root";
$pass = "78789898";
$db = "budget"; //nama database
//melakukan koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
	echo "Gagal konek: " . die(mysqli_error($koneksi));
}


function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

function tambahAnggaran($data) {
	global $koneksi;
	$nama_anggaran = htmlspecialchars($data["nama_anggaran"]);
	$nominal = htmlspecialchars($data["nominal"]);
	$tgl_mulai = htmlspecialchars($data["tgl_mulai"]);
	$tgl_akhir = htmlspecialchars($data["tgl_akhir"]);


	$query = "INSERT INTO anggaran VALUES
			('', '$nama_anggaran', '$nominal', '$tgl_mulai', '$tgl_akhir')";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusAnggaran($id_anggaran) {
	global $koneksi;


	try{
		mysqli_query($koneksi, "DELETE FROM anggaran WHERE id_anggaran='$id_anggaran'");
	}catch(Exception $e){
		return false;
	}

	return mysqli_affected_rows($koneksi);

}

function ubahAnggaran($data) {
	global $koneksi;

	$id_anggaran = htmlspecialchars($data["id_anggaran"]);
	$nama_anggaran = htmlspecialchars($data["nama_anggaran"]);
	$nominal = htmlspecialchars($data["nominal"]);
	$tgl_mulai = htmlspecialchars($data["tgl_mulai"]);
	$tgl_akhir = htmlspecialchars($data["tgl_akhir"]);

	$query = "UPDATE anggaran SET
				nama_anggaran= '$nama_anggaran',
				nominal = '$nominal',
				tgl_mulai = '$tgl_mulai',
				tgl_akhir = '$tgl_akhir'
			  WHERE id_anggaran='$id_anggaran'
			";
			
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);

}

function tambahTagihan($data) {
	global $koneksi;
	$nama_tagihan = htmlspecialchars($data["nama_tagihan"]);
	$nominal = htmlspecialchars($data["nominal"]);
	$tgl_due = htmlspecialchars($data["tgl_due"]);


	$query = "INSERT INTO tagihan VALUES
			('', '$nama_tagihan', '$nominal', '$tgl_due')";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusTagihan($id_tagihan) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM tagihan WHERE id_tagihan=$id_tagihan");

	return mysqli_affected_rows($koneksi);

}

function ubahTagihan($data) {
	global $koneksi;

	$id_tagihan = htmlspecialchars($data["id_tagihan"]);
	$nama_tagihan = htmlspecialchars($data["nama_tagihan"]);
	$nominal= htmlspecialchars($data["nominal"]);
	$tgl_due = htmlspecialchars($data["tgl_due"]);

	$query = "UPDATE tagihan SET
				nama_tagihan= '$nama_tagihan',
				nominal = '$nominal',
				tgl_due = '$tgl_due'
			  WHERE id_tagihan='$id_tagihan'
			";
			
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);

}

function tambahPegawai($data) {
	global $koneksi;
	$nik = htmlspecialchars($data["nik"]);
	$nama = htmlspecialchars($data["nama"]);
	$bagian = htmlspecialchars($data["bagian"]);


	$query = "INSERT INTO pegawai VALUES
			('$nik', '$nama', '$bagian')";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusPegawai($nik) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM pegawai WHERE nik=$nik");

	return mysqli_affected_rows($koneksi);

}

function ubahPegawai($data) {
	global $koneksi;

	$nik = htmlspecialchars($data["nik"]);
	$nik_lama = htmlspecialchars($data["nik_lama"]);
	$nama = htmlspecialchars($data["nama"]);
	$bagian = htmlspecialchars($data["bagian"]);

	$query = "UPDATE pegawai SET
				nik = '$nik',
				nama= '$nama',
				bagian = '$bagian'
			  WHERE nik='$nik_lama'
			";
			
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);

}

function tambahJadwal($data) {
	global $koneksi;
	$matkul = htmlspecialchars($data["matkul"]);
	$hari = mysqli_real_escape_string($koneksi, $data["hari"]);
	$jam = htmlspecialchars($data["jam"]);


	$query = "INSERT INTO jadwal VALUES
			('', '$matkul', '$hari', '$jam')";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusJadwal($id_matkul) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_matkul=$id_matkul");

	return mysqli_affected_rows($koneksi);

}

function ubahJadwal($data) {
	global $koneksi;

	$id_matkul = htmlspecialchars($data["id_matkul"]);
	// $id_lama = htmlspecialchars($data["id_lama"]);	
	$matkul = htmlspecialchars($data["matkul"]);
	$hari = mysqli_real_escape_string($koneksi, $data["hari"]);
	$jam = htmlspecialchars($data["jam"]);

	$query = "UPDATE jadwal SET
				matkul= '$matkul',
				hari = '$hari',
				jam = '$jam'
			  WHERE id_matkul='$id_matkul'
			";
			
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);

}

function registrasi($data){
	global $koneksi;

    $nama = stripcslashes($data["nama_user"]);
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $no_hp = stripcslashes($data["no_hp"]);
    $alamat = stripcslashes($data["alamat"]);
    $email = stripcslashes($data["email"]);
	

	// cek username sudah ada atau belum
	$result = mysqli_query($koneksi, "SELECT username FROM user WHERE username= '$username'");
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
	mysqli_query($koneksi, "INSERT INTO user VALUES('','$nama', '$username', '$password', '$no_hp', '$alamat', '$email')");

	return mysqli_affected_rows($koneksi);
}

 ?>