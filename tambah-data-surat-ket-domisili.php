    <?php
		include "header.php"; 
		include "sidebar.php"; 
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Transaksi / Tambah Data Surat Ket Domisili</li>
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
                    Tambah Data Surat Ket Domisili
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="proses.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <?php 
                                $query = mysqli_query($conn,"SELECT max(no_surat_keterangan_domisili) AS no_surat FROM tb_surat_keterangan_domisili");
                                $data = mysqli_fetch_array($query);
                                $no_surat = $data['no_surat'];
                                
                                $noUrut = (int) substr($no_surat, 7, 5);
                                $noUrut++;
                                
                                $char = "NS-DOM-";
                                $no_surat = $char . sprintf("%05s", $noUrut);
                            ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="no_surat">No Surat</label>
                                <div class="col-md-9">
                                    <input id="no_surat" name="no_surat" type="text" value="<?= $no_surat ?>" placeholder="No Surat" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="no_registrasi">No. Registrasi</label>
                                <div class="col-md-7">
                                    <select class="form-control" onchange="cek_()" id="no_registrasi" name="no_registrasi">
                                        <option value="" selected>Pilih No. Reg ---</option>
                                        <?php 
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_data_surat AS a INNER JOIN tb_register_pelayanan_surat AS b ON a.kd_surat = b.kd_surat WHERE b.kd_surat = 'KDS-0003' AND b.no_registrasi NOT IN (SELECT no_registrasi FROM tb_surat_keterangan_domisili)");
                                            while($data = mysqli_fetch_array($sql)) {
                                                echo '
                                                    <option value="'.$data["no_registrasi"].'">'.$data["no_registrasi"].'</option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nik">NIK</label>
                                <div class="col-md-9">
                                    <input id="nik" name="nik" type="text" placeholder="Nik" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nama">Nama</label>
                                <div class="col-md-9">
                                    <input id="nama" name="nama" type="text" placeholder="Nama" class="form-control" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="tgl_keluar">Tanggal Keluar</label>
                                <div class="col-md-3">
                                    <input id="tgl_keluar" name="tgl_keluar" type="date" placeholder="Tgl Keluar" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pengantar_rt">Surat Pengantar Rt</label>
                                <div class="col-md-5">
                                    <input id="pengantar_rt" name="pengantar_rt" type="file" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="ktp">KTP</label>
                                <div class="col-md-5">
                                    <input id="ktp" name="ktp" type="file" class="form-control">
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
                                        <a href="surat-ket-domisili.php"><button type="button" class="btn btn-danger btn-md pull-right">Kembali</button></a>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="simpan_surat_ket_domisili" class="btn btn-success btn-md pull-right">Simpan</button>
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

        function cek_(){
            var noreg = $("#no_registrasi").val();
            $.ajax({
                url: 'ajax_cek.php',
                data:"no_registrasi="+noreg ,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#nik').val(obj.nik);
                $('#nama').val(obj.nama);
            });
        }
	</script>
		
</body>
</html>
