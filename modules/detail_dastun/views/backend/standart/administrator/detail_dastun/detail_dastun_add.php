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
	/* .group-detail_data_stunting_dawar_id */
	.group-detail_data_stunting_dawar_id {}

	.group-detail_data_stunting_dawar_id .control-label {}

	.group-detail_data_stunting_dawar_id .col-sm-8 {}

	.group-detail_data_stunting_dawar_id .form-control {}

	.group-detail_data_stunting_dawar_id .help-block {}

	/* end .group-detail_data_stunting_dawar_id */
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Data Stunting <small><?= cclang('new', ['Data Stunting']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/detail_dastun'); ?>">Data Stunting</a></li>
		<li class="active"><?= cclang('new'); ?></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-body">
					<!-- Widget: user widget style 1 -->
					<div class="box box-widget widget-user-2">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header">
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username">Data Stunting</h3>
							<h5 class="widget-user-desc"><?= cclang('new', ['Data Stunting']); ?></h5>
							<hr>
						</div>
					<?= form_open('', [
							'name' => 'form_detail_dastun',
							'class' => 'form-horizontal form-step',
							'id' => 'form_detail_dastun',
							'enctype' => 'multipart/form-data',
							'method' => 'POST'
						]);

						$user_groups = $this->model_group->get_user_group_ids();
					?>
						<div class="form-group group-detail_data_stunting_dawar_id">
							<label for="detail_data_stunting_dawar_id" class="col-sm-2 control-label">Nama Data Warga <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="detail_data_stunting_dawar_id" id="detail_data_stunting_dawar_id" data-placeholder="Select Nama Data Warga">
									<option value=""></option>
									<?php foreach (db_get_all_data('data_warga') as $row): ?>
									<option value="<?= $row->dawar_id ?>"><?= $row->dawar_nama_lengkap.' ('.$row->dawar_nik.')'; ?></option>
									<?php endforeach; ?>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>
						<div class="form-group  wrapper-options-crud">
							<label for="detail_data_stunting_ibu_hamil" class="col-sm-2 control-label">Ibu Hamil <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_ibu_hamil" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_ibu_hamil" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_tambah_darah">
							<label for="detail_data_stunting_tambah_darah" class="col-sm-2 control-label">Tablet Tambah Darah Remaja <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_tambah_darah" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_tambah_darah" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_screening_anemia">
							<label for="detail_data_stunting_screening_anemia" class="col-sm-2 control-label">SCRENING ANEMIA <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_screening_anemia" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_screening_anemia" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_kespro">
							<label for="detail_data_stunting_kespro" class="col-sm-2 control-label">KESPRO <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_kespro" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_kespro" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_kelas_catin">
							<label for="detail_data_stunting_kelas_catin" class="col-sm-2 control-label">KELAS CATIN <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_kelas_catin" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_kelas_catin" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_usg">
							<label for="detail_data_stunting_usg" class="col-sm-2 control-label">USG <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_usg" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_usg" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_posyandu">
							<label for="detail_data_stunting_posyandu" class="col-sm-2 control-label">POSYANDU <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_posyandu" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_posyandu" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>


						<div class="form-group group-detail_data_stunting_asi_ekslusif">
							<label for="detail_data_stunting_asi_ekslusif" class="col-sm-2 control-label">ASI EKSCLUSIF<i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_asi_ekslusif" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_asi_ekslusif" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_mpasi">
							<label for="detail_data_stunting_mpasi" class="col-sm-2 control-label">MPASI <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_mpasi" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_mpasi" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_sdidtk">
							<label for="detail_data_stunting_sdidtk" class="col-sm-2 control-label">SDIDTK <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_sdidtk" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_sdidtk" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_anak_angkat_csr">
							<label for="detail_data_stunting_anak_angkat_csr" class="col-sm-2 control-label">Anak Angkat CSR <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_anak_angkat_csr" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_anak_angkat_csr" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_pengasuh_balita">
							<label for="detail_data_stunting_pengasuh_balita" class="col-sm-2 control-label">Pengasuh Balita <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_pengasuh_balita" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_pengasuh_balita" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>


						<div class="form-group group-detail_data_stunting_asupan_gizi">
							<label for="detail_data_stunting_asupan_gizi" class="col-sm-2 control-label">Asupan Gizi <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_asupan_gizi" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_asupan_gizi" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_imunisasi">
							<label for="detail_data_stunting_imunisasi" class="col-sm-2 control-label">Imunisasi <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_imunisasi" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_imunisasi" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_terapi_gizi">
							<label for="detail_data_stunting_terapi_gizi" class="col-sm-2 control-label">Terapi Masalah Gizi <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_terapi_gizi" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_terapi_gizi" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_bpjs_stunting">
							<label for="detail_data_stunting_bpjs_stunting" class="col-sm-2 control-label">BPJS Stunting<i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_bpjs_stunting" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_bpjs_stunting" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_bantuan_sembako">
							<label for="detail_data_stunting_bantuan_sembako" class="col-sm-2 control-label">Bantuan Sembako <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_bantuan_sembako" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_bantuan_sembako" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_dahsyat">
							<label for="detail_data_stunting_dahsyat" class="col-sm-2 control-label">Dahsyat <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_dahsyat" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_dahsyat" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_rtlh">
							<label for="detail_data_stunting_rtlh" class="col-sm-2 control-label">RTLH <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_rtlh" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_rtlh" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_air_bersih">
							<label for="detail_data_stunting_air_bersih" class="col-sm-2 control-label">Air Bersih <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_air_bersih" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_air_bersih" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
							</div>
						</div>
						<div class="form-group group-detail_data_stunting_akses_pangan">
							<label for="detail_data_stunting_akses_pangan" class="col-sm-2 control-label">AKSES PANGAN LOKAL <i class="required">*</i></label>
							<div class="col-sm-4">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_akses_pangan" value="Y"> YA </label>
								</div>
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="detail_data_stunting_akses_pangan" value="N"> TIDAK </label>
								</div>
								<div class="row-fluid clear-both">
									<small class="info help-block"></small>
								</div>
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
			var detail_data_stunting_dawar_id = $('#detail_data_stunting_dawar_id');
			/* 
	detail_data_stunting_dawar_id.on('change', function() {});
	*/

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
						window.location.href = BASE_URL + 'administrator/detail_dastun';
					}
				});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_detail_dastun = $('#form_detail_dastun');
			var data_post = form_detail_dastun.serializeArray();
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
					url: BASE_URL + '/administrator/detail_dastun/add_save',
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








	}); /*end doc ready*/
</script>