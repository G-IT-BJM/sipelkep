<?php
    include "koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM tb_data_penduduk");
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
            text-align: justify;
        }
        hr {
            border: 1px solid black;
        }
        td.a {
            white-space:pre-wrap; word-wrap:break-word;
        }
    </style>
</head>
<body style="font-family: Times New Roman; background-color:white;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                    <div class="input-group">
                        <a href="cetak-laporan-penduduk.php" target="_BLANK"><button type="button" class="btn btn-primary btn-lg">Cetak Laporan <span class="fa fa-print"></span></button></a>
                    </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table align="center">
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
            <h4>Laporan Data Penduduk</h5>
            <br>
            <table class="table table-bordered table-striped mb-0 d">
                <thead>
                    <tr>
                        <th scope="col" width="3%">#</th>
                        <th scope="col" width="12%">Nik</th>
                        <th scope="col">Nama</th>
                        <th scope="col" width="11%">TTL</th>
                        <th scope="col" width="3%">Jk</th>
                        <th scope="col">Alamat</th>
                        <th scope="col" width="8%">Agama</th>
                        <th scope="col">Status Perkawinan</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col" width="6%">KWRG</th>
                        <th scope="col" width="10%">Telp</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) { 
                ?>
                <tr>
                    <td class="a"><?=$no?></td>
                    <!-- <td class="a" style="text-align: center; vertical-align: middle;"><?php// echo $no?></td> -->
                    <td class="a"><?=$data['nik']?></td>
                    <td class="a"><?=$data['nama']?></td>
                    <td class="a"><?=$data['t_lahir']."<br>".date("d-m-Y",strtotime($data['tgl_lahir']))?></td>
                    <td class="a"><?=$data['jk']?></td>
                    <td class="a"><?=$data['alamat']?></td>
                    <td class="a"><?=$data['agama']?></td>
                    <td class="a"><?=$data['status_p']?></td>
                    <td class="a"><?=$data['kerja']?></td>
                    <td class="a"><?=$data['warga']?></td>
                    <td class="a"><?=$data['telp']?></td>
                    <td class="a"><?=$data['ket']?></td>
                </tr>
                <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- <script>window.print();</script> -->
</body>
</html>