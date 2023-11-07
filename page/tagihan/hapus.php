<?php 

require "../../functions.php";

$id = $_GET["id_tagihan"];

if( hapusTagihan($id) > 0 ){
	echo "
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'tagihan.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Data gagal dihapus');
			document.location.href = 'tagihan.php';
		</script>
	";
 }
?>