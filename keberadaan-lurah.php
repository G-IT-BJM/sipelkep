    <?php
		include "header.php"; 
        include "sidebar.php"; 
        include "koneksi.php";

        $sql = mysqli_query($conn, "SELECT * FROM tb_keberadaan_lurah_admin");
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Informasi / Keberadaan Lurah</li>
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
                    Keberadaan Lurah
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-md-12">
                                    
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <a href="tambah-data-keberadaan-lurah.php"><button type="button" class="btn btn-primary btn-lg">Tambah Data</button></a>
                                        </div>
                                    </div>

                                    <div class="col-md-5"><br></div>

                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary btn-md" id="btn-search" name="btn-search"><span class="fa fa-search"></span></button>
                                            </span>
                                        </div>
                                        <br>
                                    </div>
                                    
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                        <table class="table table-bordered table-striped mb-0">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">KODE</th>
                                                <th scope="col">TANGGAL</th>
                                                <th scope="col">STATUS</th>
                                                <th scope="col">KETERANGAN</th>
                                                <th scope="col">AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no = 1;
                                                    while($data = mysqli_fetch_array($sql))
                                                    {
                                                        echo '
                                                        <tr>
                                                            <td>'.$no.'</td>
                                                            <td>'.$data["kd_lurah"].'</td>
                                                            <td>'.$data["tgl"].'</td>
                                                            <td>'.$data["status"].'</td>
                                                            <td>'.$data["ket"].'</td>
                                                            <td>
                                                                <a href="ubah-data-keberadaan-lurah.php?id='.$data["id"].'"><button type="button" class="btn btn-primary"><span class="fa fa-edit"></span></button></a> 
                                                                || 
                                                                <a href=""><button type="button" class="btn btn-danger"><span class="fa fa-trash"></span></button></a> 
                                                            </td>
                                                        </tr>
                                                        ';
                                                        $no++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
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
