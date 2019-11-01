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
				<li class="active">Pengaturan / Salin Data</li>
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
                    Salin Data
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="proses.php" method="post" target="_blank">
                        <fieldset>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pilih_data">Pilih Data</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="pilih_data" name="pilih_data">
                                        <option value=''>Pilih Data</option>
                                        <option value='tb_data_penduduk'>Data Penduduk</option>
                                        <option value='tb_data_surat'>Data Surat</option>
                                        <option value='tb_surat_ahli_waris'>Data Surat Ahli Waris</option>
										<option value="tb_surat_izin_mendirikan_bangunan">Data Surat Izin Mendirikan Bangunan</option>
										<option value="tb_surat_izin_tempat_usaha">Data Surat Izin Tempat Usaha</option>
										<option value="tb_surat_kehilangan">Data Surat Kehilangan</option>
										<option value="tb_surat_keterangan_belum_menikah">Data Surat Belum Menikah</option>
										<option value="tb_surat_keterangan_domisili">Data Surat Keterangan Domisili</option>
										<option value="tb_surat_keterangan_tidak_mampu">Data Surat Keterangan Tidak Mampu</option>
										<option value="tb_surat_keterangan_usaha">Data Surat Keterangan Usaha</option>
										<option value="tb_surat_pengantar_kartu_keluarga">Data Surat Pengantar KK</option>
										<option value="tb_surat_pengantar_ktp">Data Surat Pengantar KTP</option>
										<option value="tb_surat_pengatar_nikah">Data Surat Pengatar Nikah</option>
										<option value="tb_surat_pindah">Data Surat Pindah</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <!-- <button type="submit" class="btn btn-danger btn-md pull-right">Kembali</button> -->
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="salin_data" class="btn btn-success btn-md pull-right">Salin</button>
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
