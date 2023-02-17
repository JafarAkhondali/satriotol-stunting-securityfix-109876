<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
	function domo() {
		// Binding keys
		$('*').bind('keydown', 'Ctrl+s', function assets() {
			$('#btn_save').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+x', function assets() {
			$('#btn_cancel').trigger('click');
			return false;
		});

		$('*').bind('keydown', 'Ctrl+d', function assets() {
			$('.btn_save_back').trigger('click');
			return false;
		});
	}

	jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Data Stunting <small>Edit Data Stunting</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class=""><a href="<?= site_url('administrator/data_stunting'); ?>">Data Stunting</a></li>
		<li class="active">Edit</li>
	</ol>
</section>

<style>
	/* .group-puskesmas */
	.group-puskesmas {}

	.group-puskesmas .control-label {}

	.group-puskesmas .col-sm-8 {}

	.group-puskesmas .form-control {}

	.group-puskesmas .help-block {}

	/* end .group-puskesmas */



	/* .group-kecamatan */
	.group-kecamatan {}

	.group-kecamatan .control-label {}

	.group-kecamatan .col-sm-8 {}

	.group-kecamatan .form-control {}

	.group-kecamatan .help-block {}

	/* end .group-kecamatan */



	/* .group-kelurahan */
	.group-kelurahan {}

	.group-kelurahan .control-label {}

	.group-kelurahan .col-sm-8 {}

	.group-kelurahan .form-control {}

	.group-kelurahan .help-block {}

	/* end .group-kelurahan */



	/* .group-no_kk */
	.group-no_kk {}

	.group-no_kk .control-label {}

	.group-no_kk .col-sm-8 {}

	.group-no_kk .form-control {}

	.group-no_kk .help-block {}

	/* end .group-no_kk */



	/* .group-nik_anak */
	.group-nik_anak {}

	.group-nik_anak .control-label {}

	.group-nik_anak .col-sm-8 {}

	.group-nik_anak .form-control {}

	.group-nik_anak .help-block {}

	/* end .group-nik_anak */



	/* .group-nama_anak */
	.group-nama_anak {}

	.group-nama_anak .control-label {}

	.group-nama_anak .col-sm-8 {}

	.group-nama_anak .form-control {}

	.group-nama_anak .help-block {}

	/* end .group-nama_anak */



	/* .group-no_anak */
	.group-no_anak {}

	.group-no_anak .control-label {}

	.group-no_anak .col-sm-8 {}

	.group-no_anak .form-control {}

	.group-no_anak .help-block {}

	/* end .group-no_anak */



	/* .group-jenis_kel */
	.group-jenis_kel {}

	.group-jenis_kel .control-label {}

	.group-jenis_kel .col-sm-8 {}

	.group-jenis_kel .form-control {}

	.group-jenis_kel .help-block {}

	/* end .group-jenis_kel */



	/* .group-tanggal_lahir */
	.group-tanggal_lahir {}

	.group-tanggal_lahir .control-label {}

	.group-tanggal_lahir .col-sm-8 {}

	.group-tanggal_lahir .form-control {}

	.group-tanggal_lahir .help-block {}

	/* end .group-tanggal_lahir */



	/* .group-alamat */
	.group-alamat {}

	.group-alamat .control-label {}

	.group-alamat .col-sm-8 {}

	.group-alamat .form-control {}

	.group-alamat .help-block {}

	/* end .group-alamat */



	/* .group-rt */
	.group-rt {}

	.group-rt .control-label {}

	.group-rt .col-sm-8 {}

	.group-rt .form-control {}

	.group-rt .help-block {}

	/* end .group-rt */



	/* .group-rw */
	.group-rw {}

	.group-rw .control-label {}

	.group-rw .col-sm-8 {}

	.group-rw .form-control {}

	.group-rw .help-block {}

	/* end .group-rw */



	/* .group-nik_ayah */
	.group-nik_ayah {}

	.group-nik_ayah .control-label {}

	.group-nik_ayah .col-sm-8 {}

	.group-nik_ayah .form-control {}

	.group-nik_ayah .help-block {}

	/* end .group-nik_ayah */



	/* .group-nama_ayah */
	.group-nama_ayah {}

	.group-nama_ayah .control-label {}

	.group-nama_ayah .col-sm-8 {}

	.group-nama_ayah .form-control {}

	.group-nama_ayah .help-block {}

	/* end .group-nama_ayah */



	/* .group-nik_ibu */
	.group-nik_ibu {}

	.group-nik_ibu .control-label {}

	.group-nik_ibu .col-sm-8 {}

	.group-nik_ibu .form-control {}

	.group-nik_ibu .help-block {}

	/* end .group-nik_ibu */



	/* .group-nama_ibu */
	.group-nama_ibu {}

	.group-nama_ibu .control-label {}

	.group-nama_ibu .col-sm-8 {}

	.group-nama_ibu .form-control {}

	.group-nama_ibu .help-block {}

	/* end .group-nama_ibu */
</style>
<!-- Main content -->
<section class="content">
<?= form_open(base_url('administrator/data_stunting/edit_save/'.$this->uri->segment(4)), [
		'name' => 'form_data_stunting',
		// 'class' => 'form-horizontal form-step',
		'id' => 'form_data_stunting',
		'method' => 'POST'
	]);

	$user_groups = $this->model_group->get_user_group_ids();
?>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-danger box-solid">
						<div class="box-header">
							<h3 class="box-title">Puskesmas</h3>
						</div>
						<div class="box-body">
							<div class="form-group group-puskesmas">
								<label for="puskesmas" class="control-label">Puskesmas <i class="required">*</i></label>
								<select class="form-control chosen chosen-select-deselect" name="puskesmas" id="puskesmas" data-placeholder="Select Puskesmas">
									<option value=""></option>
									<?php foreach (db_get_all_data('puskesmas', $conditions) as $row): ?>
									<option <?= $row->puskesmas_id == $data_stunting->puskesmas ? 'selected' : ''; ?> value="<?= $row->puskesmas_id ?>"><?= $row->puskesmas_nama; ?></option>
									<?php endforeach; ?>
								</select>
								<small class="info help-block"></small>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-danger box-solid">
						<div class="box-header">
							<h3 class="box-title">Data Anak</h3>
						</div>
						<div class="box-body">
							<div class="form-group group-kecamatan">
								<label for="kecamatan" class="control-label">Kecamatan <i class="required">*</i></label>
								<select class="form-control chosen chosen-select-deselect" name="kecamatan" id="kecamatan" data-placeholder="Select Kecamatan">
									<option value=""></option>
									<?php foreach (db_get_all_data('kecamatans') as $row): ?>
									<option <?= $row->kecamatan_id == $data_stunting->kecamatan ? 'selected' : ''; ?> value="<?= $row->kecamatan_id ?>"><?= $row->kecamatan_nama; ?></option>
									<?php endforeach; ?>
								</select>
								<small class="info help-block"></small>
							</div>
							<div class="form-group group-kelurahan">
								<label for="kelurahan" class="control-label">Kelurahan <i class="required">*</i></label>
								<select class="form-control chosen chosen-select-deselect" name="kelurahan" id="kelurahan" data-placeholder="Select Kelurahan">
									<option value=""></option>
								</select>
								<small class="info help-block"></small>
							</div>
							<div class="form-group group-no_kk">
								<label for="no_kk" class="control-label">No. KK <i class="required">*</i></label>
								<input type="text" class="form-control" name="no_kk" id="no_kk" placeholder=""
									value="<?= set_value('no_kk', $data_stunting->no_kk); ?>">
								<small class="info help-block"></small>
							</div>
							<div class="form-group group-nik_anak">
								<label for="nik_anak" class="control-label">NIK Anak </label>
								<input type="text" class="form-control" name="nik_anak" id="nik_anak" placeholder=""
									value="<?= set_value('nik_anak', $data_stunting->nik_anak); ?>">
								<small class="info help-block"></small>
							</div>
							<div class="form-group group-nama_anak">
								<label for="nama_anak" class="control-label">Nama Anak <i class="required">*</i></label>
								<input type="text" class="form-control" name="nama_anak" id="nama_anak" placeholder="" value="<?= set_value('nama_anak', $data_stunting->nama_anak); ?>">
								<small class="info help-block"></small>
							</div>
							<div class="form-group group-no_anak">
								<label for="no_anak" class="control-label">Anak Ke- <i class="required">*</i></label>
								<input type="number" class="form-control" name="no_anak" id="no_anak" placeholder="" value="<?= set_value('no_anak', $data_stunting->no_anak); ?>">
								<small class="info help-block"></small>
							</div>
							<div class="form-group">
								<label for="jenis_kel" class="control-label">Jenis Kelamin <i class="required">*</i></label>
								<select class="form-control chosen chosen-select" name="jenis_kel" id="jenis_kel" data-placeholder="Select Jenis Kelamin">
									<option value=""></option>
									<option <?= $data_stunting->jenis_kel == "L" ? 'selected' :''; ?> value="L">Laki-Laki</option>
									<option <?= $data_stunting->jenis_kel == "P" ? 'selected' :''; ?> value="P">Perempuan</option>
								</select>
								<small class="info help-block"></small>
							</div>
							<div class="form-group group-tanggal_lahir">
								<label for="tanggal_lahir" class="control-label">Tanggal Lahir <i class="required">*</i></label>
								<div class="input-group date col-sm-8">
									<input type="text" class="form-control pull-right datepicker" name="tanggal_lahir" placeholder="" id="tanggal_lahir" value="<?= set_value('data_stunting_tanggal_lahir_name', $data_stunting->tanggal_lahir); ?>">
								</div>
								<small class="info help-block"></small>
							</div>
							<div class="form-group group-alamat">
								<label for="alamat" class="control-label">Alamat <i class="required">*</i></label>
								<input type="text" class="form-control" name="alamat" id="alamat" placeholder="" value="<?= set_value('alamat', $data_stunting->alamat); ?>">
								<small class="info help-block"></small>
							</div>
							<div class="form-group group-rt">
								<label for="rt" class="control-label">RT <i class="required">*</i></label>
								<input type="number" class="form-control" name="rt" id="rt" placeholder="" value="<?= set_value('rt', $data_stunting->rt); ?>">
								<small class="info help-block"></small>
							</div>
							<div class="form-group group-rw">
								<label for="rw" class="control-label">RW <i class="required">*</i></label>
								<input type="number" class="form-control" name="rw" id="rw" placeholder="" value="<?= set_value('rw', $data_stunting->rw); ?>">
								<small class="info help-block"></small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-danger box-solid">
				<div class="box-header">
					<h3 class="box-title">Data Orang Tua</h3>
				</div>
				<div class="box-body">
					<div class="form-group group-nik_ayah">
						<label for="nik_ayah" class="control-label">NIK Ayah </label>
						<input type="text" class="form-control" name="nik_ayah" id="nik_ayah" placeholder="" value="<?= set_value('nik_ayah', $data_stunting->nik_ayah); ?>">
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-nama_ayah">
						<label for="nama_ayah" class="control-label">Nama Ayah <i class="required">*</i></label>
						<input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="" value="<?= set_value('nama_ayah', $data_stunting->nama_ayah); ?>">
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-nik_ibu">
						<label for="nik_ibu" class="control-label">NIK Ibu </label>
						<input type="text" class="form-control" name="nik_ibu" id="nik_ibu" placeholder="" value="<?= set_value('nik_ibu', $data_stunting->nik_ibu); ?>">
						<small class="info help-block"></small>
					</div>
					<div class="form-group group-nama_ibu">
						<label for="nama_ibu" class="control-label">Nama Ibu <i class="required">*</i></label>
						<input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="" value="<?= set_value('nama_ibu', $data_stunting->nama_ibu); ?>">
						<small class="info help-block"></small>
					</div>

					<div class="message"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="box-footer">
		<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay'
			title="<?= cclang('save_button'); ?> (Ctrl+s)">
			<i class="fa fa-save"></i> <?= cclang('save_button'); ?>
		</button>
		<a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save"
			data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
			<i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
		</a>

		<a class="btn btn-flat btn-default btn_action" id="btn_cancel"
			title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
			<i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
		</a>
		<span class="loading loading-hide">
			<img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
			<i><?= cclang('loading_saving_data'); ?></i>
		</span>
	</div>
	<?= form_close(); ?>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
	$(document).ready(function () {
		window.event_submit_and_action = '';

		(function () {
			var puskesmas = $('#puskesmas');
			/* 
	puskesmas.on('change', function() {});
	*/
			var kecamatan = $('#kecamatan');
			var kelurahan = $('#kelurahan');
			var no_kk = $('#no_kk');
			var nik_anak = $('#nik_anak');
			var nama_anak = $('#nama_anak');
			var no_anak = $('#no_anak');
			var jenis_kel = $('#jenis_kel');
			var tanggal_lahir = $('#tanggal_lahir');
			var alamat = $('#alamat');
			var rt = $('#rt');
			var rw = $('#rw');
			var nik_ayah = $('#nik_ayah');
			var nama_ayah = $('#nama_ayah');
			var nik_ibu = $('#nik_ibu');
			var nama_ibu = $('#nama_ibu');

		})()







		$('#btn_cancel').click(function () {
			swal({
					title: "Are you sure?",
					text: "the data that you have created will be in the exhaust!",
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
						window.location.href = BASE_URL + 'administrator/data_stunting';
					}
				});

			return false;
		}); /*end btn cancel*/

		$('.btn_save').click(function () {
			$('.message').fadeOut();

			var form_data_stunting = $('#form_data_stunting');
			var data_post = form_data_stunting.serializeArray();
			var save_type = $(this).attr('data-stype');
			data_post.push({
				name: 'save_type',
				value: save_type
			});

			(function () {
				data_post.push({
					name: '_example',
					value: 'value_of_example',
				})
			})()


			data_post.push({
				name: 'event_submit_and_action',
				value: window.event_submit_and_action
			});

			$('.loading').show();

			$.ajax({
					url: form_data_stunting.attr('action'),
					type: 'POST',
					dataType: 'json',
					data: data_post,
				})
				.done(function (res) {
					$('form').find('.form-group').removeClass('has-error');
					$('form').find('.error-input').remove();
					$('.steps li').removeClass('error');
					if (res.success) {
						var id = $('#data_stunting_image_galery').find('li').attr('qq-file-id');
						if (save_type == 'back') {
							window.location.href = res.redirect;
							return;
						}

						$('.message').printMessage({
							message: res.message
						});
						$('.message').fadeIn();
						$('.data_file_uuid').val('');

					} else {
						if (res.errors) {
							parseErrorField(res.errors);
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





		function chained_kelurahan(selected, complete) {
			var val = $('#kecamatan').val();
			$.LoadingOverlay('show')
			return $.ajax({
					url: BASE_URL + '/administrator/data_stunting/ajax_kelurahan/' + val,
					dataType: 'JSON',
				})
				.done(function (res) {
					var html = '<option value=""></option>';
					$.each(res, function (index, val) {
						html += '<option ' + (selected == val.kelurahan_id ? 'selected' : '') +
							' value="' + val.kelurahan_id + '">' + val.kelurahan_nama + '</option>'
					});
					$('#kelurahan').html(html);
					$('#kelurahan').trigger('chosen:updated');
					if (typeof complete != 'undefined') {
						complete();
					}

				})
				.fail(function () {
					toastr['error']('Error', 'Getting data fail')
				})
				.always(function () {
					$.LoadingOverlay('hide')
				});
		}


		$('#kecamatan').change(function (event) {
			chained_kelurahan('')
		});

		async function chain() {
			await chained_kelurahan("<?= $data_stunting->kelurahan ?>");
		}

		chain();




	}); /*end doc ready*/
</script>