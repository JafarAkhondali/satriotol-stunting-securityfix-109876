<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
	function domo() {
		// Binding keys
		$('*').bind('keydown', 'Ctrl+s', function assets() {
			$('#btn_save').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+x', function assets() {
			$('#btn_cancel').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+d', function assets() {
			$('.btn_save_back').trigger('click');
			return false;
		});
	}

	jQuery(document).ready(domo);
</script>
<style>

</style>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Galeri <small><?= cclang('new', ['Galeri']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/galeries'); ?>">Galeri</a></li>
		<li class="active"><?= cclang('new'); ?></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning">
				<div class="box-body ">
					<!-- Widget: user widget style 1 -->
					<div class="box box-widget widget-user-2">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header ">
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username">Galeri</h3>
							<h5 class="widget-user-desc"><?= cclang('new', ['Galeri']); ?></h5>
							<hr>
						</div>
						<?=
							form_open('', [
											'name' 		=> 'form_galeries',
											'class' 	=> 'form-horizontal form-step',
											'id' 		=> 'form_galeries',
											'enctype' 	=> 'multipart/form-data',
											'method' 	=> 'POST'
                        	]);

							$user_groups = $this->model_group->get_user_group_ids();
                        ?>
						<div class="form-group group-galery-name ">
							<label for="galery_name" class="col-sm-2 control-label">Judul Galeri <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="galery_name" id="galery_name" placeholder="Judul Galeri" value="<?= set_value('galery_name'); ?>">
								<small class="info help-block"><b>Input Galery Name</b> Max Length : 255.</small>
							</div>
						</div>

						<div class="form-group group-galery-type ">
							<label for="galery_type" class="col-sm-2 control-label">Type <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select" name="galery_type" id="galery_type" data-placeholder="Select Type" onchange="changeGaleryType();">
									<option value="#"></option>
									<option value="1" selected>Foto</option>
									<option value="2">Video YouTube</option>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-galery-media ">
							<label for="galery_media" class="col-sm-2 control-label">Media <i class="required">*</i></label>
							<div class="col-sm-8">
								<div id="changeFormGaleryType1">
									<div id="galeries_galery_media_galery"></div>
									<input class="data_file" name="galeries_galery_media_uuid" id="galeries_galery_media_uuid" type="hidden" value="<?= set_value('galeries_galery_media_uuid'); ?>">
									<input class="data_file" name="galeries_galery_media_name" id="galeries_galery_media_name" type="hidden" value="<?= set_value('galeries_galery_media_name'); ?>">
									<small class="info help-block"></small>
								</div>

								<div id="changeFormGaleryType2" style="display: none;">
									<input type="text" class="form-control" name="galery_embed_YT" id="galery_embed_YT" placeholder="Masukkan kode embed video YouTube">
									<small class="info help-block"><b>Masukkan kode embed video dari YouTube.</b> Contoh : https://youtube.com/watch?v=<b style="color: red;">y0PrXYFvDgs</b></small>
								</div>
							</div>
						</div>

						<!-- <div class="form-group group-galery-status ">
							<label for="galery_status" class="col-sm-2 control-label">Status <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select" name="galery_status" id="galery_status" data-placeholder="Select Status">
									<option value="#"></option>
									<option value="0">Tidak Aktif</option>
									<option value="1">Aktif</option>
								</select>
								<small class="info help-block"></small>
							</div>
						</div> -->

						<div class="message"></div>

						<div class="row-fluid col-md-7 container-button-bottom">
							<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
								<i class="fa fa-save"></i> <?= cclang('save_button'); ?>
							</button>
							<a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
								<i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
							</a>

							<div class="custom-button-wrapper"></div>

							<a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
								<i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
							</a>

							<span class="loading loading-hide">
								<img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
								<i><?= cclang('loading_saving_data'); ?></i>
							</span>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
				<!--/box body -->
			</div>
			<!--/box -->
		</div>
	</div>
</section>
<!-- /.content -->
<!-- Page script -->

<script type="text/javascript">
	$(document).ready(function () {
		window.event_submit_and_action = '';

		$('#btn_cancel').click(function () {
			swal({
					title: "<?= cclang('are_you_sure'); ?>",
					text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes!",
					cancelButtonText: "No!",
					closeOnConfirm: true,
					closeOnCancel: true
				},
				function (isConfirm) {
					if (isConfirm) {
						window.location.href = BASE_URL + 'administrator/galeries';
					}
				});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_galeries = $('#form_galeries');
			var data_post = form_galeries.serializeArray();
			var save_type = $(this).attr('data-stype');

			data_post.push({
				name: 'save_type',
				value: save_type
			});

			data_post.push({
				name: 'event_submit_and_action',
				value: window.event_submit_and_action
			});

			$('.loading').show();

			$.ajax({
					url: BASE_URL + '/administrator/galeries/add_save',
					type: 'POST',
					dataType: 'json',
					data: data_post,
				})
				.done(function (res) {
					$('form').find('.form-group').removeClass('has-error');
					$('.steps li').removeClass('error');
					$('form').find('.error-input').remove();
					if (res.success) {
						var id_galery_media = $('#galeries_galery_media_galery').find('li').attr('qq-file-id');

						if (save_type == 'back') {
							window.location.href = res.redirect;
							return;
						}

						$('.message').printMessage({message: res.message});
						$('.message').fadeIn();
						resetForm();
						if (typeof id_galery_media !== 'undefined') {
							$('#galeries_galery_media_galery').fineUploader('deleteFile', id_galery_media);
						}
						$('.chosen option').prop('selected', false).trigger('chosen:updated');
					} else {
						if (res.errors) {
							$.each(res.errors, function (index, val) {
								$('form #' + index).parents('.form-group').addClass('has-error');
								$('form #' + index).parents('.form-group').find('small').prepend(`<div class="error-input">` + val + `</div>`);
							});
							$('.steps li').removeClass('error');
							$('.content section').each(function (index, el) {
								if ($(this).find('.has-error').length) {
									$('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
								}
							});
						}

						$('.message').printMessage({
							message: res.message,
							type: 'warning'
						});
					}

				})
				.fail(function () {
					$('.message').printMessage({
						message: 'Error save data',
						type: 'warning'
					});
				})
				.always(function () {
					$('.loading').hide();
					$('html, body').animate({scrollTop: $(document).height()}, 2000);
				});

			return false;
		}); /*end btn save*/

		var params = {};
		params[csrf] = token;

		$('#galeries_galery_media_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: BASE_URL + '/administrator/galeries/upload_galery_media_file',
				params: params
			},
			deleteFile: {
				enabled: true,
				endpoint: BASE_URL + '/administrator/galeries/delete_galery_media_file',
			},
			thumbnails: {
				placeholders: {
					waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
					notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
				}
			},
			multiple: false,
			validation: {
				allowedExtensions: ["*"],
				sizeLimit: 0,
			},
			showMessage: function (msg) {
				toastr['error'](msg);
			},
			callbacks: {
				onComplete: function (id, name, xhr) {
					if (xhr.success) {
						var uuid = $('#galeries_galery_media_galery').fineUploader('getUuid', id);
						$('#galeries_galery_media_uuid').val(uuid);
						$('#galeries_galery_media_name').val(xhr.uploadName);
					} else {
						toastr['error'](xhr.error);
					}
				},
				onSubmit: function (id, name) {
					var uuid = $('#galeries_galery_media_uuid').val();
					$.get(BASE_URL + '/administrator/galeries/delete_galery_media_file/' + uuid);
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#galeries_galery_media_uuid').val('');
						$('#galeries_galery_media_name').val('');
					}
				}
			}
		}); /*end galery_media galery*/

		
	}); /*end doc ready*/

	function changeGaleryType() {
		var type = document.getElementById("galery_type").value;

		if(type == "1") {
			$('#changeFormGaleryType1').show();
			$('#changeFormGaleryType2').hide();
		} else if(type == "2") {
			$('#changeFormGaleryType1').hide();
			$('#changeFormGaleryType2').show();
		}
	}
</script>