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
	/* .group-about-description */
	.group-about-description {}

	.group-about-description .control-label {}

	.group-about-description .col-sm-8 {}

	.group-about-description .form-control {}

	.group-about-description .help-block {}

	/* end .group-about-description */



	/* .group-about-image */
	.group-about-image {}

	.group-about-image .control-label {}

	.group-about-image .col-sm-8 {}

	.group-about-image .form-control {}

	.group-about-image .help-block {}

	/* end .group-about-image */



	/* .group-about-logo */
	.group-about-logo {}

	.group-about-logo .control-label {}

	.group-about-logo .col-sm-8 {}

	.group-about-logo .form-control {}

	.group-about-logo .help-block {}

	/* end .group-about-logo */



	/* .group-about-address */
	.group-about-address {}

	.group-about-address .control-label {}

	.group-about-address .col-sm-8 {}

	.group-about-address .form-control {}

	.group-about-address .help-block {}

	/* end .group-about-address */
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		About <small><?= cclang('new', ['About']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/about'); ?>">About</a></li>
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
							<h3 class="widget-user-username">About</h3>
							<h5 class="widget-user-desc"><?= cclang('new', ['About']); ?></h5>
							<hr>
						</div>
						<?= form_open('', [
                            'name' => 'form_about',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_about',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
						<?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>
						<div class="form-group group-about-description ">
							<label for="about_description" class="col-sm-2 control-label">Kata Pengantar <i
									class="required">*</i>
							</label>
							<div class="col-sm-8">
								<textarea id="about_description" name="about_description" rows="5"
									cols="80"><?= set_value('About Description'); ?></textarea>
								<small class="info help-block">
								</small>
							</div>
						</div>


						<div class="form-group group-about-image ">
							<label for="about_image" class="col-sm-2 control-label">Gambar Kata Pengantar <i
									class="required">*</i>
							</label>
							<div class="col-sm-8">
								<div id="about_about_image_galery"></div>
								<input class="data_file" name="about_about_image_uuid" id="about_about_image_uuid"
									type="hidden" value="<?= set_value('about_about_image_uuid'); ?>">
								<input class="data_file" name="about_about_image_name" id="about_about_image_name"
									type="hidden" value="<?= set_value('about_about_image_name'); ?>">
								<small class="info help-block"><b>Extension file must</b> JPG,JPEG,PNG.<br/><b>Ukuran gambar yang disarankan : </b>523 x 470 pixels</small>
							</div>
						</div>


						<div class="form-group group-about-logo ">
							<label for="about_logo" class="col-sm-2 control-label">Logo <i class="required">*</i>
							</label>
							<div class="col-sm-8">
								<div id="about_about_logo_galery"></div>
								<input class="data_file" name="about_about_logo_uuid" id="about_about_logo_uuid"
									type="hidden" value="<?= set_value('about_about_logo_uuid'); ?>">
								<input class="data_file" name="about_about_logo_name" id="about_about_logo_name"
									type="hidden" value="<?= set_value('about_about_logo_name'); ?>">
								<small class="info help-block">
									<b>Extension file must</b> JPG,JPEG,PNG.</small>
							</div>
						</div>


						<div class="form-group group-about-address ">
							<label for="about_address" class="col-sm-2 control-label">Alamat <i class="required">*</i>
							</label>
							<div class="col-sm-8">
								<textarea id="about_address" name="about_address" rows="5"
									cols="80"><?= set_value('About Address'); ?></textarea>
								<small class="info help-block">
								</small>
							</div>
						</div>


						<div class="form-group group-about-pengertian ">
							<label for="about_pengertian" class="col-sm-2 control-label">Pengertian Stunting <i
									class="required">*</i>
							</label>
							<div class="col-sm-8">
								<textarea id="about_pengertian" name="about_pengertian" rows="5"
									cols="80"><?= set_value('About Pengertian'); ?></textarea>
								<small class="info help-block">
								</small>
							</div>
						</div>


						<div class="form-group group-about-penyebab ">
							<label for="about_penyebab" class="col-sm-2 control-label">Penyebab Stunting <i
									class="required">*</i>
							</label>
							<div class="col-sm-8">
								<textarea id="about_penyebab" name="about_penyebab" rows="5"
									cols="80"><?= set_value('About Penyebab'); ?></textarea>
								<small class="info help-block">
								</small>
							</div>
						</div>


						<div class="form-group group-about-image-pengertian ">
							<label for="about_image_pengertian" class="col-sm-2 control-label">Gambar Pengertian <i
									class="required">*</i>
							</label>
							<div class="col-sm-8">
								<div id="about_about_image_pengertian_galery"></div>
								<input class="data_file" name="about_about_image_pengertian_uuid"
									id="about_about_image_pengertian_uuid" type="hidden"
									value="<?= set_value('about_about_image_pengertian_uuid'); ?>">
								<input class="data_file" name="about_about_image_pengertian_name"
									id="about_about_image_pengertian_name" type="hidden"
									value="<?= set_value('about_about_image_pengertian_name'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>


						<div class="form-group group-about-image-penyebab ">
							<label for="about_image_penyebab" class="col-sm-2 control-label">Gambar Penyebab <i
									class="required">*</i>
							</label>
							<div class="col-sm-8">
								<div id="about_about_image_penyebab_galery"></div>
								<input class="data_file" name="about_about_image_penyebab_uuid"
									id="about_about_image_penyebab_uuid" type="hidden"
									value="<?= set_value('about_about_image_penyebab_uuid'); ?>">
								<input class="data_file" name="about_about_image_penyebab_name"
									id="about_about_image_penyebab_name" type="hidden"
									value="<?= set_value('about_about_image_penyebab_name'); ?>">
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

							<div class="custom-button-wrapper">

							</div>


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

		(function () {
			var about_description = $('#about_description');
			/* 
			 about_description.on('change', function() {});
			 */
			var about_image = $('#about_image');
			var about_logo = $('#about_logo');
			var about_address = $('#about_address');

		})()





		CKEDITOR.replace('about_description');
		var about_description = CKEDITOR.instances.about_description;
		CKEDITOR.replace('about_address');
		var about_address = CKEDITOR.instances.about_address;
		CKEDITOR.replace('about_pengertian');
		var about_pengertian = CKEDITOR.instances.about_pengertian;
		CKEDITOR.replace('about_penyebab');
		var about_penyebab = CKEDITOR.instances.about_penyebab;

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
						window.location.href = BASE_URL + 'administrator/about';
					}
				});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();
			$('#about_description').val(about_description.getData());
			$('#about_address').val(about_address.getData());
			$('#about_pengertian').val(about_pengertian.getData());
			$('#about_penyebab').val(about_penyebab.getData());

			var form_about = $('#form_about');
			var data_post = form_about.serializeArray();
			var save_type = $(this).attr('data-stype');

			data_post.push({
				name: 'save_type',
				value: save_type
			});

			data_post.push({
				name: 'event_submit_and_action',
				value: window.event_submit_and_action
			});

			(function () {
				data_post.push({
					name: '_example',
					value: 'value_of_example',
				})
			})()


			$('.loading').show();

			$.ajax({
					url: BASE_URL + '/administrator/about/add_save',
					type: 'POST',
					dataType: 'json',
					data: data_post,
				})
				.done(function (res) {
					$('form').find('.form-group').removeClass('has-error');
					$('.steps li').removeClass('error');
					$('form').find('.error-input').remove();
					if (res.success) {
						var id_about_image = $('#about_about_image_galery').find('li').attr(
							'qq-file-id');
						var id_about_logo = $('#about_about_logo_galery').find('li').attr(
						'qq-file-id');
						var id_about_image_pengertian = $('#about_about_image_pengertian_galery').find(
							'li').attr('qq-file-id');
						var id_about_image_penyebab = $('#about_about_image_penyebab_galery').find(
							'li').attr('qq-file-id');

						if (save_type == 'back') {
							window.location.href = res.redirect;
							return;
						}

						$('.message').printMessage({
							message: res.message
						});
						$('.message').fadeIn();
						resetForm();
						if (typeof id_about_image !== 'undefined') {
							$('#about_about_image_galery').fineUploader('deleteFile', id_about_image);
						}
						if (typeof id_about_logo !== 'undefined') {
							$('#about_about_logo_galery').fineUploader('deleteFile', id_about_logo);
						}
						if (typeof id_about_image_pengertian !== 'undefined') {
							$('#about_about_image_pengertian_galery').fineUploader('deleteFile',
								id_about_image_pengertian);
						}
						if (typeof id_about_image_penyebab !== 'undefined') {
							$('#about_about_image_penyebab_galery').fineUploader('deleteFile',
								id_about_image_penyebab);
						}
						$('.chosen option').prop('selected', false).trigger('chosen:updated');
						about_description.setData('');

						about_address.setData('');

						about_pengertian.setData('');

						about_penyebab.setData('');


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

		$('#about_about_image_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: BASE_URL + '/administrator/about/upload_about_image_file',
				params: params
			},
			deleteFile: {
				enabled: true,
				endpoint: BASE_URL + '/administrator/about/delete_about_image_file',
			},
			thumbnails: {
				placeholders: {
					waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
					notAvailablePath: BASE_URL +
						'/asset/fine-upload/placeholders/not_available-generic.png'
				}
			},
			multiple: false,
			validation: {
				allowedExtensions: ["jpg", "jpeg", "png"],
				sizeLimit: 0,
			},
			showMessage: function (msg) {
				toastr['error'](msg);
			},
			callbacks: {
				onComplete: function (id, name, xhr) {
					if (xhr.success) {
						var uuid = $('#about_about_image_galery').fineUploader('getUuid', id);
						$('#about_about_image_uuid').val(uuid);
						$('#about_about_image_name').val(xhr.uploadName);
					} else {
						toastr['error'](xhr.error);
					}
				},
				onSubmit: function (id, name) {
					var uuid = $('#about_about_image_uuid').val();
					$.get(BASE_URL + '/administrator/about/delete_about_image_file/' + uuid);
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#about_about_image_uuid').val('');
						$('#about_about_image_name').val('');
					}
				}
			}
		}); /*end about_image galery*/
		var params = {};
		params[csrf] = token;

		$('#about_about_logo_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: BASE_URL + '/administrator/about/upload_about_logo_file',
				params: params
			},
			deleteFile: {
				enabled: true,
				endpoint: BASE_URL + '/administrator/about/delete_about_logo_file',
			},
			thumbnails: {
				placeholders: {
					waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
					notAvailablePath: BASE_URL +
						'/asset/fine-upload/placeholders/not_available-generic.png'
				}
			},
			multiple: false,
			validation: {
				allowedExtensions: ["jpg", "jpeg", "png"],
				sizeLimit: 0,
			},
			showMessage: function (msg) {
				toastr['error'](msg);
			},
			callbacks: {
				onComplete: function (id, name, xhr) {
					if (xhr.success) {
						var uuid = $('#about_about_logo_galery').fineUploader('getUuid', id);
						$('#about_about_logo_uuid').val(uuid);
						$('#about_about_logo_name').val(xhr.uploadName);
					} else {
						toastr['error'](xhr.error);
					}
				},
				onSubmit: function (id, name) {
					var uuid = $('#about_about_logo_uuid').val();
					$.get(BASE_URL + '/administrator/about/delete_about_logo_file/' + uuid);
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#about_about_logo_uuid').val('');
						$('#about_about_logo_name').val('');
					}
				}
			}
		}); /*end about_logo galery*/
		var params = {};
		params[csrf] = token;

		$('#about_about_image_pengertian_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: BASE_URL + '/administrator/about/upload_about_image_pengertian_file',
				params: params
			},
			deleteFile: {
				enabled: true,
				endpoint: BASE_URL + '/administrator/about/delete_about_image_pengertian_file',
			},
			thumbnails: {
				placeholders: {
					waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
					notAvailablePath: BASE_URL +
						'/asset/fine-upload/placeholders/not_available-generic.png'
				}
			},
			multiple: false,
			validation: {
				allowedExtensions: ["jpg", "jpeg", "png"],
				sizeLimit: 0,
			},
			showMessage: function (msg) {
				toastr['error'](msg);
			},
			callbacks: {
				onComplete: function (id, name, xhr) {
					if (xhr.success) {
						var uuid = $('#about_about_image_pengertian_galery').fineUploader('getUuid',
							id);
						$('#about_about_image_pengertian_uuid').val(uuid);
						$('#about_about_image_pengertian_name').val(xhr.uploadName);
					} else {
						toastr['error'](xhr.error);
					}
				},
				onSubmit: function (id, name) {
					var uuid = $('#about_about_image_pengertian_uuid').val();
					$.get(BASE_URL + '/administrator/about/delete_about_image_pengertian_file/' +
					uuid);
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#about_about_image_pengertian_uuid').val('');
						$('#about_about_image_pengertian_name').val('');
					}
				}
			}
		}); /*end about_image_pengertian galery*/
		var params = {};
		params[csrf] = token;

		$('#about_about_image_penyebab_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: BASE_URL + '/administrator/about/upload_about_image_penyebab_file',
				params: params
			},
			deleteFile: {
				enabled: true,
				endpoint: BASE_URL + '/administrator/about/delete_about_image_penyebab_file',
			},
			thumbnails: {
				placeholders: {
					waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
					notAvailablePath: BASE_URL +
						'/asset/fine-upload/placeholders/not_available-generic.png'
				}
			},
			multiple: false,
			validation: {
				allowedExtensions: ["jpg", "jpeg", "png"],
				sizeLimit: 0,
			},
			showMessage: function (msg) {
				toastr['error'](msg);
			},
			callbacks: {
				onComplete: function (id, name, xhr) {
					if (xhr.success) {
						var uuid = $('#about_about_image_penyebab_galery').fineUploader('getUuid', id);
						$('#about_about_image_penyebab_uuid').val(uuid);
						$('#about_about_image_penyebab_name').val(xhr.uploadName);
					} else {
						toastr['error'](xhr.error);
					}
				},
				onSubmit: function (id, name) {
					var uuid = $('#about_about_image_penyebab_uuid').val();
					$.get(BASE_URL + '/administrator/about/delete_about_image_penyebab_file/' + uuid);
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#about_about_image_penyebab_uuid').val('');
						$('#about_about_image_penyebab_name').val('');
					}
				}
			}
		}); /*end about_image_penyebab galery*/







	}); /*end doc ready*/
</script>