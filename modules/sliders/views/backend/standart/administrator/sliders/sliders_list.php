<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
	//This page is a result of an autogenerated content made by running test.html with firefox.
	function domo() {
		// Binding keys
		$('*').bind('keydown', 'Ctrl+a', function assets() {
			window.location.href = BASE_URL + '/administrator/Sliders/add';
			return false;
		});

		$('*').bind('keydown', 'Ctrl+f', function assets() {
			$('#sbtn').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+x', function assets() {
			$('#reset').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+b', function assets() {

			$('#reset').trigger('click');
			return false;
		});
	}

	jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?= cclang('sliders') ?><small><?= cclang('list_all'); ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?= cclang('sliders') ?></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Data Slider</h3>&nbsp;<i class="label bg-yellow"><?= $sliders_counts; ?> <?= cclang('items'); ?></i>
					<div class="row pull-right">
						<?php is_allowed('sliders_add', function(){?>
						<a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('sliders')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/sliders/add'); ?>">
							<i class="fa fa-plus-square-o"></i>
							<?= cclang('add_new_button', [cclang('sliders')]); ?></a>
						<?php }) ?>
						<?php is_allowed('sliders_export', function(){?>
						<a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('sliders') ?>" href="<?= site_url('administrator/sliders/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>">
							<i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
						<?php }) ?>
					</div>
				</div>
				<div class="box-body">
					<form name="form_sliders" id="form_sliders" action="<?= base_url('administrator/sliders/index'); ?>">
						<div class="row">
							<div class="col-md-8">
								<div class="col-sm-2 padd-left-0 ">
									<select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email">
										<option value="delete">Delete</option>
									</select>
								</div>
								<div class="col-sm-2 padd-left-0 ">
									<button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
								</div>
								<div class="col-sm-3 padd-left-0  ">
									<input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
								</div>
								<div class="col-sm-3 padd-left-0 ">
									<select type="text" class="form-control chosen chosen-select" name="f" id="field">
										<option value=""><?= cclang('all'); ?></option>
										<option <?= $this->input->get('f') == 'slider_title' ? 'selected' :''; ?> value="slider_title">Judul</option>
										<option <?= $this->input->get('f') == 'slider_subtitle' ? 'selected' :''; ?>value="slider_subtitle">Deskripsi</option>
										<option <?= $this->input->get('f') == 'slider_url' ? 'selected' :''; ?>value="slider_url">Link URL</option>
										<option <?= $this->input->get('f') == 'slider_image' ? 'selected' :''; ?>value="slider_image">Image</option>
									</select>
								</div>
								<div class="col-sm-1 padd-left-0 ">
									<button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">Filter</button>
								</div>
								<div class="col-sm-1 padd-left-0 ">
									<a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/sliders');?>" title="<?= cclang('reset_filter'); ?>">
										<i class="fa fa-undo"></i>
									</a>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
									<?= $pagination; ?>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<br>
							<table class="table table-bordered table-striped dataTable">
								<thead>
									<tr>
										<th><input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all"></th>
										<th data-field="slider_title" data-sort="1" data-primary-key="0"><?= cclang('slider_title') ?></th>
										<th data-field="slider_subtitle" data-sort="1" data-primary-key="0"><?= cclang('slider_subtitle') ?></th>
										<th data-field="slider_url" data-sort="1" data-primary-key="0"><?= cclang('slider_url') ?></th>
										<th data-field="slider_image" data-sort="0" data-primary-key="0"><?= cclang('slider_image') ?></th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="tbody_sliders">
									<?php foreach($sliderss as $sliders): ?>
									<tr>
										<td width="5">
											<input type="checkbox" class="flat-red check" name="id[]" value="<?= $sliders->slider_id; ?>">
										</td>
										<td><span class="list_group-slider-title"><?= _ent($sliders->slider_title); ?></span></td>
										<td><span class="list_group-slider-subtitle"><?= _ent($sliders->slider_subtitle); ?></span></td>
										<td><span class="list_group-slider-url"><?= _ent($sliders->slider_url); ?></span></td>
										<td>
											<?php if (!empty($sliders->slider_image)): ?>
											<?php if (is_image($sliders->slider_image)): ?>
											<a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/sliders/' . $sliders->slider_image; ?>">
												<img src="<?= BASE_URL . 'uploads/sliders/' . $sliders->slider_image; ?>" class="image-responsive" alt="image sliders" title="slider_image sliders" width="40px">
											</a>
											<?php else: ?>
											<a href="<?= BASE_URL . 'uploads/sliders/' . $sliders->slider_image; ?>" target="blank">
												<img src="<?= get_icon_file($sliders->slider_image); ?>" class="image-responsive image-icon" alt="image sliders" title="slider_image <?= $sliders->slider_image; ?>" width="40px">
											</a>
											<?php endif; ?>
											<?php endif; ?>
										</td>
										<td>
									<?php
										if (_ent($sliders->slider_status) == 0) {
									?>
											<label class="label label-danger">Non-Aktif</label>
									<?php
										}else{
									?>
											<label class="label label-primary">Aktif</label>
									<?php
										}
									?>
										</td>
										<td width="300">
									<?php is_allowed('sliders_view', function() use ($sliders){?>
										<a href="<?= site_url('administrator/sliders/view/' . $sliders->slider_id); ?>" class="label-default">
											<i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?></a>
									<?php }) ?>
									<?php is_allowed('sliders_status', function() use ($sliders){
											if ($sliders->slider_status == 0 || empty($sliders->slider_status) || $sliders->slider_status == null) {
									?>
												<a href="javascript:void(0);" data-href="<?= site_url('administrator/sliders/status/' . $sliders->slider_id); ?>" class="label-default aktif-data">
													<i class="fa fa-check"></i> Aktifkan Slider</a>
									<?php
											}else if ($sliders->slider_status == 1) {
									?>
												<a href="javascript:void(0);" data-href="<?= site_url('administrator/sliders/status/' . $sliders->slider_id); ?>" class="label-default nonaktif-data">
													<i class="fa fa-ban"></i> Nonaktifkan Slider</a>
									<?php
											}
									?>
									<?php }) ?>
									<?php is_allowed('sliders_update', function() use ($sliders){?>
										<a href="<?= site_url('administrator/sliders/edit/' . $sliders->slider_id); ?>" class="label-default">
											<i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
									<?php }) ?>
									<?php is_allowed('sliders_delete', function() use ($sliders){?>
										<a href="javascript:void(0);" data-href="<?= site_url('administrator/sliders/delete/' . $sliders->slider_id); ?>" class="label-default remove-data">
											<i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
									<?php }) ?>
										</td>
									</tr>
									<?php endforeach; ?>
									<?php if ($sliders_counts == 0) :?>
									<tr>
										<td colspan="100">Sliders data is not available</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</form>
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
		(function () {})()

		$('.table tbody tr').each(function () {
			var row = $(this);
			(function () {
				var slider_title = row.find('.list_group-slider-title');
				var slider_subtitle = row.find('.list_group-slider-subtitle');
				var slider_image = row.find('.list_group-slider-image');

			})()
		})

		$('.remove-data').click(function () {
			var url = $(this).attr('data-href');

			swal({
				title: "<?= cclang('are_you_sure'); ?>",
				text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
				cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
				closeOnConfirm: true,
				closeOnCancel: true
			},
			function (isConfirm) {
				if (isConfirm) {
					document.location.href = url;
				}
			});

			return false;
		});

		$('.aktif-data').click(function () {
			var url = $(this).attr('data-href');

			swal({
				title: "<?= cclang('are_you_sure'); ?>",
				text: "Slider akan tampil otomatis jika diaktifkan",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Ya, Lanjutkan!",
				cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
				closeOnConfirm: true,
				closeOnCancel: true
			},
			function (isConfirm) {
				if (isConfirm) {
					document.location.href = url;
				}
			});

			return false;
		});

		$('.nonaktif-data').click(function () {
			var url = $(this).attr('data-href');

			swal({
				title: "<?= cclang('are_you_sure'); ?>",
				text: "Slider tidak akan tampil otomatis jika dinonaktifkan",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Ya, Lanjutkan!",
				cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
				closeOnConfirm: true,
				closeOnCancel: true
			},
			function (isConfirm) {
				if (isConfirm) {
					document.location.href = url;
				}
			});

			return false;
		});


		$('#apply').click(function () {
			var bulk = $('#bulk');
			var serialize_bulk = $('#form_sliders').serialize();

			if (bulk.val() == 'delete') {
				swal({
					title: "<?= cclang('are_you_sure'); ?>",
					text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
					cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
					closeOnConfirm: true,
					closeOnCancel: true
				},
				function (isConfirm) {
					if (isConfirm) {
						document.location.href = BASE_URL + '/administrator/sliders/delete?' +
							serialize_bulk;
					}
				});

				return false;

			} else if (bulk.val() == '') {
				swal({
					title: "Upss",
					text: "<?= cclang('please_choose_bulk_action_first'); ?>",
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Okay!",
					closeOnConfirm: true,
					closeOnCancel: true
				});

				return false;
			}

			return false;
		}); /*end appliy click*/


		//check all
		var checkAll = $('#check_all');
		var checkboxes = $('input.check');

		checkAll.on('ifChecked ifUnchecked', function (event) {
			if (event.type == 'ifChecked') {
				checkboxes.iCheck('check');
			} else {
				checkboxes.iCheck('uncheck');
			}
		});

		checkboxes.on('ifChanged', function (event) {
			if (checkboxes.filter(':checked').length == checkboxes.length) {
				checkAll.prop('checked', 'checked');
			} else {
				checkAll.removeProp('checked');
			}
			checkAll.iCheck('update');
		});
		initSortable('sliders', $('table.dataTable'));
	}); /*end doc ready*/
</script>