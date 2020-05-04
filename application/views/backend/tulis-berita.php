<!-- konten -->
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
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Tulis Berita</h3>
						
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					<form id="form" action="<?php echo $form_url ?>" method="POST">
						<!-- /.box-header -->
					<div class="box-body">
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="wajib">Judul Berita</label>
									<input class="form-control" style="width: 100%;" id="judul_berita" name="judul_berita" value="<?php echo isset($data['judul_berita']) ? $data['judul_berita'] : '' ?>">
								
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="gambar">Url Gambar</label>
									<input class="form-control" style="width: 100%;" id="gambar" name="gambar" value="<?php echo isset($data['gambar']) ? $data['gambar'] : '' ?>">

								</div>
							</div>
						</div>

	
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Isi Berita</label>
										<textarea class="form-control" id="isi_berita" name="isi_berita" rows="10" style="width: 100%;"><?php echo isset($data['isi_berita']) ? $data['isi_berita'] : '' ?></textarea>
										
								</div>
							</div>
						</div>
						<div class="row checkbox">
							<div class="col-md-6">
								<div class="form-group">
									<label>
										<input type="checkbox" name="publish"> Simpan dan Publish
									</label>
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


	<div class="modal fade modal" id="modal-delete">
		<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Konfirmasi !!!</h4>
			</div>
			<div class="modal-body">
			<b><i>Apakah Anda Yakin Ingin Menghapus Data Ini ?</i></b>
			<form class="confirm-delete" action="<?php // echo $delete_url ?>" method="POST">
				<input type="hidden" name="username" >
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> ya, Hapus</button>
			</div>
			</form>	
		</div>
		<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	

</div>
<!-- /.content-wrapper -->

<script>
  

  	$(document).ready(function() {
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		//CKEDITOR.replace('isi_berita')
		//bootstrap WYSIHTML5 - text editor
		$('[name=isi_berita]').wysihtml5();


		$('isi_berita').on('change', function () {
			console.log(CKEDITOR.getData());
		});
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
			judul_berita: {
                validators: {
                    notEmpty: {
                        message: 'Judul Berita tidak boleh kosong'
                    }
                }
			},
			gambar: {
                validators: {
                    notEmpty: {
                        message: 'Url Gambar tidak boleh kosong'
                    }
                }
			},

			isi_berita: {
                validators: {
                    notEmpty: {
                        message: 'isi Berita tidak boleh kosong'
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

