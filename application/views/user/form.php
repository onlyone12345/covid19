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
			<div class="col-md-6">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo ucfirst($form_title) ?></h3>
					</div>
					<form id="form" class="form-horizontal" action="<?php echo $form_url ?>" method="POST">
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="username">Username</label>
										<div class="col-sm-8">
											<input class="form-control" id="username" style="width: 100%;"
												name="username"
												value="<?php echo isset($data['username']) ? $data['username'] : '' ?>" placeholder="Username...">

										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="username">Nama User</label>
										<div class="col-sm-8">
											<input class="form-control" id="nama_user" style="width: 100%;"
												name="nama_user"
												value="<?php echo isset($data['nama_user']) ? $data['nama_user'] : '' ?>" placeholder="Nama User...">

										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-sm-3 control-label">Level</label>
										<div class="col-sm-8">
											<select class="form-control select2" style="width: 100%;" id="level"
												name="level">
												<option value="0">Root</option>
												<option value="1">Admin</option>
												<option value="2">Berita</option>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-sm-3 control-label">Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control" style="width: 100%;" id="password"
												name="password" placeholder="Password...">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-sm-3 control-label">Konfirm Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control" style="width: 100%;" id="konfirm_password"
												name="konfirm_password" placeholder="Konfirmasi Password...">
										</div>
									</div>
								</div>
							</div>

							<br><br>
							<div class="box-footer">
								<div class="pull-right">
									<button type="submit" class="btn btn-success button-sm btn-flat"><i
											class="fa fa-save"></i> Simpan</button>
								</div>
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
					username: {
						validators: {
							notEmpty: {
								message: 'username tidak boleh kosong'
							},
							remote: {
								url: '<?php echo site_url('user/cek-username') ?>',
                        		message: 'username sudah digunakan/tidak tersedia'
                    		},
						}
					},
					nama_user: {
						validators: {
							notEmpty: {
								message: 'nama user tidak boleh kosong'
							},
						}
					},
					level: {
						validators: {
							notEmpty: {
								message: 'level tidak boleh kosong'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password tidak boleh kosong'
							},
							identical: {
								field: 'confirmPassword',
								message: 'The password and its confirm are not the same'
							},
						}
					},
					konfirm_password: {
						validators: {
							notEmpty: {
								message: 'Konfirmasi password tidak boleh kosong'
							},
							identical: {
								field: 'password',
								message: 'The password and its confirm are not the same'
							},
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
