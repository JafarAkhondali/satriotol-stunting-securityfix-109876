<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

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
	/* .group-dawar_nokk */
	.group-dawar_nokk {}

	.group-dawar_nokk .control-label {}

	.group-dawar_nokk .col-sm-8 {}

	.group-dawar_nokk .form-control {}

	.group-dawar_nokk .help-block {}

	/* end .group-dawar_nokk */



	/* .group-dawar_nik */
	.group-dawar_nik {}

	.group-dawar_nik .control-label {}

	.group-dawar_nik .col-sm-8 {}

	.group-dawar_nik .form-control {}

	.group-dawar_nik .help-block {}

	/* end .group-dawar_nik */



	/* .group-dawar_nama_lengkap */
	.group-dawar_nama_lengkap {}

	.group-dawar_nama_lengkap .control-label {}

	.group-dawar_nama_lengkap .col-sm-8 {}

	.group-dawar_nama_lengkap .form-control {}

	.group-dawar_nama_lengkap .help-block {}

	/* end .group-dawar_nama_lengkap */



	/* .group-dawar_tgl_lahir */
	.group-dawar_tgl_lahir {}

	.group-dawar_tgl_lahir .control-label {}

	.group-dawar_tgl_lahir .col-sm-8 {}

	.group-dawar_tgl_lahir .form-control {}

	.group-dawar_tgl_lahir .help-block {}

	/* end .group-dawar_tgl_lahir */



	/* .group-dawar_jenkel */
	.group-dawar_jenkel {}

	.group-dawar_jenkel .control-label {}

	.group-dawar_jenkel .col-sm-8 {}

	.group-dawar_jenkel .form-control {}

	.group-dawar_jenkel .help-block {}

	/* end .group-dawar_jenkel */



	/* .group-dawar_alamat */
	.group-dawar_alamat {}

	.group-dawar_alamat .control-label {}

	.group-dawar_alamat .col-sm-8 {}

	.group-dawar_alamat .form-control {}

	.group-dawar_alamat .help-block {}

	/* end .group-dawar_alamat */



	/* .group-dawar_rw */
	.group-dawar_rw {}

	.group-dawar_rw .control-label {}

	.group-dawar_rw .col-sm-8 {}

	.group-dawar_rw .form-control {}

	.group-dawar_rw .help-block {}

	/* end .group-dawar_rw */



	/* .group-dawar_rt */
	.group-dawar_rt {}

	.group-dawar_rt .control-label {}

	.group-dawar_rt .col-sm-8 {}

	.group-dawar_rt .form-control {}

	.group-dawar_rt .help-block {}

	/* end .group-dawar_rt */



	/* .group-dawar_kecamatan */
	.group-dawar_kecamatan {}

	.group-dawar_kecamatan .control-label {}

	.group-dawar_kecamatan .col-sm-8 {}

	.group-dawar_kecamatan .form-control {}

	.group-dawar_kecamatan .help-block {}

	/* end .group-dawar_kecamatan */



	/* .group-dawar_kelurahan */
	.group-dawar_kelurahan {}

	.group-dawar_kelurahan .control-label {}

	.group-dawar_kelurahan .col-sm-8 {}

	.group-dawar_kelurahan .form-control {}

	.group-dawar_kelurahan .help-block {}

	/* end .group-dawar_kelurahan */
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Data Warga <small><?= cclang('new', ['Data Warga']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/data_warga'); ?>">Data Warga</a></li>
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
							<h3 class="widget-user-username">Data Warga</h3>
							<h5 class="widget-user-desc"><?= cclang('new', ['Data Warga']); ?></h5>
							<hr>
						</div>
						<?= form_open('', [
						'name' => 'form_data_warga',
						'class' => 'form-horizontal form-step',
						'id' => 'form_data_warga',
						'enctype' => 'multipart/form-data',
						'method' => 'POST'
					]); ?>
						<?php
					$user_groups = $this->model_group->get_user_group_ids();
					?>
						<!-- <div class="form-group group-dawar_identitas ">
							<label for="dawar_identitas" class="col-sm-2 control-label">No. Identitas <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="dawar_identitas" id="dawar_identitas" placeholder="No. Identitas" value="<?= set_value('dawar_identitas'); ?>">
								<small class="info help-block"><b>Input Dawar Identitas</b> Max Length : 255.</small>
							</div>
						</div> -->

						<div class="form-group group-dawar_nokk ">
							<label for="dawar_nokk" class="col-sm-2 control-label">No. KK <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="dawar_nokk" id="dawar_nokk" placeholder="No. KK" value="<?= set_value('dawar_nokk'); ?>" >
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_nik ">
							<label for="dawar_nik" class="col-sm-2 control-label">NIK <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="dawar_nik" id="dawar_nik" placeholder="NIK" value="<?= set_value('dawar_nik'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_nama_lengkap ">
							<label for="dawar_nama_lengkap" class="col-sm-2 control-label">Nama Lengkap <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="dawar_nama_lengkap" id="dawar_nama_lengkap" placeholder="Nama Lengkap" value="<?= set_value('dawar_nama_lengkap'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_tgl_lahir ">
							<label for="dawar_tgl_lahir" class="col-sm-2 control-label">Tempat & Tanggal Lahir <i class="required">*</i></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="dawar_tp_lahir" id="dawar_tp_lahir" placeholder="Tempat Lahir" value="<?= set_value('dawar_tp_lahir'); ?>">
								<small class="info help-block"></small>
							</div>
							<div class="col-sm-4">
								<div class="input-group date col-sm-6">
									<input type="text" class="form-control pull-right datepicker"name="dawar_tgl_lahir" placeholder="Tanggal Lahir" id="dawar_tgl_lahir">
								</div>
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_jenkel ">
							<label for="dawar_jenkel" class="col-sm-2 control-label">Jenis Kelamin <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select" name="dawar_jenkel" id="dawar_jenkel" data-placeholder="Select Jenis Kelamin">
									<option value=""></option>
									<option value="L">Laki-Laki</option>
									<option value="P">Perempuan</option>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_hub_kel ">
							<label for="dawar_hub_kel" class="col-sm-2 control-label">Hubungan Keluarga <i class="required">*</i></label>
							<div class="col-sm-8">
								<!-- <input type="number" class="form-control" name="dawar_hub_kel" id="dawar_hub_kel" placeholder="Hubungan Keluarga" value="<?= set_value('dawar_hub_kel'); ?>"> -->
								
								<select class="form-control chosen chosen-select" name="dawar_hub_kel" id="dawar_hub_kel" data-placeholder="Select Hubungan Keluarga">
									<option value=""></option>
									<option value="1">Laki-Laki</option>
									<option value="2">Perempuan</option>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_agama ">
							<label for="dawar_agama" class="col-sm-2 control-label">Agama <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="dawar_agama" id="dawar_agama" data-placeholder="Select Agama">
									<option value=""></option>
									<?php foreach (db_get_all_data('agama') as $row): ?>
									<option value="<?= $row->agama_id ?>"><?= $row->agama_nama; ?></option>
									<?php endforeach; ?>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_pend_akhir ">
							<label for="dawar_pend_akhir" class="col-sm-2 control-label">Pendidikan Terakhir </label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="dawar_pend_akhir" id="dawar_pend_akhir" placeholder="Pendidikan Terakhir" value="<?= set_value('dawar_pend_akhir'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_jn_pekerjaan ">
							<label for="dawar_jn_pekerjaan" class="col-sm-2 control-label">Jenis Pekerjaan </label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="dawar_jn_pekerjaan" id="dawar_jn_pekerjaan" placeholder="Jenis Pekerjaan" value="<?= set_value('dawar_jn_pekerjaan'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_status_kawin ">
							<label for="dawar_status_kawin" class="col-sm-2 control-label">Status Perkawinan </label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="dawar_status_kawin" id="dawar_status_kawin" placeholder="Status Perkawinan" value="<?= set_value('dawar_status_kawin'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_alamat ">
							<label for="dawar_alamat" class="col-sm-2 control-label">Alamat <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="dawar_alamat" id="dawar_alamat" placeholder="Alamat" value="<?= set_value('dawar_alamat'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_rw ">
							<label for="dawar_rw" class="col-sm-2 control-label">RW <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="dawar_rw" id="dawar_rw" placeholder="RW" value="<?= set_value('dawar_rw'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_rt ">
							<label for="dawar_rt" class="col-sm-2 control-label">RT <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="dawar_rt" id="dawar_rt" placeholder="RT" value="<?= set_value('dawar_rt'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_kecamatan ">
							<label for="dawar_kecamatan" class="col-sm-2 control-label">Kecamatan <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="dawar_kecamatan" id="dawar_kecamatan" data-placeholder="Select Kecamatan">
									<option value=""></option>
									<?php foreach (db_get_all_data('kecamatans') as $row): ?>
									<option value="<?= $row->kecamatan_id ?>"><?= $row->kecamatan_nama; ?></option>
									<?php endforeach; ?>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-dawar_kelurahan ">
							<label for="dawar_kelurahan" class="col-sm-2 control-label">Kelurahan <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="dawar_kelurahan" id="dawar_kelurahan" data-placeholder="Select Kelurahan">
									<option value=""></option>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="message"></div>
						<div class="row-fluid col-md-7 container-button-bottom">
							<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save"
								data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
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
<!-- Page script -->

<script>
	$(document).ready(function () {
		window.event_submit_and_action = '';

		(function () {
			var dawar_nokk = $('#dawar_nokk');
			/* 
dawar_nokk.on('change', function() {});
*/
			var dawar_nik = $('#dawar_nik');
			var dawar_nama_lengkap = $('#dawar_nama_lengkap');
			var dawar_tgl_lahir = $('#dawar_tgl_lahir');
			var dawar_jenkel = $('#dawar_jenkel');
			var dawar_alamat = $('#dawar_alamat');
			var dawar_rw = $('#dawar_rw');
			var dawar_rt = $('#dawar_rt');
			var dawar_kecamatan = $('#dawar_kecamatan');
			var dawar_kelurahan = $('#dawar_kelurahan');
		})()

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
					window.location.href = BASE_URL + 'administrator/data_warga';
				}
			});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_data_warga = $('#form_data_warga');
			var data_post = form_data_warga.serializeArray();
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
				url: BASE_URL + '/administrator/data_warga/add_save',
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
				$('html, body').animate({
					scrollTop: $(document).height()
				}, 2000);
			});

			return false;
		}); /*end btn save*/

		$('#dawar_kecamatan').change(function (event) {
			var val = $(this).val();
			$.LoadingOverlay('show')
			$.ajax({
				url: BASE_URL + '/administrator/data_warga/ajax_dawar_kelurahan/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option value="' + val.kelurahan_id + '">' + val.kelurahan_nama + '</option>'
				});
				$('#dawar_kelurahan').html(html);
				$('#dawar_kelurahan').trigger('chosen:updated');

			})
			.fail(function () {
				toastr['error']('Error', 'Getting data fail')
			})
			.always(function () {
				$.LoadingOverlay('hide')
			});

		});




	}); /*end doc ready*/
</script>