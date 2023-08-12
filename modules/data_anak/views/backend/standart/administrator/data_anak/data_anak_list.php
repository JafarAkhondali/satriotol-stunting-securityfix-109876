<section class="content-header">
	<h1>
		<?= cclang('data_anak') ?><small><?= cclang('list_all'); ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?= cclang('data_anak') ?></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form name="form_data_anak" id="form_data_anak" action="<?= base_url('administrator/data_anak/index'); ?>">
				<div class="box box-danger">
					<div class="box-body">
						<div class="box box-widget widget-user-2">
							<div class="widget-user-header">
								<div class="row pull-right">
									<?php is_allowed('data_anak_add', function(){?>
									<a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('data_anak')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/data_anak/add'); ?>">
										<i class="fa fa-plus-square-o"></i>
										<?= cclang('add_new_button', [cclang('data_anak')]); ?></a>
									<?php }) ?>
									<?php is_allowed('data_anak_export', function(){?>
									<a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('data_anak') ?> " href="<?= site_url('administrator/data_anak/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>">
										<i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
									<?php }) ?>
								</div>
								<div class="widget-user-image">
									<img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
								</div>
								<h3 class="widget-user-username"><?= cclang('data_anak') ?></h3>
								<h5 class="widget-user-desc"><?= cclang('list_all', [cclang('data_anak')]); ?> <i class="label bg-yellow"><?= $data_anak_counts; ?> <?= cclang('items'); ?></i></h5>
							</div>

							<div class="row">
								<div class="col-md-8">
									<div class="col-sm-2 padd-left-0">
										<select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email">
											<option value=""></option>
											<option value="delete">Delete</option>
										</select>
									</div>
									<div class="col-sm-2 padd-left-0">
										<button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
									</div>
									<div class="col-sm-3 padd-left-0 ">
										<input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
									</div>
									<div class="col-sm-3 padd-left-0">
										<select type="text" class="form-control chosen chosen-select" name="f" id="field">
											<option value=""><?= cclang('all'); ?></option>
											<option <?= $this->input->get('f') == 'anak_puskesmas_id' ? 'selected' :''; ?> value="anak_puskesmas_id">Puskesmas</option>
											<option <?= $this->input->get('f') == 'anak_kecamatan_id' ? 'selected' :''; ?> value="anak_kecamatan_id">Kecamatan</option>
											<option <?= $this->input->get('f') == 'anak_kelurahan_id' ? 'selected' :''; ?> value="anak_kelurahan_id">Kelurahan</option>
											<option <?= $this->input->get('f') == 'anak_no_kk' ? 'selected' :''; ?> value="anak_no_kk">No KK Anak</option>
											<option <?= $this->input->get('f') == 'anak_nik' ? 'selected' :''; ?> value="anak_nik">NIK Anak</option>
											<option <?= $this->input->get('f') == 'anak_nama' ? 'selected' :''; ?> value="anak_nama">Nama Anak</option>
											<option <?= $this->input->get('f') == 'anak_jenkel' ? 'selected' :''; ?> value="anak_jenkel">Jenis Kelamin</option>
											<option <?= $this->input->get('f') == 'anak_tanggal_lahir' ? 'selected' :''; ?> value="anak_tanggal_lahir">Tanggal Lahir Anak</option>
											<option <?= $this->input->get('f') == 'anak_alamat' ? 'selected' :''; ?> value="anak_alamat">Alamat Rumah Anak</option>
											<option <?= $this->input->get('f') == 'anak_rt' ? 'selected' :''; ?> value="anak_rt">RT</option>
											<option <?= $this->input->get('f') == 'anak_rw' ? 'selected' :''; ?> value="anak_rw">RW</option>
											<option <?= $this->input->get('f') == 'anak_nama_ibu' ? 'selected' :''; ?> value="anak_nama_ibu">Nama Ibu</option>
										</select>
									</div>
									<div class="col-sm-1 padd-left-0">
										<button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
											Filter
										</button>
									</div>
									<div class="col-sm-1 padd-left-0">
										<a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/data_anak');?>" title="<?= cclang('reset_filter'); ?>">
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
										<tr class="">
											<th><input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all"></th>
											<th data-field="anak_puskesmas_id" data-sort="1" data-primary-key="0"><?= cclang('anak_puskesmas_id') ?></th>
											<th data-field="anak_kecamatan_id" data-sort="1" data-primary-key="0"><?= cclang('anak_kecamatan_id') ?></th>
											<th data-field="anak_kelurahan_id" data-sort="1" data-primary-key="0"><?= cclang('anak_kelurahan_id') ?></th>
											<th data-field="anak_no_kk" data-sort="1" data-primary-key="0"><?= cclang('anak_no_kk') ?></th>
											<th data-field="anak_nik" data-sort="1" data-primary-key="0"><?= cclang('anak_nik') ?></th>
											<th data-field="anak_nama" data-sort="1" data-primary-key="0"><?= cclang('anak_nama') ?></th>
											<th data-field="anak_jenkel" data-sort="1" data-primary-key="0"><?= cclang('anak_jenkel') ?></th>
											<th data-field="anak_tanggal_lahir" data-sort="1" data-primary-key="0"><?= cclang('anak_tanggal_lahir') ?></th>
											<th data-field="anak_alamat" data-sort="1" data-primary-key="0"><?= cclang('anak_alamat') ?></th>
											<th data-field="anak_nama_ibu" data-sort="1" data-primary-key="0"><?= cclang('anak_nama_ibu') ?></th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="tbody_data_anak">
									<?php
										foreach($data_anaks as $data_anak):
									?>
										<tr>
											<td width="5">
												<input type="checkbox" class="flat-red check" name="id[]" value="<?= $data_anak->anak_id; ?>">
											</td>
											<td>PUSKESMAS <?= strtoupper($data_anak->puskesmas_puskesmas_nama);?></td>
											<td><?= strtoupper($data_anak->kecamatans_kecamatan_nama);?></td>
											<td><?= strtoupper($data_anak->kelurahans_kelurahan_nama);?></td>
											<td><span class="list_group-anak_no_kk"><?= _ent($data_anak->anak_no_kk); ?></span></td>
											<td><span class="list_group-anak_nik"><?= _ent($data_anak->anak_nik); ?></span></td>
											<td><span class="list_group-anak_nama"><?= strtoupper(_ent($data_anak->anak_nama)); ?></span></td>
											<td><span class="list_group-anak_jenkel"><?= _ent($data_anak->anak_jenkel) == '1' ? 'Laki-Laki' : 'Perempuan'; ?></span></td>
											<td><span class="list_group-anak_tanggal_lahir"><?= _ent($data_anak->anak_tanggal_lahir); ?></span></td>
											<td><span class="list_group-anak_alamat"><?= _ent($data_anak->anak_alamat); ?></span></td>
											<td><span class="list_group-anak_nama_ibu"><?= _ent($data_anak->anak_nama_ibu); ?></span></td>
											<td width="200">
											<?php is_allowed('data_anak_stunting', function() use ($data_anak){?>
												<a href="<?= site_url('administrator/data_stunting_anak/view_stunting?anak=' . $data_anak->anak_id); ?>" class="btn btn-sm btn-danger"><i class="fa fa-file-text-o"></i>
													<?= cclang('stunting_anak'); ?></a><br/>
											<?php }) ?>
											<?php is_allowed('data_perkembangan_anak', function() use ($data_anak){?>
												<a href="<?= site_url('administrator/perkembangan_anak/view_perkembangan?anak=' . $data_anak->anak_id); ?>" class="btn btn-sm btn-info"><i class="fa fa-file-text-o"></i>
													<?= cclang('perkembangan_anak'); ?></a><br/>
											<?php }) ?>
											<?php is_allowed('data_intervensi_anak', function() use ($data_anak){?>
												<a href="<?= site_url('administrator/data_intervensi_anak/view_intervensi?anak=' . $data_anak->anak_id); ?>" class="btn btn-sm btn-primary"><i class="fa fa-file-text-o"></i>
													<?= cclang('intervensi_anak'); ?></a><br/>
											<?php }) ?>
											<?php is_allowed('data_anak_view', function() use ($data_anak){?>
												<a href="<?= site_url('administrator/data_anak/view/' . $data_anak->anak_id); ?>" class="btn btn-sm btn-warning"><i class="fa fa-newspaper-o"></i>
													<?= cclang('view_button'); ?></a><br/>
											<?php }) ?>
											<?php is_allowed('data_anak_update', function() use ($data_anak){?>
												<a href="<?= site_url('administrator/data_anak/edit/' . $data_anak->anak_id); ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>
													<?= cclang('update_button'); ?></a><br/>
											<?php }) ?>
											<?php is_allowed('data_anak_delete', function() use ($data_anak){?>
												<a href="javascript:void(0);" data-href="<?= site_url('administrator/data_anak/delete/' . $data_anak->anak_id); ?>" class="btn btn-sm btn-default remove-data">
													<i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
											<?php }) ?>
											</td>
										</tr>
										<?php endforeach; ?>
										<?php if ($data_anak_counts == 0) :?>
										<tr>
											<td colspan="100">
												Data Identitas Anak data is not available
											</td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function () {
		(function () { })()

		$('.table tbody tr').each(function () {
			var row = $(this);
			(function () {
				var anak_puskesmas_id = row.find('.list_group-anak_puskesmas_id');
				var anak_kecamatan_id = row.find('.list_group-anak_kecamatan_id');
				var anak_kelurahan_id = row.find('.list_group-anak_kelurahan_id');
				var anak_no_kk = row.find('.list_group-anak_no_kk');
				var anak_nik = row.find('.list_group-anak_nik');
				var anak_nama = row.find('.list_group-anak_nama');
				var anak_jenkel = row.find('.list_group-anak_jenkel');
				var anak_tanggal_lahir = row.find('.list_group-anak_tanggal_lahir');
				var anak_alamat = row.find('.list_group-anak_alamat');
				var anak_rt = row.find('.list_group-anak_rt');
				var anak_rw = row.find('.list_group-anak_rw');
				var anak_nik_ayah = row.find('.list_group-anak_nik_ayah');
				var anak_nama_ayah = row.find('.list_group-anak_nama_ayah');
				var anak_nik_ibu = row.find('.list_group-anak_nik_ibu');
				var anak_nama_ibu = row.find('.list_group-anak_nama_ibu');
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

		$('#apply').click(function () {
			var bulk = $('#bulk');
			var serialize_bulk = $('#form_data_anak').serialize();

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
						document.location.href = BASE_URL + '/administrator/data_anak/delete?' + serialize_bulk;
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
		});

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

		initSortable('data_anak', $('table.dataTable'));
	});
</script>