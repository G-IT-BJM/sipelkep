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
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Masuk Sebagai Admin</div>
				<div class="panel-body">
					<p class="text-danger">Mohon gunakan Nama pengguna dan Kata Sandi yang Valid</p>
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
	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
