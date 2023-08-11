<section class="content-header">
	<h1>
		Data Stunting Anak <small><?= cclang('new', ['Data Stunting Anak']); ?> </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/data_stunting_anak'); ?>">Data Stunting Anak</a></li>
		<li class="active"><?= cclang('new'); ?></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning">
				<div class="box-body">
					<div class="box box-widget widget-user-2">
						<div class="widget-user-header">
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
							</div>
							<h3 class="widget-user-username">Data Stunting Anak</h3>
							<h5 class="widget-user-desc"><?= cclang('new', ['Data Stunting Anak']); ?></h5>
							<hr>
						</div>
						<?= form_open('', [
								'name' 		=> 'form_data_stunting_anak',
								'class' 	=> 'form-horizontal form-step',
								'id' 		=> 'form_data_stunting_anak',
								'enctype' 	=> 'multipart/form-data',
								'method' 	=> 'POST'
							]);

							$user_groups = $this->model_group->get_user_group_ids();
						?>
						<div class="form-group group-stunting_anak_anak_id">
							<label for="stunting_anak_anak_id" class="col-sm-2 control-label">Nama Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<label class="form-control"><?= join_multi_select($id_anak, 'data_anak', 'anak_id', 'anak_nik') != null ? strtoupper(join_multi_select($id_anak, 'data_anak', 'anak_id', 'anak_nik')) : '-';?></label>
							</div>
						</div>

						<div class="form-group group-stunting_anak_anak_id">
							<label for="stunting_anak_anak_id" class="col-sm-2 control-label">Nama Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<label class="form-control"><?= strtoupper(join_multi_select($id_anak, 'data_anak', 'anak_id', 'anak_nama'));?></label>
							</div>
						</div>

						<div class="form-group group-stunting_anak_dtks">
							<label for="stunting_anak_dtks" class="col-sm-2 control-label">DTKS <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_dtks" id="stunting_anak_dtks" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_dtks" id="stunting_anak_dtks" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_tgl_ukur">
							<label for="stunting_anak_tgl_ukur" class="col-sm-2 control-label">Tanggal Pengukuran <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="input-group date col-sm-8">
									<input type="number" class="form-control pull-right datepicker" name="stunting_anak_tgl_ukur" placeholder="Tanggal Pengukuran" id="stunting_anak_tgl_ukur">
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_berat_badan">
							<label for="stunting_anak_berat_badan" class="col-sm-2 control-label">Berat Badan Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_berat_badan" id="stunting_anak_berat_badan" placeholder="Berat Badan Anak" value="<?= set_value('stunting_anak_berat_badan', '0'); ?>">
								<small class="info help-block"><b>Satuan *cm</b></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_tinggi_badan">
							<label for="stunting_anak_tinggi_badan" class="col-sm-2 control-label">Tinggi Badan Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_tinggi_badan" id="stunting_anak_tinggi_badan" placeholder="Tinggi Badan Anak" value="<?= set_value('stunting_anak_tinggi_badan', '0'); ?>">
								<small class="info help-block"><b>Satuan *cm</b></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_anak_angkat">
							<label for="stunting_anak_anak_angkat" class="col-sm-2 control-label">Anak Angkat <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_anak_angkat" id="stunting_anak_anak_angkat" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_anak_angkat" id="stunting_anak_anak_angkat" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_anak_angkat_anggaran">
							<label for="stunting_anak_anak_angkat_anggaran" class="col-sm-2 control-label">Anggaran Anak Angkat <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_anak_angkat_anggaran" id="stunting_anak_anak_angkat_anggaran" placeholder="Anggaran Anak Angkat" value="<?= set_value('stunting_anak_anak_angkat_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_pengasuh_balita">
							<label for="stunting_anak_pengasuh_balita" class="col-sm-2 control-label">Pengasuh Balita <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_pengasuh_balita" id="stunting_anak_pengasuh_balita" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_pengasuh_balita" id="stunting_anak_pengasuh_balita" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_pengasuh_balita_anggaran">
							<label for="stunting_anak_pengasuh_balita_anggaran" class="col-sm-2 control-label">Anggaran Pengasuh Balita <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_pengasuh_balita_anggaran" id="stunting_anak_pengasuh_balita_anggaran" placeholder="Anggaran Pengasuh Balita" value="<?= set_value('stunting_anak_pengasuh_balita_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_day_care">
							<label for="stunting_anak_day_care" class="col-sm-2 control-label">Day Care Stunting <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_day_care" id="stunting_anak_day_care" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_day_care" id="stunting_anak_day_care" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_day_care_anggaran">
							<label for="stunting_anak_day_care_anggaran" class="col-sm-2 control-label">Anggaran Day Care Stunting <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_day_care_anggaran" id="stunting_anak_day_care_anggaran" placeholder="Anggaran Day Care Stunting" value="<?= set_value('stunting_anak_day_care_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_asupan_gizi_pmt">
							<label for="stunting_anak_asupan_gizi_pmt" class="col-sm-2 control-label">Asupan Gizi (PMT)<i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_asupan_gizi_pmt" id="stunting_anak_asupan_gizi_pmt" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_asupan_gizi_pmt" id="stunting_anak_asupan_gizi_pmt" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-asupan_gizi_opd">
							<label for="asupan_gizi_opd" class="col-sm-2 control-label">Asupan Gizi Instansi DKK<i class="required">*</i></label>
							<div class="col-sm-6">
								<input type="hidden" class="form-control" name="asupan_gizi_opd_id[0]" id="asupan_gizi_opd_id[0]" value="<?= set_value('asupan_gizi_opd_id', '11'); ?>">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="asupan_gizi_opd[0]" id="asupan_gizi_opd[0]" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="asupan_gizi_opd[0]" id="asupan_gizi_opd[0]" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-asupan_gizi_opd_anggaran">
							<label for="asupan_gizi_opd_anggaran" class="col-sm-2 control-label">Asupan Gizi Instansi DKK Anggaran<i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="asupan_gizi_opd_anggaran[0]" id="asupan_gizi_opd_anggaran" placeholder="Anggaran Asupan Gizi DKK" value="<?= set_value('asupan_gizi_opd_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-asupan_gizi_opd">
							<label for="asupan_gizi_opd" class="col-sm-2 control-label">Asupan Gizi Instansi DISTAPANG<i class="required">*</i></label>
							<div class="col-sm-6">
								<input type="hidden" class="form-control" name="asupan_gizi_opd_id[1]" id="asupan_gizi_opd_id[1]" value="<?= set_value('asupan_gizi_opd_id', '12'); ?>">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="asupan_gizi_opd[1]" id="asupan_gizi_opd[1]" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="asupan_gizi_opd[1]" id="asupan_gizi_opd[1]" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-asupan_gizi_opd_anggaran">
							<label for="asupan_gizi_opd_anggaran" class="col-sm-2 control-label">Asupan Gizi Instansi DISTAPANG Anggaran<i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="asupan_gizi_opd_anggaran[1]" id="asupan_gizi_opd_anggaran" placeholder="Anggaran Asupan Gizi DISTAPANG" value="<?= set_value('asupan_gizi_opd_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-asupan_gizi_opd">
							<label for="asupan_gizi_opd" class="col-sm-2 control-label">Asupan Gizi Instansi DISPERIKANAN<i class="required">*</i></label>
							<div class="col-sm-6">
								<input type="hidden" class="form-control" name="asupan_gizi_opd_id[2]" id="asupan_gizi_opd_id[2]" value="<?= set_value('asupan_gizi_opd_id', '25'); ?>">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="asupan_gizi_opd[2]" id="asupan_gizi_opd[2]" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="asupan_gizi_opd[2]" id="asupan_gizi_opd[2]" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-asupan_gizi_opd_anggaran">
							<label for="asupan_gizi_opd_anggaran" class="col-sm-2 control-label">Asupan Gizi Instansi DISPERIKANAN Anggaran<i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="asupan_gizi_opd_anggaran[2]" id="asupan_gizi_opd_anggaran" placeholder="Anggaran Asupan Gizi DISPERIKANAN" value="<?= set_value('asupan_gizi_opd_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_asupan_gizi_csr">
							<label for="stunting_anak_asupan_gizi_csr" class="col-sm-2 control-label">Asupan Gizi CSR <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_asupan_gizi_csr" id="stunting_anak_asupan_gizi_csr" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_asupan_gizi_csr" id="stunting_anak_asupan_gizi_csr" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_asupan_gizi_csr_anggaran">
							<label for="stunting_anak_asupan_gizi_csr_anggaran" class="col-sm-2 control-label">Asupan Gizi CSR <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_asupan_gizi_csr_anggaran" id="stunting_anak_asupan_gizi_csr_anggaran" placeholder="Anggaran Asupan Gizi CSR" value="<?= set_value('stunting_anak_asupan_gizi_csr_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_imunisasi">
							<label for="stunting_anak_imunisasi" class="col-sm-2 control-label">Imunisasi Anak <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_imunisasi" id="stunting_anak_imunisasi" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_imunisasi" id="stunting_anak_imunisasi" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_imunisasi_anggaran">
							<label for="stunting_anak_imunisasi_anggaran" class="col-sm-2 control-label">Anggaran Imunisasi Anak <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_imunisasi_anggaran" id="stunting_anak_imunisasi_anggaran" placeholder="Anggaran Imunisasi Anak" value="<?= set_value('stunting_anak_imunisasi_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_terapi_gizi">
							<label for="stunting_anak_terapi_gizi" class="col-sm-2 control-label">Terapi Gizi <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_terapi_gizi" id="stunting_anak_terapi_gizi" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_terapi_gizi" id="stunting_anak_terapi_gizi" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_terapi_gizi_anggaran">
							<label for="stunting_anak_terapi_gizi_anggaran" class="col-sm-2 control-label">Anggaran Terapi Gizi <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_terapi_gizi_anggaran" id="stunting_anak_terapi_gizi_anggaran" placeholder="Anggaran Terapi Gizi" value="<?= set_value('stunting_anak_terapi_gizi_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_bpjs_stunting">
							<label for="stunting_anak_bpjs_stunting" class="col-sm-2 control-label">BPJS Stunting <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_bpjs_stunting" id="stunting_anak_bpjs_stunting" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_bpjs_stunting" id="stunting_anak_bpjs_stunting" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_bpjs_stunting_anggaran">
							<label for="stunting_anak_bpjs_stunting_anggaran" class="col-sm-2 control-label">Anggaran BPJS Stunting <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_bpjs_stunting_anggaran" id="stunting_anak_bpjs_stunting_anggaran" placeholder="Anggaran BPJS Stunting" value="<?= set_value('stunting_anak_bpjs_stunting_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_bantuan_sembako">
							<label for="stunting_anak_bantuan_sembako" class="col-sm-2 control-label">Bantuan Sembako <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_bantuan_sembako" id="stunting_anak_bantuan_sembako" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_bantuan_sembako" id="stunting_anak_bantuan_sembako" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_bantuan_sembako_anggaran">
							<label for="stunting_anak_bantuan_sembako_anggaran" class="col-sm-2 control-label">Anggaran Bantuan Sembako <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_bantuan_sembako_anggaran" id="stunting_anak_bantuan_sembako_anggaran" placeholder="Anggaran Bantuan Sembako" value="<?= set_value('stunting_anak_bantuan_sembako_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_dahsyat">
							<label for="stunting_anak_dahsyat" class="col-sm-2 control-label">Dahsyat <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_dahsyat" id="stunting_anak_dahsyat" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_dahsyat" id="stunting_anak_dahsyat" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_dahsyat_anggaran">
							<label for="stunting_anak_dahsyat_anggaran" class="col-sm-2 control-label">Anggaran Dahsyat
								<i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_dahsyat_anggaran" id="stunting_anak_dahsyat_anggaran" placeholder="Anggaran Dahsyat" value="<?= set_value('stunting_anak_dahsyat_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_rtlh">
							<label for="stunting_anak_rtlh" class="col-sm-2 control-label">RTLH <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_rtlh" id="stunting_anak_rtlh" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_rtlh" id="stunting_anak_rtlh" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_rtlh_anggaran">
							<label for="stunting_anak_rtlh_anggaran" class="col-sm-2 control-label">Anggaran RTLH <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_rtlh_anggaran" id="stunting_anak_rtlh_anggaran" placeholder="Anggaran RTLH" value="<?= set_value('stunting_anak_rtlh_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_dlh">
							<label for="stunting_anak_dlh" class="col-sm-2 control-label">DLH <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_dlh" id="stunting_anak_dlh" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_dlh" id="stunting_anak_dlh" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_dlh_anggaran">
							<label for="stunting_anak_dlh_anggaran" class="col-sm-2 control-label">Anggaran DLH <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_dlh_anggaran" id="stunting_anak_dlh_anggaran" placeholder="Anggaran DLH" value="<?= set_value('stunting_anak_dlh_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_akses_pangan">
							<label for="stunting_anak_akses_pangan" class="col-sm-2 control-label">Akses Pangan / UMKM Lokal <i class="required">*</i></label>
							<div class="col-sm-6">
								<div class="col-md-2 padding-left-0">
									<label><input type="radio" class="flat-red" name="stunting_anak_akses_pangan" id="stunting_anak_akses_pangan" value="yes"><?= cclang('yes'); ?></label>
								</div>
								<div class="col-md-14">
									<label><input type="radio" class="flat-red" name="stunting_anak_akses_pangan" id="stunting_anak_akses_pangan" value="no"><?= cclang('no'); ?></label>
								</div>
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_akses_pangan_anggaran">
							<label for="stunting_anak_akses_pangan_anggaran" class="col-sm-2 control-label">Anggaran Akses Pangan / UMKM Lokal <i class="required">*</i></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="stunting_anak_akses_pangan_anggaran" id="stunting_anak_akses_pangan_anggaran" placeholder="Anggaran Akses Pangan / UMKM Lokal" value="<?= set_value('stunting_anak_akses_pangan_anggaran', '0'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="form-group group-stunting_anak_mitra_lain">
							<label for="stunting_anak_mitra_lain" class="col-sm-2 control-label">Mitra Lain </label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="stunting_anak_mitra_lain" id="stunting_anak_mitra_lain" placeholder="Mitra Lain" value="<?= set_value('stunting_anak_mitra_lain'); ?>">
								<small class="info help-block"></small>
							</div>
						</div>

						<div class="message"></div>

						<div class="row-fluid col-md-7 container-button-bottom">
							<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
								<i class="fa fa-save"></i> <?= cclang('save_button'); ?>
							</button>
							<a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
								<i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
							</a>

							<a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
								<i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
							</a>

							<span class="loading loading-hide">
								<img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
								<i><?= cclang('loading_saving_data'); ?></i>
							</span>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		window.event_submit_and_action = '';

		$('#asupan_gizi_opd_anggaran, #stunting_anak_anak_angkat_anggaran, #stunting_anak_pengasuh_balita_anggaran, #stunting_anak_day_care_anggaran, #stunting_anak_imunisasi_anggaran, #stunting_anak_terapi_gizi_anggaran, #stunting_anak_bpjs_stunting_anggaran, #stunting_anak_bantuan_sembako_anggaran, #stunting_anak_dahsyat_anggaran, #stunting_anak_rtlh_anggaran, #stunting_anak_dlh_anggaran, #stunting_anak_akses_pangan_anggaran').maskMoney({
			thousands: ".",
			decimal: ",",
			precision: 0,
		});

		$('#btn_cancel').click(function () {
			swal({
				title: "<?= cclang('are_you_sure'); ?>",
				text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes!",
				cancelButtonText: "No!",
				closeOnConfirm: true,
				closeOnCancel: true
			},
			function (isConfirm) {
				if (isConfirm) {
					window.location.href = BASE_URL + 'administrator/data_stunting_anak/view_stunting?anak=<?= $id_anak;?>';
				}
			});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_data_stunting_anak = $('#form_data_stunting_anak');
			var data_post = form_data_stunting_anak.serializeArray();
			var save_type = $(this).attr('data-stype');

			data_post.push({
				name: 'save_type',
				value: save_type
			});

			data_post.push({
				name: 'event_submit_and_action',
				value: window.event_submit_and_action
			});

			$('.loading').show();

			$.ajax({
				url: BASE_URL + 'administrator/data_stunting_anak/add_save_stunting?anak=<?= $id_anak;?>',
				type: 'POST',
				dataType: 'json',
				data: data_post,
			})
			.done(function (res) {
				$('form').find('.form-group').removeClass('has-error');
				$('.steps li').removeClass('error');
				$('form').find('.error-input').remove();
				if (res.success) {
					if (save_type == 'back') {
						window.location.href = res.redirect;
						return;
					}

					$('.message').printMessage({
						message: res.message
					});
					$('.message').fadeIn();
					resetForm();
					$('.chosen option').prop('selected', false).trigger('chosen:updated');
				} else {
					if (res.errors) {
						$.each(res.errors, function (index, val) {
							$('form #' + index).parents('.form-group').addClass('has-error');
							$('form #' + index).parents('.form-group').find('small')
								.prepend(`<div class="error-input">` + val + `</div>`);
						});
						$('.steps li').removeClass('error');
						$('.content section').each(function (index, el) {
							if ($(this).find('.has-error').length) {
								$('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
							}
						});
					}
					$('.message').printMessage({
						message: res.message,
						type: 'warning'
					});
				}
			})
			.fail(function () {
				$('.message').printMessage({
					message: 'Error save data',
					type: 'warning'
				});
			})
			.always(function () {
				$('.loading').hide();
				$('html, body').animate({
					scrollTop: $(document).height()
				}, 2000);
			});

			return false;
		}); /*end btn save*/
	}); /*end doc ready*/
</script>