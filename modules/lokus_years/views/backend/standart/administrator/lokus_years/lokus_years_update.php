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
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Tahun Lokus <small>Edit Tahun Lokus</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/lokus_years'); ?>">Tahun Lokus</a></li>
		<li class="active">Edit</li>
	</ol>
</section>

<style>

</style>
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
							<h3 class="widget-user-username">Tahun Lokus</h3>
							<h5 class="widget-user-desc">Edit Tahun Lokus</h5>
							<hr>
						</div>
					<?=
						form_open(base_url('administrator/lokus_years/edit_save/'.$this->uri->segment(4)), [
							'name' 		=> 'form_lokus_years',
							'class' 	=> 'form-horizontal form-step',
							'id' 		=> 'form_lokus_years',
							'method' 	=> 'POST'
						]);

                        $user_groups = $this->model_group->get_user_group_ids();
                    ?>

						<div class="form-group group-lokus-year-nama  ">
							<label for="lokus_year_nama" class="col-sm-2 control-label">Tahun Lokus <i class="required">*</i>
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="lokus_year_nama" id="lokus_year_nama" placeholder="" value="<?= set_value('lokus_year_nama', $lokus_years->lokus_year_nama); ?>">
								<small class="info help-block"><b>Input Lokus Year Nama</b> Max Length : 255.</small>
							</div>
						</div>

						<div class="form-group group-lokus-year-file  ">
							<label for="lokus_year_file" class="col-sm-2 control-label">File Lokus <i class="required">*</i></label>
							<div class="col-sm-8">
								<div id="lokus_years_lokus_year_file_galery"></div>
								<input class="data_file data_file_uuid" name="lokus_years_lokus_year_file_uuid" id="lokus_years_lokus_year_file_uuid" type="hidden" value="<?= set_value('lokus_years_lokus_year_file_uuid'); ?>">
								<input class="data_file" name="lokus_years_lokus_year_file_name" id="lokus_years_lokus_year_file_name" type="hidden" value="<?= set_value('lokus_years_lokus_year_file_name', $lokus_years->lokus_year_file); ?>">
								<small class="info help-block">
									<b>Extension file must</b> PDF.<br/>
									<b>Ukuran file maksimal </b> 10 Mb
								</small>
							</div>
						</div>

						<div class="message"></div>

						<div class="row-fluid col-md-7 container-button-bottom">
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
<script>
	$(document).ready(function () {
		window.event_submit_and_action = '';

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
						window.location.href = BASE_URL + 'administrator/lokus_years';
					}
				});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_lokus_years = $('#form_lokus_years');
			var data_post = form_lokus_years.serializeArray();
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
					url: form_lokus_years.attr('action'),
					type: 'POST',
					dataType: 'json',
					data: data_post,
				})
				.done(function (res) {
					$('form').find('.form-group').removeClass('has-error');
					$('form').find('.error-input').remove();
					$('.steps li').removeClass('error');
					if (res.success) {
						var id = $('#lokus_years_image_galery').find('li').attr('qq-file-id');
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

		$('#lokus_years_lokus_year_file_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: BASE_URL + '/administrator/lokus_years/upload_lokus_year_file_file',
				params: params
			},
			deleteFile: {
				enabled: true, // defaults to false
				endpoint: BASE_URL + '/administrator/lokus_years/delete_lokus_year_file_file'
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
					'administrator/lokus_years/get_lokus_year_file_file/<?= $lokus_years->lokus_year_id; ?>',
				refreshOnRequest: true
			},
			multiple: false,
			validation: {
				allowedExtensions: ["pdf"],
				sizeLimit: 0,
			},
			showMessage: function (msg) {
				toastr['error'](msg);
			},
			callbacks: {
				onComplete: function (id, name, xhr) {
					if (xhr.success) {
						var uuid = $('#lokus_years_lokus_year_file_galery').fineUploader('getUuid',
						id);
						$('#lokus_years_lokus_year_file_uuid').val(uuid);
						$('#lokus_years_lokus_year_file_name').val(xhr.uploadName);
					} else {
						toastr['error'](xhr.error);
					}
				},
				onSubmit: function (id, name) {
					var uuid = $('#lokus_years_lokus_year_file_uuid').val();
					$.get(BASE_URL + '/administrator/lokus_years/delete_lokus_year_file_file/' + uuid);
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#lokus_years_lokus_year_file_uuid').val('');
						$('#lokus_years_lokus_year_file_name').val('');
					}
				}
			}
		}); /*end lokus_year_file galey*/

		async function chain() {}

		chain();

	}); /*end doc ready*/
</script>