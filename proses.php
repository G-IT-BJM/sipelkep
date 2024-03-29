<?php 
    include "koneksi.php";
    session_start();

    /**
     * [uploadImg description]
     *
     * @param   array  $data    Data Foto
     * @param   string $no_surat  Nomor surat
     *
     * @return  boolean Status Upload
     */
    function uploadImg($data = array(),$no_surat,$result = NULL)
    {
        $files = '';

        foreach ($data as $val) {      
        
            $name = $_FILES[$val]['name'];
            $tmp = $_FILES[$val]['tmp_name'];
            
            $ext = substr($name, -4); //.png
            if ($ext == ".png" || $ext == ".jpg") {
                $filename = $no_surat.'-'.$val.$ext;                
            } else {
                $ext = substr($name, -5); //.jpeg
                $filename = $no_surat.'-'.$val.$ext;                
            }

            $path = "img/".$filename;

            if (file_exists($path)) {
                unlink($path);
                move_uploaded_file($tmp, $path);
            } else {
                move_uploaded_file($tmp, $path);
            } 
            
            if ($files == '') {
                $files = "'".$filename."'";
            } else {
                $files .= ",'".$filename."'";
            }

        }

        if ($result == TRUE) {
            return $files;
        } else {
            return true;
        }
                
    }

    /**
     * [name_table description]
     *
     * @return  array  return array name of table
     */
    function name_table($table)
    {

        global $conn;

        $name_table = array();
        
        $query = mysqli_query($conn,"SELECT * FROM $table");

        while ($name = mysqli_fetch_field($query)) {
            
            $name_table[] = $name->name;

        }

        return $name_table;

    }

    /**
     * [cekFoto description]
     *
     * @param   array  $data  cek size dan tipe foto
     *
     * @return  boolean         [return description]
     */
    function cekFoto($data = array())
    {        
        foreach ($data as $val) {
            
            $tipe = $_FILES[$val]['type'];

            if ($tipe == "image/jpeg" || $tipe == "image/jpg" || $tipe == "image/png") {
                $size = $_FILES[$val]['size'];
                if ($size <= 3000000) {
                    $return = true;
                } else {
                    $return = false;
                    break;
                }
            } else {
                $return = false;
                break;
            }
        }
        return $return;
    }
    /**
     * [deleteFoto description]
     *
     * @param   string  $no_surat  nomor surat
     *
     * @return  [type]           [return description]
     */
    function deleteFoto($no_surat)
    {
        $files = scandir('img');
        
        foreach ($files as $file) {
        
            if (strpos($file, $no_surat) !== false) {
        
                unlink('img/'.$file);
            }
        }
        
        return true;

    }

    
    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-02 18:17:59 
     * @Desc: SIMPAN DATA SURAT 
     */    
    if(isset($_POST['simpan_data_surat'])) 
    {
        $kd_surat   = $_POST['kode_surat'];
        $surat      = ucwords($_POST['surat']);
        $syarat     = ucwords($_POST['syarat']);
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
    elseif (isset($_POST['ubah_data_surat'])) 
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
    elseif (isset($_POST['simpan_data_penduduk'])) 
    {
        $nik        = $_POST['nik'];
        $nama       = strtoupper($_POST['nama']);
        $t_lahir    = strtoupper($_POST['tempat_lahir']);
        $tgl_lahir  = $_POST['tgl_lahir'];
        $jk         = $_POST['jenis_kelamin'];
        $gol_darah  = $_POST['gol_darah'];
        $alamat     = strtoupper($_POST['alamat']);
        $rt         = $_POST['rt'];
        $rw         = $_POST['rw'];
        $kel        = strtoupper($_POST['kelurahan']);
        $kec        = strtoupper($_POST['kecamatan']);
        $agama      = $_POST['agama'];
        $stts       = strtoupper($_POST['status']);
        $pekerjaan  = strtoupper($_POST['pekerjaan']);
        $warga      = $_POST['kewarganegaraan'];
        $telp       = $_POST['telp'];
        $ket        = $_POST['keterangan'];

        $simpan = "INSERT INTO tb_data_penduduk VALUES('','$nik','$nama','$t_lahir','$tgl_lahir','$jk','$gol_darah','$alamat','$rt','$rw','$kel','$kec','$agama','$stts','$pekerjaan','$warga','$telp','$ket')";
        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data_penduduk WHERE nik = '$nik'"));
        if($cek > 0) {
            echo "
                <script>
                    alert('Data Sudah Ada . . . ');
                    window.location = 'tambah-data-penduduk.php';
                </script>
            ";
        } else {
            if(mysqli_query($conn,$simpan)) {
                echo "
                    <script>
                        alert('Data Berhasil Disimpan . . . ');
                    </script>
                ";
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
    }
    elseif (isset($_POST['ubah_data_penduduk'])) 
    {
        // $id         = $_POST['id'];
        $nik        = $_POST['nik'];
        $nama       = strtoupper($_POST['nama']);
        $t_lahir    = strtoupper($_POST['tempat_lahir']);
        $tgl_lahir  = $_POST['tgl_lahir'];
        $jk         = $_POST['jenis_kelamin'];
        $gol_darah  = $_POST['gol_darah'];
        $alamat     = strtoupper($_POST['alamat']);
        $rt         = $_POST['rt'];
        $rw         = $_POST['rw'];
        $kel        = strtoupper($_POST['kelurahan']);
        $kec        = strtoupper($_POST['kecamatan']);
        $agama      = $_POST['agama'];
        $stts       = strtoupper($_POST['status']);
        $pekerjaan  = strtoupper($_POST['pekerjaan']);
        $warga      = $_POST['kewarganegaraan'];
        $telp       = $_POST['telp'];
        $ket        = $_POST['keterangan'];

        $ubah = mysqli_query($conn, "UPDATE tb_data_penduduk SET nik = '$nik', nama = '$nama', t_lahir = '$t_lahir', tgl_lahir = '$tgl_lahir', jk = '$jk', gol_dar = '$gol_darah', alamat = '$alamat', rt = '$rt', rw = '$rw', kel = '$kel', kec = '$kec', agama = '$agama', status_p = '$stts', kerja = '$pekerjaan', warga = '$warga', telp = '$telp', ket = '$ket' WHERE nik = '$nik'");

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

    elseif (isset($_GET['hapus']) && $_GET['hapus'] == 'data_penduduk') {
        $id = $_GET['id'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_data_penduduk WHERE id = '$id'");

        if ($exec) {            

            echo "
                <script>                    
                    window.location = 'data-penduduk.php';
                </script>
            ";

        } 
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-05 17:07:36 
     * @Desc: SIMPAN KEBERADAAN LURAH 
     */
    elseif (isset($_POST['simpan_keberadaan_lurah'])) 
    {
        $kd        = $_POST['kode'];
        $tgl       = $_POST['tgl'];
        $stts      = $_POST['status'];
        $ket       = $_POST['keterangan'];

        $simpan = mysqli_query($conn, "INSERT INTO tb_keberadaan_lurah_admin VALUES('','$kd','$tgl','$stts','$ket')");

        if($simpan) {

            header("location: keberadaan-lurah.php");

        } else {

            echo "
                <script>
                    alert('Data Gagal Di Simpan . . . ');
                    window.location = 'tambah-data-keberadaan-lurah.php';
                </script>
            ";

        }
    } 
    elseif (isset($_POST['ubah_keberadaan_lurah'])) 
    {
        $id        = $_POST['id']; 
        $kd        = $_POST['kode'];
        $tgl       = $_POST['tgl'];
        $stts      = $_POST['status'];
        $ket       = $_POST['keterangan'];

        $ubah = mysqli_query($conn, "UPDATE tb_keberadaan_lurah_admin SET kd_lurah = '$kd', tgl = '$tgl', status = '$stts', ket = '$ket' WHERE id = '$id'");

        if($ubah) {

            header("location: keberadaan-lurah.php");

        } else {

            echo "
                <script>
                    alert('Data Gagal Di Ubah . . . ');
                    window.location = 'ubah-data-keberadaan-lurah.php';
                </script>
            ";

        }
    } 
    elseif (isset($_GET['hapus']) && $_GET['hapus'] == 'data_keberadaan_lurah') {
        $id = $_GET['id'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_keberadaan_lurah_admin WHERE id = '$id'");

        if ($exec) {            

            echo "
                <script>                    
                    window.location = 'keberadaan-lurah.php';
                </script>
            ";

        } 
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-05 18:19:13 
     * @Desc: UBAH KATA SANDI ADMIN 
     */    
    elseif (isset($_POST['ubah_kata_sandi'])) 
    {
        $id        = $_POST['id']; 
        $nm        = $_POST['nama'];
        $p_lama    = $_POST['kata_sandi_lama'];
        $p_baru    = $_POST['kata_sandi_baru'];
        $k_p_baru  = $_POST['konfirm_kata_sandi_baru'];

        $cek = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_admin WHERE id = '$id' AND nama_pengguna = '$nm'"));

        if($cek["kata_sandi"] == $p_lama) {

            if($p_baru == $k_p_baru) {

                $ubah = mysqli_query($conn, "UPDATE tb_admin SET kata_sandi = '$p_baru' WHERE id = '$id' AND nama_pengguna = '$nm'");
    
                if($ubah) {

                    echo "
                        <script>
                            alert('Berhasil Merubah Password . . . ');
                            window.location = 'ubah-sandi.php';
                        </script>
                    ";
                    // header("location: hal-beranda.php");

                } else {

                    echo "
                        <script>
                            alert('Data Gagal Di Ubah . . . ');
                            window.location = 'ubah-sandi.php';
                        </script>
                    ";

                }

            } else {

                echo "
                    <script>
                        alert('Konfirmasi Password Salah . . . ');
                        window.location = 'ubah-sandi.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert(' Password Lama Salah . . . ');
                    window.location = 'ubah-sandi.php';
                </script>
            ";
            
        }
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-06 19:13:47 
     * @Desc: LOGIN 
     */    
    elseif (isset($_POST['login'])) 
    {
        $nm        = $_POST['nama_pengguna'];
        $sandi     = $_POST['kata_sandi'];
        // $stts      = 1;

        $q = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_admin"));

        if($q["nama_pengguna"] == $nm && $q["kata_sandi"] == $sandi) {

            // mysqli_query($conn, "UPDATE tb_admin SET status = '$stts' WHERE nama_pengguna = '$nm' AND kata_sandi = '$sandi'");
            $_SESSION['nama_pengguna'] = $q["nama_pengguna"];

            echo "
                <script>
                    alert('Berhasil Masuk . . . ');
                    window.location = 'hal-beranda.php';
                </script>
            ";

        } else {

            echo "
                <script>
                    alert('Gagal Masuk . . . ');
                    window.location = 'beranda.php';
                </script>
            ";

        }
    } 

    /**
     * [SIMPAN DATA SURAT PINDAH]
     *
     * @return  [type]  [return description]
     */
    elseif (isset($_POST['simpan_surat_pindah'])) {                       
        
        $no_surat = $_POST['no_surat'];
        $no_registrasi = $_POST['no_registrasi'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $tgl_keluar = $_POST['tgl_keluar'];
        $keterangan = $_POST['keterangan'];
        $lampiran = array('pengantar_rt','ktp','kk','surat_kuasa');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_pindah WHERE no_surat_pindah = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_pindah VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";                

                    mysqli_query($conn,$sql);

                    header('location:surat-pindah.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-pindah.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-pindah.php';
                </script>
            ";

        }

    } elseif (isset($_POST['ubah_surat_pindah'])) {

        $id = $_POST['id'];
        $no_surat = $_POST['no_surat'];
        $no_registrasi = $_POST['no_registrasi'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $tgl_keluar = $_POST['tgl_keluar'];
        $keterangan = $_POST['keterangan'];
        $lampiran = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_pindah SET no_surat_pindah = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";                
                mysqli_query($conn,$sql);
                header('location:surat-pindah.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-pindah.php?id=$id';
                </script>
            ";
            
        }     

    } elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-pindah') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_pindah WHERE no_surat_pindah = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-pindah.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-09 18:12:57 
     * @Desc: PELAYANAN REGISTRASI SURAT 
     */    
    elseif (isset($_POST['simpan_pelayanan_regis_surat']))
    {
        $kd     = $_POST['kd_regis'];
        $nik    = $_POST['nik'];
        $nama   = $_POST['nama'];
        $js     = $_POST['jenis_surat'];
        $tgl    = $_POST['tgl_regis'];
        $ket    = $_POST['keterangan'];

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data_penduduk WHERE nik = '$nik' AND nama = '$nama'"));
        if($cek > 0) {

            $simpan = mysqli_query($conn, "INSERT INTO tb_register_pelayanan_surat VALUES('','$kd','$nik','$nama','$js','$tgl','$ket')");

            if($simpan) {

                echo "
                    <script>
                        alert('Registrasi Berhasil\\nNomor Registrasi Anda Adalah $kd\\nHarap Simpan dan Catat Nomor Registrasi Ini Untuk Proses Selanjutnya');
                        window.location = 'beranda.php';
                    </script>
                ";

            } else {

                echo "
                    <script>
                        alert('Data Gagal Di Simpan . . . ');
                        window.location = 'pelayanan-registrasi-surat.php';
                    </script>
                ";

            }
        } else {

            echo "
                <script>
                    alert('Anda belum Terdaftar sebagai Penduduk . . . ');
                    window.location = 'beranda.php';
                </script>
            ";

        }
        
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-16 17:44:00 
     * @Desc: SURAT KELAHIRAN 
     */    
    elseif (isset($_POST['simpan_surat_kelahiran'])) {                       
        
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('pengantar_rt','ktp_bapak','ktp_ibu');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_kelahiran WHERE no_surat_kelahiran = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_kelahiran VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";                

                    mysqli_query($conn,$sql);

                    header('location:surat-kelahiran.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-kelahiran.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-kelahiran.php';
                </script>
            ";

        }

    } 
    elseif (isset($_POST['ubah_surat_kelahiran'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        // var_dump($lampiran);

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;            

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_kelahiran SET no_surat_kelahiran = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";                
                mysqli_query($conn,$sql);
                header('location:surat-kelahiran.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-kelahiran.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-kelahiran') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_kelahiran WHERE no_surat_kelahiran = '$no_surat'");        

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-kelahiran.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-16 18:04:45 
     * @Desc: SURAT KET DOMISILI 
     */    
    elseif (isset($_POST['simpan_surat_ket_domisili'])) {                       
        
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('pengantar_rt','ktp');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_keterangan_domisili WHERE no_surat_keterangan_domisili = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_keterangan_domisili VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";                

                    mysqli_query($conn,$sql);

                    header('location:surat-ket-domisili.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-ket-domisili.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-ket-domisili.php';
                </script>
            ";

        }

    } 
    elseif (isset($_POST['ubah_surat_ket_domisili'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_keterangan_domisili SET no_surat_keterangan_domisili = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";                
                mysqli_query($conn,$sql);
                header('location:surat-ket-domisili.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-ket-domisili.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-ket-domisili') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_keterangan_domisili WHERE no_surat_keterangan_domisili = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-ket-domisili.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-09-17 20:24:58 
     * @Desc: SURAT PENGANTAR KK 
     */    
    elseif (isset($_POST['simpan_surat_pengantar_kk'])) {

        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('surat_ket_ahli_waris','surat_pengantar_rt','surat_nikah_meninggal','kk_ahli_waris','ktp_2_orang_saksi','ktp_yg_meninggal');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_pengantar_kartu_keluarga WHERE no_surat_pengantar_kk = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_pengantar_kartu_keluarga VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";                

                    mysqli_query($conn,$sql);

                    header('location:surat-pengantar-kk.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-pengantar-kk.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-pengantar-kk.php';
                </script>
            ";

        }
    }
    elseif (isset($_POST['ubah_surat_pengantar_kk'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_pengantar_kartu_keluarga SET no_surat_pengantar_kk = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";                
                mysqli_query($conn,$sql);
                header('location:surat-pengantar-kk.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-pengantar-kk.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-pengantar-kk') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_pengantar_kartu_keluarga WHERE no_surat_pengantar_kk = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-pengantar-kk.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-02 20:30:40 
     * @Desc: SURAT PENGANTAR KTP 
     */    
    elseif (isset($_POST['simpan_surat_pengantar_ktp'])) {

        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('surat_pengantar_rt','ktp_bpk_kandung','ktp_ibu_kandung');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_pengantar_ktp WHERE no_surat_pengantar_ktp = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_pengantar_ktp VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";

                    mysqli_query($conn,$sql);

                    header('location:surat-pengantar-ktp.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-pengantar-ktp.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-pengantar-ktp.php';
                </script>
            ";

        }
    }
    elseif (isset($_POST['ubah_surat_pengantar_ktp'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_pengantar_ktp SET no_surat_pengantar_ktp = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";
                mysqli_query($conn,$sql);
                header('location:surat-pengantar-ktp.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-pengantar-ktp.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-pengantar-ktp') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_pengantar_ktp WHERE no_surat_pengantar_ktp = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-pengantar-ktp.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-02 20:41:38 
     * @Desc: SURAT KEHILANGAN 
     */    
    elseif (isset($_POST['simpan_surat_kehilangan'])) {

        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('ktp');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_kehilangan WHERE no_surat_kehilangan = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_kehilangan VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";

                    mysqli_query($conn,$sql);

                    header('location:surat-kehilangan.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-kehilangan.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-kehilangan.php';
                </script>
            ";

        }
    }
    elseif (isset($_POST['ubah_surat_kehilangan'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_kehilangan SET no_surat_kehilangan = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";
                mysqli_query($conn,$sql);
                header('location:surat-kehilangan.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-kehilangan.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-kehilangan') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_kehilangan WHERE no_surat_kehilangan = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-kehilangan.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-02 21:29:46 
     * @Desc: SURAT BELUM MENIKAH 
     */    
    elseif (isset($_POST['simpan_surat_belum_menikah'])) {

        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('surat_pengantar_rt');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_keterangan_belum_menikah WHERE no_surat_belum_menikah = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_keterangan_belum_menikah VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";

                    mysqli_query($conn,$sql);

                    header('location:surat-ket-belum-nikah.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-ket-belum-nikah.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-ket-belum-nikah.php';
                </script>
            ";

        }
    }
    elseif (isset($_POST['ubah_surat_belum_menikah'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_keterangan_belum_menikah SET no_surat_belum_menikah = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";
                mysqli_query($conn,$sql);
                header('location:surat-ket-belum-nikah.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-ket-belum-nikah.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-belum-menikah') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_keterangan_belum_menikah WHERE no_surat_belum_menikah = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-ket-belum-nikah.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-02 22:00:53 
     * @Desc: SURAT PENGANTAR NIKAH 
     */    
    elseif (isset($_POST['simpan_surat_pengantar_nikah'])) {

        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('surat_pengantar_rt','ktp');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_pengantar_nikah WHERE no_surat_nikah = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_pengantar_nikah VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";

                    mysqli_query($conn,$sql);

                    header('location:surat-pengantar-nikah.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-pengantar-nikah.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-pengantar-nikah.php';
                </script>
            ";

        }
    }
    elseif (isset($_POST['ubah_surat_pengantar_nikah'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_pengantar_nikah SET no_surat_nikah = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";
                mysqli_query($conn,$sql);
                header('location:surat-pengantar-nikah.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-pengantar-nikah.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-pengantar-nikah') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_pengantar_nikah WHERE no_surat_nikah = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-pengantar-nikah.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-02 22:36:02 
     * @Desc: SURAT TIDAK MAMPU 
     */    
    elseif (isset($_POST['simpan_surat_tidak_mampu'])) {

        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('surat_pengantar_rt','ktp');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_keterangan_tidak_mampu WHERE no_surat_tidak_mampu = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_keterangan_tidak_mampu VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";

                    mysqli_query($conn,$sql);

                    header('location:surat-ket-tidak-mampu.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-ket-tidak-mampu.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-ket-tidak-mampu.php';
                </script>
            ";

        }
    }
    elseif (isset($_POST['ubah_surat_tidak_mampu'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_keterangan_tidak_mampu SET no_surat_tidak_mampu = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";
                mysqli_query($conn,$sql);
                header('location:surat-ket-tidak-mampu.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-ket-tidak-mampu.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-tidak-mampu') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_keterangan_tidak_mampu WHERE no_surat_tidak_mampu = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-ket-tidak-mampu.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-02 23:08:15 
     * @Desc: SURAT AHLI WARIS 
     */    
    elseif (isset($_POST['simpan_surat_ahli_waris'])) {

        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('surat_ket_ahli_waris','surat_pengantar_rt','surat_nikah_yg_meninggal','kk_ahli_waris','ktp_2_orang_saksi','pbb_tahun_berjalan','ktp_yg_meninggal');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_ahli_waris WHERE no_surat_ahli_waris = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_ahli_waris VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";

                    mysqli_query($conn,$sql);

                    header('location:surat-ahli-waris.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-ahli-waris.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-ahli-waris.php';
                </script>
            ";

        }
    }
    elseif (isset($_POST['ubah_surat_ahli_waris'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_ahli_waris SET no_surat_ahli_waris = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";
                mysqli_query($conn,$sql);
                header('location:surat-ahli-waris.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-ahli-waris.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-ahli-waris') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_ahli_waris WHERE no_surat_ahli_Waris = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-ahli-waris.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-02 23:37:10 
     * @Desc: SURAT IMB 
     */    
    elseif (isset($_POST['simpan_surat_imb'])) {

        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('surat_pengantar_rt','ktp','sertifikat_tanah','surat_tidak_keberatan','ktp_tetangga','lunas_pbb_tahun_berjalan');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_izin_mendirikan_bangunan WHERE no_surat_imb = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_izin_mendirikan_bangunan VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";

                    mysqli_query($conn,$sql);

                    header('location:surat-imb.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-imb.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-imb.php';
                </script>
            ";

        }
    }
    elseif (isset($_POST['ubah_surat_imb'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_izin_mendirikan_bangunan SET no_surat_imb = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";
                mysqli_query($conn,$sql);
                header('location:surat-imb.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-imb.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-imb') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_izin_mendirikan_bangunan WHERE no_surat_imb = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-imb.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-03 00:03:04 
     * @Desc: SURAT IZIN TEMPAT USAHA 
     */    
    elseif (isset($_POST['simpan_surat_itu'])) {

        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('surat_pengantar_rt','ktp','sertifikat_tanah','imb','surat_permohonan','lunas_pbb_tahun_berjalan','pernyataan_tidak_keberatan','akta_notaris','ktp_tetangga','npwp');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_izin_tempat_usaha WHERE no_surat_izin_usaha = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_izin_tempat_usaha VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";

                    mysqli_query($conn,$sql);

                    header('location:surat-izin-tempat-usaha.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-izin-tempat-usaha.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-izin-tempat-usaha.php';
                </script>
            ";

        }
    }
    elseif (isset($_POST['ubah_surat_itu'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_izin_tempat_usaha SET no_surat_izin_usaha = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";
                mysqli_query($conn,$sql);
                header('location:surat-izin-tempat-usaha.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-izin-tempat-usaha.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-itu') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_izin_tempat_usaha WHERE no_surat_izin_usaha = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-izin-tempat-usaha.php';
                </script>
            ";

        } 

    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-03 00:26:05 
     * @Desc: SURAT KETERANGAN USAHA 
     */   
    elseif (isset($_POST['simpan_surat_ket_usaha'])) {

        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran = array('surat_pengantar_rt','ktp','ket_domisili');

        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat_keterangan_usaha WHERE no_surat_ket_usaha = '$no_surat' AND no_registrasi = '$no_registrasi'"));

        if ($cek < 1) {

            $cekFoto = cekFoto($lampiran);

            if ($cekFoto) {                            

                $uploadImg = uploadImg($lampiran,$no_surat,'TRUE');

                if ($uploadImg) {                

                    $sql = "INSERT INTO tb_surat_keterangan_usaha VALUES ('','$no_surat','$no_registrasi','$nik','$nama','$tgl_keluar',".$uploadImg.",'$keterangan')";

                    mysqli_query($conn,$sql);

                    header('location:surat-ket-usaha.php');

                }

            } else {

                echo "
                    <script>
                        alert('Foto tidak memenuhi persyaratan!');
                        window.location = 'tambah-data-surat-ket-usaha.php';
                    </script>
                ";

            }

        } else {

            echo "
                <script>
                    alert('Data Sudah Dipakai!');
                    window.location = 'tambah-data-surat-ket-usaha.php';
                </script>
            ";

        }
    }
    elseif (isset($_POST['ubah_surat_ket_usaha'])) {

        $id             = $_POST['id'];
        $no_surat       = $_POST['no_surat'];
        $no_registrasi  = $_POST['no_registrasi'];
        $nik            = $_POST['nik'];
        $nama           = $_POST['nama'];
        $tgl_keluar     = $_POST['tgl_keluar'];
        $keterangan     = $_POST['keterangan'];
        $lampiran       = $_POST['ubah_foto'];

        $cekFoto = $lampiran != '' ? cekFoto($lampiran) : TRUE;

        if ($cekFoto) {         

            $uploadImg = $lampiran != '' ? uploadImg($lampiran,$no_surat) : TRUE;

            if ($uploadImg) {

                $sql = "UPDATE tb_surat_keterangan_usaha SET no_surat_ket_usaha = '$no_surat', no_registrasi='$no_registrasi', nik='$nik', nama='$nama', tgl_keluar='$tgl_keluar', ket='$keterangan' WHERE id='$id'";
                mysqli_query($conn,$sql);
                header('location:surat-ket-usaha.php');

            }

        } else {

            echo "
                <script>
                    alert('Foto tidak memenuhi persyaratan!');
                    window.location = 'ubah-data-surat-ket-usaha.php?id=$id';
                </script>
            ";
            
        }     

    } 
    elseif (isset($_GET['jenis_surat']) && $_GET['jenis_surat'] == 'surat-ket-usaha') {

        $no_surat = $_GET['no_surat'];
        
        $exec = mysqli_query($conn, "DELETE FROM tb_surat_keterangan_usaha WHERE no_surat_ket_usaha = '$no_surat'");

        if ($exec) {
            
            deleteFoto($no_surat);

            echo "
                <script>                    
                    window.location = 'surat-ket-usaha.php';
                </script>
            ";

        } 

    } elseif (isset($_POST['salin_data'])) {
        
        $pilih = $_POST['pilih_data'];

        $name_table = name_table($pilih);

        $q = mysqli_query($conn,"SELECT * FROM $pilih");

        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=".$pilih."-".date("d-m-Y")."-".microtime().".xls");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);

        echo "<table border='1'>";
        echo "<tr>";
        foreach ($name_table as $key) {
            echo "<td>".$key."</td>";
        }
        echo "</tr>";
        while ($row = mysqli_fetch_array($q)) {        
        echo "<tr>";        
        foreach ($name_table as $key) {
            echo "<td>".$row[$key]."</td>";
        }
        echo "</tr>";
        }
        echo "</table>";

    } 
?>