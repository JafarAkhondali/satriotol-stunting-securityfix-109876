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
	$(document).ready(function() {
		$.ajax({
			url: "<?= BASE_URL . 'administrator/data_anak/response_data_anak'; ?>",
			dataType: "json",
			success: function(response) {
				if (response.status === true) {
					$('#dataTable').DataTable({
						"data"			: response.data,
						"columns" : [
							{ data: 'no', title: 'No.' },
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
							{ data: 'action', title: 'Action' },
						],
					});
				} else {
					alert(response.message);
				}
			},
			error: function() {
				alert("Terjadi kesalahan saat mengambil data.");
			}
		});
	});
</script>