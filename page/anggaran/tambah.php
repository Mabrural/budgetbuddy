<?php 

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	


	// cek apakah data berhasil ditambahkan atau tidak
	if(tambahAnggaran($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil ditambahkan');
				document.location.href = '?page=anggaran';
			</script>
		";
	} else{
		echo "
			<script>
				alert('Data gagal ditambahkan');
				document.location.href = '?page=anggaran';
			</script>
		";
	}

}

 ?>
