<?php 
	include "koneksi.php";
	session_start();
	if(!empty($_SESSION['nama_pengguna'])) {
?>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
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
			<li class=""><a href="beranda.php"><em class="fa fa-home">&nbsp;</em> Beranda</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Master <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="data-penduduk.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Data Penduduk
					</a></li>
					<li><a class="" href="data-surat.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Data Surat
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Transaksi <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="surat-pindah.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Pindah
					</a></li>
					<li><a class="" href="surat-kelahiran.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Kelahiran
					</a></li>
					<li><a class="" href="surat-ket-domisili.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Ket. Domisili
					</a></li>
					<li><a class="" href="surat-pengantar-kk.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Pengantar KK
					</a></li>
					<li><a class="" href="surat-pengantar-ktp.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Pengantar KTP
					</a></li>
					<li><a class="" href="surat-kehilangan.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Kehilangan
					</a></li>
					<li><a class="" href="surat-ket-belum-nikah.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Ket. Belum Nikah
					</a></li>
					<li><a class="" href="surat-pengantar-nikah.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Pengantar Nikah
					</a></li>
					<li><a class="" href="surat-ket-tidak-mampu.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Ket. Tidak Mampu
					</a></li>
					<li><a class="" href="surat-ahli-waris.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Ahli Waris
					</a></li>
					<li><a class="" href="surat-imb.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat IMB
					</a></li>
					<li><a class="" href="surat-izin-tempat-usaha.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Izin Tempat Usaha
					</a></li>
					<li><a class="" href="surat-ket-usaha.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Surat Keterangan Usaha
					</a></li>
				</ul>
            </li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-navicon">&nbsp;</em> Informasi <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="pembuatan-surat.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Pembuatan Surat
					</a></li>
					<li><a class="" href="penyelesaian-surat.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Penyelesaian Surat
					</a></li>
					<li><a class="" href="keberadaan-lurah.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Keberadaan Lurah
					</a></li>
				</ul>
            </li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
				<em class="fa fa-navicon">&nbsp;</em> Laporan <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li><a class="" href="laporan-data-penduduk.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Laporan Data Penduduk
					</a></li>
					<li><a class="" href="laporan-data-surat.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Laporan Data Surat
					</a></li>
				</ul>
            </li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-5">
				<em class="fa fa-navicon">&nbsp;</em> Pengaturan <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-5">
					<li><a class="" href="ubah-sandi.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Ubah Sandi
					</a></li>
					<li><a class="" href="salin-data.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Salin Data
					</a></li>
				</ul>
			</li>
			<!-- <li><a href="widgets.php"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
			<li><a href="panels.php"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li> -->
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
<?php
	} else {
?>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li class=""><a href="beranda.php"><em class="fa fa-home">&nbsp;</em> Beranda</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Registrasi <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="pelayanan-surat.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Pelayanan Surat
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Informasi <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="info-pembuatan-surat-user.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Pembuatan Surat
					</a></li>
					<li><a class="" href="info-penyelesaian-surat-user.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Penyelesaian Surat
					</a></li>
					<li><a class="" href="info-keberadaan-lurah.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Keberadaan Lurah
					</a></li>
				</ul>
			</li>
			<li><a href="login.php"><em class="fa fa-sign-in">&nbsp;</em> LogIn</a></li>
		</ul>
	</div><!--/.sidebar-->
<?php
	}
?>
	