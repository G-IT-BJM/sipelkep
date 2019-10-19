    <?php
		include "header.php"; 
        include "sidebar.php"; 
        include "koneksi.php";

        $nik = $_GET['nik'];
        $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_data_penduduk WHERE nik = '$nik'"));
	?>
	
    <style>
        input{
            text-transform:uppercase;
        }
    </style>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Master / Ubah Data Penduduk</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
                <h3 class="page-header"></h3>
			</div>
		</div>
		
		<div class="row">
            <div class="panel panel-default col-md-10 col-md-offset-1">
                <div class="panel-heading">
                    Ubah Data Penduduk
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="proses.php?nik=<?= $nik; ?>" method="post" enctype="multipart/form-data">
                        <fieldset>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nik">NIK</label>
                                <div class="col-md-9">
                                    <input id="nik" name="nik" type="text" value="<?= $data["nik"]; ?>" placeholder="NIK" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nama">Nama</label>
                                <div class="col-md-9">
                                    <input id="nama" name="nama" type="text" value="<?= $data["nama"]; ?>" placeholder="Nama" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="tempat_lahir">Tempat Lahir</label>
                                <div class="col-md-9">
                                    <input id="tempat_lahir" name="tempat_lahir" type="text" value="<?= $data["t_lahir"]; ?>" placeholder="Tempat Lahir" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="tgl_lahir">Tanggal Lahir</label>
                                <div class="col-md-3">
                                    <input id="tgl_lahir" name="tgl_lahir" value="<?= $data["tgl_lahir"]; ?>" type="date" placeholder="Tgl Lahir" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <?php 
                                        if($data["jk"] == "L") {
                                            echo '
                                                <input id="jenis_kelamin" name="jenis_kelamin" value="L" type="radio" checked> Laki -Laki
                                                <input id="jenis_kelamin" name="jenis_kelamin" value="P" type="radio" > Perempuan
                                            ';
                                        } else {
                                            echo '
                                                <input id="jenis_kelamin" name="jenis_kelamin" value="L" type="radio" > Laki -Laki
                                                <input id="jenis_kelamin" name="jenis_kelamin" value="P" type="radio" checked> Perempuan
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="gol_darah">Gol Darah</label>
                                <div class="col-md-3">
                                    <select class="form-control" id="gol_darah" name="gol_darah">
                                        <option value="<?= $data["gol_dar"]; ?>" selected><?= $data["gol_dar"]; ?></option>
                                        <option value="" disabled>~ Gol. Darah ~</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="alamat">Alamat</label>
                                <div class="col-md-9">
                                    <input id="alamat" name="alamat" type="text" value="<?= $data["alamat"]; ?>" placeholder="Alamat" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="rt">Rt</label>
                                <div class="col-md-2">
                                    <input id="rt" name="rt" type="text" value="<?= $data["rt"]; ?>" placeholder="Rt" class="form-control">
                                </div>
                            
                                <label class="col-md-1 control-label" for="rw">Rw</label>
                                <div class="col-md-2">
                                    <input id="rw" name="rw" type="text" value="<?= $data["rw"]; ?>" placeholder="Rw" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="kelurahan">Kelurahan</label>
                                <div class="col-md-9">
                                    <input id="kelurahan" name="kelurahan" type="text" value="<?= $data["kel"]; ?>" placeholder="Kelurahan" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="kecamatan">Kecamatan</label>
                                <div class="col-md-9">
                                    <input id="kecamatan" name="kecamatan" type="text" value="<?= $data["kec"]; ?>" placeholder="Kecamatan" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="agama">Agama</label>
                                <div class="col-md-3">
                                    <select class="form-control" id="agama" name="agama">
                                        <option value="<?= $data["agama"]; ?>" selected><?= $data["agama"]; ?></option>
                                        <option value="" disabled>Agama ~</option>
                                        <option value="ISLAM">ISLAM</option>
                                        <option value="KRISTEN PROTESTAN">KRISTEN PROTESTAN</option>
                                        <option value="KATOLIK">KATOLIK</option>
                                        <option value="HINDU">HINDU</option>
                                        <option value="BUDDHA">BUDDHA</option>
                                        <option value="KONG HU CU">KONG HU CU</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="status">Status Kawin</label>
                                <div class="col-md-3">
                                    <select class="form-control" required id="status" name="status">
                                        <option value="<?= $data["status_p"]; ?>" selected><?= $data["status_p"]; ?></option>
                                        <option value="" disabled>Status ~</option>
                                        <option value="KAWIN">KAWIN</option>
                                        <option value="BELUM KAWIN">BELUM KAWIN</option>
                                        <option value="CERAI HIDUP">CERAI HIDUP</option>
                                        <option value="CERAI MATI">CERAI MATI</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pekerjaan">Pekerjaan</label>
                                <div class="col-md-9">
                                    <input id="pekerjaan" name="pekerjaan" type="text" value="<?= $data["kerja"]; ?>" placeholder="Pekerjaan" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="kewarganegaraan">Kewarganegaraan</label>
                                <div class="col-md-3">
                                    <select class="form-control" required id="kewarganegaraan" name="kewarganegaraan">
                                        <option value="<?= $data["warga"]; ?>" selected><?= $data["warga"]; ?></option>
                                        <option value="" disabled>Kewarganegaraan ~</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="telp">Telp / HP</label>
                                <div class="col-md-5">
                                    <input id="telp" name="telp" type="text" value="<?= $data["telp"]; ?>" placeholder="Telp / HP" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="5"><?= $data["ket"]; ?>-</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <a href="data-penduduk.php"><button type="button" class="btn btn-danger btn-md pull-right">Kembali</button></a>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="ubah_data_penduduk" class="btn btn-success btn-md pull-right">Perbarui</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        
		<div class="row">
            <br><br><br>
			<?php include "footer.php"; ?>
		</div>
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
            });
        };

        $(document).ready(function(){
            var a = "#nama,#tempat_lahir,#kelurahan,#kecamatan,#pekerjaan";
            $(a).keypress(function(){
                var charCode = (a.which) ? a.which : event.keyCode
                if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
                    return false;
                return true;
            });

            var b = "#nik,#rt,#rw,#telp";
            $(b).keypress(function(){
                var charCode = (b.which) ? b.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
        
                    return false;
                return true;
            });
        });

	</script>
	<script src="js/required.js"></script>
		
</body>
</html>
