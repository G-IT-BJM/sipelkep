<?php 
    include "koneksi.php";

    mysqli_query($conn, "UPDATE tb_admin SET status = 0 WHERE status = 1");
    echo "
        <script>
            alert('Berhasil Keluar . . . ');
            window.location = 'beranda.php';
        </script>
    ";
?>