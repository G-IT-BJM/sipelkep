<?php
		include "header.php"; 
        include "sidebar.php"; 
        
        include "koneksi.php";

        $id = $_GET['id'];
        $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_surat_pindah WHERE id = '$id'"));
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Transaksi / Ubah Data Surat Pindah</li>
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
                    Ubah Data Surat Pindah
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="proses.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <input type="hidden" id="id" name="id" value="<?php echo $data["id"]; ?>">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="no_surat">No Surat</label>
                                <div class="col-md-9">
                                    <input readonly id="no_surat" name="no_surat" type="text" value="<?php echo $data["no_surat_pindah"]; ?>" placeholder="No Surat" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="no_registrasi">No. Registrasi</label>
                                <div class="col-md-9">
                                    <input readonly id="no_registrasi" name="no_registrasi" type="text" value="<?php echo $data["no_registrasi"]; ?>" placeholder="No. Registrasi" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nik">NIK</label>
                                <div class="col-md-9">
                                    <input id="nik" name="nik" type="text" value="<?php echo $data["nik"]; ?>" placeholder="Nik" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="nama">Nama</label>
                                <div class="col-md-9">
                                    <input id="nama" name="nama" type="text" value="<?php echo $data["nama"]; ?>" placeholder="Nama" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="tgl_keluar">Tanggal Keluar</label>
                                <div class="col-md-3">
                                    <input id="tgl_keluar" name="tgl_keluar" type="date" value="<?php echo $data["tgl_keluar"]; ?>" placeholder="Tgl Keluar" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pengantar_rt">Surat Pengantar Rt</label>                                
                                <div class="col-md-5">
                                    <img src="img/<?=$data['fc_pengantar_rt']?>" class="img-rounded" width="150" height="150">
                                    <br><br>
                                    <input type="Checkbox" id="chk_pengantar_rt" onclick="checkboxs(this.value)" name="ubah_foto[]" value='pengantar_rt'> Ceklist Ubah Foto
                                    <br><br>
                                    <input id="pengantar_rt" name="pengantar_rt" type="file" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="ktp">Kartu Tanda Penduduk</label>
                                <div class="col-md-5">
                                    <img src="img/<?=$data['fc_ktp']?>" class="img-rounded" width="150" height="150">
                                    <br><br>
                                    <input type="Checkbox" id="chk_ktp" onclick="checkboxs(this.value)"  name="ubah_foto[]" value='ktp'> Ceklist Ubah Foto
                                    <br><br>
                                    <input id="ktp" name="ktp" type="file" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="kk">Kartu Keluarga</label>
                                <div class="col-md-5">
                                    <img src="img/<?=$data['fc_kk']?>" class="img-rounded" width="150" height="150">
                                    <br><br>
                                    <input id='chk_kk' type="Checkbox" id="chk_kk" onclick="checkboxs(this.value)" name="ubah_foto[]" value='kk'> Ceklist Ubah Foto
                                    <br><br>
                                    <input id="kk" name="kk" type="file" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="surat_kuasa">Surat Kuasa Bermaterai</label>
                                <div class="col-md-5">
                                    <img src="img/<?=$data['fc_surat_kuasa']?>" class="img-rounded" width="150" height="150">
                                    <br><br>
                                    <input type="Checkbox" id="chk_surat_kuasa" onclick="checkboxs(this.value)" name="ubah_foto[]" value='surat_kuasa'> Ceklist Ubah Foto
                                    <br><br>
                                    <input id="surat_kuasa" name="surat_kuasa" type="file" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="5"><?=$data['ket']?></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <a href="surat-pindah.php"><button type="button" class="btn btn-danger btn-md pull-right">Kembali</button></a>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="ubah_surat_pindah" class="btn btn-success btn-md pull-right">Perbarui</button>
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
