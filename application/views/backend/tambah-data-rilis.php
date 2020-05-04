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
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $form_title ?></h3>
					</div>
					<form id="form" action="<?php echo $form_url ?>" method="POST">
						<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label class="wajib">ODP</label>
									<input type="number" class="form-control input-sm" id="odp" style="width: 100%;" name="odp" value="<?php echo isset($data['odp']) ? $data['odp'] : '' ?>">
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label class="wajib">PDP</label>
									<input type="number"  class="form-control input-sm" id="pdp" style="width: 100%;" name="pdp" value="<?php echo isset($data['pdp']) ? $data['pdp'] : '' ?>">
										
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label class="wajib">OTG</label>
									<input  type="number" class="form-control" style="width: 100%;" id="otg" name="otg" value="<?php echo isset($data['otg']) ? $data['otg'] : '' ?>">
								
								</div>
							</div>
						</div>
						<!-- <div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label class="wajib">Selesai Dipantau</label>
									<input type="hidden" class="form-control" style="width: 100%;" id="selesai_dopantau" name="selesai_dipantau" value="<?php echo isset($data['selesai_dipantau']) ? $data['selesai_dipantau'] : '' ?>">
								
								</div>
							</div>
						</div> -->
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label class="wajib">Positif</label>
									<input  type="number" class="form-control" style="width: 100%;" id="positif" name="positif" value="<?php echo isset($data['positif']) ? $data['positif'] : '' ?>">
								
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label for="tanggal_rilis" class="wajib">Tanggal Rilis</label>
									<input type="date" class="form-control" style="width: 100%;" id="tanggal_rilis" name="tanggal_rilis" value="<?php echo isset($data['tanggal_rilis']) ? $data['tanggal_rilis'] : '' ?>">
									
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
			odp: {
                validators: {
                    notEmpty: {
                        message: 'tidak boleh kosong'
                    }
                }
			},
			pdp: {
                validators: {
                    notEmpty: {
                        message: 'tidak boleh kosong'
                    }
                }
			},
			otg: {
                validators: {
                    notEmpty: {
                        message: 'tidak boleh kosong'
                    }
                }
			},
			selesai_dipantau: {
                validators: {
                    notEmpty: {
                        message: 'tidak boleh kosong'
                    }
                }
			},
			positif: {
                validators: {
                    notEmpty: {
                        message: 'tidak boleh kosong'
                    }
                }
			},
			tanggal_rilis: {
                validators: {
                    notEmpty: {
                        message: 'tidak boleh kosong'
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
