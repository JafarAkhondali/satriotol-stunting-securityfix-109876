	<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

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

	<style></style>

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Galeri Rencana Kegiatan OPD</h1>
		<ol class="breadcrumb">
			<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
			<li>
<?php
	$disabled = '';

	if (!empty($id)) {
		echo '<a href="'.site_url('administrator/rentan_opd/view/'.$id).'">Galeri Rencana Kegiatan OPD</a>';
		$disabled = 'disabled';
	}else{
		echo '<a href="'.site_url('administrator/rentan_opd_galeri').'">Galeri Rencana Kegiatan OPD</a>';
	}
?>
			</li>
			<li class="active">Tambah Data Galeri</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
				<?php
					echo form_open('', [
						'name' 		=> 'form_rentan_opd_galeri',
						'id' 		=> 'form_rentan_opd_galeri',
						'enctype' 	=> 'multipart/form-data',
						'method' 	=> 'POST'
					]);

					$user_groups = $this->model_group->get_user_group_ids();
				?>
					<div class="box-header">
						<h3 class="box-title">Tambah Data Galeri Rencana Kegiatan Dinas</h3>
					</div>
					<div class="box-body">
						<div class="form-group group-rentan-opd-id ">
							<label for="rentan_opd_id" class="control-label">Kegiatan <i class="required">*</i></label>
							<select class="form-control chosen chosen-select-deselect" name="rentan_opd_id" id="rentan_opd_id" data-placeholder="Select Kegiatan">
								<option value=""></option>
							</select>
							<small class="info help-block"></small>
						</div>
						<div class="form-group group-rentan-opd-galeri-file ">
							<label for="rentan_opd_galeri_file" class="control-label">Gambar <i class="required">*</i></label>
							<div id="rentan_opd_galeri_rentan_opd_galeri_file_galery"></div>
							<div id="rentan_opd_galeri_rentan_opd_galeri_file_galery_listed"></div>
							<small class="info help-block">
								<b>Extension file must :</b> JPG,JPEG,PNG.<br/>
								<b>Ukuran file gambar maksimal :</b> 10 Mb
							</small>
						</div>

						<div class="message"></div>
					</div>
					<div class="box-footer">
						<div class="row-fluid container-button-bottom">
							<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
								<i class="fa fa-save"></i> <?= cclang('save_button'); ?>
							</button>
							<a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
								<i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
							</a>

							<div class="custom-button-wrapper"></div>

							<a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button');?> (Ctrl+x)">
								<i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
							</a>

							<span class="loading loading-hide">
								<img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
								<i><?= cclang('loading_saving_data'); ?></i>
							</span>
						</div>
					</div>
				<?= form_close(); ?>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
	<!-- Page script -->
	<script type="text/javascript">
		$(document).ready(function () {
			window.event_submit_and_action = '';

			var getID = '<?php echo $id;?>';
			var redirectURL;
			var disabled_combo;

			if (getID != '') {
				redirectURL = BASE_URL + 'administrator/rentan_opd/view/'+getID;
				disabled_combo = $('#rentan_opd_id').prop('disabled', true);
			}else{
				redirectURL = BASE_URL + 'administrator/rentan_opd_galeri';
				disabled_combo = '';
			}

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
						window.location.href = redirectURL;
					}
				});

				return false;
			}); /*end btn cancel*/

			$('.btn_save').click(function () {
				$('.message').fadeOut();

				var form_rentan_opd_galeri = $('#form_rentan_opd_galeri');
				var data_post = form_rentan_opd_galeri.serializeArray();
				var save_type = $(this).attr('data-stype');

				data_post.push({
					name: 'save_type',
					value: save_type
				});

				if (getID != '') {
					data_post.push({
						name: 'rentan_opd_id',
						value: '<?php echo $id;?>'
					});
				}

				data_post.push({
					name: 'event_submit_and_action',
					value: window.event_submit_and_action
				});

				$('.loading').show();

				$.ajax({
					url: BASE_URL + '/administrator/rentan_opd_galeri/add_save',
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
						$('#rentan_opd_galeri_rentan_opd_galeri_file_galery').find('li').each(
							function () {
								$('#rentan_opd_galeri_rentan_opd_galeri_file_galery')
									.fineUploader('deleteFile', $(this).attr('qq-file-id'));
							});
						$('.chosen option').prop('selected', false).trigger('chosen:updated');
					} else {
						if (res.errors) {

							$.each(res.errors, function (index, val) {
								$('form #' + index).parents('.form-group').addClass('has-error');
								$('form #' + index).parents('.form-group').find('small')
									.prepend(`<div class="error-input">` + val + `</div>`);
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

			$('#rentan_opd_galeri_rentan_opd_galeri_file_galery').fineUploader({
				template: 'qq-template-gallery',
				request: {
					endpoint: BASE_URL +
						'/administrator/rentan_opd_galeri/upload_rentan_opd_galeri_file_file',
					params: params
				},
				deleteFile: {
					enabled: true,
					endpoint: BASE_URL +
						'/administrator/rentan_opd_galeri/delete_rentan_opd_galeri_file_file',
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
							var uuid = $('#rentan_opd_galeri_rentan_opd_galeri_file_galery').fineUploader(
								'getUuid', id);
							$('#rentan_opd_galeri_rentan_opd_galeri_file_galery_listed').append(
								'<input type="hidden" class="listed_file_uuid" name="rentan_opd_galeri_rentan_opd_galeri_file_uuid[' +
								id + ']" value="' + uuid +
								'" /><input type="hidden" class="listed_file_name" name="rentan_opd_galeri_rentan_opd_galeri_file_name[' +
								id + ']" value="' + xhr.uploadName + '" />');
						} else {
							toastr['error'](xhr.error);
						}
					},
					onDeleteComplete: function (id, xhr, isError) {
						if (isError == false) {
							$('#rentan_opd_galeri_rentan_opd_galeri_file_galery_listed').find(
								'.listed_file_uuid[name="rentan_opd_galeri_rentan_opd_galeri_file_uuid[' +
								id + ']"]').remove();
							$('#rentan_opd_galeri_rentan_opd_galeri_file_galery_listed').find(
								'.listed_file_name[name="rentan_opd_galeri_rentan_opd_galeri_file_name[' +
								id + ']"]').remove();
						}
					}
				}
			}); /*end rentan_opd_galeri_file galery*/

			function chained_rentan_opd(selected, complete) {
				$.LoadingOverlay('show');
				$.ajax({
					url: BASE_URL + '/administrator/rentan_opd_galeri/ajax_rentan_opd_id/',
					dataType: 'JSON',
				})
				.done(function (res) {
					var html = '<option value=""></option>';
					$.each(res, function (index, val) {
						html += '<option value="' + val.rentan_opd_id + '" ' + (selected == val.rentan_opd_id ? 'selected' : '') + '>' + val.rentan_opd_kegiatan + '</option>'
					});

					if (getID != '') {
						$('#rentan_opd_id').attr('disabled', 'disabled');
					}
					$('#rentan_opd_id').html(html);
					$('#rentan_opd_id').trigger('chosen:updated');

					if (typeof complete != 'undefined') {
						complete();
					}
				})
				.fail(function () {
					toastr['error']('Error', 'Getting data fail')
				})
				.always(function () {
					$.LoadingOverlay('hide')
				});
			}

			async function chain() {
				await chained_rentan_opd(getID);
			}

			chain();

		}); /*end doc ready*/
	</script>