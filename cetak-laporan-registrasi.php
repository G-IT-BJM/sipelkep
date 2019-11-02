<?php
    include "koneksi.php";
    $tgl_dari   = date("Y-m-d", strtotime($_POST['tgl_dari']));
    $tgl_sampai = date("Y-m-d", strtotime($_POST['tgl_sampai']));
    $sql        = mysqli_query($conn, "SELECT * FROM tb_register_pelayanan_surat WHERE tgl_registrasi BETWEEN '".$tgl_dari."' AND '".$tgl_sampai."'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIPELKEP</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/logo/logo.png">
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<style>
        h1,h2,h3,h4,h5,h6,p {
            margin : 0;
        }
        table.d {
            table-layout: fixed;
            width: 100%;
        }
        hr {
            border: 1px solid black;
        }
    </style>
</head>
<body style="font-family: Times New Roman; background-color:white;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
            <table>
                <tr>
                    <td>
                        <img src="img/logo/logo.png" width="200">
                    </td>
                    <td class="text-center">
                        <h4>PEMERINTAH KOTA BANJARMASIN</h4>
                        <h3>KECAMATAN BANJARMASIN UTARA</h3>
                        <h2>KELURAHAN SUNGAI JINGAH</h2>
                        <p>Jl. Jahri Saleh RT.11 No.20 Telp.3307069 Kode Pos : 70121</p>
                    </td>
                </tr>
            </table>
                
            </div>
        </div>
        <hr>
        <div class="row">
            <h4>Laporan Data Registrasi</h5>
            <br>
            <table class="table table-bordered table-striped mb-0 d">
                <thead>
                    <tr>
                        <th scope="col" width="3%">#</th>
                        <th scope="col">No. Registrasi</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Surat</th>
                        <th scope="col">Tgl Registrasi</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    while($data = mysqli_fetch_array($sql)){
                        $sql1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_data_surat WHERE kd_surat = '$data[kd_surat]'"));

                        echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$data["no_registrasi"].'</td>
                        <td>'.$data["nik"].'</td>
                        <td>'.$data["nama"].'</td>
                        <td>'.$sql1["surat"].'</td>
                        <td>'.date("d-m-Y", strtotime($data["tgl_registrasi"])).'</td>
                        <td>'.$data["ket"].'</td>
                        </tr>';
                        $no++;
                    }
                ?>
                <!-- <td style="white-space:pre-wrap; word-wrap:break-word">'.$data["syarat"].'</td> -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script>window.print();</script>
</body>
</html>