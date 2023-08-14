<section class="content-header">
	<h1>
		Perkembangan Anak <small><?= cclang('detail', ['Perkembangan Anak']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/perkembangan_anak'); ?>">Perkembangan Anak</a></li>
		<li class="active"><?= cclang('detail'); ?></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-body">
					<div class="box-widget widget-user-2">
						<div class="widget-user-header">
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
							</div>
							<h3 class="widget-user-username">Perkembangan Anak</h3>
							<h5 class="widget-user-desc">
								Detail Perkembangan Anak 
								<?= strtoupper($data_perkembangan_anak->anak_nama);?>
								<?= $data_perkembangan_anak->anak_nik != null ? ' ('.$data_perkembangan_anak->anak_nik.')' : '';?>
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Detail Anak</h3>
				</div>
				<div class="box-body">
					<table class="table table-striped">
						<tr>
							<th>NIK Anak</th>
							<td><?= $data_perkembangan_anak->anak_nik != null ? $data_perkembangan_anak->anak_nik : '-';?></td>
						</tr>
						<tr>
							<th>Nama Anak</th>
							<td><?= $data_perkembangan_anak->anak_nama;?></td>
						</tr>
						<tr>
							<th>Tanggal Lahir Anak</th>
							<td><?= $data_perkembangan_anak->anak_tanggal_lahir;?></td>
						</tr>
						<tr>
							<th>Jenis Kelamin Anak</th>
							<td><?= $data_perkembangan_anak->anak_jenkel == '1' ? 'Laki-Laki' : 'Perempuan';?></td>
						</tr>
						<tr>
							<th>Alamat Rumah Anak</th>
							<td><?= $data_perkembangan_anak->anak_alamat;?></td>
						</tr>
						<tr>
							<th>RT / RW</th>
							<td><?= 'RT '.$data_perkembangan_anak->anak_rt.' / RW '.$data_perkembangan_anak->anak_rw;?></td>
						</tr>
						<tr>
							<th>Kecamatan, Kelurahan</th>
							<td><?= $data_perkembangan_anak->kelurahan_nama.' - '.$data_perkembangan_anak->kecamatan_nama;?></td>
						</tr>
						<tr>
							<th>Nama Ibu Kandung</th>
							<td><?= $data_perkembangan_anak->anak_nama_ibu != null ? $data_perkembangan_anak->anak_nama_ibu : '-';?></td>
						</tr>
					</table>
				</div>
				<div class="box-footer">
					<div class="row-fluid">
					<?php is_allowed('data_anak_update', function() use ($data_perkembangan_anak){?>
                        <a class="btn btn-flat btn-success" id="btn_edit" data-stype='back' title="edit data_anak (Ctrl+e)" href="<?= site_url('administrator/data_anak/edit/'.$data_perkembangan_anak->anak_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Data Anak']); ?> </a>
					<?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/data_anak/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Data Anak']); ?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Detail Perkembangan Anak</h3>
					<?php is_allowed('perkembangan_anak_add', function() use ($data_perkembangan_anak){?>
					<a class="btn btn-flat btn-primary btn-sm pull-right" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('detail_perkembangan_anak')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/perkembangan_anak/add_perkembangan?id='.$data_perkembangan_anak->anak_id); ?>">
						<i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('detail_perkembangan_anak')]); ?></a>
					<?php }) ?>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped dataTable">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tanggal Perkembangan</th>
									<th>Deskripsi</th>
									<th>Foto Kegiatan</th>
									<th>Indikasi Penyakit</th>
									<th>Keterangan</th>
									<th>Instansi Penginput</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
						<?php
							$no = '1';
							foreach ($query_perkembangan_anak as $item) {
						?>
								<tr>
									<td><?= $no++;?>.</td>
									<td><?= $item->perkembangan_tgl;?></td>
									<td><?= $item->perkembangan_deskripsi;?></td>
									<td>
							<?php
								foreach (explode(',', $item->perkembangan_foto) as $file):
									if (!empty($file)):
										if (is_image($file)):
							?>
									<a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/perkembangan_anak/' . $file; ?>">
										<img src="<?= BASE_URL . 'uploads/perkembangan_anak/' . $file; ?>" class="image-responsive" alt="image perkembangan_anak" title="perkembangan_foto perkembangan_anak" width="40px">
									</a>
							<?php else: ?>
									<a href="<?= BASE_URL . 'uploads/perkembangan_anak/' . $file; ?>" target="blank">
										<img src="<?= get_icon_file($file); ?>" class="image-responsive image-icon" alt="image perkembangan_anak" title="perkembangan_foto <?= $file; ?>" width="40px">
									</a>
							<?php
										endif;
									endif;
								endforeach;
							?>
									</td>
									<td><?= $item->perkembangan_indikasi;?></td>
									<td><?= $item->perkembangan_keterangan;?></td>
									<td><?= $item->opd_nama;?></td>
									<td>
								<?php is_allowed('perkembangan_anak_view', function() use ($item){?>
										<a href="<?= site_url('administrator/perkembangan_anak/view_perkembangan_anak?id=' . $item->perkembangan_id); ?>" class="label-default">
											<i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
								<?php }) ?>
								<?php is_allowed('perkembangan_anak_update', function() use ($item){?>
										<a href="<?= site_url('administrator/perkembangan_anak/edit_perkembangan?id='.$item->perkembangan_id); ?>" class="label-default">
											<i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
								<?php }) ?>
								<?php is_allowed('perkembangan_anak_delete', function() use ($item){?>
										<a href="javascript:void(0);" data-href="<?= site_url('administrator/perkembangan_anak/delete/' . $item->perkembangan_id); ?>" class="label-default remove-data">
											<i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
								<?php }) ?>
									</td>
								</tr>
						<?php
							}
						?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function () {
		(function () {
			var perkembangan_anak_id = $('.detail_group-perkembangan_anak_id');
			var perkembangan_tgl = $('.detail_group-perkembangan_tgl');
			var perkembangan_deskripsi = $('.detail_group-perkembangan_deskripsi');
			var perkembangan_foto = $('.detail_group-perkembangan_foto');
			var perkembangan_indikasi = $('.detail_group-perkembangan_indikasi');
			var perkembangan_keterangan = $('.detail_group-perkembangan_keterangan');
		})();

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

	});
</script>