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

							<div class="row" style="margin-bottom: 10px;">
								<div class="col-md-12">
									<div class="col-sm-3 padd-left-0">
										<select type="text" class="form-control chosen chosen-select" name="f" id="field">
											<option value=""><?= cclang('all'); ?></option>
											<option <?= $this->input->get('f') == 'puskemas' ? 'selected' :''; ?> value="puskesmas">Puskesmas</option>
											<option <?= $this->input->get('f') == 'kecamatan' ? 'selected' :''; ?> value="kecamatan">Kecamatan</option>
											<option <?= $this->input->get('f') == 'kelurahan' ? 'selected' :''; ?> value="kelurahan">Kelurahan</option>
											<option <?= $this->input->get('f') == 'nokk' ? 'selected' :''; ?> value="nokk">Nomor KK</option>
											<option <?= $this->input->get('f') == 'nonik' ? 'selected' :''; ?> value="nonik">Nomor NIK Anak</option>
											<option <?= $this->input->get('f') == 'nama_anak' ? 'selected' :''; ?> value="nama_anak">Nama Anak</option>
											<option <?= $this->input->get('f') == 'nama_ibu' ? 'selected' :''; ?> value="nama_ibu">Nama Ibu</option>
										</select>
									</div>
									<div class="col-sm-3 padd-left-0">
										<input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
									</div>
									<div class="col-sm-1 padd-left-0">
										<button type="button" class="btn btn-flat btn-default" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">Filter</button>
									</div>
									<div class="col-sm-1 padd-left-0">
										<button type="button" class="btn btn-flat btn-default" name="reset" id="reset" value="Reset" title="<?= cclang('reset_search'); ?>"><i class="fa fa-undo"></i></button>
									</div>
								</div>
							</div>

							<div class="table-responsive">
								<div id="indikator" class="text-center"></div>
								<table class="table table-bordered table-striped" id="dataTable"></table>
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
	var urlCurrent = "<?= BASE_URL . 'administrator/data_anak/response_data_anak'; ?>";
	var dataTable;

	function initDataTable() {
		dataTable = $('#dataTable').DataTable({
			"searching"	: true,
			"columns" : [
				{ data: 'no', title: 'No.' },
				{ data: 'puskesmas', title: 'Puskesmas' },
				{ data: 'nama_kecamatan', title: '<?= cclang('anak_kecamatan_id') ?>' },
				{ data: 'nama_kelurahan', title: '<?= cclang('anak_kelurahan_id') ?>' },
				{ data: 'no_kk_anak', title: '<?= cclang('anak_no_kk') ?>' },
				{ data: 'nik_anak', title: '<?= cclang('anak_nik') ?>' },
				{ data: 'nama_anak', title: '<?= cclang('anak_nama') ?>' },
				{ data: 'jenkel', title: '<?= cclang('anak_jenkel') ?>'},
				{ data: 'tgl_lahir', title: '<?= cclang('anak_tanggal_lahir') ?>' },
				{ data: 'umur', title: 'Umur' },
				{ data: 'alamat', title: '<?= cclang('anak_alamat') ?>' },
				{ data: 'nama_ibu', title: '<?= cclang('anak_nama_ibu') ?>' },
				{ data: 'no_hp_ortu', title: 'No. Telf. Orang Tua' },
				{ data: 'action', title: 'Action' },
			],
		});
	}

	$(document).ready(function() {
		$.ajax({
			url: urlCurrent,
			dataType: "json",
			beforeSend: function(){
				$('#indikator').html('<div class="text-center"><i class="fa fa-refresh fa-spin"></i> Sedang memproses data. Mohon tunggu sebentar...</div>');
			},
			success: function(response) {
				$('#indikator').empty();

				if (response.status === true) {
					initDataTable();

					dataTable.search('').columns().search('').draw();
					dataTable.clear().rows.add(response.data).draw();
				} else {
					alert(response.message+'. Refresh halaman ini!');
				}
			},
			error: function() {
				alert("Terjadi kesalahan saat mengambil data. Silahkan refresh halaman ini!");
			}
		});
	});

	$('#sbtn').on('click', function () {
		var param = $('#field').val();
		var nilai = $('#filter').val();

		$.ajax({
			url: urlCurrent,
			type: 'GET',
			dataType: "json",
			data: {
				param: param,
				nilai: nilai,
			},
			beforeSend: function(){
				$('#dataTable').DataTable().clear().destroy();
				$('#indikator').html('<div class="text-center"><i class="fa fa-refresh fa-spin"></i> Sedang memproses data. Mohon tunggu sebentar...</div>');
				$('#dataTable').html('');
			},
			success: function(response) {
				$('#indikator').empty();

				initDataTable();

				dataTable.search('').columns().search('').draw();
				dataTable.clear().rows.add(response.data).draw();
			},
			error: function() {
				alert("Terjadi kesalahan saat mengambil data. Silahkan refresh halaman ini!");
			}
		});
	});

	$('#reset').on('click', function () {
		$('.chosen option').prop('selected', false).trigger('chosen:updated');
		$('#filter').val('');

		$.ajax({
			url: urlCurrent,
			dataType: "json",
			beforeSend: function(){
				$('#dataTable').DataTable().clear().destroy();
				$('#indikator').html('<div class="text-center"><i class="fa fa-refresh fa-spin"></i> Sedang memproses data. Mohon tunggu sebentar...</div>');
				$('#dataTable').html('');
			},
			success: function(response) {
				$('#indikator').empty();

				if (response.status === true) {
					initDataTable();

					dataTable.search('').columns().search('').draw();
					dataTable.clear().rows.add(response.data).draw();
				} else {
					alert(response.message+'. Refresh halaman ini!');
				}
			},
			error: function() {
				alert("Terjadi kesalahan saat mengambil data. Silahkan refresh halaman ini!");
			}
		});
	});
</script>