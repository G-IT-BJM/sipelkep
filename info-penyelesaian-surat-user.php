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
				<li class="active">Informasi / Informasi Penyelesaian Surat User</li>
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
                    Informasi Penyelesaian Surat
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="no_reg_permohonan">No Reg. Permohonan</label>
                                <div class="col-md-9">
                                    <input id="no_reg_permohonan" name="no_reg_permohonan" type="text" placeholder="Isikan Nomor Registrasi Permohonan" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message"></label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="isi" name="isi" rows="5" readonly style="resize:none;"></textarea>
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

		$(function() {
			$("#no_reg_permohonan").change(function(){
				var noreg = $("#no_reg_permohonan").val();
				$.ajax({
					url: 'ajax_cek.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'no_registrasi': noreg
					},
					success: function (data) {
						// $("#isi").val("Tanggal Selesai : \n"+data['tgl_keluar']);
						$("#isi").val("Tanggal Selesai : \n"+data);
					}
				});
			});
		});
	</script>
		
</body>
</html>
