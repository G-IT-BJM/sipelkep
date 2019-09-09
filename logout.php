<?php 
    include "koneksi.php";

    session_start(); 
    session_destroy(); 
    echo "
        <script>
            alert('Berhasil Keluar . . . ');
            window.location = 'beranda.php';
        </script>
    ";
?>