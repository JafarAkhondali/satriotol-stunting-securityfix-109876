<link rel="stylesheet" href="<?= BASE_ASSET . 'datatables/datatables.min.css'; ?>" />

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
									<?php is_allowed('data_anak_add', function () { ?>
										<a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('data_anak')]); ?>  (Ctrl+a)" href="<?= site_url('administrator/data_anak/add'); ?>">
											<i class="fa fa-plus-square-o"></i>
											<?= cclang('add_new_button', [cclang('data_anak')]); ?></a>
									<?php }) ?>
									<?php is_allowed('data_anak_export', function () { ?>
										<a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('data_anak') ?> " href="<?= site_url('administrator/data_anak/export?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>">
											<i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
									<?php }) ?>
								</div>
								<div class="widget-user-image">
									<img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
								</div>
								<h3 class="widget-user-username"><?= cclang('data_anak') ?></h3>
								<h5 class="widget-user-desc"><?= cclang('list_all', [cclang('data_anak')]); ?> <i class="label bg-yellow"><?= $data_anak_counts; ?> <?= cclang('items'); ?></i>
								</h5>
							</div>

							<div class="table-responsive">
								<table class="table table-bordered table-striped dataTable">
									<thead>
										<tr>
											<th>No.</th>
											<th><?= cclang('anak_puskesmas_id') ?></th>
											<th><?= cclang('anak_kecamatan_id') ?></th>
											<th><?= cclang('anak_kelurahan_id') ?></th>
											<th><?= cclang('anak_no_kk') ?></th>
											<th><?= cclang('anak_nik') ?></th>
											<th><?= cclang('anak_nama') ?></th>
											<th><?= cclang('anak_jenkel') ?></th>
											<th><?= cclang('anak_tanggal_lahir') ?></th>
											<th>Umur</th>
											<th><?= cclang('anak_alamat') ?></th>
											<th><?= cclang('anak_nama_ibu') ?></th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										if ($data_anak['success'] == true) {
											$no = 1;
											foreach ($data_anak['data'] as $item) {
												if ($item['jenis_kelamin'] == 'L') {
													$jenkel = 'LAKI-LAKI';
												} else if ($item['jenis_kelamin'] == 'P') {
													$jenkel = 'PEREMPUAN';
												} else {
													$jenkel = '-';
												}
										?>
												<tr>
													<td><?= $no++; ?></td>
													<td>-</td>
													<td><?= $item['kecamatan_ktp']; ?></td>
													<td><?= $item['kelurahan_ktp']; ?></td>
													<td><?= $item['no_kk']; ?></td>
													<td><?= $item['nik_anak']; ?></td>
													<td><?= $item['nama_anak']; ?></td>
													<td><?= $jenkel; ?></td>
													<td><?= convertsystemTanggalIndo($item['tanggal_lahir']); ?></td>
													<td><?= $item['usia']; ?></td>
													<td><?= $item['alamat_ktp']; ?></td>
													<td><?= $item['nama_ibu']; ?></td>
													<td width="200">
														<?php is_allowed('data_anak_profile', function () use ($item) { ?>
															<a href="<?= site_url('administrator/data_anak/profile_anak?nik=' . $item['nik_anak']); ?>" class="btn btn-sm btn-default"><i class="fa fa-file-text-o"></i>
																<?= cclang('profile_anak'); ?></a><br />
														<?php }) ?>
														<?php is_allowed('data_anak_stunting', function () use ($item) { ?>
															<a href="<?= site_url('administrator/data_stunting_anak/view_stunting?nik=' . $item['nik_anak']); ?>" class="btn btn-sm btn-danger"><i class="fa fa-file-text-o"></i>
																<?= cclang('stunting_anak'); ?></a><br />
														<?php }) ?>
														<?php is_allowed('data_perkembangan_anak', function () use ($item) { ?>
															<a href="<?= site_url('administrator/perkembangan_anak/view_perkembangan?nik=' . $item['nik_anak']); ?>" class="btn btn-sm btn-info"><i class="fa fa-file-text-o"></i>
																<?= cclang('perkembangan_anak'); ?></a><br />
														<?php }) ?>
														<?php is_allowed('data_intervensi_anak', function () use ($item) { ?>
															<a href="<?= site_url('administrator/data_intervensi_anak/view_intervensi?nik=' . $item['nik_anak']); ?>" class="btn btn-sm btn-primary"><i class="fa fa-file-text-o"></i>
																<?= cclang('intervensi_anak'); ?></a><br />
														<?php }) ?>
														<?php is_allowed('data_anak_view', function () use ($item) { ?>
															<a href="<?= site_url('administrator/data_anak/view/' . $item['nik_anak']); ?>" class="btn btn-sm btn-warning"><i class="fa fa-newspaper-o"></i>
																<?= cclang('view_button'); ?></a><br />
														<?php }) ?>
													</td>
												</tr>
										<?php
											}
										}
										?>
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

<script type="text/javascript" src="<?= BASE_ASSET . 'datatables/datatables.min.js'; ?>"></script>

<script type="text/javascript">
	$(document).ready(function() {
		var table = $('.dataTable').DataTable();

		// $.ajax({
		// 	url: "<?= BASE_URL . 'administrator/data_anak/data_anak_stunting'; ?>",
		// 	dataType: "json",
		// 	success: function(response) {
		// 		if (response.success === true) {
		// 			$('.dataTable').DataTable({
		// 				"processing" 	: true,
		// 				"retrieve" 		: true,
		// 				"serverSide" 	: true,
		// 				"data"			: response.data,
		// 			});
		// 		} else {
		// 			alert(response.message);
		// 		}
		// 	},
		// 	error: function() {
		// 		alert("Terjadi kesalahan saat mengambil data.");
		// 	}
		// });
	});
</script>