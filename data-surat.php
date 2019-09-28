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
				<li class="active">Master / Data Surat</li>
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
                    Data Surat
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-md-12">
                                    
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <!-- <a href="tambah-data-surat.php"><button type="button" class="btn btn-primary btn-lg">Tambah Data</button></a> -->
                                        </div>
                                    </div>

                                    <div class="col-md-4"><br></div>

                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary btn-md" id="btn-search" name="btn-search"><span class="fa fa-search"></span></button>
                                            </span>
                                        </div>
                                        <br>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="table-responsive" style="overflow: auto;">
                                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                                <table class="table table-bordered table-striped mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">KD SURAT</th>
                                                            <th scope="col">JENIS SURAT</th>
                                                            <th scope="col">SYARAT</th>
                                                            <th scope="col">KETERANGAN</th>
                                                            <th scope="col">AKSI</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="myTable">
                                                        <?php 
                                                            $no = 1;
                                                            while($data = mysqli_fetch_array($sql))
                                                            {
                                                                echo '
                                                                <tr>
                                                                    <td>'.$no.'</td>
                                                                    <td>'.$data["kd_surat"].'</td>
                                                                    <td>'.$data["surat"].'</td>
                                                                    <td><textarea class="form-control" rows="5" readonly>'.$data["syarat"].'</textarea></td>
                                                                    <td>'.$data["ket"].'</td>
                                                                    <td>
                                                                        <a href="ubah-data-surat.php?id='.$data["id"].'"><button type="button" class="btn btn-primary"><span class="fa fa-edit"></span></button></a> 
                                                                        
                                                                    </td>
                                                                </tr>
                                                                ';
                                                                // || 
                                                                //         <a href=""><button type="button" class="btn btn-danger"><span class="fa fa-trash"></span></button></a>
                                                                $no++;
                                                            }
                                                        ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
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
