<?php 
	include "koneksi.php";
	session_start();
	if(!empty($_SESSION['nama_pengguna'])) {
?>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="img/logo/logo.png" class="img-responsive" style="width:50%;height:auto;" alt="">
			</div>
			<!-- <div class="profile-usertitle"> -->
				<!-- <div class="profile-usertitle-name">Username</div> -->
				<!-- <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div> -->
			<!-- </div> -->
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
			<li><a href="hal-beranda.php"><em class="fa fa-home">&nbsp;</em> Beranda</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Master <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a href="data-penduduk.php">
						 Data Penduduk
						<!-- <span class="fa fa-arrow-right">&nbsp;</span> Data Penduduk -->
					</a></li>
					<li><a href="data-surat.php">
						 Data Surat
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Transaksi <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a href="surat-pindah.php">
						 Surat Pindah
					</a></li>
					<li><a href="surat-kelahiran.php">
						 Surat Kelahiran
					</a></li>
					<li><a href="surat-ket-domisili.php">
						 Surat Ket. Domisili
					</a></li>
					<li><a href="surat-pengantar-kk.php">
						 Surat Pengantar KK
					</a></li>
					<li><a href="surat-pengantar-ktp.php">
						 Surat Pengantar KTP
					</a></li>
					<li><a href="surat-kehilangan.php">
						 Surat Kehilangan
					</a></li>
					<li><a href="surat-ket-belum-nikah.php">
						 Surat Ket. Belum Nikah
					</a></li>
					<li><a href="surat-pengantar-nikah.php">
						 Surat Pengantar Nikah
					</a></li>
					<li><a href="surat-ket-tidak-mampu.php">
						 Surat Ket. Tidak Mampu
					</a></li>
					<li><a href="surat-ahli-waris.php">
						 Surat Ahli Waris
					</a></li>
					<li><a href="surat-imb.php">
						 Surat IMB
					</a></li>
					<li><a href="surat-izin-tempat-usaha.php">
						 Surat Izin Tempat Usaha
					</a></li>
					<li><a href="surat-ket-usaha.php">
						 Surat Keterangan Usaha
					</a></li>
				</ul>
            </li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-navicon">&nbsp;</em> Informasi <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<!-- <li><a href="pembuatan-surat.php">
						 Pembuatan Surat
					</a></li> -->
					<!-- <li><a href="penyelesaian-surat.php">
						 Penyelesaian Surat
					</a></li> -->
					<li><a href="keberadaan-lurah.php">
						 Keberadaan Lurah
					</a></li>
				</ul>
            </li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
				<em class="fa fa-navicon">&nbsp;</em> Laporan <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li><a href="laporan-data-penduduk.php">
						 Laporan Data Penduduk
					</a></li>
					<li><a href="laporan-data-surat.php">
						 Laporan Data Surat
					</a></li>
				</ul>
            </li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-5">
				<em class="fa fa-navicon">&nbsp;</em> Pengaturan <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-5">
					<li><a href="ubah-sandi.php">
						 Ubah Sandi
					</a></li>
					<li><a href="salin-data.php">
						 Salin Data
					</a></li>
				</ul>
			</li>
			<!-- <li><a href="widgets.php"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
			<li><a href="panels.php"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li> -->
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Keluar</a></li>
		</ul>
	</div>
<?php
	} else {
?>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="img/logo/logo.png" class="img-responsive" style="width:50%;height:auto;" alt="">
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li><a href="beranda.php"><em class="fa fa-home">&nbsp;</em> Beranda</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Registrasi <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a href="pelayanan-surat.php">
						 Pelayanan Surat
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Informasi <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a href="info-pembuatan-surat-user.php">
						 Pembuatan Surat
					</a></li>
					<li><a href="info-penyelesaian-surat-user.php">
						 Penyelesaian Surat
					</a></li>
					<li><a href="info-keberadaan-lurah.php">
						 Keberadaan Lurah
					</a></li>
				</ul>
			</li>
			<li><a href="login.php"><em class="fa fa-sign-in">&nbsp;</em> Masuk</a></li>
		</ul>
	</div>
<?php
	}
?>
	