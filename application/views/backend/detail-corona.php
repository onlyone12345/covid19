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
			<div class="col-md-5">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">detail Corona</h3>
					</div>
					<form id="form" action="<?php echo site_url() ?>backend/detail/update" method="POST">
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="wajib">Link Foto Detail Corona</label>
										<input class="form-control input-sm" id="foto_detail_corona"
											style="width: 100%;" name="foto_detail_corona"
											value="<?php echo isset($data['foto_detail_corona']) ? $data['foto_detail_corona'] : '' ?>">
									</div>
								</div>

								<br>
								<div class="box-footer">
									<div class="pull-right">
										<button type="submit" class="btn btn-success button-sm btn-flat"><i
												class="fa fa-save"></i> Simpan</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-md-7">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Foto Detail Corona</h3>
					</div>
					<div class="box-body">
						<div class="sebaran-corona">
							<img src="<?php echo $data['foto_detail_corona'] ?>" alt="sebaran corona" class="img-fluid" height="auto" width="100%">
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- /.content -->

</div>
<!-- /.content-wrapper -->




<script>
	$(document).ready(function () {
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
					foto_sebaran_corona: {
						validators: {
							notEmpty: {
								message: 'tidak boleh kosong'
							}
						}
					},
				}
			})
			.on('success.form.bv', function (e) {
				// Prevent form submission
				e.preventDefault();
				var myform = $('form#form');
				var btnSubmit = myform.find("[type='submit']");
				var btnSubmitHtml = btnSubmit.html();
				var url = myform.attr("action");
				var data = new FormData(form);
				$.ajax({
					beforeSend: function () {
						btnSubmit.addClass("disabled").html(
							"<i class='fa fa-spinner fa-pulse fa-fw'></i> Loading ... ").prop(
							"disabled", "disabled");
					},
					cache: false,
					processData: false,
					contentType: false,
					type: "POST",
					url: url,
					data: data,
					dataType: 'JSON',
					success: function (response) {
						btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr(
							"disabled");
						if (response.status == "success") {
							toastr.success(response.message, 'Success !', {
								closeButton: true,
								progressBar: true,
								timeOut: 1000,
								positionClass: "toast-top-right"
							});
							setTimeout(function () {
								if (response.redirect == "" || response.redirect ==
									"reload") {
									location.reload();
								} else {
									location.href = response.redirect;
								}
							}, 1000);
						} else {
							toastr.error(response.message, 'Failed !', {
								closeButton: true,
								positionClass: "toast-top-center"
							});
						}
					}
				});
			});
	});

</script>
