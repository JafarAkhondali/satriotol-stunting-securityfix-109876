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
							<h5 class="widget-user-desc">Detail Perkembangan Anak</h5>
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
							<td><?= $data_anak['nik_anak'] != null ? $data_anak['nik_anak'] : '-';?></td>
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
							<th>Umur Anak</th>
							<td><?= $data_anak['usia'];?></td>
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
						<tr>
							<th>Nama Ibu Kandung</th>
							<td><?= $data_anak['nama_ibu'] != null ? $data_anak['nama_ibu'] : '-';?></td>
						</tr>
					</table>
				</div>
				<div class="box-footer">
					<div class="row-fluid">
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/data_anak/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Data Anak']); ?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Detail Perkembangan Anak</h3>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped dataTable">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tanggal Perkembangan</th>
									<th>Deskripsi Perkembangan</th>
									<th>Foto Kegiatan</th>
									<th>Indikasi Penyakit</th>
								</tr>
							</thead>
							<tbody>
						<?php
	$no = '1';

	if ($data_perkembangan['success'] == true) {
		foreach ($data_perkembangan['data'] as $item) {
			$deskripsi = [];

			foreach ($item['deskripsi'] as $key => $value) {
				$deskripsi[] = '<b>'.cclang($key).'</b> : '.$value;
			}
						?>
								<tr>
									<td><?= $no++;?>.</td>
									<td><?= systemTanggalIndo($item['tanggal_catat']);?></td>
									<td><?= implode('<br/>', $deskripsi);;?></td>
									<td>
							<?php
								foreach (explode(',', $item['foto_kegiatan']) as $file):
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
									<td><?= $item['indikasi_penyakit'];?></td>
								</tr>
						<?php
		}
	}else {
?>
	<tr>
		<th colspan="100"><label class="label label-danger center">Error : <?= $data_perkembangan['message'];?></label></th>
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