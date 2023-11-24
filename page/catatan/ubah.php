<?php 

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	


	// cek apakah data berhasil diubah atau tidak
	if(ubahCatatan($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = '?page=catatan';
			</script>
		";
	} else{
		echo "
			<script>
				alert('Data gagal diubah!');
				document.location.href = '?page=catatan';
			</script>
		";
	}

}

 ?>