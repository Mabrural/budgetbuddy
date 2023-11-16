<?php 

// Check if the form is submitted
if(isset($_POST["submit"])) {
    // Check if "id_anggaran" is set before using it
    $id_anggaran = isset($_POST["id_anggaran"]) ? $_POST["id_anggaran"] : null;

    if ($id_anggaran === null  ){
		echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = '?page=anggaran';
            </script>
        ";
	}
		if ($id_anggaran !== null && hapusAnggaran($id_anggaran) > 0 ){
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = '?page=anggaran';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Catatan sudah ada, Anggaran tidak boleh dihapus!');
                document.location.href = '?page=anggaran';
            </script>
        ";
    }
}

 ?>