<?php 

require "../../functions.php";

$id = $_GET["id_anggaran"];

if( hapusAnggaran($id) > 0 ){
	echo "
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'anggaran.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Data gagal dihapus');
			document.location.href = 'anggaranphp';
		</script>
	";
 }
?>