    <?php
		include "header.php"; 
        include "sidebar.php"; 
        include "koneksi.php";

        $id = $_GET['id'];
        $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_surat_ahli_waris WHERE id = '$id'"));
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Transaksi / Ubah Data Surat Ahli Waris</li>
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
                    Ubah Data Surat Ahli Waris
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="proses.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <input type="hidden" id="id" name="id" value="<?= $data["id"] ?>">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="no_surat">No Surat</label>
                                <div class="col-md-9">
                                    <input id="no_surat" name="no_surat" type="text" value="<?= $data["no_surat_ahli_waris"] ?>" readonly placeholder="No Surat" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="no_registrasi">No. Registrasi</label>
                                <div class="col-md-9">
                                    <input id="no_registrasi" name="no_registrasi" type="text" value="<?= $data["no_registrasi"] ?>" readonly placeholder="No. Registrasi" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nik">NIK</label>
                                <div class="col-md-9">
                                    <input id="nik" name="nik" type="text" value="<?= $data["nik"] ?>" readonly placeholder="Nik" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nama">Nama</label>
                                <div class="col-md-9">
                                    <input id="nama" name="nama" type="text" value="<?= $data["nama"] ?>" readonly placeholder="Nama" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="tgl_keluar">Tanggal Keluar</label>
                                <div class="col-md-3">
                                    <input id="tgl_keluar" name="tgl_keluar" type="date" value="<?= $data["tgl_keluar"] ?>" placeholder="Tgl Keluar" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="surat_ket_ahli_waris">Surat Ket. Ahli Waris</label>
                                <div class="col-md-5">
                                    <img src="img/<?=$data['fc_ahli_waris']?>" class="img-rounded" width="150" height="150">
                                    <br><br>
                                    <input type="Checkbox" id="chk_surat_ket_ahli_waris" onclick="checkboxs(this.value)" name="ubah_foto[]" value='surat_ket_ahli_waris'> Ceklist Ubah Foto
                                    <br><br>
                                    <input id="surat_ket_ahli_waris" name="surat_ket_ahli_waris" type="file" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="surat_pengantar_rt">Surat Pengantar Rt</label>
                                <div class="col-md-5">
                                    <img src="img/<?=$data['fc_pengantar_rt']?>" class="img-rounded" width="150" height="150">
                                    <br><br>
                                    <input type="Checkbox" id="chk_surat_pengantar_rt" onclick="checkboxs(this.value)" name="ubah_foto[]" value='surat_pengantar_rt'> Ceklist Ubah Foto
                                    <br><br>
                                    <input id="surat_pengantar_rt" name="surat_pengantar_rt" type="file" class="form-control" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="surat_nikah_yg_meninggal">Surat Nikah yg Meninggal</label>
                                <div class="col-md-5">
                                    <img src="img/<?=$data['fc_nikah_meninggal']?>" class="img-rounded" width="150" height="150">
                                    <br><br>
                                    <input type="Checkbox" id="chk_surat_nikah_yg_meninggal" onclick="checkboxs(this.value)" name="ubah_foto[]" value='surat_nikah_yg_meninggal'> Ceklist Ubah Foto
                                    <br><br>
                                    <input id="surat_nikah_yg_meninggal" name="surat_nikah_yg_meninggal" type="file" class="form-control" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="kk_ahli_waris">KK Ahli Waris</label>
                                <div class="col-md-5">
                                    <img src="img/<?=$data['fc_kk_ahli_waris']?>" class="img-rounded" width="150" height="150">
                                    <br><br>
                                    <input type="Checkbox" id="chk_kk_ahli_waris" onclick="checkboxs(this.value)" name="ubah_foto[]" value='kk_ahli_waris'> Ceklist Ubah Foto
                                    <br><br>
                                    <input id="kk_ahli_waris" name="kk_ahli_waris" type="file" class="form-control" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="ktp_2_orang_saksi">KTP 2 Dua orang Saksi</label>
                                <div class="col-md-5">
                                    <img src="img/<?=$data['fc_ktp_saksi']?>" class="img-rounded" width="150" height="150">
                                    <br><br>
                                    <input type="Checkbox" id="chk_ktp_2_orang_saksi" onclick="checkboxs(this.value)" name="ubah_foto[]" value='ktp_2_orang_saksi'> Ceklist Ubah Foto
                                    <br><br>
                                    <input id="ktp_2_orang_saksi" name="ktp_2_orang_saksi" type="file" class="form-control" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pbb_tahun_berjalan">PBB Tahun Berjalan</label>
                                <div class="col-md-5">
                                    <img src="img/<?=$data['fc_pbb']?>" class="img-rounded" width="150" height="150">
                                    <br><br>
                                    <input type="Checkbox" id="chk_pbb_tahun_berjalan" onclick="checkboxs(this.value)" name="ubah_foto[]" value='pbb_tahun_berjalan'> Ceklist Ubah Foto
                                    <br><br>
                                    <input id="pbb_tahun_berjalan" name="pbb_tahun_berjalan" type="file" class="form-control" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="ktp_yg_meninggal">KTP yg Meninggal</label>
                                <div class="col-md-5">
                                    <img src="img/<?=$data['fc_ktp_meninggal']?>" class="img-rounded" width="150" height="150">
                                    <br><br>
                                    <input type="Checkbox" id="chk_ktp_yg_meninggal" onclick="checkboxs(this.value)" name="ubah_foto[]" value='ktp_yg_meninggal'> Ceklist Ubah Foto
                                    <br><br>
                                    <input id="ktp_yg_meninggal" name="ktp_yg_meninggal" type="file" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="5"><?= $data["ket"] ?></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <a href="surat-ahli-waris.php"><button type="button" class="btn btn-danger btn-md pull-right">Kembali</button></a>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="ubah_surat_ahli_waris" class="btn btn-success btn-md pull-right">Perbarui</button>
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

        function checkboxs(params) { 
            var ckbox = $('#chk_'+params);
            if (ckbox.is(':checked')) {
                $('#'+params).removeAttr('disabled');
                $('#'+params).attr('required','');
            } else {
                $('#'+params).attr('disabled','');
                $('#'+params).removeAttr('required');
            } 
        }
	</script>
		
</body>
</html>
