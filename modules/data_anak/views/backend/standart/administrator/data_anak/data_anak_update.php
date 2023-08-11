<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

<section class="content-header">
	<h1>
		Data Identitas Anak <small>Edit Data Identitas Anak</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/data_anak'); ?>">Data Identitas Anak</a></li>
		<li class="active">Edit</li>
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
							<h5 class="widget-user-desc">Edit Data Identitas Anak</h5>
							<hr>
						</div>
						<?= form_open(base_url('administrator/data_anak/edit_save/'.$this->uri->segment(4)), [
								'name' 		=> 'form_data_anak',
								'class' 	=> 'form-horizontal form-step',
								'id' 		=> 'form_data_anak',
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
									<option <?= $row->puskesmas_id == $data_anak->anak_puskesmas_id ? 'selected' : ''; ?> value="<?= $row->puskesmas_id ?>">PUSKESMAS <?= strtoupper($row->puskesmas_nama); ?></option>
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
									<option <?= $row->kecamatan_id == $data_anak->anak_kecamatan_id ? 'selected' : ''; ?> value="<?= $row->kecamatan_id ?>"><?= $row->kecamatan_nama; ?></option>
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
								<input type="text" class="form-control" name="anak_no_kk" id="anak_no_kk" placeholder="" value="<?= set_value('anak_no_kk', $data_anak->anak_no_kk); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-anak_nik">
							<label for="anak_nik" class="col-sm-2 control-label">NIK Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nik" id="anak_nik" placeholder="" value="<?= set_value('anak_nik', $data_anak->anak_nik); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-anak_nama">
							<label for="anak_nama" class="col-sm-2 control-label">Nama Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nama" id="anak_nama" placeholder="" value="<?= set_value('anak_nama', $data_anak->anak_nama); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-anak_jenkel">
							<label for="anak_jenkel" class="col-sm-2 control-label">Jenis Kelamin <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_jenkel" id="anak_jenkel" placeholder="" value="<?= set_value('anak_jenkel', $data_anak->anak_jenkel); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-anak_tanggal_lahir">
							<label for="anak_tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir Anak <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="input-group date col-sm-8">
									<input type="text" class="form-control pull-right datepicker" name="anak_tanggal_lahir" placeholder="" id="anak_tanggal_lahir" value="<?= set_value('data_anak_anak_tanggal_lahir_name', $data_anak->anak_tanggal_lahir); ?>">
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-anak_alamat">
							<label for="anak_alamat" class="col-sm-2 control-label">Alamat Rumah Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_alamat" id="anak_alamat" placeholder="" value="<?= set_value('anak_alamat', $data_anak->anak_alamat); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-anak_rt">
							<label for="anak_rt" class="col-sm-2 control-label">RT <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_rt" id="anak_rt" placeholder="" value="<?= set_value('anak_rt', $data_anak->anak_rt); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-anak_rw">
							<label for="anak_rw" class="col-sm-2 control-label">RW <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_rw" id="anak_rw" placeholder="" value="<?= set_value('anak_rw', $data_anak->anak_rw); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-anak_nik_ayah">
							<label for="anak_nik_ayah" class="col-sm-2 control-label">NIK Ayah <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nik_ayah" id="anak_nik_ayah" placeholder="" value="<?= set_value('anak_nik_ayah', $data_anak->anak_nik_ayah); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-anak_nama_ayah">
							<label for="anak_nama_ayah" class="col-sm-2 control-label">Nama Ayah <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nama_ayah" id="anak_nama_ayah" placeholder="" value="<?= set_value('anak_nama_ayah', $data_anak->anak_nama_ayah); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-anak_nik_ibu">
							<label for="anak_nik_ibu" class="col-sm-2 control-label">NIK Ibu <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nik_ibu" id="anak_nik_ibu" placeholder="" value="<?= set_value('anak_nik_ibu', $data_anak->anak_nik_ibu); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-anak_nama_ibu">
							<label for="anak_nama_ibu" class="col-sm-2 control-label">Nama Ibu <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="anak_nama_ibu" id="anak_nama_ibu" placeholder="" value="<?= set_value('anak_nama_ibu', $data_anak->anak_nama_ibu); ?>">
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
					window.location.href = BASE_URL + 'administrator/data_anak';
				}
			});

			return false;
		});

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_data_anak = $('#form_data_anak');
			var data_post = form_data_anak.serializeArray();
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
				url: form_data_anak.attr('action'),
				type: 'POST',
				dataType: 'json',
				data: data_post,
			})
			.done(function (res) {
				$('form').find('.form-group').removeClass('has-error');
				$('form').find('.error-input').remove();
				$('.steps li').removeClass('error');
				if (res.success) {
					var id = $('#data_anak_image_galery').find('li').attr('qq-file-id');
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
		});

		function chained_anak_kelurahan_id(selected, complete) {
			var val = $('#anak_kecamatan_id').val();
			$.LoadingOverlay('show')

			return $.ajax({
				url: BASE_URL + 'administrator/data_anak/ajax_anak_kelurahan_id/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option ' + (selected == val.kelurahan_id ? 'selected' : '') + ' value="' + val.kelurahan_id + '">' + val.kelurahan_nama + '</option>'
				});

				$('#anak_kelurahan_id').html(html);
				$('#anak_kelurahan_id').trigger('chosen:updated');

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

		$('#anak_kecamatan_id').change(function (event) {
			chained_anak_kelurahan_id('')
		});

		async function chain() {
			await chained_anak_kelurahan_id("<?= $data_anak->anak_kelurahan_id ?>");
		}

		chain();
	}); /*end doc ready*/
</script>