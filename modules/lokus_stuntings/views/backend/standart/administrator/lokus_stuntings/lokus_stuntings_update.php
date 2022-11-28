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
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Lokus Stuntings <small>Edit Lokus Stuntings</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>
<?php
	if (!empty($id)) {
		echo '<a href="'.site_url('administrator/lokus_years/view/'.$id).'">Lokus Stuntings</a>';
	}else{
		echo '<a href="'.site_url('administrator/lokus_stuntings').'">Lokus Stuntings</a>';
	}
?>
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
							<h3 class="widget-user-username">Lokus Stuntings</h3>
							<h5 class="widget-user-desc">Edit Lokus Stuntings</h5>
							<hr>
						</div>
				<?=
					form_open(base_url('administrator/lokus_stuntings/edit_save/'.$this->uri->segment(4)), [
						'name' 		=> 'form_lokus_stuntings',
						'class' 	=> 'form-horizontal form-step',
						'id' 		=> 'form_lokus_stuntings',
						'method' 	=> 'POST'
					]);

                    $user_groups = $this->model_group->get_user_group_ids();
                ?>
						<div class="form-group group-lokus-year-id">
							<label for="lokus_year_id" class="col-sm-2 control-label">Tahun Lokus <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="lokus_year_id" id="lokus_year_id" data-placeholder="Select Tahun Lokus">
									<option value=""></option>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-kelurahan-id">
							<label for="kelurahan_id" class="col-sm-2 control-label">Nama Kelurahan <i class="required">*</i></label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" multiple="multiple" name="kelurahan_id[]" id="kelurahan_id" data-placeholder="Select Nama Kelurahan">
									<option value=""></option>
								</select>
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
			redirectURL = BASE_URL + 'administrator/lokus_years/view/'+getID;
		}else{
			redirectURL = BASE_URL + 'administrator/lokus_stuntings';
		}

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

			var form_lokus_stuntings = $('#form_lokus_stuntings');
			var data_post = form_lokus_stuntings.serializeArray();
			var save_type = $(this).attr('data-stype');

			data_post.push({
				name: 'save_type',
				value: save_type
			});

			data_post.push({
				name: 'id',
				value: '<?php echo $id;?>'
			});

			data_post.push({
				name: 'event_submit_and_action',
				value: window.event_submit_and_action
			});

			$('.loading').show();

			$.ajax({
				url: form_lokus_stuntings.attr('action'),
				type: 'POST',
				dataType: 'json',
				data: data_post,
			})
			.done(function (res) {
				$('form').find('.form-group').removeClass('has-error');
				$('form').find('.error-input').remove();
				$('.steps li').removeClass('error');
				if (res.success) {
					var id = $('#lokus_stuntings_image_galery').find('li').attr('qq-file-id');
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

		function chained_lokus_year_id(selected, complete) {
			var val = $('#lokus_year_id').val();
			$.LoadingOverlay('show')
			return $.ajax({
					url: BASE_URL + '/administrator/lokus_stuntings/ajax_lokus_year_id/' + val,
					dataType: 'JSON',
				})
				.done(function (res) {
					var html = '<option value=""></option>';
					$.each(res, function (index, val) {
						html += '<option ' + (selected == val.lokus_year_id ? 'selected' : '') +
							' value="' + val.lokus_year_id + '">' + val.lokus_year_nama + '</option>'
					});
					$('#lokus_year_id').html(html);
					$('#lokus_year_id').trigger('chosen:updated');
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

		function chained_kelurahan_id(selected, complete) {
			var val 	= $('#kelurahan_id').val();

			$.LoadingOverlay('show')
			return $.ajax({
				url: BASE_URL + '/administrator/lokus_stuntings/ajax_kelurahan_id/' + val,
				dataType: 'JSON',
			})
			.done(function (res) {
				var kelurahan_selected 	= selected.split(',');

				var html = '<option value=""></option>';

				$.each(res, function (index, val) {
					// if((kelurahan_selected.includes(val.kelurahan_id)))
					// (kelurahan_selected.includes(val.kelurahan_id) ? 'selected' : '')

					html += '<option value="' + val.kelurahan_id + '">' + val.kelurahan_nama + '</option>'
				});

				$('#kelurahan_id').html(html);
				$('#kelurahan_id').val(kelurahan_selected).trigger('chosen:updated');

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

		async function chain() {
			await chained_lokus_year_id("<?= $lokus_stuntings->lokus_year_id ?>");
			await chained_kelurahan_id("<?= $lokus_stuntings->kelurahan_id ?>");
		}

		chain();

	}); /*end doc ready*/
</script>