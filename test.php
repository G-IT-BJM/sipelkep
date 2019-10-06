<?php

// $files = scandir('img');
// foreach ($files as $file) {
//     if (strpos($file, 'qew') !== false) {
//          echo $file ."</br>";
//     }
// }

// $no_reg = 'qew';

// echo glob("img/qew.*");

// foreach (glob("img/qew.[jpg]") as $file) {
//     echo $file ."</br>";
// }

// function deleteFoto($no_reg)
//     {
        
//         foreach (glob("img/".$no_reg.".*") as $file) {
//             $file;
//         }

//     }

// echo deleteFoto()

// function uploadImg($data)
// {
//     $txt = '';
    
//     foreach ($data as $val) {
//         if ($txt == '') {
//             $txt = "'fc_".$val."'";
//         } else {
//             $txt .= ",'fc_".$val."'";
//         }
//     }
//     return $txt;
// }

// $foto = uploadImg(array('surat_pengantar_rt','ktp','kk'));

// echo $foto;

// $txt='';
// foreach ($foto as $val) {
    
//     if ($txt == '') {
//         $txt = "'fc_".$val."'";
//     } else {
//         $txt .= ",'fc_".$val."'";
//     }

// }

// echo $txt;

// include "koneksi.php";
// error_reporting(0);
// $a = "KDR-00005";
// $sql = mysqli_query($conn,"SHOW TABLES"); // Select all tables
// while($table = mysqli_fetch_array($sql)) {
//      $sqlT = mysqli_query($conn,"SELECT tgl_keluar FROM $table[0] WHERE no_registrasi = '$a'");
//      while($rtable = mysqli_fetch_array($sqlT)) {
//           // data of the table
//         //   echo $table[0];
//         //   echo "<br>";
//         //   echo $rtable["no_surat_pindah"];
//         //   echo "<br>";
//         //   echo $rtable["no_registrasi"];
//         //   echo "<br>";
//           echo $rtable["nik"];
//           echo "<br>";
//           echo $rtable["tgl_keluar"];
//           echo "<br>";
//      }
// }
// if ($sql) {
//     printf("Error: %s\n", mysqli_error($conn));
//     exit();
// }
?>