<?php


function uploadImg($data)
{
    $txt = '';
    
    foreach ($data as $val) {
        if ($txt == '') {
            $txt = "'fc_".$val."'";
        } else {
            $txt .= ",'fc_".$val."'";
        }
    }
    return $txt;
}

$foto = uploadImg(array('surat_pengantar_rt','ktp','kk'));

echo $foto;

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