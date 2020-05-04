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
						<h3 class="box-title">Rilis Data</h3>
						<div class="pull-right">
							<a href="<?php echo site_url() ?>backend/rilis/tambah" type="button" class="btn btn-success button-sm btn-flat"><i class="fa fa-plus"></i> Tambah Berita</a>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="datatable_custom" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<?php echo $datatable_header ?>
							</thead>
							<tbody>
								
							</tbody>
						</table>
						
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
			<form class="confirm-delete" action="<?php echo $delete_url ?>" method="POST">
				<input type="hidden" name="id" >
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
		//Initialize Select2 Elements
		$('.select2').select2();

		//Date picker
		$('.datepicker').datepicker({
			autoclose: true
		});

		var iTable = $('#datatable_custom').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url  : "<?php echo site_url($datatable_url) ?>",
				type : "POST",
				error: function(){
					$('.dataTable').find('tbody').html('<tr><td colspan="<?php echo sizeof($datatable_column);?>" style="text-align:center;">No data available in table</td></tr>');
					$(".dataTables_processing").css("display","none");
				},
				data : function ( d ) {
					var obj = {};
					$('[name^=filter]').each(function(){
						var key = $(this).attr('name');
						var val = $(this).val();
						obj[key] = val;
					});
					return $.extend( {}, d, obj);
					}
				},
				columns: [<?php echo implode('',$datatable_column) ?>],
				
			});
			
		$('#datatable_custom tbody').on('click', '.delete', function(){
			var id = $(this).attr('data-id');
			$('#modal-delete input[name=id]').val(id);
			console.log(id);
			$('#modal-delete').modal('toggle');
		});

		$(".confirm-delete, .confirm-publish").submit(function(e){
			e.preventDefault();
			var form 	= $(this);
			var btnHtml = form.find("[type='submit']").html();
			var url 	= form.attr("action");
			var data 	= new FormData(this);
			$.ajax({
				beforeSend:function() { 
					form.find("[type='submit']").addClass("disabled").html("<i class='fa fa-spinner fa-pulse fa-fw'></i> Loading ... ");
				},
				cache: false,
				processData: false,
				contentType: false,
				type: "POST",
				url : url,
				data : data,
				dataType:'JSON',
				success: function(response) {
					form.find("[type='submit']").removeClass("disabled").html(btnHtml);
					if ( response.status == "success" ){
						toastr.success(response.message,'Success !',{ 
							progressBar: true, 
							timeOut: 1000
						});
						$('#modal-delete, #modal-publish').modal('hide');
						iTable.draw('full-hold');
					} else {
						toastr.error(response.message,'Failed !');
					}
				}
			});
		});

		
	});

</script>
