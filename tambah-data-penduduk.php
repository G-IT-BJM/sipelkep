    <?php
		include "header.php"; 
		include "sidebar.php"; 
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Master / Tambah Data Penduduk</li>
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
                    Tambah Data Penduduk
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nik">NIK</label>
                                <div class="col-md-9">
                                    <input id="nik" name="nik" type="text" placeholder="NIK" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nama">Nama</label>
                                <div class="col-md-9">
                                    <input id="nama" name="nama" type="text" placeholder="Nama" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="tempat_lahir">Tempat Lahir</label>
                                <div class="col-md-9">
                                    <input id="tempat_lahir" name="tempat_lahir" type="text" placeholder="Tempat Lahir" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="tgl_lahir">Tanggal Lahir</label>
                                <div class="col-md-3">
                                    <input id="tgl_lahir" name="tgl_lahir" type="date" placeholder="Tgl Lahir" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <input id="jenis_kelamin" name="jenis_kelamin" type="radio" > Laki -Laki
                                    <input id="jenis_kelamin" name="jenis_kelamin" type="radio" > Perempuan
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="gol_darah">Gol Darah</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="gol_darah" name="gol_darah">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="alamat">Alamat</label>
                                <div class="col-md-9">
                                    <input id="alamat" name="alamat" type="text" placeholder="Alamat" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="rt">Rt</label>
                                <div class="col-md-9">
                                    <input id="rt" name="rt" type="text" placeholder="Rt" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="rw">Rw</label>
                                <div class="col-md-9">
                                    <input id="rw" name="rw" type="text" placeholder="Rw" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="keluarahan">Keluarahan</label>
                                <div class="col-md-9">
                                    <input id="keluarahan" name="keluarahan" type="text" placeholder="Keluarahan" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="kecamatan">Kecamatan</label>
                                <div class="col-md-9">
                                    <input id="kecamatan" name="kecamatan" type="text" placeholder="Kecamatan" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="agama">Agama</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="agama" name="agama">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="status">Status</label>
                                <div class="col-md-9">
                                    <input id="status" name="status" type="text" placeholder="Status" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pekerjaan">Pekerjaan</label>
                                <div class="col-md-9">
                                    <input id="pekerjaan" name="pekerjaan" type="text" placeholder="Pekerjaan" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="kewarganegaraan">Kewarganegaraan</label>
                                <div class="col-md-9">
                                    <input id="kewarganegaraan" name="kewarganegaraan" type="text" placeholder="Kewarganegaraan" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="telp">Telp / HP</label>
                                <div class="col-md-9">
                                    <input id="telp" name="telp" type="text" placeholder="Telp / HP" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
                                <div class="col-md-9">
                                    <input id="keterangan" name="keterangan" type="text" placeholder="Keterangan" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-danger btn-md pull-right">Kembali</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success btn-md pull-right">Simpan</button>
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
	</script>
		
</body>
</html>
