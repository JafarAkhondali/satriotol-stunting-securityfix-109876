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
	/* .group-faq-question */
	.group-faq-question {}

	.group-faq-question .control-label {}

	.group-faq-question .col-sm-8 {}

	.group-faq-question .form-control {}

	.group-faq-question .help-block {}

	/* end .group-faq-question */

	/* .group-faq-answer */
	.group-faq-answer {}

	.group-faq-answer .control-label {}

	.group-faq-answer .col-sm-8 {}

	.group-faq-answer .form-control {}

	.group-faq-answer .help-block {}

	/* end .group-faq-answer */

	/* .group-faq-createAt */
	.group-faq-createAt {}

	.group-faq-createAt .control-label {}

	.group-faq-createAt .col-sm-8 {}

	.group-faq-createAt .form-control {}

	.group-faq-createAt .help-block {}

	/* end .group-faq-createAt */

	/* .group-faq-user */
	.group-faq-user {}

	.group-faq-user .control-label {}

	.group-faq-user .col-sm-8 {}

	.group-faq-user .form-control {}

	.group-faq-user .help-block {}

	/* end .group-faq-user */
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Faqs <small><?= cclang('new', ['Faqs']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/faqs'); ?>">Faqs</a></li>
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
							<h3 class="widget-user-username">Faqs</h3>
							<h5 class="widget-user-desc"><?= cclang('new', ['Faqs']); ?></h5>
							<hr>
						</div>
						<?= form_open('', [
											'name' => 'form_faqs',
											'class' => 'form-horizontal form-step',
											'id' => 'form_faqs',
											'enctype' => 'multipart/form-data',
											'method' => 'POST'
                        ]); ?>

						<?php $user_groups = $this->model_group->get_user_group_ids(); ?>
						<div class="form-group group-faq-question ">
							<label for="faq_question" class="col-sm-2 control-label">Pertanyaan <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="faq_question" id="faq_question" placeholder="Masukkan Pertanyaan" value="<?= set_value('faq_question'); ?>">
								<small class="info help-block"><b>Input Faq Question</b> Max Length : 255.</small>
							</div>
						</div>

						<div class="form-group group-faq-answer ">
							<label for="faq_answer" class="col-sm-2 control-label">Jawaban <i class="required">*</i></label>
							<div class="col-sm-8">
								<textarea id="faq_answer" name="faq_answer" rows="5" cols="80"><?= set_value('Faq Answer'); ?></textarea>
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
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->

<script>
	$(document).ready(function () {
		window.event_submit_and_action = '';

		(function () {
			var faq_question = $('#faq_question');
			/* 
			 faq_question.on('change', function() {});
			 */
			var faq_answer = $('#faq_answer');
			var faq_createAt = $('#faq_createAt');
			var faq_user = $('#faq_user');

		})()





		CKEDITOR.replace('faq_answer');
		var faq_answer = CKEDITOR.instances.faq_answer;

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
						window.location.href = BASE_URL + 'administrator/faqs';
					}
				});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();
			$('#faq_answer').val(faq_answer.getData());

			var form_faqs = $('#form_faqs');
			var data_post = form_faqs.serializeArray();
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
					url: BASE_URL + '/administrator/faqs/add_save',
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
						faq_answer.setData('');


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