<?php
		include "header.php"; 
        include "sidebar.php"; 
        include "koneksi.php";
        
        $sql = mysqli_query($conn, "SELECT * FROM tb_data_penduduk");
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Laporan / Laporan Data Penduduk</li>
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
                    Laporan Data Penduduk
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-md-12">

                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <a href="view-laporan-data-penduduk.php" target="_BLANK"><button type="button" class="btn btn-primary btn-lg">Cetak Laporan</button></a>
                                        </div>
                                    </div>
                                    <br><br><br>
                                    <div class="table-responsive" style="height:500px;overflow:auto;">
                                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                            <table class="table table-bordered table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">NIK</th>
                                                        <th scope="col">NAMA</th>
                                                        <th scope="col">TTL</th>
                                                        <th scope="col">JK</th>
                                                        <th scope="col">ALAMAT</th>
                                                        <th scope="col">AGAMA</th>
                                                        <th scope="col">STATUS</th>
                                                        <th scope="col">PEKERJAAN</th>
                                                        <th scope="col">WARGA</th>
                                                        <th scope="col">TELP</th>
                                                        <th scope="col">KET.</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="myTable">
                                                    <?php 
                                                        $no = 1;
                                                        while ($data = mysqli_fetch_array($sql)) { 
                                                    ?>
                                                    <tr>
                                                        <td><?=$no?></td>
                                                        <td><?=$data['nik']?></td>
                                                        <td><?=$data['nama']?></td>
                                                        <td><?=$data['t_lahir'].",".date("d-m-Y",strtotime($data['tgl_lahir']))?></td>
                                                        <td><?=$data['jk']?></td>
                                                        <td><?=$data['alamat']?></td>
                                                        <td><?=$data['agama']?></td>
                                                        <td><?=$data['status_p']?></td>
                                                        <td><?=$data['kerja']?></td>
                                                        <td><?=$data['warga']?></td>
                                                        <td><?=$data['telp']?></td>
                                                        <td><?=$data['ket']?></td>
                                                    </tr>
                                                    <?php $no++; } ?>
                                                </tbody>
                                            </table>
                                        </div>
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

        $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
	</script>
		
</body>
</html>
