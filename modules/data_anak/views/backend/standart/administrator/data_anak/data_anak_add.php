<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

<section class="content-header">
	<h1>
		Data Identitas Anak <small><?= cclang('new', ['Data Identitas Anak']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/data_anak'); ?>">Data Identitas Anak</a></li>
		<li class="active"><?= cclang('new'); ?></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning">
				<div class="box-body">
					<div class="box box-widget widget-user-2">
						<div class="widget-user-header">
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
							</div>
							<h3 class="widget-user-username">Data Identitas Anak</h3>
							<h5 class="widget-user-desc"><?= cclang('new', ['Data Identitas Anak']); ?></h5>
							<hr>
						</div>
					<?= form_open('', [
							'name' 		=> 'form_data_anak',
							'class' 	=> 'form-horizontal form-step',
							'id' 		=> 'form_data_anak',
							'enctype' 	=> 'multipart/form-data',
							'method' 	=> 'POST'
						]);

						$user_groups = $this->model_group->get_user_group_ids();
					?>
						<div class="form-group group-anak_puskesmas_id">
							<label for="anak_puskesmas_id" class="col-sm-2 control-label">Puskesmas <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="anak_puskesmas_id" id="anak_puskesmas_id" data-placeholder="Select Puskesmas">
									<option value=""></option>
								<?php
									$conditions = [];

									foreach (db_get_all_data('puskesmas', $conditions) as $row):
								?>
									<option value="<?= $row->puskesmas_id ?>">PUSKESMAS <?= strtoupper($row->puskesmas_nama); ?></option>
									<?php endforeach; ?>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_kecamatan_id">
							<label for="anak_kecamatan_id" class="col-sm-2 control-label">Kecamatan <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="anak_kecamatan_id" id="anak_kecamatan_id" data-placeholder="Select Kecamatan">
									<option value=""></option>
								<?php
									$conditions = [];

									foreach (db_get_all_data('kecamatans', $conditions) as $row):
								?>
									<option value="<?= $row->kecamatan_id ?>"><?= $row->kecamatan_nama; ?></option>
									<?php endforeach; ?>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_kelurahan_id">
							<label for="anak_kelurahan_id" class="col-sm-2 control-label">Kelurahan <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="anak_kelurahan_id" id="anak_kelurahan_id" data-placeholder="Select Kelurahan">
									<option value=""></option>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_no_kk">
							<label for="anak_no_kk" class="col-sm-2 control-label">No KK Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_no_kk" id="anak_no_kk" placeholder="No KK Anak" value="<?= set_value('anak_no_kk'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_nik">
							<label for="anak_nik" class="col-sm-2 control-label">NIK Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nik" id="anak_nik" placeholder="NIK Anak" value="<?= set_value('anak_nik'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_nama">
							<label for="anak_nama" class="col-sm-2 control-label">Nama Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nama" id="anak_nama" placeholder="Nama Anak" value="<?= set_value('anak_nama'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_jenkel">
							<label for="anak_jenkel" class="col-sm-2 control-label">Jenis Kelamin <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_jenkel" id="anak_jenkel" placeholder="Jenis Kelamin" value="<?= set_value('anak_jenkel'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_tanggal_lahir">
							<label for="anak_tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir Anak <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="input-group date col-sm-8">
									<input type="text" class="form-control pull-right datepicker" name="anak_tanggal_lahir" placeholder="Tanggal Lahir Anak" id="anak_tanggal_lahir">
								</div>
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_alamat">
							<label for="anak_alamat" class="col-sm-2 control-label">Alamat Rumah Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_alamat" id="anak_alamat" placeholder="Alamat Rumah Anak" value="<?= set_value('anak_alamat'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_rt">
							<label for="anak_rt" class="col-sm-2 control-label">RT <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_rt" id="anak_rt" placeholder="RT"
									value="<?= set_value('anak_rt'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_rw">
							<label for="anak_rw" class="col-sm-2 control-label">RW <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_rw" id="anak_rw" placeholder="RW"
									value="<?= set_value('anak_rw'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_nik_ayah">
							<label for="anak_nik_ayah" class="col-sm-2 control-label">NIK Ayah <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nik_ayah" id="anak_nik_ayah" placeholder="NIK Ayah" value="<?= set_value('anak_nik_ayah'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_nama_ayah">
							<label for="anak_nama_ayah" class="col-sm-2 control-label">Nama Ayah <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nama_ayah" id="anak_nama_ayah" placeholder="Nama Ayah" value="<?= set_value('anak_nama_ayah'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_nik_ibu">
							<label for="anak_nik_ibu" class="col-sm-2 control-label">NIK Ibu <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nik_ibu" id="anak_nik_ibu" placeholder="NIK Ibu" value="<?= set_value('anak_nik_ibu'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group group-anak_nama_ibu">
							<label for="anak_nama_ibu" class="col-sm-2 control-label">Nama Ibu <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nama_ibu" id="anak_nama_ibu" placeholder="Nama Ibu" value="<?= set_value('anak_nama_ibu'); ?>">
								<small class="info help-block"></small>
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
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function () {

		window.event_submit_and_action = '';

		(function () {
			var anak_puskesmas_id = $('#anak_puskesmas_id');
			var anak_kecamatan_id = $('#anak_kecamatan_id');
			var anak_kelurahan_id = $('#anak_kelurahan_id');
			var anak_no_kk = $('#anak_no_kk');
			var anak_nik = $('#anak_nik');
			var anak_nama = $('#anak_nama');
			var anak_jenkel = $('#anak_jenkel');
			var anak_tanggal_lahir = $('#anak_tanggal_lahir');
			var anak_alamat = $('#anak_alamat');
			var anak_rt = $('#anak_rt');
			var anak_rw = $('#anak_rw');
			var anak_nik_ayah = $('#anak_nik_ayah');
			var anak_nama_ayah = $('#anak_nama_ayah');
			var anak_nik_ibu = $('#anak_nik_ibu');
			var anak_nama_ibu = $('#anak_nama_ibu');
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
					window.location.href = BASE_URL + 'administrator/data_anak';
				}
			});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_data_anak = $('#form_data_anak');
			var data_post = form_data_anak.serializeArray();
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
				url: BASE_URL + 'administrator/data_anak/add_save',
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
				$('html, body').animate({
					scrollTop: $(document).height()
				}, 2000);
			});

			return false;
		}); /*end btn save*/

		$('#anak_kecamatan_id').change(function (event) {
			var val = $(this).val();
			$.LoadingOverlay('show')
			$.ajax({
				url: BASE_URL + 'administrator/data_anak/ajax_anak_kelurahan_id/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option value="' + val.kelurahan_id + '">' + val.kelurahan_nama + '</option>'
				});

				$('#anak_kelurahan_id').html(html);
				$('#anak_kelurahan_id').trigger('chosen:updated');
			})
			.fail(function () {
				toastr['error']('Error', 'Getting data fail')
			})
			.always(function () {
				$.LoadingOverlay('hide')
			});
		});
	});
</script>