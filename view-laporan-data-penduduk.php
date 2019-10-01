<?php
    // include "session_admin.php";
    
    include "koneksi.php";

    require_once __DIR__ . '/vendor/autoload.php';
    $sql = mysqli_query($conn, "SELECT * FROM tb_data_penduduk");

    $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
    // $mpdf->SetHeader('<div>
    //         <h5 style="text-align: left; font-style: bold;">MAHESA GYM FITNES CENTER</h5>
    //         <h5 style="padding-top: -25px">LAPORAN DATA MEMBER</h5>
    //     </div>');

    // $mpdf->setFooter('<h5 style="text-align: left; font-style: bold;">MAHESA GYM FITNES CENTER</h5>
    //                 <h5 style="padding-top: -15px">[{PAGENO}] {DATE j-m-Y}</h5>');
        // isinya

        // table td {
        //     width: 20px;
        //     overflow: hidden;
        //     display: inline-block;
        //     white-space: nowrap;
        // }
        $html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="utf-8" />
                <title>MAHESA GYM</title>
                <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
                <meta content="" name="description" />
                <meta content="" name="author" />
                <link href="css/bootstrap.min.css" rel="stylesheet">
                <link href="css/font-awesome.min.css" rel="stylesheet">
                <style>
                    h1,h2,h3,h4,h5,h6,p {
                        margin : 0;
                    }
                </style>
            </head>
            <body style="font-family: Times New Roman;">
                <div class="container">
                    <div class="row" >
                        <div class="col-xs-2 text-right">
                            <img src="img/NS-P-00001-kk.jpg" height="80" width="80" style="padding-right: -170px;">
                        </div>
                        <div class="col-xs-8 text-center">
                            <h5>PEMERINTAH KOTA BANJARMASIN</h5>
                            <h4>KECAMATAN BANJARMASIN UTARA</h4>
                            <h3>KELURAHAN SUNGAI JINGAH</h3>
                            <p style="font-size: 12px;">Jl. Jahri Saleh RT.11 No.20 Telp.3307069 Kode Pos : 70121</p>
                        </div>
                        <hr>
                    </div>
                </div>
            
                <p style="font-size: 12px;">Laporan Data Penduduk</p>
                <table class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>JK</th>
                            <th>Gol_Darah</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Status_Kawin</th>
                            <th>Pekerjaan</th>
                            <th>Kewarganegaraan</th>
                            <th>Telp</th>
                            <th>Ket.</th>
                        </tr>
                    </thead>
                    <tbody>
                ';
                    
                    $no = 1;
                    while($data = mysqli_fetch_array($sql)){
                        $html .= '<tr>
                        <td>'.$no.'</td>
                        <td>'.$data["nik"].'</td>
                        <td>'.$data["nama"].'</td>
                        <td>'.$data["t_lahir"].", ".$data["tgl_lahir"].'</td>
                        <td>'.$data["jk"].'</td>
                        <td>'.$data["gol_dar"].'</td>
                        <td>'.$data["alamat"].'</td>
                        <td>'.$data["agama"].'</td>
                        <td>'.$data["status_p"].'</td>
                        <td>'.$data["kerja"].'</td>
                        <td>'.$data["warga"].'</td>
                        <td>'.$data["telp"].'</td>
                        <td>'.$data["ket"].'</td>
                        </tr>';
                        $no++;
                    }

        $html .= '
                    </tbody>
                </table>

                <script src="js/jquery-1.11.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/custom.js"></script>
            </body>
            </html>
        ';
    // penutup
    $mpdf->WriteHTML($html);
    $mpdf->Output('laporan-data-penduduk.pdf', \Mpdf\Output\Destination::INLINE);

?>