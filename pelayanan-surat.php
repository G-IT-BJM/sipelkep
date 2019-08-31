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
				<li class="active">Pelayanan Surat</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"></h1>
			</div>
		</div>
		
		<div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" width="80%" />
            </div>
        </div>
        
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
                <h3 class="timeline-title">PELAYANAN PENDUDUKAN ADMINISTRASI KELURAHAN SUNGAI JINGAH</h3>
                <hr>
			</div>
        </div>
        
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <a href="pelayanan-registrasi-surat.php"><button type="button" class="btn btn-primary"> REGISTRASI</button></a>
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
