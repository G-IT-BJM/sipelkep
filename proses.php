<?php 
    include "koneksi.php";
    
    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-02 18:17:59 
     * @Desc: SIMPAN DATA SURAT 
     */    
    if(isset($_POST['simpan_data_surat'])) 
    {
        $kd_surat   = $_POST['kode_surat'];
        $surat      = $_POST['surat'];
        $syarat     = $_POST['syarat'];
        $ket        = $_POST['keterangan'];

        $simpan = mysqli_query($conn, "INSERT INTO tb_data_surat VALUES('','$kd_surat','$surat','$syarat','$ket')");

        if($simpan) {
            header("location: data-surat.php");
        } else {
            echo "
                <script>
                    alert('Data Gagal Di Simpan . . . ');
                    window.location = 'tambah-data-surat.php';
                </script>
            ";
        }
    }
    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-02 18:32:12 
     * @Desc: UBAH DATA SURAT 
     */    
    else if(isset($_POST['ubah_data_surat'])) 
    {
        $id         = $_POST['id'];
        $kd_surat   = $_POST['kode_surat'];
        $surat      = $_POST['surat'];
        $syarat     = $_POST['syarat'];
        $ket        = $_POST['keterangan'];

        $ubah = mysqli_query($conn, "UPDATE tb_data_surat SET kd_surat = '$kd_surat', surat = '$surat', syarat = '$syarat', ket = '$ket' WHERE id  = '$id'");

        if($ubah) {
            header("location: data-surat.php");
        } else {
            echo "
                <script>
                    alert('Data Gagal Di Ubah . . . ');
                    window.location = 'data-surat.php';
                </script>
            ";
        }
    }
    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-02 19:55:04 
     * @Desc: SIMPAN DATA PENDUDUK 
     */    
    else if(isset($_POST['simpan_data_penduduk'])) 
    {
        $nik        = $_POST['nik'];
        $nama       = $_POST['nama'];
        $t_lahir    = $_POST['tempat_lahir'];
        $tgl_lahir  = $_POST['tgl_lahir'];
        $jk         = $_POST['jenis_kelamin'];
        $gol_darah  = $_POST['gol_darah'];
        $alamat     = $_POST['alamat'];
        $rt         = $_POST['rt'];
        $rw         = $_POST['rw'];
        $kel        = $_POST['kelurahan'];
        $kec        = $_POST['kecamatan'];
        $agama      = $_POST['agama'];
        $stts       = $_POST['status'];
        $pekerjaan  = $_POST['pekerjaan'];
        $warga      = $_POST['kewarganegaraan'];
        $telp       = $_POST['telp'];
        $ket        = $_POST['keterangan'];

        $simpan = mysqli_query($conn, "INSERT INTO tb_data_penduduk VALUES('','$nik','$nama','$t_lahir','$tgl_lahir','$jk','$gol_darah','$alamat','$rt','$rw','$kel','$kec','$agama','$stts','$pekerjaan','$warga','$telp','$ket')");

        if($simpan) {
            header("location: data-penduduk.php");
        } else {
            echo "
                <script>
                    alert('Data Gagal Di Simpan . . . ');
                    window.location = 'tambah-data-penduduk.php';
                </script>
            ";
        }
    }
    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-02 19:55:30 
     * @Desc: UBAH DATA PENDUDUK 
     */    
    else if(isset($_POST['ubah_data_penduduk'])) 
    {
        $id         = $_POST['id'];
        $nik        = $_POST['nik'];
        $nama       = $_POST['nama'];
        $t_lahir    = $_POST['tempat_lahir'];
        $tgl_lahir  = $_POST['tgl_lahir'];
        $jk         = $_POST['jenis_kelamin'];
        $gol_darah  = $_POST['gol_darah'];
        $alamat     = $_POST['alamat'];
        $rt         = $_POST['rt'];
        $rw         = $_POST['rw'];
        $kel        = $_POST['kelurahan'];
        $kec        = $_POST['kecamatan'];
        $agama      = $_POST['agama'];
        $stts       = $_POST['status'];
        $pekerjaan  = $_POST['pekerjaan'];
        $warga      = $_POST['kewarganegaraan'];
        $telp       = $_POST['telp'];
        $ket        = $_POST['keterangan'];

        $ubah = mysqli_query($conn, "UPDATE tb_data_penduduk SET nik = '$nik', nama = '$nama', t_lahir = '$t_lahir', tgl_lahir = '$tgl_lahir', jk = '$jk', gol_dar = '$gol_darah', alamat = '$alamat', rt = '$rt', rw = '$rw', kel = '$kel', kec = '$kec', agama = '$agama', status_p = '$stts', kerja = '$pekerjaan', warga = '$warga', telp = '$telp', ket = '$ket' WHERE id = '$id'");

        if($ubah) {
            header("location: data-penduduk.php");
        } else {
            echo "
                <script>
                    alert('Data Gagal Di Simpan . . . ');
                    window.location = 'data-penduduk.php';
                </script>
            ";
        }
    }
?>