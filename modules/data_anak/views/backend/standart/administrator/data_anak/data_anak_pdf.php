<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Export Profile Anak PDF</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<style>
	body, table{
		font-size: 10pt;
		text-align: justify;
	}

	body, h1, h2, h3, h4, h5, h6{
		margin: 0px;
		padding: 0px;
	}

	@page { size:  auto; margin: 10px; }
</style>
<body>
	<table border="0" width="100%" style="border-collapse: collapse;">
		<tr>
			<th style="text-align: center;"><h3>PROFILE ANAK</h3></th>
		</tr>
	</table>
	<br/>
	<table border="0" style="border-collapse: collapse;">
		<tr>
			<th>DATA IDENTITAS ANAK</th>
		</tr>
	</table>
	<table border="0" style="border-collapse: collapse; margin-left: 10px;">
		<tr>
			<th width="150">NIK Anak</th>
			<td>: <?= $data_anak['nik_anak'] != null ? $data_anak['nik_anak'] : '<i>Belum ditentukan</i>';?></td>
		</tr>
		<tr>
			<th>Nama Anak</th>
			<td>: <?= $data_anak['nama_anak'] != null ? strtoupper($data_anak['nama_anak']) : '<i>Belum diketahui</i>';?></td>
		</tr>
		<tr>
			<th>Tanggal Lahir Anak</th>
			<td>: <?= $data_anak['tanggal_lahir'] != null ? systemTanggalIndo($data_anak['tanggal_lahir']) : '<i>Belum diketahui</i>';?></td>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			<td>: <?= $data_anak['jenis_kelamin'] == 'L' ? 'LAKI-LAKI' : $data_anak['jenis_kelamin'] == 'P' ? 'PEREMPUAN' : '<i>Tidak ditentukan</i>';?></td>
		</tr>
		<tr>
			<th>Alamat Rumah Anak</th>
			<td>: <?= $data_anak['alamat_ktp'] != null ? $data_anak['alamat_ktp'] : '-';?></td>
		</tr>
		<tr>
			<th>RT / RW</th>
			<td>: RT <?= $data_anak['rt_ktp'] != null ? $data_anak['rt_ktp'] : '-';?> / RW <?= $data_anak['rw_ktp'] != null ? $data_anak['rw_ktp'] : '-';?></td>
		</tr>
		<tr>
			<th>Kelurahan, Kecamatan</th>
			<td>: <?= $data_anak['kelurahan_domsili'] != null ? 'KEL. '.strtoupper($data_anak['kelurahan_domsili']) : '-';?> / <?= $data_anak['kecamatan_domsili'] != null ? 'KEC. '.strtoupper($data_anak['kecamatan_domsili']) : '-';?></td>
		</tr>
		<tr>
			<th>NIK Ayah</th>
			<td>: <?= $data_anak['nik_ayah'] != null ? $data_anak['nik_ayah'] : '<i>Belum ditentukan</i>';?></td>
		</tr>
		<tr>
			<th>Nama Ayah</th>
			<td>: <?= $data_anak['nama_ayah'] != null ? $data_anak['nama_ayah'] : '<i>Belum ditentukan</i>';?></td>
		</tr>
		<tr>
			<th>NIK Ibu</th>
			<td>: <?= $data_anak['nik_ibu'] != null ? $data_anak['nik_ibu'] : '<i>Belum ditentukan</i>';?></td>
		</tr>
		<tr>
			<th>Nama Ibu</th>
			<td>: <?= $data_anak['nama_ibu'] != null ? $data_anak['nama_ibu'] : '<i>Belum ditentukan</i>';?></td>
		</tr>
	</table>
	<br/>
	<table  border="0" width="100%" style="border-collapse: collapse;">
		<tr>
			<th>DATA STUNTING ANAK</th>
		</tr>
	</table>
	<table  border="1" width="100%" style="border-collapse: collapse; border: 1px solid black;">
<?php
	$no = 1;
	foreach ($data_stunting as $stunting) {
		$stunting_dkk 			= db_get_all_data('data_asupan_gizi_stunting', ['asupan_gizi_data_stunting_anak_id' => $stunting->stunting_anak_anak_id, 'asupan_gizi_opd_id' => '11'])[0];
		$stunting_distapang 	= db_get_all_data('data_asupan_gizi_stunting', ['asupan_gizi_data_stunting_anak_id' => $stunting->stunting_anak_anak_id, 'asupan_gizi_opd_id' => '12'])[0];
		$stunting_diperikanan 	= db_get_all_data('data_asupan_gizi_stunting', ['asupan_gizi_data_stunting_anak_id' => $stunting->stunting_anak_anak_id, 'asupan_gizi_opd_id' => '25'])[0];
?>
		<tr>
			<th style="text-align: center; vertical-align: middle;" rowspan="3">No.</th>
			<th style="text-align: center; vertical-align: middle;" rowspan="3">Tanggal Pengukuran</th>
			<th style="text-align: center; vertical-align: middle;" rowspan="3">DTKS</th>
			<th style="text-align: center; vertical-align: middle;" rowspan="3">BB Anak</th>
			<th style="text-align: center; vertical-align: middle;" rowspan="3">TB Anak</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Anak Angkat</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Pengasuh Balita</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Day Care Stunting</th>
			<th style="text-align: center; vertical-align: middle;" colspan="9">Asupan Gizi (PMT)</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Imunisasi Anak</th>
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
		</tr>
		<tr>
			<td align="center"><?= $no++;?></td>
			<td><?= systemTanggalIndo($stunting->stunting_anak_tgl_ukur);?></td>
			<td align="center"><?= $stunting->stunting_anak_dtks == 'yes' ? '&#10004;' : '&nbsp;';?></td>
			<td align="left"><?= $stunting->stunting_anak_berat_badan;?></td>
			<td align="left"><?= $stunting->stunting_anak_tinggi_badan;?></td>
			<td align="center"><?= $stunting->stunting_anak_anak_angkat == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_anak_angkat_anggaran != null ? number_format($stunting->stunting_anak_anak_angkat_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting->stunting_anak_pengasuh_balita == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_pengasuh_balita_anggaran != null ? number_format($stunting->stunting_anak_pengasuh_balita_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting->stunting_anak_day_care == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_day_care_anggaran != null ? number_format($stunting->stunting_anak_day_care_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting->stunting_anak_asupan_gizi_pmt == 'yes' ? '&#10004;' : '-';?></td>

			<td align="center"><?= $stunting_dkk->asupan_gizi_opd == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting_dkk->asupan_gizi_opd_anggaran != null ? number_format($stunting_dkk->asupan_gizi_opd_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting_distapang->asupan_gizi_opd == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting_distapang->asupan_gizi_opd_anggaran != null ? number_format($stunting_distapang->asupan_gizi_opd_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting_disperikanan->asupan_gizi_opd == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting_disperikanan->asupan_gizi_opd_anggaran != null ? number_format($stunting_disperikanan->asupan_gizi_opd_anggaran, 0, ',', '.') : '-';?></td>

			<td align="center"><?= $stunting->stunting_anak_asupan_gizi_csr == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_asupan_gizi_csr_anggaran != null ? number_format($stunting->stunting_anak_asupan_gizi_csr_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting->stunting_anak_imunisasi == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_imunisasi_anggaran != null ? number_format($stunting->stunting_anak_imunisasi_anggaran, 0, ',', '.') : '-';?></td>
		</tr>
		<tr>
			<td colspan="7" rowspan="3"></td>
			<th style="text-align: center; vertical-align: middle;" colspan="2">Terapi Gizi</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">BPJS Stunting</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">Bantuan Sembako</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">Dashyat</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">RTLH</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">DLH</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">Akses Pangan / UMKM Lokal</th>
			<th style="text-align: center; vertical-align: middle;" rowspan="2">Mitra Lain</th>
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
		</tr>
		<tr>
			<td align="center"><?= $stunting->stunting_anak_terapi_gizi == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_terapi_gizi_anggaran != null ? number_format($stunting->stunting_anak_terapi_gizi_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting->stunting_anak_bpjs_stunting == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_bpjs_stunting_anggaran != null ? number_format($stunting->stunting_anak_bpjs_stunting_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting->stunting_anak_bantuan_sembako == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_bantuan_sembako_anggaran != null ? number_format($stunting->stunting_anak_bantuan_sembako_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting->stunting_anak_rtlh == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_rtlh_anggaran != null ? number_format($stunting->stunting_anak_rtlh_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting->stunting_anak_dlh == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_dlh_anggaran != null ? number_format($stunting->stunting_anak_dlh_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting->stunting_anak_akses_pangan == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_akses_pangan_anggaran != null ? number_format($stunting->stunting_anak_akses_pangan_anggaran, 0, ',', '.') : '-';?></td>
			<td align="center"><?= $stunting->stunting_anak_akses_pangan == 'yes' ? '&#10004;' : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_akses_pangan_anggaran != null ? number_format($stunting->stunting_anak_akses_pangan_anggaran, 0, ',', '.') : '-';?></td>
			<td align="right"><?= $stunting->stunting_anak_mitra_lain;?></td>
		</tr>
<?php
	}

	if(count($data_stunting) == 0){
?>
		<tr>
			<th style="text-align: center; vertical-align: middle;" rowspan="3">No.</th>
			<th style="text-align: center; vertical-align: middle;" rowspan="3">Tanggal Pengukuran</th>
			<th style="text-align: center; vertical-align: middle;" rowspan="3">DTKS</th>
			<th style="text-align: center; vertical-align: middle;" rowspan="3">BB Anak</th>
			<th style="text-align: center; vertical-align: middle;" rowspan="3">TB Anak</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Anak Angkat</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Pengasuh Balita</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Day Care Stunting</th>
			<th style="text-align: center; vertical-align: middle;" colspan="9">Asupan Gizi (PMT)</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2" rowspan="2">Imunisasi Anak</th>
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
		</tr>
		<tr>
			<td align="center">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="left">&nbsp;</td>
			<td align="left">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>

			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>

			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="7" rowspan="3"></td>
			<th style="text-align: center; vertical-align: middle;" colspan="2">Terapi Gizi</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">BPJS Stunting</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">Bantuan Sembako</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">Dashyat</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">RTLH</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">DLH</th>
			<th style="text-align: center; vertical-align: middle;" colspan="2">Akses Pangan / UMKM Lokal</th>
			<th style="text-align: center; vertical-align: middle;" rowspan="2">Mitra Lain</th>
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
		</tr>
		<tr>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="right">&nbsp;</td>
			<td align="right">&nbsp;</td>
		</tr>
<?php
	}
?>
	</table>
	<br/>
	<table  border="0" width="100%" style="border-collapse: collapse;">
		<tr>
			<th>DATA PERKEMBANGAN ANAK</th>
		</tr>
	</table>
	<table  border="1" width="100%" style="border-collapse: collapse; border: 1px solid black;">
		<tr>
			<th style="text-align: center; vertical-align: middle;">No.</th>
			<th style="text-align: center; vertical-align: middle;">Tanggal Perkembangan</th>
			<th style="text-align: center; vertical-align: middle;">Deskripsi Perkembangan</th>
			<th style="text-align: center; vertical-align: middle;">Foto Kegiatan</th>
			<th style="text-align: center; vertical-align: middle;">Indikasi Penyakit</th>
		</tr>
<?php
	$no = 1;
	foreach ($data_perkembangan['data'] as $perkembangan) {
?>
		<tr>
			<td><?=$no++;?></td>
			<td><?= systemTanggalIndo($perkembangan['tanggal_catat']);?></td>
			<td>
<?php
	$deskripsi = [];

	foreach ($perkembangan['deskripsi'] as $key => $value) {
		$deskripsi[] = '<b>'.cclang($key).'</b> : '.$value;
	}

	echo implode('<br/>', $deskripsi);
?>
			</td>
			<td><?= $perkembangan['foto_kegiatan'];?></td>
			<td><?= $perkembangan['indikasi_penyakit'];?></td>
		</tr>
<?php
	}

	if($data_perkembangan['success'] == false){
?>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
<?php
	}
?>
	</table>
	<br/>
	<table  border="0" width="100%" style="border-collapse: collapse;">
		<tr>
			<th>DATA INTREVENSI ANAK</th>
		</tr>
	</table>
	<table  border="1" width="100%" style="border-collapse: collapse; border: 1px solid black;">
<?php
	$no = 1;
	foreach ($data_intervensi as $intervensi) {
?>
		<tr>
			<th style="text-align: center; vertical-align: middle;">No.</th>
			<th style="text-align: center; vertical-align: middle;">Kecamatan</th>
			<th style="text-align: center; vertical-align: middle;">Kelurahan</th>
			<th style="text-align: center; vertical-align: middle;">Bulan</th>
			<th style="text-align: center; vertical-align: middle;">Tanggal Intervensi</th>
			<th style="text-align: center; vertical-align: middle;">Kondisi</th>
			<th style="text-align: center; vertical-align: middle;">Nama Orang Tua Asuh</th>
			<th style="text-align: center; vertical-align: middle;">Instansi Penginput</th>
		</tr>
		<tr>
			<td><?= $no++;?></td>
			<td><?= join_multi_select($intervensi->intervensi_kecamatan_id, 'kecamatans', 'kecamatan_id', 'kecamatan_nama');?></td>
			<td><?= join_multi_select($intervensi->intervensi_kelurahan_id, 'kelurahans', 'kelurahan_id', 'kelurahan_nama');?></td>
			<td><?= namaBulan($intervensi->intervensi_bulan).' '.$intervensi->intervensi_tahun;?></td>
			<td><?= systemTanggalIndo($intervensi->intervensi_tgl_masuk);?></td>
			<td><?= $intervensi->intervensi_kondisi;?></td>
			<td><?= $intervensi->intervensi_nama_ortu_asuh;?></td>
			<td rowspan="3"><?= $intervensi->nama_instansi_penginput;?></td>
		</tr>
		<tr>
			<th style="text-align: center; vertical-align: middle;" colspan="4" rowspan="2"></th>
			<th style="text-align: center; vertical-align: middle;">Tanggal Pasca Intervensi</th>
			<th style="text-align: center; vertical-align: middle;">Pasca Intervensi</th>
			<th style="text-align: center; vertical-align: middle;">Keterangan</th>
		</tr>
		<tr>
			<td><?= systemTanggalIndo($intervensi->intervensi_tgl_pasca);?></td>
			<td><?= $intervensi->intervensi_pasca;?></td>
			<td><?= $intervensi->intervensi_keterangan;?></td>
		</tr>
<?php
	}

	if (count($data_intervensi) == 0) {
?>
	<tr>
		<th style="text-align: center; vertical-align: middle;">No.</th>
		<th style="text-align: center; vertical-align: middle;">Kecamatan</th>
		<th style="text-align: center; vertical-align: middle;">Kelurahan</th>
		<th style="text-align: center; vertical-align: middle;">Bulan</th>
		<th style="text-align: center; vertical-align: middle;">Tanggal Intervensi</th>
		<th style="text-align: center; vertical-align: middle;">Kondisi</th>
		<th style="text-align: center; vertical-align: middle;">Nama Orang Tua Asuh</th>
		<th style="text-align: center; vertical-align: middle;">Instansi Penginput</th>
		<th style="text-align: center; vertical-align: middle;">Tanggal Pasca Intervensi</th>
		<th style="text-align: center; vertical-align: middle;">Pasca Intervensi</th>
		<th style="text-align: center; vertical-align: middle;">Keterangan</th>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
<?php
	}
?>
	</table>

	<script type="text/javascript">
		window.onload = function() { window.print(); }
	</script>
</body>
</html>