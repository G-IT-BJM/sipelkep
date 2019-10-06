<?php 
    include "koneksi.php";
    if(isset($_GET['no_registrasi']))
    {
        $sql = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_register_pelayanan_surat WHERE no_registrasi = '$_GET[no_registrasi]'"));
        $data = array('nik'   	=>  $sql['nik'],
                        'nama'  =>  $sql['nama'],);
        echo json_encode($data);
    }
    elseif(isset($_POST['nik']))
    {
        $query = mysqli_query($conn, "SELECT * FROM tb_data_penduduk WHERE nik='$_POST[nik]'");
        if(mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_array($query);
        } else {
            $data = "NULL";
        }
        echo json_encode($data);
    }
    elseif(isset($_GET['jenis_surat']))
    {
        $sql = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_data_surat WHERE kd_surat = '$_GET[jenis_surat]'"));
        $data = array('isi'   	=> $sql['syarat']);
        // $data = array('isi'   	=>  "Persyaratan : \n".$sql['syarat']);
        echo json_encode($data);
    }
    elseif(isset($_POST['no_registrasi']))
    {
        error_reporting(0);
        $sql = mysqli_query($conn,"SHOW TABLES");
        while($table = mysqli_fetch_array($sql)) {
            $sqlT = mysqli_query($conn,"SELECT tgl_keluar FROM $table[0] WHERE no_registrasi = '$_POST[no_registrasi]'");
            while($rtable = mysqli_fetch_array($sqlT)) {
                $data = date("d F Y", strtotime($rtable["tgl_keluar"]));
                echo json_encode($data);
                // echo json_encode($rtable);
            }
        }
    }
?>