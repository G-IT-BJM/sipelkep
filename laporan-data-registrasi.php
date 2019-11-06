    <?php
		include "header.php"; 
        include "sidebar.php"; 
        include "koneksi.php";
        
        $sql = mysqli_query($conn, "SELECT * FROM tb_register_pelayanan_surat");
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Laporan / Laporan Data Registrasi</li>
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
                    Laporan Data Registrasi
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <form class="form-horizontal" action="view-laporan-data-registrasi.php" target="_BLANK" method="post" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Dari Tanggal :</label>
                                                    <input type="text" id="tgl_dari" name="tgl_dari" class="form-control datepicker">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Sampai Tanggal :</label>
                                                    <input type="text" id="tgl_sampai" name="tgl_sampai" class="form-control datepicker">
                                                </div>
                                                <div class="col-md-4">
                                                    <h1></h1>
                                                    <button type="button" name="lihat_data_reg" id="lihat_data_reg" class="btn btn-primary btn-lg">Lihat <span class="fa fa-search"></span></button>
                                                    <a href="view-laporan-data-registrasi.php" target="_BLANK"><button type="submit" class="btn btn-primary btn-lg" name="btn" id="btn">Preview <span class="fa fa-print"></span></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
                                                    <th scope="col">Tgl Registrasi</th>
                                                    <th scope="col">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                            <?php 
                                                $sql        = mysqli_query($conn, "SELECT * FROM tb_register_pelayanan_surat");
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
                                            ?>
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
			$("#lihat_data_reg").on('click',function(){
				var tgldari = $("#tgl_dari").val();
				var tglsampai = $("#tgl_sampai").val();
				$.ajax({
					url: 'ajax_cek.php',
					type: 'POST',
					data: {
                        'tgl_dari': tgldari,
                        'tgl_sampai': tglsampai
					},
					success: function (data) {
                        $( '#myTable' ).html("");
                        $( '#myTable' ).html(data);
                        // $('#btn').removeAttr('disabled');
                    }
                });
			});
        });
	</script>
		
</body>
</html>
