    <?php
		include "header.php"; 
        include "sidebar.php"; 
        include "koneksi.php";

        $id = $_GET['id'];
        $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_keberadaan_lurah_admin WHERE id = '$id'"));
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Informasi / Ubah Data Keberadaan Lurah</li>
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
                    Ubah Data Keberadaan Lurah
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="proses.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <input type="hidden" id="id" name="id" value="<?php echo $data["id"]; ?>">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="kode">Kode</label>
                                <div class="col-md-9">
                                    <input id="kode" name="kode" type="text" value="<?php echo $data["kd_lurah"]; ?>" placeholder="Kode" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="tgl">Tanggal</label>
                                <div class="col-md-4">
                                    <input id="tgl" name="tgl" type="date" value="<?php echo $data["tgl"]; ?>" placeholder="Tanggal" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="status">Status</label>
                                <div class="col-md-9">
                                    <?php 
                                        if($data["status"] == "TIDAK ADA") {
                                            echo '
                                                <input id="status" name="status" value="ADA" type="radio"> Ada
                                                <input id="status" name="status" value="TIDAK ADA" type="radio" checked> Tidak Ada
                                            ';
                                        } else {
                                            echo '
                                                <input id="status" name="status" value="ADA" type="radio" checked> Ada
                                                <input id="status" name="status" value="TIDAK ADA" type="radio"> Tidak Ada
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="5"><?php echo $data["ket"]; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <a href="keberadaan-lurah.php"><button type="button" class="btn btn-danger btn-md pull-right">Kembali</button></a>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="ubah_keberadaan_lurah" class="btn btn-success btn-md pull-right">Perbarui</button>
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
