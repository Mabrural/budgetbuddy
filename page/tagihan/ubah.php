<?php 

// ambil data di URL
// $id_tagihan = $_POST['id_tagihan'];

// query data anggaran berdasarkan nidn
// $tagihan = mysqli_query($koneksi, "SELECT * FROM tagihan WHERE id_tagihan = $id_tagihan");

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	


	// cek apakah data berhasil diubah atau tidak
	if(ubahTagihan($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = '?page=tagihan';
			</script>
		";
	} else{
		echo "
			<script>
				alert('Data gagal diubah!');
				document.location.href = '?page=tagihan';
			</script>
		";
	}

}

 ?>