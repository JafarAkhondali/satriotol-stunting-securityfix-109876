<section class="content-header">
	<h1>
		Data Stunting Anak <small><?= cclang('detail', ['Data Stunting Anak']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?= site_url('administrator/data_anak'); ?>">Data Anak</a></li>
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
						<h3 class="widget-user-username">Data Stunting Anak</h3>
						<h5 class="widget-user-desc">Detail Data Stunting Anak</h5>
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
								<table class="table table-hover table-striped">
									<tr>
										<th>NIK Anak</th>
										<td><?= $data_anak['nik_anak'] != null ? $data_anak['nik_anak'] : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>Nama Anak</th>
										<td><?= $data_anak['nama_anak'];?></td>
									</tr>
									<tr>
										<th>Tanggal Lahir Anak</th>
										<td><?= systemTanggalIndo($data_anak['tanggal_lahir']);?></td>
									</tr>
									<tr>
										<th>Jenis Kelamin Anak</th>
										<td><?= $data_anak['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan';?></td>
									</tr>
									<tr>
										<th>Alamat Rumah Anak</th>
										<td><?= $data_anak['alamat_ktp'];?></td>
									</tr>
									<tr>
										<th>RT / RW</th>
										<td><?= 'RT '.$data_anak['rt_ktp'].' / RW '.$data_anak['rw_ktp'];?></td>
									</tr>
									<tr>
										<th>Kecamatan, Kelurahan</th>
										<td><?= $data_anak['kelurahan_ktp'].' - '.$data_anak['kecamatan_ktp'];?></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<div class="table-responsive no-padding">
								<table class="table table-hover table-striped">
									<tr>
										<th>NIK Ayah</th>
										<td><?= $data_anak['nik_ayah'] != null ? $data_anak['nik_ayah'] : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>Nama Ayah</th>
										<td><?= $data_anak['nama_ayah'] != null ? $data_anak['nama_ayah'] : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>NIK Ibu</th>
										<td><?= $data_anak['nik_ibu'] != null ? $data_anak['nik_ibu'] : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>Nama Ibu</th>
										<td><?= $data_anak['nama_ibu'] != null ? $data_anak['nama_ibu'] : '<i>belum ditentukan</i>';?></td>
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
				<?php
					is_allowed('data_stunting_anak_add', function() use ($data_anak) {
				?>
				<div class="box-header">
					<div class="pull-right">
						<a class="btn btn-flat btn-primary btn-sm" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('data_stunting_anak')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/data_stunting_anak/add_stunting?nik='.$data_anak["nik_anak"]); ?>">
							<i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('data_stunting_anak')]); ?></a>
					</div>
				</div>
				<?php
					});
				?>
				<div class="box-body">
					<div class="table-responsive no-padding">
						<table class="table table-bordered">
							<tr>
								<th style="text-align: center; vertical-align: middle;" rowspan="3">Tanggal Pengukuran</th>
								<th style="text-align: center; vertical-align: middle;" rowspan="3">DTKS</th>
								<th style="text-align: center; vertical-align: middle;" rowspan="3">BB Anak</th>
								<th style="text-align: center; vertical-align: middle;" rowspan="3">TB Anak</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Anak Angkat</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Pengasuh Balita</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Day Care Stunting</th>
								<th style="text-align: center; vertical-align: middle;" colspan="9">Asupan Gizi (PMT)</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Imunisasi Anak</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Terapi Gizi</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">BPJS Stunting</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Bantuan Sembako</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Dashyat</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">RTLH</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">DLH</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Akses Pangan / UMKM Lokal</th>
								<th style="text-align: center; vertical-align: middle;" rowspan="3">Mitra Lain</th>
								<th style="text-align: center; vertical-align: middle;" rowspan="3">Action</th>
							</tr>
							<tr>
								<th style="text-align: center; vertical-align: middle;" rowspan="2">Gizi Instansi</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2">DKK</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2">DISTAPANG</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2">DISPERIKANAN</th>
								<th style="text-align: center; vertical-align: middle;" colspan="2">CSR</th>
							</tr>
							<tr>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
								<th style="text-align: center; vertical-align: middle;">Status</th>
								<th style="text-align: center; vertical-align: middle;">Anggaran</th>
							</tr>
					<?php
						foreach ($data_stunting as $item) {
					?>
							<tr>
								<td><?= $item->stunting_anak_tgl_ukur;?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_dtks == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td><?= $item->stunting_anak_berat_badan;?></td>
								<td><?= $item->stunting_anak_tinggi_badan;?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_anak_angkat == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $item->stunting_anak_anak_angkat_anggaran != null ? number_format($item->stunting_anak_anak_angkat_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_pengasuh_balita == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $item->stunting_anak_pengasuh_balita_anggaran != null ? number_format($item->stunting_anak_pengasuh_balita_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_day_care == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $item->stunting_anak_day_care_anggaran != null ? number_format($item->stunting_anak_day_care_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_asupan_gizi_pmt == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
<?php
	$gizi_dkk 	= db_get_all_data('data_asupan_gizi_stunting', ['asupan_gizi_data_stunting_anak_id' => $item->stunting_anak_id, 'asupan_gizi_opd_id' => 11])[0];
	$gizi_dtp 	= db_get_all_data('data_asupan_gizi_stunting', ['asupan_gizi_data_stunting_anak_id' => $item->stunting_anak_id, 'asupan_gizi_opd_id' => 12])[0];
	$gizi_dpkn 	= db_get_all_data('data_asupan_gizi_stunting', ['asupan_gizi_data_stunting_anak_id' => $item->stunting_anak_id, 'asupan_gizi_opd_id' => 25])[0];
?>
								<td style="text-align: center; vertical-align: middle;"><?= $gizi_dkk->asupan_gizi_opd == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $gizi_dkk->asupan_gizi_opd_anggaran != null ? number_format($gizi_dkk->asupan_gizi_opd_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $gizi_dtp->asupan_gizi_opd == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $gizi_dtp->asupan_gizi_opd_anggaran != null ? number_format($gizi_dtp->asupan_gizi_opd_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $gizi_dpkn->asupan_gizi_opd == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $gizi_dpkn->asupan_gizi_opd_anggaran != null ? number_format($gizi_dpkn->asupan_gizi_opd_anggaran, 0, ',', '.') : '-';?></td>

								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_asupan_gizi_csr == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $item->stunting_anak_asupan_gizi_csr_anggaran != null ? number_format($item->stunting_anak_asupan_gizi_csr_anggaran, 0, ',', '.') : '-';?></td>

								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_imunisasi == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $item->stunting_anak_imunisasi_anggaran != null ? number_format($item->stunting_anak_imunisasi_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_terapi_gizi == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $item->stunting_anak_terapi_gizi_anggaran != null ? number_format($item->stunting_anak_terapi_gizi_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_bpjs_stunting == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?=$item->stunting_anak_bpjs_stunting_anggaran != null ? number_format($item->stunting_anak_bpjs_stunting_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_bantuan_sembako == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $item->stunting_anak_bantuan_sembako_anggaran != null ? number_format($item->stunting_anak_bantuan_sembako_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_dahsyat == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $item->stunting_anak_dahsyat_anggaran != null ? number_format($item->stunting_anak_dahsyat_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_rtlh == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $item->stunting_anak_rtlh_anggaran != null ? number_format($item->stunting_anak_rtlh_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_dlh == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $item->stunting_anak_dlh_anggaran != null ? number_format($item->stunting_anak_dlh_anggaran, 0, ',', '.') : '-';?></td>
								<td style="text-align: center; vertical-align: middle;"><?= $item->stunting_anak_akses_pangan == 'yes' ? '&#9989;' : '<i class="fa fa-times-circle text-red"></i>';?></td>
								<td style="text-align: right; vertical-align: middle;"><?= $item->stunting_anak_akses_pangan_anggaran != null ? number_format($item->stunting_anak_akses_pangan_anggaran, 0, ',', '.') : '-';?></td>
								<td style="vertical-align: middle;"><?= $item->stunting_anak_mitra_lain != null ? $item->stunting_anak_mitra_lain : '-';?></td>
								<td>
								<?php is_allowed('data_stunting_anak_update', function() use ($item){?>
									<a href="<?= site_url('administrator/data_stunting_anak/edit_stunting/' . $item->stunting_anak_id); ?>" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i> <?= cclang('update_button'); ?></a>
								<?php }) ?>
								<?php is_allowed('data_stunting_anak_delete', function() use ($item){?>
									<a href="javascript:void(0);" data-href="<?= site_url('administrator/data_stunting_anak/delete_stunting/' . $item->stunting_anak_id); ?>" class="btn btn-danger btn-sm remove-data">
									<i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
								<?php }) ?>
								</td>
							</tr>
					<?php
						}

						if (count($data_stunting) == 0) {
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
							<i class="fa fa-undo"></i> <?= cclang('go_list_button', ['Data Stunting Anak']); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
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
	});
</script>