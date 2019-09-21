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
				<li class="active">Pelayanan Surat / Pelayanan Registrasi Surat</li>
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
                    Pelayanan Registrasi Surat
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="proses.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <?php 
                                $query = mysqli_query($conn,"SELECT max(no_registrasi) AS no_reg FROM tb_register_pelayanan_surat");
                                $data = mysqli_fetch_array($query);
                                $no_reg = $data['no_reg'];
                                
                                $noUrut = (int) substr($no_reg, 4, 5);
                                $noUrut++;
                                
                                $char = "KDR-";
                                $no_reg = $char . sprintf("%05s", $noUrut);
                            ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="kd_regis">Kode Registrasi</label>
                                <div class="col-md-5">
                                    <input id="kd_regis" name="kd_regis" type="text" value="<?= $no_reg ?>" placeholder="Kode Registrasi" class="form-control" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nik">NIK</label>
                                <div class="col-md-5">
                                    <input id="nik" name="nik" type="text" placeholder="NIK" minlength="16" maxlength="16" onkeypress="return hanyaAngka(event)" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nama">Nama</label>
                                <div class="col-md-9">
                                    <input id="nama" name="nama" type="text" placeholder="Nama" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="jenis_surat">Jenis Surat</label>
                                <div class="col-md-7">
                                    <select class="form-control" id="jenis_surat" name="jenis_surat">
                                        <option value="" selected>Pilih Surat ---</option>
                                        <?php 
                                            while($data = mysqli_fetch_array($sql)) {
                                                echo '
                                                    <option value="'.$data["kd_surat"].'">'.$data["surat"].'</option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="tgl_regis">Tgl Register</label>
                                <div class="col-md-3">
                                    <input id="tgl_regis" name="tgl_regis" type="date" min="<?= gmdate("Y-m-d", time()+60*60*7); ?>" value="<?= gmdate("Y-m-d", time()+60*60*7); ?>" placeholder="Tgl Register" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="5"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <a href="pelayanan-surat.php"><button type="button" class="btn btn-danger btn-md pull-right">Kembali</button></a>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="simpan_pelayanan_regis_surat" class="btn btn-success btn-md pull-right">Simpan</button>
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

        $(function() {
			$("#nik").change(function(){
				var nik = $("#nik").val();
 
				$.ajax({
					url: 'ajax_cek.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'nik': nik
					},
					success: function (data) {
						$("#nama").val(data['nama']);
 
						// var $jenis_kelamin = $('input:radio[name=jenis_kelamin]');
 
						// if(siswa['jenis_kelamin'] == 'laki-laki'){
						// 	$jenis_kelamin.filter('[value=laki-laki]').prop('checked', true);
						// }else{
						// 	$jenis_kelamin.filter('[value=perempuan]').prop('checked', true);
						// }
					}
				});
			});
 
			// $("form").submit(function(){
			// 	alert("Keep learning");
			// });
		});

        function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
		
</body>
</html>
