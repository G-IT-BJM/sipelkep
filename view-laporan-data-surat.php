<?php
    include "koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM tb_data_surat");
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
            <h4>Laporan Data Surat</h5>
            <br>
            <table class="table table-bordered table-striped mb-0 d">
                <thead>
                    <tr>
                        <th scope="col" width="3%">#</th>
                        <th scope="col">Jenis Surat</th>
                        <!-- <th scope="col" width="20%">Jenis Surat</th> -->
                        <th scope="col">Syarat</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    while($data = mysqli_fetch_array($sql)){
                        echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$data["surat"].'</td>
                        <td>'.nl2br($data["syarat"]).'</td>
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