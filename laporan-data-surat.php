<?php
		include "header.php"; 
        include "sidebar.php"; 
        include "koneksi.php";
        
        $sql = mysqli_query($conn, "SELECT * FROM tb_data_surat");
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Laporan / Laporan Data Surat</li>
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
                    Laporan Data Surat
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="view-laporan-data-surat.php" target="_BLANK" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-md-12">

                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <button type="submit" class="btn btn-primary btn-lg">Preview <span class="fa fa-file-text"></span></button>
                                        </div>
                                    </div>
                                    <br><br><br>
                                    <div class="table-responsive" style="height:500px;overflow:auto;">
                                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                            <table class="table table-bordered table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Jenis Surat</th>
                                                        <th scope="col">Syarat</th>
                                                        <th scope="col">Keterangan</th>                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="myTable">
                                                    <?php 
                                                        $no = 1;
                                                        while ($data = mysqli_fetch_array($sql)) { 
                                                    ?>
                                                    <tr>
                                                        <td width="3%"><?=$no?></td>
                                                        <td width="30%"><?=$data['surat']?></td>
                                                        <td><?=nl2br($data['syarat'])?></td>
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
