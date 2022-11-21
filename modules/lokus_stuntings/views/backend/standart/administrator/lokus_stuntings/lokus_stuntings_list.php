<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
	//This page is a result of an autogenerated content made by running test.html with firefox.
	function domo() {
		// Binding keys
		$('*').bind('keydown', 'Ctrl+a', function assets() {
			window.location.href = BASE_URL + '/administrator/Lokus_stuntings/add';
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
		<?= cclang('lokus_stuntings') ?><small><?= cclang('list_all'); ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?= cclang('lokus_stuntings') ?></li>
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
							<div class="row pull-right">
								<?php is_allowed('lokus_stuntings_add', function(){?>
								<a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('lokus_stuntings')]);?> (Ctrl+a)" href="<?=  site_url('administrator/lokus_stuntings/add'); ?>">
									<i class="fa fa-plus-square-o"></i>
									<?= cclang('add_new_button', [cclang('lokus_stuntings')]); ?></a>
								<?php }) ?>
								<?php is_allowed('lokus_stuntings_export', function(){?>
								<a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('lokus_stuntings');?>" href="<?= site_url('administrator/lokus_stuntings/export?q='.$this->input->get('q').'&f='.$this->input->get('f'));?>">
									<i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
								<?php }) ?>
							</div>
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username"><?= cclang('lokus_stuntings') ?></h3>
							<h5 class="widget-user-desc"><?= cclang('list_all', [cclang('lokus_stuntings')]);?>
								<i class="label bg-yellow"><?= $lokus_stuntings_counts; ?> <?= cclang('items');?></i>
							</h5>
						</div>

						<form name="form_lokus_stuntings" id="form_lokus_stuntings"
							action="<?= base_url('administrator/lokus_stuntings/index'); ?>">
							<!-- /.widget-user -->
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
										<input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter');?>" value="<?= $this->input->get('q'); ?>">
									</div>
									<div class="col-sm-3 padd-left-0 ">
										<select type="text" class="form-control chosen chosen-select" name="f" id="field">
											<option value=""><?= cclang('all'); ?></option>
											<option <?= $this->input->get('f') == 'lokus_year_id' ? 'selected' :''; ?>
												value="lokus_year_id">Tahun Lokus</option>
											<option <?= $this->input->get('f') == 'kelurahan_id' ? 'selected' :''; ?>
												value="kelurahan_id">Nama Kelurahan</option>
											<option
												<?= $this->input->get('f') == 'lokus_stunting_create_at' ? 'selected' :''; ?>
												value="lokus_stunting_create_at">Tanggal Pembuatan</option>
											<option
												<?= $this->input->get('f') == 'lokus_stunting_user' ? 'selected' :''; ?>
												value="lokus_stunting_user">Pembuat</option>
										</select>
									</div>
									<div class="col-sm-1 padd-left-0 ">
										<button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply"
											title="<?= cclang('filter_search'); ?>">
											Filter
										</button>
									</div>
									<div class="col-sm-1 padd-left-0 ">
										<a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/lokus_stuntings');?>" title="<?= cclang('reset_filter'); ?>">
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
								<table class="table table-bordered table-striped">
									<thead>
										<tr class="">
											<th><input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all"></th>
											<th data-field="lokus_year_id" data-sort="1" data-primary-key="0"><?= cclang('lokus_year_id') ?></th>
											<th data-field="kelurahan_id" data-sort="1" data-primary-key="0"><?= cclang('kelurahan_id') ?></th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="tbody_lokus_stuntings">
										<?php foreach($lokus_stuntingss as $lokus_stuntings): ?>
										<tr>
											<td width="5">
												<input type="checkbox" class="flat-red check" name="id[]"
													value="<?= $lokus_stuntings->lokus_stunting_id; ?>">
											</td>
											<td>
									<?php
										if  ($lokus_stuntings->lokus_year_id) {
                              				echo $lokus_stuntings->lokus_years_lokus_year_nama;
                              				// echo anchor('administrator/lokus_years/view/'.$lokus_stuntings->lokus_year_id.'?popup=show', $lokus_stuntings->lokus_years_lokus_year_nama, ['class' => 'popup-view']);
										}
									?>
											</td>
											<td>
									<?php 
										if  ($lokus_stuntings->kelurahan_id) {
											$kelurahan_id 	= explode(',', $lokus_stuntings->kelurahan_id);
											$kelurahan_nama = explode(',', $lokus_stuntings->nama_kelurahan);

											$kelurahan = [];
											for ($i=0; $i < count($kelurahan_id); $i++) {
												$kelurahan[] = $kelurahan_nama[$i];
												// $kelurahan[] = anchor('administrator/kelurahans/view/'.$kelurahan_id[$i].'?popup=show', $kelurahan_nama[$i], ['class' => 'popup-view']);
											}

											$kelurahans = implode(', ', $kelurahan);

                              				echo $kelurahans;
										}
									?>
											</td>
											<td width="200">
												<?php is_allowed('lokus_stuntings_view', function() use ($lokus_stuntings){?>
												<a href="<?= site_url('administrator/lokus_stuntings/view/' . $lokus_stuntings->lokus_stunting_id);?>" class="label-default"><i class="fa fa-newspaper-o"></i>
													<?= cclang('view_button'); ?>
													<?php }) ?>
													<!-- <?php is_allowed('lokus_stuntings_update', function() use ($lokus_stuntings){?>
													<a href="<?= site_url('administrator/lokus_stuntings/edit/' . $lokus_stuntings->lokus_stunting_id);?>" class="label-default"><i class="fa fa-edit "></i>
														<?= cclang('update_button'); ?></a>
													<?php }) ?> -->
													<?php is_allowed('lokus_stuntings_delete', function() use ($lokus_stuntings){?>
													<a href="javascript:void(0);" data-href="<?= site_url('administrator/lokus_stuntings/delete/' . $lokus_stuntings->lokus_stunting_id);?>" class="label-default remove-data"><i class="fa fa-close"></i>
														<?= cclang('remove_button'); ?></a>
													<?php }) ?>
											</td>
										</tr>
										<?php endforeach; ?>
										<?php if ($lokus_stuntings_counts == 0) :?>
										<tr>
											<td colspan="100">
												Lokus Stuntings data is not available
											</td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</form>
					</div>
					<hr>
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

		$('#apply').click(function () {
			var bulk = $('#bulk');
			var serialize_bulk = $('#form_lokus_stuntings').serialize();

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
							document.location.href = BASE_URL +
								'/administrator/lokus_stuntings/delete?' + serialize_bulk;
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

		initSortable('lokus_stuntings', $('table.dataTable'));
	}); /*end doc ready*/
</script>