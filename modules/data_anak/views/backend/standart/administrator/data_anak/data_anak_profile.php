<section class="content-header">
	<h1>
		Data Profile Anak <small><?= cclang('detail', ['Data Profile Anak']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/data_anak'); ?>">Data Profile Anak</a></li>
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
							<h3 class="widget-user-username">Data Profile Anak</h3>
							<h5 class="widget-user-desc">Detail Data Profile Anak</h5>
						</div>
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
										<td><?= $data_anak->anak_nik != null ? $data_anak->anak_nik : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>Nama Anak</th>
										<td><?= $data_anak->anak_nama;?></td>
									</tr>
									<tr>
										<th>Tanggal Lahir Anak</th>
										<td><?= $data_anak->anak_tanggal_lahir;?></td>
									</tr>
									<tr>
										<th>Jenis Kelamin Anak</th>
										<td><?= $data_anak->anak_jenkel == '1' ? 'Laki-Laki' : $data_anak->anak_jenkel == '2' ? 'Perempuan' : '-';?></td>
									</tr>
									<tr>
										<th>Alamat Rumah Anak</th>
										<td><?= $data_anak->anak_alamat;?></td>
									</tr>
									<tr>
										<th>RT / RW</th>
										<td>RT <?= $data_anak->anak_rt != null ? $data_anak->anak_rt : '-'?> / RW <?= $data_anak->anak_rw != null ? $data_anak->anak_rw : '-';?></td>
									</tr>
									<tr>
										<th>Kecamatan, Kelurahan</th>
										<td><?= $data_anak->kelurahan_nama.' - '.$data_anak->kecamatan_nama;?></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<div class="table-responsive no-padding">
								<table class="table table-hover table-striped">
									<tr>
										<th>NIK Ayah</th>
										<td><?= $data_anak->anak_nik_ayah != null ? $data_anak->anak_nik_ayah : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>Nama Ayah</th>
										<td><?= $data_anak->anak_nama_ayah != null ? $data_anak->anak_nama_ayah : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>NIK Ibu</th>
										<td><?= $data_anak->anak_nik_ibu != null ? $data_anak->anak_nik_ibu : '<i>belum ditentukan</i>';?></td>
									</tr>
									<tr>
										<th>Nama Ibu</th>
										<td><?= $data_anak->anak_nama_ibu != null ? $data_anak->anak_nama_ibu : '<i>belum ditentukan</i>';?></td>
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
				<div class="box-header">
					<h3 class="box-title">Data Stunting Anak</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
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
								$query_data_stunting = db_get_all_data('data_stunting_anak', ['stunting_anak_anak_id' => $data_anak->anak_id]);
								foreach ($query_data_stunting as $item) {
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
									</tr>
							<?php
								}

								if (count($query_data_stunting) == 0) {
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
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Data Perkembangan Anak</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive no-padding">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>No.</th>
											<th>Tanggal Perkembangan</th>
											<th>Deskripsi</th>
											<th>Foto Kegiatan</th>
											<th>Indikasi Penyakit</th>
											<th>Keterangan</th>
											<th>Instansi Penginput</th>
										</tr>
									</thead>
									<tbody>
								<?php
									$no = '1';
									$query_perkembangan_anak = $this->db->where(['perkembangan_anak_id' => $data_anak->anak_id])->order_by('perkembangan_tgl', 'ASC')->get('perkembangan_anak')->result();
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
										</tr>
								<?php
									}

									if (count($query_perkembangan_anak) == 0) {
								?>
										<tr>
											<td colspan="100">
												Data Tidak ada.
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
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Data Intervensi Anak</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
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
										<th style="text-align: center; vertical-align: middle;">Instansi Penginput</th>
									</tr>
							<?php
								$no = 1;
								$query_intervensi_anak = $this->db->where(['intervensi_anak_id' => $data_anak->anak_id])->order_by('intervensi_tgl_masuk', 'ASC')->get('data_intervensi_anak')->result();
								foreach ($query_intervensi_anak as $item) {
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
									<td><?= $item->opd_nama;?></td>
								</tr>
							<?php
								}

								if (count($query_intervensi_anak) == 0) {
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
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-footer">
					<?php is_allowed('data_anak_profile_export', function() use ($data_anak){?>
						<a href="<?= site_url('administrator/data_anak/export_profile?anak=' . $data_anak->anak_id); ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i>
							<?= cclang('export_profile_anak'); ?></a>
					<?php }) ?>
					<a class="btn btn-flat btn-default" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/data_anak/'); ?>">
						<i class="fa fa-undo"></i> <?= cclang('go_list_button', ['Data Anak']); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function () {
		(function () {
			var anak_puskesmas_id = $('.detail_group-anak_puskesmas_id');
			var anak_kecamatan_id = $('.detail_group-anak_kecamatan_id');
			var anak_kelurahan_id = $('.detail_group-anak_kelurahan_id');
			var anak_no_kk = $('.detail_group-anak_no_kk');
			var anak_nik = $('.detail_group-anak_nik');
			var anak_nama = $('.detail_group-anak_nama');
			var anak_jenkel = $('.detail_group-anak_jenkel');
			var anak_tanggal_lahir = $('.detail_group-anak_tanggal_lahir');
			var anak_alamat = $('.detail_group-anak_alamat');
			var anak_rt = $('.detail_group-anak_rt');
			var anak_rw = $('.detail_group-anak_rw');
			var anak_nik_ayah = $('.detail_group-anak_nik_ayah');
			var anak_nama_ayah = $('.detail_group-anak_nama_ayah');
			var anak_nik_ibu = $('.detail_group-anak_nik_ibu');
			var anak_nama_ibu = $('.detail_group-anak_nama_ibu');
		})()

	});
</script>