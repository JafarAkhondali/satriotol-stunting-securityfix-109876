<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

<section class="content-header">
	<h1>
		Data Intervensi Anak <small>Edit Data Intervensi Anak</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/data_intervensi_anak'); ?>">Data Intervensi Anak</a></li>
		<li class="active">Edit</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-body">
					<div class="box box-widget widget-user-2">
						<div class="widget-user-header">
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
							</div>
							<h3 class="widget-user-username">Data Intervensi Anak</h3>
							<h5 class="widget-user-desc">Edit Data Intervensi Anak</h5>
							<hr>
						</div>
						<?= form_open(base_url('administrator/data_intervensi_anak/edit_save_intervensi/'.$this->uri->segment(4)), [
								'name' 		=> 'form_data_intervensi_anak',
								'class' 	=> 'form-horizontal form-step',
								'id' 		=> 'form_data_intervensi_anak',
								'method' 	=> 'POST'
							]);

							$user_groups = $this->model_group->get_user_group_ids();
						?>
						<div class="form-group">
							<label class="col-sm-2 control-label">NIK Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<label class="form-control"><?= join_multi_select($data_intervensi_anak->intervensi_anak_id, 'data_anak', 'anak_id', 'anak_nik') != null ? join_multi_select($data_intervensi_anak->intervensi_anak_id, 'data_anak', 'anak_id', 'anak_nik') : '-';?></label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<label class="form-control"><?= strtoupper(join_multi_select($data_intervensi_anak->intervensi_anak_id, 'data_anak', 'anak_id', 'anak_nama'));?></label>
							</div>
						</div>

						<div class="form-group group-intervensi_kecamatan_id">
							<label for="intervensi_kecamatan_id" class="col-sm-2 control-label">Kecamatan <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="intervensi_kecamatan_id" id="intervensi_kecamatan_id" data-placeholder="Select Kecamatan">
									<option value=""></option>
									<?php
										$conditions = [];
									?>
									<?php foreach (db_get_all_data('kecamatans', $conditions) as $row): ?>
									<option
										<?= $row->kecamatan_id == $data_intervensi_anak->intervensi_kecamatan_id ? 'selected' : ''; ?>
										value="<?= $row->kecamatan_id ?>"><?= $row->kecamatan_nama; ?></option>
									<?php endforeach; ?>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-intervensi_kelurahan_id">
							<label for="intervensi_kelurahan_id" class="col-sm-2 control-label">Kelurahan <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="intervensi_kelurahan_id" id="intervensi_kelurahan_id" data-placeholder="Select Kelurahan">
									<option value=""></option>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-intervensi_bulan">
							<label for="intervensi_bulan" class="col-sm-2 control-label">Bulan <i class="required">*</i></label>
							<div class="col-sm-2">
								<input type="month" class="form-control" name="intervensi_bulan" id="intervensi_bulan" placeholder="" value="<?= set_value('intervensi_bulan', $data_intervensi_anak->intervensi_tahun.'-'.$data_intervensi_anak->intervensi_bulan); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-intervensi_tgl_masuk">
							<label for="intervensi_tgl_masuk" class="col-sm-2 control-label">Tanggal <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="input-group date col-sm-8">
									<input type="text" class="form-control pull-right datepicker" 	name="intervensi_tgl_masuk" placeholder="" id="intervensi_tgl_masuk" 	value="<?= set_value('data_intervensi_anak_intervensi_tgl_masuk_name', $data_intervensi_anak->intervensi_tgl_masuk); ?>">
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-intervensi_kondisi">
							<label for="intervensi_kondisi" class="col-sm-2 control-label">Kondisi <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="intervensi_kondisi" id="intervensi_kondisi" placeholder="" value="<?= set_value('intervensi_kondisi', $data_intervensi_anak->intervensi_kondisi); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-intervensi_nama_ortu_asuh">
							<label for="intervensi_nama_ortu_asuh" class="col-sm-2 control-label">Nama Orang Tua Asuh <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="intervensi_nama_ortu_asuh" id="intervensi_nama_ortu_asuh" placeholder="" value="<?= set_value('intervensi_nama_ortu_asuh', $data_intervensi_anak->intervensi_nama_ortu_asuh); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-intervensi_deskripsi">
							<label for="intervensi_deskripsi" class="col-sm-2 control-label">Intervensi </label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="intervensi_deskripsi" id="intervensi_deskripsi" placeholder="" value="<?= set_value('intervensi_deskripsi', $data_intervensi_anak->intervensi_deskripsi); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-intervensi_tgl_pasca">
							<label for="intervensi_tgl_pasca" class="col-sm-2 control-label">Tanggal Intervensi </label>
							<div class="col-sm-6">
								<div class="input-group date col-sm-8">
									<input type="text" class="form-control pull-right datepicker" 	name="intervensi_tgl_pasca" placeholder="" id="intervensi_tgl_pasca" 	value="<?= set_value('data_intervensi_anak_intervensi_tgl_pasca_name', $data_intervensi_anak->intervensi_tgl_pasca); ?>">
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-intervensi_pasca">
							<label for="intervensi_pasca" class="col-sm-2 control-label">Pasca Intervensi </label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="intervensi_pasca" id="intervensi_pasca" placeholder="" value="<?= set_value('intervensi_pasca', $data_intervensi_anak->intervensi_pasca); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-intervensi_keterangan">
							<label for="intervensi_keterangan" class="col-sm-2 control-label">Keterangan </label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="intervensi_keterangan" id="intervensi_keterangan" placeholder="" value="<?= set_value('intervensi_keterangan', $data_intervensi_anak->intervensi_keterangan); ?>">
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
					window.location.href = BASE_URL + 'administrator/data_intervensi_anak';
				}
			});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_data_intervensi_anak = $('#form_data_intervensi_anak');
			var data_post = form_data_intervensi_anak.serializeArray();
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
				url: form_data_intervensi_anak.attr('action'),
				type: 'POST',
				dataType: 'json',
				data: data_post,
			})
			.done(function (res) {
				$('form').find('.form-group').removeClass('has-error');
				$('form').find('.error-input').remove();
				$('.steps li').removeClass('error');
				if (res.success) {
					var id = $('#data_intervensi_anak_image_galery').find('li').attr('qq-file-id');
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





		function chained_intervensi_kelurahan_id(selected, complete) {
			var val = $('#intervensi_kecamatan_id').val();
			$.LoadingOverlay('show')
			return $.ajax({
					url: BASE_URL + '/administrator/data_intervensi_anak/ajax_intervensi_kelurahan_id/' + val,
					dataType: 'JSON',
				})
				.done(function (res) {
					var html = '<option value=""></option>';
					$.each(res, function (index, val) {
						html += '<option ' + (selected == val.kelurahan_id ? 'selected' : '') +
							' value="' + val.kelurahan_id + '">' + val.kelurahan_nama + '</option>'
					});
					$('#intervensi_kelurahan_id').html(html);
					$('#intervensi_kelurahan_id').trigger('chosen:updated');
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


		$('#intervensi_kecamatan_id').change(function (event) {
			chained_intervensi_kelurahan_id('')
		});

		async function chain() {
			await chained_intervensi_kelurahan_id("<?= $data_intervensi_anak->intervensi_kelurahan_id ?>");
		}

		chain();




	}); /*end doc ready*/
</script>