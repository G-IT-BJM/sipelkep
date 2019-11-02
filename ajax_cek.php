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
    elseif(isset($_POST['tgl_dari']))
    {
        $tgl_dari   = date("Y-m-d", strtotime($_POST['tgl_dari']));
        $tgl_sampai = date("Y-m-d", strtotime($_POST['tgl_sampai']));
        $sql        = mysqli_query($conn, "SELECT * FROM tb_register_pelayanan_surat WHERE tgl_registrasi BETWEEN '".$tgl_dari."' AND '".$tgl_sampai."'");
        $no         = 1;
        while ($data = mysqli_fetch_array($sql)) { 
            $join = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_register_pelayanan_surat AS a INNER JOIN tb_data_surat AS b ON a.kd_surat = b.kd_surat WHERE b.kd_surat = '".$data["kd_surat"]."'"));
            echo '
                <tr>
                    <td width="3%">'.$no.'</td>
                    <td nowrap>'.$data["no_registrasi"].'</td>
                    <td nowrap>'.$data["nik"].'</td>
                    <td nowrap>'.$data["nama"].'</td>
                    <td nowrap>'.$join["surat"].'</td>
                    <td nowrap>'.date("d-m-Y", strtotime($data["tgl_registrasi"])).'</td>
                    <td nowrap>'.$data["ket"].'</td>
                </tr>
            ';
        $no++; 
        } 
    }
    elseif(isset($_POST['nama_surat']))
    {
        $a              = $_POST['nama_surat'];
        $tgl_dari1      = date("Y-m-d", strtotime($_POST['tgl_dari1']));
        $tgl_sampai1    = date("Y-m-d", strtotime($_POST['tgl_sampai1']));
        $sql            = mysqli_query($conn, "SELECT * FROM $a WHERE tgl_keluar BETWEEN '".$tgl_dari1."' AND '".$tgl_sampai1."'");        
        $no             = 1;
        
        switch ($a) {
            case 'tb_surat_pindah':
                $a = "Surat Pindah";
            break;

            case 'tb_surat_kelahiran':
                $a = "Surat Kelahiran";
            break;

            case 'tb_surat_keterangan_domisili':
                $a = "Surat Keterangan Domisili";
            break;

            case 'tb_surat_pengantar_kartu_keluarga':
                $a = "Surat Pengantar KK";
            break;

            case 'tb_surat_pengantar_ktp':
                $a = "Surat Pengantar KTP";
            break;

            case 'tb_surat_kehilangan':
                $a = "Surat Kehilangan";
            break;

            case 'tb_surat_keterangan_belum_menikah':
                $a = "Surat Keterangan Belum Menikah";
            break;

            case 'tb_surat_pengantar_nikah':
                $a = "Surat Pengantar Nikah";
            break;

            case 'tb_surat_keterangan_tidak_mampu':
                $a = "Surat Keterangan Tidak Mampu";
            break;

            case 'tb_surat_ahli_waris':
                $a = "Surat Ahli Waris";
            break;

            case 'tb_surat_izin_mendirikan_bangunan':
                $a = "Surat IMB";
            break;

            case 'tb_surat_izin_tempat_usaha':
                $a = "Surat SITU";
            break;

            case 'tb_surat_keterangan_usaha':
                $a = "Surat Keterangan Usaha";
            break;
            
            default:
                $a = "";
            break;
        }

        while ($data = mysqli_fetch_array($sql)) { 
            echo '
                <tr>
                    <td width="3%">'.$no.'</td>
                    <td nowrap>'.$data["no_registrasi"].'</td>
                    <td nowrap>'.$data["nik"].'</td>
                    <td nowrap>'.$data["nama"].'</td>
                    <td nowrap>'.$a.'</td>
                    <td nowrap>'.date("d-m-Y", strtotime($data["tgl_keluar"])).'</td>
                </tr>
            ';
        $no++; 
        } 
    }
?>