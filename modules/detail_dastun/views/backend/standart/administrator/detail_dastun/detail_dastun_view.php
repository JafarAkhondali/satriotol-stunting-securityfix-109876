<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
	//This page is a result of an autogenerated content made by running test.html with firefox.
	function domo() {
		// Binding keys
		$('*').bind('keydown', 'Ctrl+e', function assets() {
			$('#btn_edit').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+x', function assets() {
			$('#btn_back').trigger('click');
			return false;
		});
	}

	jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Data Stunting <small><?= cclang('detail', ['Data Stunting']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/detail_dastun'); ?>">Data Stunting</a></li>
		<li class="active"><?= cclang('detail'); ?></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-body">
					<!-- Widget: user widget style 1 -->
					<div class="box box-widget widget-user-2">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header">

							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username">Data Stunting</h3>
							<h5 class="widget-user-desc">Detail Data Stunting</h5>
							<hr>
						</div>

						<div class="form-horizontal form-step" name="form_detail_dastun" id="form_detail_dastun">
							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">NIK </label>
								<div class="col-sm-8">
									<span class="detail_group-detail_data_stunting_id"><?= _ent($detail_dastun->data_warga_dawar_nik); ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Nama Data Warga </label>
								<div class="col-sm-8">
									<?= _ent($detail_dastun->data_warga_dawar_nama_lengkap); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Ibu Hamil </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_ibu_hamil"><?= _ent($detail_dastun->detail_data_stunting_ibu_hamil) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Tablet Tambah Darah Remaja </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_tambah_darah"><?= _ent($detail_dastun->detail_data_stunting_tambah_darah) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">SCRENING ANEMIA </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_screening_anemia"><?= _ent($detail_dastun->detail_data_stunting_screening_anemia) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">KESPRO </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_kespro"><?= _ent($detail_dastun->detail_data_stunting_kespro) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">KELAS CATIN </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_kelas_catin"><?= _ent($detail_dastun->detail_data_stunting_kelas_catin) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">USG </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_usg"><?= _ent($detail_dastun->detail_data_stunting_usg) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">POSYANDU </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_posyandu"><?= _ent($detail_dastun->detail_data_stunting_posyandu) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">ASI EKSCLUSIF </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_asi_ekslusif"><?= _ent($detail_dastun->detail_data_stunting_asi_ekslusif) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">MPASI </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_mpasi"><?= _ent($detail_dastun->detail_data_stunting_mpasi) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">SDIDTK </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_sdidtk"><?= _ent($detail_dastun->detail_data_stunting_sdidtk) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Anak Angkat CSR </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_anak_angkat_csr"><?= _ent($detail_dastun->detail_data_stunting_anak_angkat_csr) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Pengasuh Balita </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_pengasuh_balita"><?= _ent($detail_dastun->detail_data_stunting_pengasuh_balita) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Asupan Gizi </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_asupan_gizi"><?= _ent($detail_dastun->detail_data_stunting_asupan_gizi) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Imunisasi </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_imunisasi"><?= _ent($detail_dastun->detail_data_stunting_imunisasi) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Terapi Masalah Gizi </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_terapi_gizi"><?= _ent($detail_dastun->detail_data_stunting_terapi_gizi) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">BPJS Stunting </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_bpjs_stunting"><?= _ent($detail_dastun->detail_data_stunting_bpjs_stunting) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Bantuan Sembako </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_bantuan_sembako"><?= _ent($detail_dastun->detail_data_stunting_bantuan_sembako) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Dahsyat </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_dahsyat"><?= _ent($detail_dastun->detail_data_stunting_dahsyat) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">RTLH </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_rtlh"><?= _ent($detail_dastun->detail_data_stunting_rtlh) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Air Bersih </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_air_bersih"><?= _ent($detail_dastun->detail_data_stunting_air_bersih) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">AKSES PANGAN LOKAL </label>

								<div class="col-sm-8">
									<span
										class="detail_group-detail_data_stunting_akses_pangan"><?= _ent($detail_dastun->detail_data_stunting_akses_pangan) == 'Y' ? 'Ya':'Tidak'; ?></span>
								</div>
							</div>

							<br>
							<br>




							<div class="view-nav">
								<?php is_allowed('detail_dastun_update', function() use ($detail_dastun){?>
								<a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back'
									title="edit detail_dastun (Ctrl+e)"
									href="<?= site_url('administrator/detail_dastun/edit/'.$detail_dastun->detail_data_stunting_id); ?>"><i
										class="fa fa-edit"></i> <?= cclang('update', ['Detail Dastun']); ?> </a>
								<?php }) ?>
								<a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)"
									href="<?= site_url('administrator/detail_dastun/'); ?>"><i class="fa fa-undo"></i>
									<?= cclang('go_list_button', ['Detail Dastun']); ?></a>
							</div>

						</div>
					</div>
				</div>
				<!--/box body -->
			</div>
			<!--/box -->

		</div>
	</div>
</section>
<!-- /.content -->

<script>
	$(document).ready(function () {
		(function () {
			var detail_data_stunting_dawar_id = $('.detail_group-detail_data_stunting_dawar_id');
		})()

	});
</script>