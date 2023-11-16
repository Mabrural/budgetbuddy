<?php 

// Check if the form is submitted
if(isset($_POST["submit"])) {
    // Check if "id_anggaran" is set before using it
    $id_tagihan = isset($_POST["id_tagihan"]) ? $_POST["id_tagihan"] : null;

    if ($id_tagihan !== null && hapusTagihan($id_tagihan) > 0 ){
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = '?page=tagihan';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = '?page=tagihan';
            </script>
        ";
    }
}

 ?>