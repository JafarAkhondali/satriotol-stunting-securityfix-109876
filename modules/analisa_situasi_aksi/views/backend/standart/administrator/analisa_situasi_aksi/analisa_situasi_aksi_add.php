<link rel="stylesheet" type="text/css" href="<?= BASE_ASSET;?>colorpicker/css/colorpicker.css" />
<script type="text/javascript" src="<?= BASE_ASSET; ?>colorpicker/js/colorpicker.js"></script>

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
		/* .group-analisa-situasi-id */
		.group-analisa-situasi-id {}

		.group-analisa-situasi-id .control-label {}

		.group-analisa-situasi-id .col-sm-8 {}

		.group-analisa-situasi-id .form-control {}

		.group-analisa-situasi-id .help-block {}

		/* end .group-analisa-situasi-id */



		/* .group-analisa-situasi-aksi-indikator */
		.group-analisa-situasi-aksi-indikator {}

		.group-analisa-situasi-aksi-indikator .control-label {}

		.group-analisa-situasi-aksi-indikator .col-sm-8 {}

		.group-analisa-situasi-aksi-indikator .form-control {}

		.group-analisa-situasi-aksi-indikator .help-block {}

		/* end .group-analisa-situasi-aksi-indikator */



		/* .group-analisa_situasi_aksi_cakupan */
		.group-analisa_situasi_aksi_cakupan {}

		.group-analisa_situasi_aksi_cakupan .control-label {}

		.group-analisa_situasi_aksi_cakupan .col-sm-8 {}

		.group-analisa_situasi_aksi_cakupan .form-control {}

		.group-analisa_situasi_aksi_cakupan .help-block {}

		/* end .group-analisa_situasi_aksi_cakupan */

		#colorSelector {
			position: relative;
			width: 36px;
			height: 36px;
			background: url('<?php echo BASE_ASSET;?>colorpicker/images/select.png');
		}
		#colorSelector div {
			position: absolute;
			top: 3px;
			left: 3px;
			width: 30px;
			height: 30px;
			background: url('<?php echo BASE_ASSET;?>colorpicker/images/select.png') center;
		}
	</style>
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Analisa Situasi Aksi <small><?= cclang('new', ['Analisa Situasi Aksi']); ?> </small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?= site_url('administrator/analisa_situasi_aksi'); ?>">Analisa Situasi Aksi</a></li>
			<li class="active"><?= cclang('new'); ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header">
						<h3 class="box-title">Tambah Data Aksi Analisa Situasi</h3>
					</div>
					<div class="box-body">
				<?= form_open('', [
						'name' 		=> 'form_analisa_situasi_aksi',
						'id' 		=> 'form_analisa_situasi_aksi',
						'enctype' 	=> 'multipart/form-data',
						'method' 	=> 'POST'
					]);

					$user_groups = $this->model_group->get_user_group_ids();
				?>
						<div class="form-group group-analisa-situasi-id">
							<label for="analisa_situasi_id" class="control-label">Tahun Analisa Situasi <i class="required">*</i></label>
							<select class="form-control chosen chosen-select-deselect" name="analisa_situasi_id" id="analisa_situasi_id" data-placeholder="Select Tahun Analisa Situasi">
								<option value=""></option>
							</select>
							<small class="info help-block"></small>
						</div>
						<div class="form-group group-analisa-situasi-indikator-id ">
							<label for="analisa_situasi_indikator_id" class="control-label">Indikator Analisa Situasi <i class="required">*</i></label>
							<select class="form-control chosen chosen-select-deselect" name="analisa_situasi_indikator_id" id="analisa_situasi_indikator_id" data-placeholder="Select Indikator Analisa Situasi">
								<option value=""></option>
							</select>
							<small class="info help-block"></small>
						</div>
						<div class="form-group group-analisa-situasi-aksi-cakupan ">
							<label for="analisa_situasi_aksi_cakupan" class="control-label">Cakupan <i class="required">*</i></label>
							<input type="text" class="form-control" name="analisa_situasi_aksi_cakupan" id="analisa_situasi_aksi_cakupan" placeholder="Cakupan" value="<?= set_value('analisa_situasi_aksi_cakupan'); ?>">
							<small class="info help-block">
								<b>Input Analisa Situasi Aksi Cakupan</b> Max Length : 10.<br/>
								Nilai Desimal, gunakan <b>tanda titik (.)</b> sebagai pengganti tanda koma
							</small>
						</div>
						<div class="form-group group-analisa-situasi-aksi-warna ">
							<label for="analisa_situasi_aksi_warna" class="control-label">Warna Indikator</label>
							<input type="hidden" class="form-control" name="analisa_situasi_aksi_warna" id="analisa_situasi_aksi_warna" placeholder="Warna Indikator" value="<?php echo $warna; ?>">
							<div id="colorSelector"><div style="background-color: <?php echo $warna; ?>"></div></div>
							<small class="info help-block">Optional pilih warna</small>
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

							<div class="custom-button-wrapper"></div>

							<a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
								<i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
							</a>

							<span class="loading loading-hide">
								<img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> <i><?= cclang('loading_saving_data'); ?></i>
							</span>
						</div>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
	<!-- Page script -->

	<script type="text/javascript">
		$(document).ready(function () {
			window.event_submit_and_action = '';

			(function () {
				var analisa_situasi_id 				= $('#analisa_situasi_id');
				var analisa_situasi_aksi_indikator 	= $('#analisa_situasi_aksi_indikator');
				var analisa_situasi_aksi_cakupan 	= $('#analisa_situasi_aksi_cakupan');

			})()

			$('#colorSelector').ColorPicker({
				color: '<?php echo $warna;?>',
				onShow: function (colpkr) {
					$(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					$('#colorSelector div').css('backgroundColor', '#' + hex);
					$('#analisa_situasi_aksi_warna').val('#' + hex);
				}
			});

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
						window.location.href = BASE_URL + 'administrator/analisa_situasi_aksi';
					}
				});

				return false;
			}); /*end btn cancel*/

			$('.btn_save').click(function () {
				$('.message').fadeOut();

				var form_analisa_situasi_aksi = $('#form_analisa_situasi_aksi');
				var data_post = form_analisa_situasi_aksi.serializeArray();
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
						url: BASE_URL + '/administrator/analisa_situasi_aksi/add_save',
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
										$('.steps li:eq(' + index + ')').addClass('error')
											.find('a').trigger('click');
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

			function chained_tahun_analisa_situasi(complete) {
				$.LoadingOverlay('show');

				$.ajax({
					url: BASE_URL + '/administrator/analisa_situasi_aksi/ajax_analisa_situasi_id/',
					dataType: 'JSON',
				})
				.done(function (res) {
					var html = '<option value=""></option>';
					$.each(res, function (index, val) {
						html += '<option value="' + val.analisa_situasi_id + '">' + val.analisa_situasi_year + '</option>';
					});

					$('#analisa_situasi_id').html(html);
					$('#analisa_situasi_id').trigger('chosen:updated');

				})
				.fail(function () {
					toastr['error']('Error', 'Getting data fail')
				})
				.always(function () {
					$.LoadingOverlay('hide')
				});

			};

			function chained_analisa_situasi_indikator (complete) {
				$.LoadingOverlay('show');

				$.ajax({
					url: BASE_URL + '/administrator/analisa_situasi_aksi/ajax_analisa_situasi_indikator_id/',
					dataType: 'JSON',
				})
				.done(function (res) {
					var html = '<option value=""></option>';
					$.each(res, function (index, val) {
						html += '<option value="' + val.analisa_situasi_indikator_id + '">' + val.analisa_situasi_indikator_nama + '</option>';
					});

					$('#analisa_situasi_indikator_id').html(html);
					$('#analisa_situasi_indikator_id').trigger('chosen:updated');

				})
				.fail(function () {
					toastr['error']('Error', 'Getting data fail')
				})
				.always(function () {
					$.LoadingOverlay('hide')
				});
			};

			async function chain() {
				await chained_tahun_analisa_situasi();
				await chained_analisa_situasi_indikator();
			}

			chain();
		}); /*end doc ready*/
	</script>