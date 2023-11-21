<?php 

// Check if the form is submitted
if(isset($_POST["submit"])) {
    // Check if "id_anggaran" is set before using it
    $id_catatan = isset($_POST["id_catatan"]) ? $_POST["id_catatan"] : null;

    if ($id_catatan !== null && hapusCatatan($id_catatan) > 0 ){
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = '?page=catatan';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = '?page=catatan';
            </script>
        ";
    }
}

 ?>