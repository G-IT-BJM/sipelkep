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
	<link rel="icon" type="image/png" href="img/logo/logo.png">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
			$( ".datepicker" ).datepicker({
				format: 'dd-mm-yyyy'
			});
		});
  </script>

	<style>
		body {
			background: url(img/logo/b.jpg) no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		.myBackground {
			background-color: rgba(255,255,255, 0.5);
			color: inherit;
		}

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