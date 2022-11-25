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
	<h1>Indikator Analisa Situasi <small>Edit Indikator Analisa Situasi</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/analisa_situasi_indikator'); ?>">Indikator Analisa Situasi</a>
		</li>
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
							<h3 class="widget-user-username">Indikator Analisa Situasi</h3>
							<h5 class="widget-user-desc">Edit Indikator Analisa Situasi</h5>
							<hr>
						</div>
						<?= form_open(base_url('administrator/analisa_situasi_indikator/edit_save/'.$this->uri->segment(4)), [
							'name' => 'form_analisa_situasi_indikator',
							'class' => 'form-horizontal form-step',
							'id' => 'form_analisa_situasi_indikator',
							'method' => 'POST'
						]); ?>

						<?php
						$user_groups = $this->model_group->get_user_group_ids();
						?>



						<div class="form-group group-analisa-situasi-indikator-nama  ">
							<label for="analisa_situasi_indikator_nama" class="col-sm-2 control-label">Nama Indikator <i
									class="required">*</i>
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="analisa_situasi_indikator_nama"
									id="analisa_situasi_indikator_nama" placeholder=""
									value="<?= set_value('analisa_situasi_indikator_nama', $analisa_situasi_indikator->analisa_situasi_indikator_nama); ?>">
								<small class="info help-block">
									<b>Input Analisa Situasi Indikator Nama</b> Max Length : 255.</small>
							</div>
						</div>




						<div class="form-group group-analisa-situasi-indikator-deskripsi  ">
							<label for="analisa_situasi_indikator_deskripsi" class="col-sm-2 control-label">Deskripsi
							</label>
							<div class="col-sm-8">
								<textarea placeholder="Deskripsi" id="analisa_situasi_indikator_deskripsi"
									name="analisa_situasi_indikator_deskripsi" rows="5"
									class="textarea form-control"><?= set_value('analisa_situasi_indikator_deskripsi', $analisa_situasi_indikator->analisa_situasi_indikator_deskripsi); ?></textarea>
								<small class="info help-block">
								</small>
							</div>
						</div>




						<div class="form-group group-analisa-situasi-indikator-update-at  ">
							<label for="analisa_situasi_indikator_update_at" class="col-sm-2 control-label">Update Date
							</label>
							<div class="col-sm-6">
								<div class="input-group date col-sm-8">
									<input type="text" class="form-control pull-right datetimepicker"
										name="analisa_situasi_indikator_update_at" placeholder=""
										id="analisa_situasi_indikator_update_at"
										value="<?= set_value('analisa_situasi_indikator_update_at', $analisa_situasi_indikator->analisa_situasi_indikator_update_at); ?>">
								</div>
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
						window.location.href = BASE_URL + 'administrator/analisa_situasi_indikator';
					}
				});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_analisa_situasi_indikator = $('#form_analisa_situasi_indikator');
			var data_post = form_analisa_situasi_indikator.serializeArray();
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
					url: form_analisa_situasi_indikator.attr('action'),
					type: 'POST',
					dataType: 'json',
					data: data_post,
				})
				.done(function (res) {
					$('form').find('.form-group').removeClass('has-error');
					$('form').find('.error-input').remove();
					$('.steps li').removeClass('error');
					if (res.success) {
						var id = $('#analisa_situasi_indikator_image_galery').find('li').attr(
							'qq-file-id');
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





		async function chain() {}

		chain();




	}); /*end doc ready*/
</script>