    <?php
		include "header.php"; 
        include "sidebar.php"; 
        include "koneksi.php";

        $sql = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_admin WHERE status = 1"));
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Pengaturan / Ubah Sandi</li>
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
                    Ubah Sandi
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="proses.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <input type="hidden" value="<?php echo $sql["id"]; ?>" name="id" id="id">
                            <input type="hidden" value="<?php echo $sql["nama_pengguna"]; ?>" name="nama" id="nama">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="kata_sandi_lama">Kata Sandi Lama</label>
                                <div class="col-md-9">
                                    <input id="kata_sandi_lama" name="kata_sandi_lama" type="password" placeholder="Kata Sandi Lama" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="kata_sandi_baru">Kata Sandi Baru</label>
                                <div class="col-md-9">
                                    <input id="kata_sandi_baru" name="kata_sandi_baru" type="password" placeholder="Kata Sandi Baru" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="konfirm_kata_sandi_baru">Konfirm Kata Sandi Baru</label>
                                <div class="col-md-9">
                                    <input id="konfirm_kata_sandi_baru" name="konfirm_kata_sandi_baru" type="password" placeholder="Konfirm Kata Sandi Baru" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <a href="beranda.php"><button type="button" class="btn btn-danger btn-md pull-right">Kembali</button></a>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit"  name="ubah_kata_sandi" class="btn btn-success btn-md pull-right">Simpan</button>
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
