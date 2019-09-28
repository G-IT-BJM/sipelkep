<?php 
    include "koneksi.php"; 
    $nik = $_POST['nik'];

    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_data_penduduk WHERE nik = '$nik'"));
?>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0">
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?= $data["nik"] ?></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td><?= $data["nama"] ?></td>
        </tr>
        <tr>
            <td>TTL</td>
            <td>:</td>
            <td><?= $data["t_lahir"].", ".date("d-m-Y", strtotime($data["tgl_lahir"])) ?></td>
        </tr>
        <tr>
            <td>JENIS KELAMIN</td>
            <td>:</td>
            <td><?= $data["jk"] ?></td>
        </tr>
        <tr>
            <td>GOL DARAH</td>
            <td>:</td>
            <td><?= $data["gol_dar"] ?></td>
        </tr>
        <tr>
            <td>ALAMAT</td>
            <td>:</td>
            <td><?= $data["alamat"] ?></td>
        </tr>
        <tr>
            <td>RT || RW</td>
            <td>:</td>
            <td><?= $data["rt"]." || ".$data["rw"] ?></td>
        </tr>
        <tr>
            <td>KEL. || KEC.</td>
            <td>:</td>
            <td><?= $data["kel"]." || ".$data["kec"] ?></td>
        </tr>
        <tr>
            <td>AGAMA</td>
            <td>:</td>
            <td><?= $data["agama"] ?></td>
        </tr>
        <tr>
            <td>STATUS</td>
            <td>:</td>
            <td><?= $data["status_p"] ?></td>
        </tr>
        <tr>
            <td>PEKERJAAN</td>
            <td>:</td>
            <td><?= $data["kerja"] ?></td>
        </tr>
        <tr>
            <td>KEWARGANEGARAAN</td>
            <td>:</td>
            <td><?= $data["warga"] ?></td>
        </tr>
        <tr>
            <td>TELP / HP</td>
            <td>:</td>
            <td><?= $data["telp"] ?></td>
        </tr>
        <tr>
            <td>KETERANGAN</td>
            <td>:</td>
            <td><?= $data["ket"] ?></td>
        </tr>
    </table>
</div>