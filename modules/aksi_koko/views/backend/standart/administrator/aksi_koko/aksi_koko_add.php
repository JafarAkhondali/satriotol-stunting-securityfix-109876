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
		Konten Aksi Konvergensi <small><?= cclang('new', ['Konten Aksi Konvergensi']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/aksi_koko'); ?>">Konten Aksi Konvergensi</a></li>
		<li class="active"><?= cclang('new'); ?></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-body ">
					<!-- Widget: user widget style 1 -->
					<div class="box box-widget widget-user-2">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header ">
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username">Konten Aksi Konvergensi</h3>
							<h5 class="widget-user-desc"><?= cclang('new', ['Konten Aksi Konvergensi']); ?></h5>
							<hr>
						</div>
						<?= form_open('', [
							'name' => 'form_aksi_koko',
							'class' => 'form-horizontal form-step',
							'id' => 'form_aksi_koko',
							'enctype' => 'multipart/form-data',
							'method' => 'POST'
						]); ?>
						<?php
						$user_groups = $this->model_group->get_user_group_ids();
						?>
						<div class="form-group group-aksi_koko_kategori ">
							<label for="aksi_koko_kategori" class="col-sm-2 control-label">Kategori <i
									class="required">*</i>
							</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select" name="aksi_koko_kategori"
									id="aksi_koko_kategori" data-placeholder="Select Kategori">
									<option value=""></option>
									<option value="1">Pembinaan Kader</option>
									<option value="2">Manajemen Data Stunting</option>
								</select>
								<small class="info help-block">

								</small>
							</div>
						</div>


						<div class="form-group group-aksi_koko_judul ">
							<label for="aksi_koko_judul" class="col-sm-2 control-label">Judul <i class="required">*</i>
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="aksi_koko_judul" id="aksi_koko_judul"
									placeholder="Judul" value="<?= set_value('aksi_koko_judul'); ?>">
								<small class="info help-block">
								</small>
							</div>
						</div>


						<div class="form-group group-aksi_koko_isi ">
							<label for="aksi_koko_isi" class="col-sm-2 control-label">Isi Konten <i
									class="required">*</i>
							</label>
							<div class="col-sm-8">
								<textarea id="aksi_koko_isi" name="aksi_koko_isi" rows="5"
									cols="80"><?= set_value('Aksi Koko Isi'); ?></textarea>
								<small class="info help-block">
								</small>
							</div>
						</div>


						<div class="form-group group-aksi_koko_media ">
							<label for="aksi_koko_media" class="col-sm-2 control-label">Upload Foto </label>
							<div class="col-sm-8">
								<div id="aksi_koko_aksi_koko_media_galery"></div>
								<div id="aksi_koko_aksi_koko_media_galery_listed"></div>
								<small class="info help-block">
								</small>
							</div>
						</div>

						<div class="message"></div>
						<div class="row-fluid col-md-7 container-button-bottom">
							<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay'
								title="<?= cclang('save_button'); ?> (Ctrl+s)">
								<i class="fa fa-save"></i> <?= cclang('save_button'); ?>
							</button>
							<a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save"
								data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
								<i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
							</a>

							<div class="custom-button-wrapper"></div>

							<a class="btn btn-flat btn-default btn_action" id="btn_cancel"
								title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
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
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->

<script>
	$(document).ready(function () {

		window.event_submit_and_action = '';

		CKEDITOR.replace('aksi_koko_isi', {
			removePlugins: 'image,about'
		});
		var aksi_koko_isi = CKEDITOR.instances.aksi_koko_isi;

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
						window.location.href = BASE_URL + 'administrator/aksi_koko';
					}
				});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();
			$('#aksi_koko_isi').val(aksi_koko_isi.getData());

			var form_aksi_koko = $('#form_aksi_koko');
			var data_post = form_aksi_koko.serializeArray();
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
					url: BASE_URL + '/administrator/aksi_koko/add_save',
					type: 'POST',
					dataType: 'json',
					data: data_post,
				})
				.done(function (res) {
					$('form').find('.form-group').removeClass('has-error');
					$('.steps li').removeClass('error');
					$('form').find('.error-input').remove();
					if (res.success) {

						if (save_type == 'back') {
							window.location.href = res.redirect;
							return;
						}

						$('.message').printMessage({
							message: res.message
						});
						$('.message').fadeIn();
						resetForm();
						$('#aksi_koko_aksi_koko_media_galery').find('li').each(function () {
							$('#aksi_koko_aksi_koko_media_galery').fineUploader('deleteFile',
								$(this).attr('qq-file-id'));
						});
						$('.chosen option').prop('selected', false).trigger('chosen:updated');
						aksi_koko_isi.setData('');


					} else {
						if (res.errors) {

							$.each(res.errors, function (index, val) {
								$('form #' + index).parents('.form-group').addClass(
									'has-error');
								$('form #' + index).parents('.form-group').find('small')
									.prepend(`
					  <div class="error-input">` + val + `</div>
					  `);
							});
							$('.steps li').removeClass('error');
							$('.content section').each(function (index, el) {
								if ($(this).find('.has-error').length) {
									$('.steps li:eq(' + index + ')').addClass('error').find(
										'a').trigger('click');
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
					$('html, body').animate({
						scrollTop: $(document).height()
					}, 2000);
				});

			return false;
		}); /*end btn save*/



		var params = {};
		params[csrf] = token;

		$('#aksi_koko_aksi_koko_media_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: BASE_URL + '/administrator/aksi_koko/upload_aksi_koko_media_file',
				params: params
			},
			deleteFile: {
				enabled: true,
				endpoint: BASE_URL + '/administrator/aksi_koko/delete_aksi_koko_media_file',
			},
			thumbnails: {
				placeholders: {
					waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
					notAvailablePath: BASE_URL +
						'/asset/fine-upload/placeholders/not_available-generic.png'
				}
			},
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
						var uuid = $('#aksi_koko_aksi_koko_media_galery').fineUploader('getUuid', id);
						$('#aksi_koko_aksi_koko_media_galery_listed').append(
							'<input type="hidden" class="listed_file_uuid" name="aksi_koko_aksi_koko_media_uuid[' +
							id + ']" value="' + uuid +
							'" /><input type="hidden" class="listed_file_name" name="aksi_koko_aksi_koko_media_name[' +
							id + ']" value="' + xhr.uploadName + '" />');
					} else {
						toastr['error'](xhr.error);
					}
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#aksi_koko_aksi_koko_media_galery_listed').find(
								'.listed_file_uuid[name="aksi_koko_aksi_koko_media_uuid[' + id + ']"]')
							.remove();
						$('#aksi_koko_aksi_koko_media_galery_listed').find(
								'.listed_file_name[name="aksi_koko_aksi_koko_media_name[' + id + ']"]')
							.remove();
					}
				}
			}
		}); /*end aksi_koko_media galery*/





	}); /*end doc ready*/
</script>