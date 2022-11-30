<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js">
</script>

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
		Rencana Kegiatan OPD <small>Edit Rencana Kegiatan OPD</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/rentan_opd'); ?>">Rencana Kegiatan OPD</a></li>
		<li class="active">Edit</li>
	</ol>
</section>

<style></style>
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
							<h3 class="widget-user-username">Rencana Kegiatan OPD</h3>
							<h5 class="widget-user-desc">Edit Rencana Kegiatan OPD</h5>
							<hr>
						</div>
					<?=
						form_open(base_url('administrator/rentan_opd/edit_save/'.$this->uri->segment(4)), [
							'name' => 'form_rentan_opd',
							'class' => 'form-horizontal form-step',
							'id' => 'form_rentan_opd',
							'method' => 'POST'
						]);

						$user_groups = $this->model_group->get_user_group_ids();
					?>
						<div class="form-group group-opd-id">
							<label for="opd_id" class="col-sm-2 control-label">Nama Dinas / Instansi <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="opd_id" id="opd_id" data-placeholder="Select Dinas / OPD / Instansi">
									<option value=""></option>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-rentan-opd-kegiatan">
							<label for="rentan_opd_kegiatan" class="col-sm-2 control-label">Rencana Kegiatan <i class="required">*</i></label>
							<div class="col-sm-8">
								<textarea placeholder="Rencana Kegiatan" id="rentan_opd_kegiatan" name="rentan_opd_kegiatan" rows="5"
									class="textarea form-control"><?= set_value('rentan_opd_kegiatan', $rentan_opd->rentan_opd_kegiatan); ?></textarea>
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

							<div class="custom-button-wrapper"></div>

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

		var opdID = '<?php echo $opdID;?>';

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
					window.location.href = BASE_URL + 'administrator/rentan_opd';
				}
			});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_rentan_opd = $('#form_rentan_opd');
			var data_post = form_rentan_opd.serializeArray();
			var save_type = $(this).attr('data-stype');

			data_post.push({
				name: 'save_type',
				value: save_type
			});

			if (opdID != '') {
				data_post.push({
					name: 'opd_id',
					value: opdID
				});
			}

			data_post.push({
				name: 'event_submit_and_action',
				value: window.event_submit_and_action
			});

			$('.loading').show();

			$.ajax({
				url: form_rentan_opd.attr('action'),
				type: 'POST',
				dataType: 'json',
				data: data_post,
			})
			.done(function (res) {
				$('form').find('.form-group').removeClass('has-error');
				$('form').find('.error-input').remove();
				$('.steps li').removeClass('error');
				if (res.success) {
					var id = $('#rentan_opd_image_galery').find('li').attr('qq-file-id');
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

		function chained_opd_id(selected, complete) {
			var val = $('#opd_id').val();
			$.LoadingOverlay('show');

			return $.ajax({
				url: BASE_URL + '/administrator/rentan_opd/ajax_opd_id/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var html = '<option value=""></option>';
				$.each(res, function (index, val) {
					html += '<option ' + (selected == val.opd_id ? 'selected' : '') + ' value="' +
						val.opd_id + '">' + val.opd_nama + '</option>'
				});

				if (opdID != '') {
					$('#opd_id').attr('disabled', 'disabled');
				}
				$('#opd_id').html(html);
				$('#opd_id').trigger('chosen:updated');
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

		// $('#opd_id').change(function (event) {
		// 	chained_opd_id('')
		// });

		async function chain() {
			await chained_opd_id("<?= $rentan_opd->opd_id ?>");
		}

		chain();
	}); /*end doc ready*/
</script>