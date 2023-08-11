<section class="content-header">
	<h1>
		Data Intervensi Anak <small><?= cclang('detail', ['Data Intervensi Anak']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/data_anak'); ?>">Data Intervensi Anak</a></li>
		<li class="active"><?= cclang('detail'); ?></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-widget widget-user-2">
					<div class="widget-user-header">
						<div class="widget-user-image">
							<img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
						</div>
						<h3 class="widget-user-username">Data Intervensi Anak</h3>
						<h5 class="widget-user-desc">Detail Data Intervensi Anak</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Detail Anak</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="table-responsive no-padding">
								<table class="table table-bordered table-striped">
									<tr>
										<th>NIK Anak</th>
										<td><?= $data_intervensi_anak->anak_nik != null ? $data_intervensi_anak->anak_nik : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>Nama Anak</th>
										<td><?= $data_intervensi_anak->anak_nama;?></td>
									</tr>
									<tr>
										<th>Tanggal Lahir Anak</th>
										<td><?= $data_intervensi_anak->anak_tanggal_lahir;?></td>
									</tr>
									<tr>
										<th>Jenis Kelamin Anak</th>
										<td><?= $data_intervensi_anak->anak_jenkel == '1' ? 'Laki-Laki' : 'Perempuan';?></td>
									</tr>
									<tr>
										<th>Alamat Rumah Anak</th>
										<td><?= $data_intervensi_anak->anak_alamat;?></td>
									</tr>
									<tr>
										<th>RT / RW</th>
										<td><?= 'RT '.$data_intervensi_anak->anak_rt.' / RW '.$data_intervensi_anak->anak_rw;?></td>
									</tr>
									<tr>
										<th>Kecamatan, Kelurahan</th>
										<td><?= $data_intervensi_anak->kelurahan_nama.' - '.$data_intervensi_anak->kecamatan_nama;?></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<div class="table-responsive no-padding">
								<table class="table table-bordered table-striped">
									<tr>
										<th>NIK Ayah</th>
										<td><?= $data_intervensi_anak->anak_nik_ayah != null ? $data_intervensi_anak->anak_nik_ayah : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>Nama Ayah</th>
										<td><?= $data_intervensi_anak->anak_nama_ayah != null ? $data_intervensi_anak->anak_nama_ayah : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>NIK Ibu</th>
										<td><?= $data_intervensi_anak->anak_nik_ibu != null ? $data_intervensi_anak->anak_nik_ibu : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>Nama Ibu</th>
										<td><?= $data_intervensi_anak->anak_nama_ibu != null ? $data_intervensi_anak->anak_nama_ibu : '<i>belum ditentukan</i>';?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
			<?php is_allowed('data_intervensi_anak_add', function(){?>
				<div class="box-header">
					<div class="pull-right">
						<a class="btn btn-flat btn-primary btn-sm" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('data_intervensi_anak')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/data_intervensi_anak/add_intervensi?anak='.$data_intervensi_anak->anak_id); ?>">
							<i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('data_intervensi_anak')]); ?></a>
					</div>
				</div>
			<?php }) ?>
				<div class="box-body">
					<div class="table-responsive no-padding">
						<table class="table table-bordered">
							<tr>
								<th style="text-align: center; vertical-align: middle;">No</th>
								<th style="text-align: center; vertical-align: middle;">Kecamatan</th>
								<th style="text-align: center; vertical-align: middle;">Kelurahan</th>
								<th style="text-align: center; vertical-align: middle;">Bulan</th>
								<th style="text-align: center; vertical-align: middle;">Tanggal Intervensi</th>
								<th style="text-align: center; vertical-align: middle;">Kondisi</th>
								<th style="text-align: center; vertical-align: middle;">Nama Orang Tua Asuh</th>
								<th style="text-align: center; vertical-align: middle;">Intervensi</th>
								<th style="text-align: center; vertical-align: middle;">Tanggal Pasca Intervensi</th>
								<th style="text-align: center; vertical-align: middle;">Pasca Intervensi</th>
								<th style="text-align: center; vertical-align: middle;">Keterangan</th>
								<th style="text-align: center; vertical-align: middle;">Actions</th>
							</tr>
					<?php
						$no = 1;
						$query_data_intervnsi = db_get_all_data('data_intervensi_anak', ['intervensi_anak_id' => $data_intervensi_anak->anak_id]);
						foreach ($query_data_intervnsi as $item) {
					?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= join_multi_select($item->intervensi_kecamatan_id, 'kecamatans', 'kecamatan_id', 'kecamatan_nama');?></td>
							<td><?= join_multi_select($item->intervensi_kelurahan_id, 'kelurahans', 'kelurahan_id', 'kelurahan_nama');?></td>
							<td style="text-align: center;"><?= namaBulan($item->intervensi_bulan).' '.$item->intervensi_tahun;?></td>
							<td><?= $item->intervensi_tgl_masuk;?></td>
							<td><?= $item->intervensi_kondisi;?></td>
							<td><?= $item->intervensi_nama_ortu_asuh;?></td>
							<td><?= $item->intervensi_deskripsi;?></td>
							<td><?= $item->intervensi_tgl_pasca != '0000-00-00' ? $item->intervensi_tgl_pasca : '';?></td>
							<td><?= $item->intervensi_pasca;?></td>
							<td><?= $item->intervensi_keterangan;?></td>
							<td>
							<?php is_allowed('data_intervensi_anak_update', function() use ($item){?>
								<a href="<?= site_url('administrator/data_intervensi_anak/edit_intervensi/' . $item->intervensi_id); ?>" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i> <?= cclang('update_button'); ?></a>
							<?php }) ?>
							<?php is_allowed('data_intervensi_anak_delete', function() use ($item){?>
								<a href="javascript:void(0);" data-href="<?= site_url('administrator/data_intervensi_anak/delete_intervensi/' . $item->intervensi_id); ?>" class="btn btn-danger btn-sm remove-data">
									<i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
							<?php }) ?>
							</td>
						</tr>
					<?php
						}

						if (count($query_data_intervnsi) == 0) {
					?>
							<tr>
								<td colspan="100">
									Data Tidak ada.
								</td>
							</tr>
					<?php
						}
					?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-footer">
					<div class="row-fluid">
						<a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/data_anak/'); ?>">
							<i class="fa fa-undo"></i> <?= cclang('go_list_button', ['Data Anak']); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script type="text/javascript">
	$(document).ready(function () {

	});
</script>