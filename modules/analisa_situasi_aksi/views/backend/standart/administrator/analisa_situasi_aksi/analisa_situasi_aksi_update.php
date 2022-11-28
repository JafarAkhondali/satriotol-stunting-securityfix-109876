<link rel="stylesheet" type="text/css" href="<?= BASE_ASSET;?>colorpicker/css/colorpicker.css" />
<script type="text/javascript" src="<?= BASE_ASSET; ?>colorpicker/js/colorpicker.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

<script type="text/javascript" src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
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
	<h1>Analisa Situasi Aksi <small>Edit Analisa Situasi Aksi</small></h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?= site_url('administrator/analisa_situasi_aksi'); ?>">Analisa Situasi Aksi</a></li>
		<li class="active">Edit</li>
	</ol>
</section>

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
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
			<?php
				echo form_open(base_url('administrator/analisa_situasi_aksi/edit_save/'.$this->uri->segment(4)), [
					'name' 		=> 'form_analisa_situasi_aksi',
					// 'class' 	=> 'form-horizontal form-step',
					'id' 		=> 'form_analisa_situasi_aksi',
					'method' 	=> 'POST'
				]);

				$user_groups = $this->model_group->get_user_group_ids();
			?>
				<div class="box-header">
					<h3 class="box-title">Update Aksi Analisa Situasi</h3>
				</div>
				<div class="box-body">
					<div class="form-group group-analisa-situasi-id">
						<label for="analisa_situasi_id" class="control-label">Tahun Analisa Situasi <i class="required">*</i></label>
						<select class="form-control chosen chosen-select-deselect" name="analisa_situasi_id" id="analisa_situasi_id" data-placeholder="Select Tahun Analisa Situasi">
							<option value=""></option>
						</select>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-analisa-situasi-indikator-id">
						<label for="analisa_situasi_indikator_id" class="control-label">Indikator Analisa Situasi <i class="required">*</i></label>
						<select class="form-control chosen chosen-select-deselect" name="analisa_situasi_indikator_id" id="analisa_situasi_indikator_id" data-placeholder="Select Indikator Analisa Situasi">
							<option value=""></option>
						</select>
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-analisa-situasi-aksi-cakupan">
						<label for="analisa_situasi_aksi_cakupan" class="control-label">Cakupan <i class="required">*</i></label>
						<input type="text" class="form-control" name="analisa_situasi_aksi_cakupan" id="analisa_situasi_aksi_cakupan" placeholder="" value="<?= set_value('analisa_situasi_aksi_cakupan', $analisa_situasi_aksi->analisa_situasi_aksi_cakupan); ?>">
						<small class="info help-block"><b>Input Analisa Situasi Aksi Cakupan</b> Max Length : 10.</small>
					</div>
					<div class="form-group group-analisa-situasi-aksi-warna">
						<label for="analisa_situasi_aksi_warna" class="control-label">Warna Indikator</label>
						<input type="hidden" class="form-control" name="analisa_situasi_aksi_warna" id="analisa_situasi_aksi_warna" placeholder="" value="<?= set_value('analisa_situasi_aksi_warna', strtoupper($analisa_situasi_aksi->analisa_situasi_aksi_warna)); ?>">
						<div id="colorSelector"><div style="background-color: <?php echo $analisa_situasi_aksi->analisa_situasi_aksi_warna; ?>"></div></div>
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
							<img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
							<i><?= cclang('loading_saving_data'); ?></i>
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
<script>
	$(document).ready(function () {
		window.event_submit_and_action = '';

		var getID = '<?php echo $id;?>';
		var redirectURL;

		if (getID != '') {
			redirectURL = BASE_URL + 'administrator/analisa_situasi/view/'+getID;
		}else{
			redirectURL = BASE_URL + 'administrator/analisa_situasi_aksi';
		}

		(function () {
			var analisa_situasi_id = $('#analisa_situasi_id');
			var analisa_situasi_aksi_indikator = $('#analisa_situasi_aksi_indikator');
			var analisa_situasi_aksi_cakupan = $('#analisa_situasi_aksi_cakupan');

		})()

		$('#colorSelector').ColorPicker({
			color: '<?php echo $analisa_situasi_aksi->analisa_situasi_aksi_warna;?>',
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
					window.location.href = redirectURL;
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

			(function () {
				data_post.push({
					name: '_example',
					value: 'value_of_example',
				})
			})()

			data_post.push({
				name: 'getID',
				value: '<?php echo $id;?>'
			});

			data_post.push({
				name: 'event_submit_and_action',
				value: window.event_submit_and_action
			});

			$('.loading').show();

			$.ajax({
				url: form_analisa_situasi_aksi.attr('action'),
				type: 'POST',
				dataType: 'json',
				data: data_post,
			})
			.done(function (res) {
				$('form').find('.form-group').removeClass('has-error');
				$('form').find('.error-input').remove();
				$('.steps li').removeClass('error');
				if (res.success) {
					var id = $('#analisa_situasi_aksi_image_galery').find('li').attr('qq-file-id');
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

		function chained_analisa_situasi_id(selected, complete) {
			var val = $('#analisa_situasi_id').val();
			$.LoadingOverlay('show')
			return $.ajax({
				url: BASE_URL + '/administrator/analisa_situasi_aksi/ajax_analisa_situasi_id/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option ' + (selected == val.analisa_situasi_id ? 'selected' : '') +
						' value="' + val.analisa_situasi_id + '">' + val.analisa_situasi_year +
						'</option>'
				});
				$('#analisa_situasi_id').html(html);
				$('#analisa_situasi_id').trigger('chosen:updated');
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

		// $('#analisa_situasi_id').change(function (event) {
		// 	chained_analisa_situasi_id('')
		// });

		function chained_analisa_situasi_indikator_id(selected, complete) {
			var val = $('#analisa_situasi_indikator_id').val();
			$.LoadingOverlay('show')
			return $.ajax({
				url: BASE_URL + '/administrator/analisa_situasi_aksi/ajax_analisa_situasi_indikator_id/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option ' + (selected == val.analisa_situasi_indikator_id ?
							'selected' : '') + ' value="' + val.analisa_situasi_indikator_id +
						'">' + val.analisa_situasi_indikator_nama + '</option>'
				});
				$('#analisa_situasi_indikator_id').html(html);
				$('#analisa_situasi_indikator_id').trigger('chosen:updated');
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

		// $('#analisa_situasi_indikator_id').change(function (event) {
		// 	chained_analisa_situasi_indikator_id('')
		// });

		async function chain() {
			await chained_analisa_situasi_id("<?= $analisa_situasi_aksi->analisa_situasi_id ?>");
			await chained_analisa_situasi_indikator_id("<?= $analisa_situasi_aksi->analisa_situasi_indikator_id ?>");
		}

		chain();

	}); /*end doc ready*/
</script>