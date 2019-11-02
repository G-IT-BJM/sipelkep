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
				<li class="active">Laporan / Laporan Data Penyelesaian Surat</li>
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
                    Laporan Data Penyelesaian Surat
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="form-group">
                            <div class="col-md-12">
                                <form class="form-horizontal" action="view-laporan-data-penyelesaian-surat.php" target="_BLANK" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Nama Surat</label>
                                                    <select class="form-control" id="nama_surat" name="nama_surat">
                                                        <option value='' selected disabled>Pilih Surat . . .</option>
                                                        <option value="tb_surat_pindah">Surat Pindah</option>
                                                        <option value='tb_surat_kelahiran'>Surat Kelahiran</option>
                                                        <option value="tb_surat_keterangan_domisili">Surat Keterangan Domisili</option>
                                                        <option value="tb_surat_pengantar_kartu_keluarga">Surat Pengantar KK</option>
                                                        <option value="tb_surat_pengantar_ktp">Surat Pengantar KTP</option>
                                                        <option value="tb_surat_kehilangan">Surat Kehilangan</option>
                                                        <option value="tb_surat_keterangan_belum_menikah">Surat Belum Menikah</option>
                                                        <option value="tb_surat_pengantar_nikah">Surat Pengatar Nikah</option>
                                                        <option value="tb_surat_keterangan_tidak_mampu">Surat Keterangan Tidak Mampu</option>
                                                        <option value='tb_surat_ahli_waris'>Surat Ahli Waris</option>
                                                        <option value="tb_surat_izin_mendirikan_bangunan">Surat Izin Mendirikan Bangunan</option>
                                                        <option value="tb_surat_izin_tempat_usaha">Surat Izin Tempat Usaha</option>
                                                        <option value="tb_surat_keterangan_usaha">Surat Keterangan Usaha</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Dari Tanggal :</label>
                                                    <input type="text" id="tgl_dari1" name="tgl_dari1" class="form-control datepicker">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Sampai Tanggal :</label>
                                                    <input type="text" id="tgl_sampai1" name="tgl_sampai1" class="form-control datepicker">
                                                </div>
                                                <div class="col-md-4">
                                                    <h1></h1>
                                                    <button type="button" name="lihat_data_sel_surat" id="lihat_data_sel_surat" class="btn btn-primary btn-lg">Lihat <span class="fa fa-search"></span></button>
                                                    <a href="view-laporan-data-penyelesaian-surat.php" target="_BLANK"><button type="submit" class="btn btn-primary btn-lg" name="btn" id="btn">Preview <span class="fa fa-print"></span></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="table-responsive" style="height:500px;overflow:auto;">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                        <table class="table table-bordered table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">No Registrasi</th>
                                                    <th scope="col">NIK</th>
                                                    <th scope="col">Nama</th> 
                                                    <th scope="col">Surat</th>
                                                    <th scope="col">Tanggal Penyelesaian</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
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
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(function() {
			$("#lihat_data_sel_surat").on('click',function(){
				var namasurat   = $("#nama_surat").val();
				var tgldari     = $("#tgl_dari1").val();
				var tglsampai   = $("#tgl_sampai1").val();
				$.ajax({
					url: 'ajax_cek.php',
					type: 'POST',
					data: {
                        'nama_surat': namasurat,
                        'tgl_dari1': tgldari,
                        'tgl_sampai1': tglsampai
					},
					success: function (data) {
                        $( '#myTable' ).html(data);
                        // $('#btn').removeAttr('disabled');
                    }
                });
			});
        });
	</script>
		
</body>
</html>
