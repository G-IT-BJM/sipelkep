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
				<li class="active">Informasi / Informasi Pembuatan Surat User</li>
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
                    Informasi Pembuatan Surat
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="jenis_surat">Pilih Jenis Surat</label>
                                <div class="col-md-7">
									<select class="form-control" onchange="cek_()" id="jenis_surat" name="jenis_surat">
                                        <option value="" selected>Pilih Jenis Surat ---</option>
                                        <?php 
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_data_surat");
                                            while($data = mysqli_fetch_array($sql)) {
                                                echo '
                                                    <option value="'.$data["kd_surat"].'">'.$data["surat"].'</option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-3 control-label" for="message"></label>
                                <div class="col-md-9">
									<label >Persyaratan :</label>
                                </div>
                            
                                <label class="col-md-3 control-label" for="message"></label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="isi" name="isi" rows="5" readonly style="resize: none;"></textarea>
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

        function cek_(){
            var js = $("#jenis_surat").val();
            $.ajax({
                url: 'ajax_cek.php',
                data:"jenis_surat="+js ,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#isi').val(obj.isi);
            });
        }
	</script>
		
</body>
</html>
