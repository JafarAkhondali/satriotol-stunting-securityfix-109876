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
    <style>

    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
    		Kelurahan <small><?= cclang('new', ['Kelurahan']); ?> </small>
    	</h1>
    	<ol class="breadcrumb">
    		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
    		<li>
<?php
	if (!empty($id)) {
		echo '<a href="'.site_url('administrator/kecamatans/view/'.$id).'">Kelurahan</a>';
	}else{
		echo '<a href="'.site_url('administrator/kelurahans/').'">Kelurahan</a>';
	}
?>
			</li>
    		<li class="active"><?= cclang('new'); ?></li>
    	</ol>
    </section>
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
    							<h3 class="widget-user-username">Kelurahan</h3>
    							<h5 class="widget-user-desc"><?= cclang('new', ['Kelurahan']); ?></h5>
    							<hr>
    						</div>
    					<?=
							form_open('', [
								'name' 		=> 'form_kelurahans',
								'class' 	=> 'form-horizontal form-step',
								'id' 		=> 'form_kelurahans',
								'enctype' 	=> 'multipart/form-data',
								'method' 	=> 'POST'
							]); 
							
							$user_groups = $this->model_group->get_user_group_ids();
                        ?>
    						<div class="form-group group-kecamatan-id ">
    							<label for="kecamatan_id" class="col-sm-2 control-label">Nama Kecamatan <i class="required">*</i></label>
    							<div class="col-sm-8">
    								<select class="form-control chosen chosen-select-deselect" name="kecamatan_id" id="kecamatan_id" data-placeholder="Select Nama Kecamatan">
    									<option value=""></option>
    								</select>
    								<small class="info help-block"></small>
    							</div>
    						</div>
    						<div class="form-group group-kelurahan-nama ">
    							<label for="kelurahan_nama" class="col-sm-2 control-label">Nama Kelurahan <i class="required">*</i></label>
    							<div class="col-sm-8">
    								<input type="text" class="form-control" name="kelurahan_nama" id="kelurahan_nama" placeholder="Nama Kelurahan" value="<?= set_value('kelurahan_nama'); ?>">
    								<small class="info help-block"><b>Input Kelurahan Nama</b> Max Length : 255.</small>
    							</div>
    						</div>

    						<div class="message"></div>

    						<div class="row-fluid col-md-7 container-button-bottom">
    							<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
    								<i class="fa fa-save"></i> <?= cclang('save_button'); ?>
    							</button>
    							<a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
    								<i class="ion ion-ios-list-outline"></i>
    								<?= cclang('save_and_go_the_list_button'); ?>
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
			var getID = '<?php echo $id;?>';
			var redirectURL;

			if (getID != '') {
				redirectURL = BASE_URL + 'administrator/kecamatans/view/'+getID;
			}else{
				redirectURL = BASE_URL + 'administrator/kelurahans';
			}

    		window.event_submit_and_action = '';

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
    						window.location.href = redirectURL;
    					}
    				});

    			return false;
    		}); /*end btn cancel*/

    		$('.btn_save').click(function () {
    			$('.message').fadeOut();

    			var form_kelurahans = $('#form_kelurahans');
    			var data_post = form_kelurahans.serializeArray();
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
    					url: BASE_URL + '/administrator/kelurahans/add_save',
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
    									.prepend(` <div class="error-input">` + val + `</div>`);
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

			function chained_kecamatan_id(selected, complete) {
				$.LoadingOverlay('show');

				return $.ajax({
					url: BASE_URL + '/administrator/kelurahans/ajax_kecamatan_id/',
					dataType: 'JSON',
				})
				.done(function(res) {
					var html = '<option value=""></option>';

					$.each(res, function(index, val) {
						html += '<option value="' + val.kecamatan_id + '" '+(selected == val.kecamatan_id ? 'selected' : '')+'>' + val.kecamatan_nama + '</option>'
					});

					$('#kecamatan_id').html(html);
					$('#kecamatan_id').trigger('chosen:updated');

					if (typeof complete != 'undefined') {
						complete();
					}

				})
				.fail(function() {
					toastr['error']('Error', 'Getting data fail')
				})
				.always(function() {
					$.LoadingOverlay('hide')
				});
			}

			async function chain() {
				await chained_kecamatan_id('<?php echo $id;?>');
			}

			chain();

    	}); /*end doc ready*/
    </script>