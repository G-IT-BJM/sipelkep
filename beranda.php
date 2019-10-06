<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIPELKEP</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<style>
		html,body {
			height:auto;
			width:100%;
			position:relative;
		}
		#background-carousel{
			position:fixed;
			width:100%;
			height:80%;
			z-index:-1;
		}
		.carousel,.carousel-inner {
			width:100%;
			height:100%;
			z-index:0;
			overflow:hidden;
		}
		.item {
			width:100%;
			height:100%;
			background-position:center center;
			background-size:cover;
			z-index:0;
		}
		
		#content-wrapper {
			position:absolute;
			z-index:1 !important;
			min-width:100%;
			min-height:100%;
		}
		.well {
			opacity:0.85;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href=""><span style="color:yellow;">Si </span>PelKep</a>
				<ul class="nav navbar-top-links navbar-right">
					
				</ul>
			</div>
		</div>
	</nav>

	<?php
		// include "header.php"; 
		include "sidebar.php"; 
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