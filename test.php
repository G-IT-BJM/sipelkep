<?php

$files = scandir('img');
foreach ($files as $file) {
    if (strpos($file, 'qew') !== false) {
         echo $file ."</br>";
    }
}

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

?>