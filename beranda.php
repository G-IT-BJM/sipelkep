    <?php
		include "header.php"; 
		include "sidebar.php"; 
	?>
	<?php 
		include "koneksi.php";
		if(!empty($_SESSION['nama_pengguna'])) {
			$j_penduduk = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data_penduduk"));
			$j_surat = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_data_surat"));
			$tgl = gmdate("Y-m-d", time()+60*60*7);
			$j_pel_surat = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_register_pelayanan_surat WHERE tgl_registrasi = '$tgl'"));
	?>
			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
				<div class="row">
					<ol class="breadcrumb">
						<li><a href="#">
							<em class="fa fa-home"></em>
						</a></li>
						<li class="active">Beranda</li>
					</ol>
				</div>
				<br>
				<div class="jumbotron myBackground well">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-header">HALAMAN ADMINISTRATOR</h3>
					</div>
				</div>
			
				<div class="row">
					<div class="col-xs-6 col-md-4">
						<div class="panel panel-default">
							<div class="panel-body easypiechart-panel">
								<a href="data-penduduk.php" style="text-decoration:none;">
									<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $j_penduduk; ?>" ><span class="percent"><?php echo $j_penduduk; ?></span></div>
									<p><b>Jumlah Penduduk</b></p>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-md-4">
						<div class="panel panel-default">
							<div class="panel-body easypiechart-panel">
								<a href="data-surat.php" style="text-decoration:none;">
									<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $j_surat; ?>" ><span class="percent"><?php echo $j_surat; ?></span></div>
									<p><b>Jumlah Surat</b></p>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-md-4">
						<div class="panel panel-default">
							<div class="panel-body easypiechart-panel">
								<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $j_pel_surat; ?>" ><span class="percent"><?php echo $j_pel_surat; ?></span></div>
								<p><b>Jumlah Registrasi Pelayanan Surat <?= "<br>".date("d-m-Y", strtotime($tgl)); ?></b></p>
							</div>
						</div>
					</div>
				</div>
				</div>
			
				<div class="row">
					<?php include "footer.php"; ?>
				</div>
			</div><!--/.main-->

	<?php
		} else {
	?>		
			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
				<div class="row">
					<ol class="breadcrumb">
						<li><a href="#">
							<em class="fa fa-home"></em>
						</a></li>
						<li class="active">Beranda</li>
					</ol>
				</div>
				
				<br>
				<div class="row">
					<div id="background-carousel">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active" style="background-image:url(img/logo/5.jpg)"></div>
								<div class="item" style="background-image:url(img/logo/2.jpg)"></div>
								<div class="item" style="background-image:url(img/logo/3.jpg)"></div>  
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header"></h1>
					</div>
				</div>
				
				<!-- <div class="jumbotron myBackground well"> -->
				<div class="well">
					<div class="row">
						<div class="col-md-1">
							
						</div>
						<div class="col-md-3">
							<img src="img/logo/logo.png" alt="User Avatar" class="img-circle" width="100%" />
						</div>
						<div class="col-md-6">
							<!-- <div class="panel panel-default">
								<div class="panel-body easypiechart-panel">
									<h4>Comments</h4>
									<div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span></div>
								</div>
							</div> -->
							<h3 class="timeline-title text-center">SELAMAT DATANG DI WEBSITE <br> PELAYANAN ADMINISTRASI KEPENDUDUKAN <br> KELURAHAN SUNGAI JINGAH</h3>
							<hr>
							<p class="text-center">Jl. Jahri Saleh, Sungai Jingah, Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70122, Indonesia</p>
						</div>
					</div>
				</div>

				<div class="row">
					<?php include "footer.php"; ?>
				</div>
			</div><!--/.main-->
	<?php
		}
	?>
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

		$('#myCarousel').carousel({
			pause: 'none'
		})
	</script>
</body>
</html>