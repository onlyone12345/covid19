<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<!-- <section class="content-header">
		<h1>
			Pendaftaran
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Pendaftaran</li>
		</ol>
	</section> -->

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-9">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Tambah Data</h3>
					</div>
					<form id="form" action="<?php echo site_url() ?>backend/data/insert" method="POST">
						<!-- /.box-header -->
					<div class="box-body">
						<h4>Data Diri</h4>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="wajib">NIK</label>
									<input class="form-control input-sm" id="nik" style="width: 100%;" name="nik" value="<?php //echo isset($data['nik']) ? $data['nik'] : '' ?>">
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="wajib">Nama</label>
									<input class="form-control input-sm" id="nama" style="width: 100%;" name="nama" value="<?php //echo isset($data['nama_pasien']) ? $data['nama_pasien'] : '' ?>">
										
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label class="wajib">Nama Orang Tua</label>
									<input class="form-control" id="nama_ortu" style="width: 100%;" name="nama_ortu" value="<?php //echo isset($data['nama_ortu']) ? $data['nama_ortu'] : '' ?>">
								
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="wajib">Jenis Kelamin</label>
									<select class="form-control select2" name="jenis_kelamin" id="jenis_kelamin">
										<option value="laki-laki">Laki-Laki</option>
										<option value="perempuan">perempuan</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="wajib">Tempat Lahir</label>
									<input class="form-control" style="width: 100%;" id="tempat_lahir" name="tempat_lahir" value="<?php //echo isset($data['tempat_lahir']) ? $data['tempat_lahir'] : '' ?>">
								
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="tgl_lahir" class="wajib">Tanggal Lahir</label>
									<input type="date" class="form-control" style="width: 100%;" id="tgl_lahir" name="tgl_lahir" value="<?php //echo isset($data['tgl_lahir']) ? $data['tgl_lahir'] : '' ?>">
									
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Alamat</label>
										<textarea class="form-control" id="alamat" name="alamat" rows="4" style="width: 100%;"><?php //echo isset($data['alamat']) ? $data['alamat'] : '' ?></textarea>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label class="wajib">Kecamatan</label>
									<select class="form-control select2" name="kecamatan" id="kecamatan">
										<option value="bakauheni">Bakauheni</option>
										<option value="penengahan">Penengahan</option>
										<option value="ketapang">Ketapang</option>
										<option value="sragi">Sragi</option>
										<option value="palas">Palas</option>
										<option value="rajabasa">Rajabasa</option>
										<option value="kalianda">Kalianda</option>
										<option value="waypanji">Way Panji</option>
										<option value="sidomulyo">Sidomulyo</option>
										<option value="katibung">Katibung</option>
										<option value="jatiagung">Jati Agung</option>
										<option value="tanjungsari">Tanjung Sari</option>
										<option value="merbaumataram">Merbau Mataram</option>
										<option value="tanjungbintang">Tanjung Bintang</option>
										<option value="waysulan">Way Sulan</option>
										<option value="candipuro">Candipuro</option>
										<option value="natar">Natar</option>
									</select>
								</div>
							</div>
						</div>

						<hr>
						<h4>Data Status</h4>
						<br>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="wajib">Status Saat ini</label>
									<select class="form-control select2" name="status" id="status">
										<option value="odp">ODP(Orang Dalam Pemantauan)</option>
										<option value="pdp">PDP(Pasien Dalam Pengawsan)</option>
										<option value="otg">OTG(Orang Tanpa Gejala)</option>
										<option value="positif">Positif</option>
									</select>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="tgl_lahir" class="wajib">Tanggal Penetapan</label>
									<input type="date" class="form-control" style="width: 100%;" id="tanggal_penetapan" name="tanggal_penetapan" value="<?php echo isset($data['tgl_penetapan']) ? $data['tgl_penetapan'] : date("Y/m/d") ?>">
									
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="wajib">Pemantauan</label>
									<select class="form-control select2" name="status_pemantauan" id="status_pemantauan">
										<option value="dipantau">Diapantau</option>
										<option value="selesai_dipantau">Selesai Dipantau</option>
										<option value="dirawat">Selesai Dirawat</option>
										<option value="sembuh">Sembuh</option>
										<option value="meninggal">Meninggal</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Keterangan</label>
										<textarea class="form-control" id="ket" name="ket" rows="4" style="width: 100%;"><?php //echo isset($data['alamat']) ? $data['alamat'] : '' ?></textarea>
								</div>
							</div>
						</div>

						<br>
						<div class="box-footer">
							<div class="pull-right">
								<button type="submit" class="btn btn-success button-sm btn-flat"><i class="fa fa-save"></i> Simpan</button>
							</div>
						</div>
					</form>					
					</div>
				</div>
			</div>
	</section>
	<!-- /.content -->
	
</div>
<!-- /.content-wrapper -->

		


<script>
	$(document).ready(function() {
		//Initialize Select2 Elements
		$('.select2').select2();

		//Date picker
		$('.datepicker').datepicker({
			autoclose: true
		});

		$('form#form').bootstrapValidator({
//      live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			nik: {
                validators: {
                    notEmpty: {
                        message: 'NIK tidak boleh kosong'
                    }
                }
			},
			nama: {
                validators: {
                    notEmpty: {
                        message: 'Nama tidak boleh kosong'
                    }
                }
			},
			nama_ortu: {
                validators: {
                    notEmpty: {
                        message: 'Nama Ortu tidak boleh kosong'
                    }
                }
			},
			tempat_lahir: {
                validators: {
                    notEmpty: {
                        message: 'Tempat Lahir tidak boleh kosong'
                    }
                }
			},
			tgl_lahir: {
                validators: {
                    notEmpty: {
                        message: 'Tanggal Lahir tidak boleh kosong'
                    }
                }
			},
			tanggal_pemantauan: {
                validators: {
                    notEmpty: {
                        message: 'Tanggal Pemantauan tidak boleh kosong'
                    }
                }
			},
			
        }
	})
	.on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();			
			var myform = $('form#form');
			var btnSubmit = myform.find("[type='submit']");
			var btnSubmitHtml = btnSubmit.html();
			var url = myform.attr("action");
			var data = new FormData(form);
			$.ajax({
				beforeSend:function() { 
					btnSubmit.addClass("disabled").html("<i class='fa fa-spinner fa-pulse fa-fw'></i> Loading ... ").prop("disabled","disabled");
				},
				cache: false,
				processData: false,
				contentType: false,
				type: "POST",
				url : url,
				data : data,
				dataType:'JSON',
				success:function(response) {
					btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
					if (response.status == "success" ){
						toastr.success(response.message,'Success !',{ 
							closeButton: true,
							progressBar: true, 
							timeOut: 1000,
							positionClass: "toast-top-right"
						});
						setTimeout(function(){
							if(response.redirect == "" || response.redirect == "reload"){
								location.reload();
							} else {
								location.href = response.redirect;
							}
						},1000);
					} else {
						toastr.error(response.message,'Failed !',{closeButton: true,positionClass: "toast-top-center"});
					}
				}
			});
    	});
	});

</script>
