<!-- Fine Uploader Gallery CSS file
	====================================================================== -->
<link href="<?= BASE_ASSET; ?>fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
	====================================================================== -->
<script src="<?= BASE_ASSET; ?>fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
<script src="<?= BASE_ASSET; ?>js/jquery.hotkeys.js"></script>
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
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Sliders <small>Edit Sliders</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/sliders'); ?>">Sliders</a></li>
		<li class="active">Edit</li>
	</ol>
</section>

<style type="text/css">
	/* .group-slider-title */
	.group-slider-title {}

	.group-slider-title .control-label {}

	.group-slider-title .col-sm-8 {}

	.group-slider-title .form-control {}

	.group-slider-title .help-block {}

	/* end .group-slider-title */



	/* .group-slider-subtitle */
	.group-slider-subtitle {}

	.group-slider-subtitle .control-label {}

	.group-slider-subtitle .col-sm-8 {}

	.group-slider-subtitle .form-control {}

	.group-slider-subtitle .help-block {}

	/* end .group-slider-subtitle */



	/* .group-slider-image */
	.group-slider-image {}

	.group-slider-image .control-label {}

	.group-slider-image .col-sm-8 {}

	.group-slider-image .form-control {}

	.group-slider-image .help-block {}

	/* end .group-slider-image */
</style>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<?= form_open(base_url('administrator/sliders/edit_save/'.$this->uri->segment(4)), [
					'name' 		=> 'form_sliders',
					// 'class' 	=> 'form-horizontal form-step',
					'id' 		=> 'form_sliders',
					'method' 	=> 'POST'
				]);

				$user_groups = $this->model_group->get_user_group_ids();
			?>
				<div class="box-header">
					<h3 class="box-title">Update Slider</h3>
				</div>
				<div class="box-body ">
					<div class="form-group group-slider-title ">
						<label for="slider_title" class="control-label">Judul</label>
							<input type="text" class="form-control" name="slider_title" id="slider_title" placeholder="Masukkan Judul" value="<?= set_value('slider_title', $sliders->slider_title); ?>">
							<small class="info help-block"> <b>Input Slider Title</b> Max Length : 255.</small>
					</div>
					<div class="form-group group-slider-subtitle">
						<label for="slider_subtitle" class="control-label">Deskripsi</label>
						<textarea class="form-control" id="slider_subtitle" name="slider_subtitle" rows="10" cols="80"> <?= set_value('slider_subtitle', $sliders->slider_subtitle); ?></textarea>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-slider-url">
						<label for="slider_url" class="control-label">Link URL </label>
						<input type="text" class="form-control" name="slider_url" id="slider_url" placeholder="" value="<?= set_value('slider_url', $sliders->slider_url); ?>">
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-slider-image">
						<label for="slider_image" class="control-label">Image <i class="required">*</i></label>
						<div id="sliders_slider_image_galery"></div>
						<input class="data_file data_file_uuid" name="sliders_slider_image_uuid" id="sliders_slider_image_uuid" type="hidden" value="<?= set_value('sliders_slider_image_uuid'); ?>">
						<input class="data_file" name="sliders_slider_image_name" id="sliders_slider_image_name" type="hidden" value="<?= set_value('sliders_slider_image_name', $sliders->slider_image); ?>">
						<small class="info help-block">
							<b>Extension file must</b> JPG,JPEG,PNG.<br/>
							<b>Dimensi gambar yang disarankan </b>1920 x 775<br/>
							<b>Ukuran gambar yang diupload maksimal</b> 10MB
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

						<div class="custom-button-wrapper">

						</div>
						<a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
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
			var slider_title = $('#slider_title');
			/* 
	slider_title.on('change', function() {});
	*/
			var slider_subtitle = $('#slider_subtitle');
			var slider_image = $('#slider_image');

		})()

		// CKEDITOR.replace('slider_subtitle');
		// var slider_subtitle = CKEDITOR.instances.slider_subtitle;

		$('#btn_cancel').click(function () {
			swal({
				title: "Are you sure?",
				text: "the data that you have created will be in the exhaust!",
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
					window.location.href = BASE_URL + 'administrator/sliders';
				}
			});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();
			// $('#slider_subtitle').val(slider_subtitle.getData());

			var form_sliders = $('#form_sliders');
			var data_post = form_sliders.serializeArray();
			var save_type = $(this).attr('data-stype');
			data_post.push({
				name: 'save_type',
				value: save_type
			});

			(function () {
				data_post.push({
					name: '_example',
					value: 'value_of_example',
				})
			})()

			data_post.push({
				name: 'event_submit_and_action',
				value: window.event_submit_and_action
			});

			$('.loading').show();

			$.ajax({
					url: form_sliders.attr('action'),
					type: 'POST',
					dataType: 'json',
					data: data_post,
				})
				.done(function (res) {
					$('form').find('.form-group').removeClass('has-error');
					$('form').find('.error-input').remove();
					$('.steps li').removeClass('error');

					if (res.success) {
						var id = $('#sliders_image_galery').find('li').attr('qq-file-id');
						if (save_type == 'back') {
							window.location.href = res.redirect;
							return;
						}

						$('.message').printMessage({
							message: res.message
						});

						$('.message').fadeIn();
						$('.data_file_uuid').val('');
					} else {
						if (res.errors) {
							parseErrorField(res.errors);
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

		$('#sliders_slider_image_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: BASE_URL + '/administrator/sliders/upload_slider_image_file',
				params: params
			},
			deleteFile: {
				enabled: true, // defaults to false
				endpoint: BASE_URL + '/administrator/sliders/delete_slider_image_file'
			},
			thumbnails: {
				placeholders: {
					waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
					notAvailablePath: BASE_URL +
						'/asset/fine-upload/placeholders/not_available-generic.png'
				}
			},
			session: {
				endpoint: BASE_URL +
					'administrator/sliders/get_slider_image_file/<?= $sliders->slider_id; ?>',
				refreshOnRequest: true
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
						var uuid = $('#sliders_slider_image_galery').fineUploader('getUuid', id);
						$('#sliders_slider_image_uuid').val(uuid);
						$('#sliders_slider_image_name').val(xhr.uploadName);
					} else {
						toastr['error'](xhr.error);
					}
				},
				onSubmit: function (id, name) {
					var uuid = $('#sliders_slider_image_uuid').val();
					$.get(BASE_URL + '/administrator/sliders/delete_slider_image_file/' + uuid);
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#sliders_slider_image_uuid').val('');
						$('#sliders_slider_image_name').val('');
					}
				}
			}
		}); /*end slider_image galey*/

		async function chain() {}

		chain();
	}); /*end doc ready*/
</script>