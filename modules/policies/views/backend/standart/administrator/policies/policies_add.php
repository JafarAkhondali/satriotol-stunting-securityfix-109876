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
		Policies <small><?= cclang('new', ['Policies']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/policies'); ?>">Policies</a></li>
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
							<h3 class="widget-user-username">Policies</h3>
							<h5 class="widget-user-desc"><?= cclang('new', ['Policies']); ?></h5>
							<hr>
						</div>
						<?=
                        form_open('', [
                            'name'      => 'form_policies',
                            'class'     => 'form-horizontal form-step',
                            'id'        => 'form_policies',
                            'enctype'   => 'multipart/form-data',
                            'method'    => 'POST'
                        ]);

                        $user_groups = $this->model_group->get_user_group_ids();
                    ?>

						<div class="form-group group-policies-nama ">
							<label for="policies_nama" class="col-sm-2 control-label">Nama File <i class="required">*</i>
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="policies_nama" id="policies_nama" placeholder="Nama File" value="<?= set_value('policies_nama'); ?>">
								<small class="info help-block">
									<b>Input Policies Nama</b> Max Length : 255.</small>
							</div>
						</div>

						<div class="form-group group-policies-year ">
							<label for="policies_year" class="col-sm-2 control-label">Tahun <i class="required">*</i></label>
							<div class="col-sm-2">
								<select class="form-control chosen chosen-select-deselect" name="policies_year" id="policies_year" data-placeholder="Select Tahun">
									<option value=""></option>
									<?php for ($i = 1970; $i < date('Y')+100; $i++){ ?> <option value="<?= $i;?>">
										<?= $i; ?></option>
									<?php }; ?>
								</select>
								<small class="info help-block">
									<b>Input Policies Year</b> Max Length : 4.</small>
							</div>
						</div>

						<div class="form-group group-policies-file ">
							<label for="policies_file" class="col-sm-2 control-label">Upload File <i
									class="required">*</i>
							</label>
							<div class="col-sm-8">
								<div id="policies_policies_file_galery"></div>
								<input class="data_file" name="policies_policies_file_uuid"
									id="policies_policies_file_uuid" type="hidden" value="<?= set_value('policies_policies_file_uuid'); ?>">
								<input class="data_file" name="policies_policies_file_name"
									id="policies_policies_file_name" type="hidden" value="<?= set_value('policies_policies_file_name'); ?>">
								<small class="info help-block">
									<b>Max file size : </b>2mb
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
<!-- Page script -->

<script>
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
						window.location.href = BASE_URL + 'administrator/policies';
					}
				});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_policies = $('#form_policies');
			var data_post = form_policies.serializeArray();
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
					url: BASE_URL + '/administrator/policies/add_save',
					type: 'POST',
					dataType: 'json',
					data: data_post,
				})
				.done(function (res) {
					$('form').find('.form-group').removeClass('has-error');
					$('.steps li').removeClass('error');
					$('form').find('.error-input').remove();
					if (res.success) {
						var id_policies_file = $('#policies_policies_file_galery').find('li').attr(
							'qq-file-id');

						if (save_type == 'back') {
							window.location.href = res.redirect;
							return;
						}

						$('.message').printMessage({
							message: res.message
						});
						$('.message').fadeIn();
						resetForm();
						if (typeof id_policies_file !== 'undefined') {
							$('#policies_policies_file_galery').fineUploader('deleteFile',
								id_policies_file);
						}
						$('.chosen option').prop('selected', false).trigger('chosen:updated');

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

		$('#policies_policies_file_galery').fineUploader({
			template: 'qq-template-gallery',
			request: {
				endpoint: BASE_URL + '/administrator/policies/upload_policies_file_file',
				params: params
			},
			deleteFile: {
				enabled: true,
				endpoint: BASE_URL + '/administrator/policies/delete_policies_file_file',
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
				allowedExtensions: ["*"],
				sizeLimit: 0,
			},
			showMessage: function (msg) {
				toastr['error'](msg);
			},
			callbacks: {
				onComplete: function (id, name, xhr) {
					if (xhr.success) {
						var uuid = $('#policies_policies_file_galery').fineUploader('getUuid', id);
						$('#policies_policies_file_uuid').val(uuid);
						$('#policies_policies_file_name').val(xhr.uploadName);
					} else {
						toastr['error'](xhr.error);
					}
				},
				onSubmit: function (id, name) {
					var uuid = $('#policies_policies_file_uuid').val();
					$.get(BASE_URL + '/administrator/policies/delete_policies_file_file/' + uuid);
				},
				onDeleteComplete: function (id, xhr, isError) {
					if (isError == false) {
						$('#policies_policies_file_uuid').val('');
						$('#policies_policies_file_name').val('');
					}
				}
			}
		}); /*end policies_file galery*/







	}); /*end doc ready*/
</script>