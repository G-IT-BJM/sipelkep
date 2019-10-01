<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIPELKEP</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
		body {
			background: url(img/logo/a.jpg) no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		.myBackground {
			background-color: rgba(255,255,255, 0.5);
			color: inherit;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="jumbotron myBackground well">
				<!-- <div class="well"> -->
					<div class="login-panel">
					<!-- <div class="login-panel panel panel-default"> -->
						<div class="panel-heading">Masuk Sebagai Admin</div>
						<hr>
						<div class="panel-body">
							<p style="font-size:15px;" class="text-danger">Mohon gunakan Nama pengguna dan Kata Sandi yang Valid</p>
							<form role="form" action="proses.php" method="post" enctype="multipart/form-data">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="Nama Pengguna" name="nama_pengguna" type="text">
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Kata Sandi" name="kata_sandi" type="password">
									</div>
									<button type="submit" name="login" class="btn btn-primary">Masuk</button>
									<a href="beranda.php"><button type="button" class="btn btn-danger">Batal</button></a>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
