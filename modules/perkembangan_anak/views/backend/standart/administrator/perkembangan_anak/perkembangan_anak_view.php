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
			<div class="box box-warning">
				<div class="box-body">
					<div class="box box-widget widget-user-2">
						<div class="widget-user-header">
							<div class="widget-user-image">
								<img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
							</div>
							<h3 class="widget-user-username">Perkembangan Anak</h3>
							<h5 class="widget-user-desc">Detail Perkembangan Anak</h5>
							<hr>
						</div>


						<div class="form-horizontal form-step" name="form_perkembangan_anak"
							id="form_perkembangan_anak">

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">ID </label>

								<div class="col-sm-8">
									<span
										class="detail_group-perkembangan_id"><?= _ent($perkembangan_anak->perkembangan_id); ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Nama Anak </label>

								<div class="col-sm-8">
									<?= _ent($perkembangan_anak->data_anak_anak_nama); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Tanggal Perkembangan </label>

								<div class="col-sm-8">
									<span
										class="detail_group-perkembangan_tgl"><?= _ent($perkembangan_anak->perkembangan_tgl); ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Deskripsi Perkembangan </label>

								<div class="col-sm-8">
									<span
										class="detail_group-perkembangan_deskripsi"><?= _ent($perkembangan_anak->perkembangan_deskripsi); ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label"> Foto Kegiatan Perkembangan </label>
								<div class="col-sm-8">
									<?php if (!empty($perkembangan_anak->perkembangan_foto)): ?>
									<?php foreach (explode(',', $perkembangan_anak->perkembangan_foto) as $filename): ?>
									<?php if (is_image($perkembangan_anak->perkembangan_foto)): ?>
									<a class="fancybox" rel="group"
										href="<?= BASE_URL . 'uploads/perkembangan_anak/' . $filename; ?>">
										<img src="<?= BASE_URL . 'uploads/perkembangan_anak/' . $filename; ?>"
											class="image-responsive" alt="image perkembangan_anak"
											title="perkembangan_foto perkembangan_anak" width="40px">
									</a>
									<?php else: ?>
									<label>
										<a
											href="<?= BASE_URL . 'administrator/file/download/perkembangan_anak/' . $filename; ?>">
											<img src="<?= get_icon_file($filename); ?>" class="image-responsive"
												alt="image perkembangan_anak"
												title="perkembangan_foto <?= $filename; ?>" width="40px">
											<?= $filename ?>
										</a>
									</label>
									<?php endif; ?>
									<?php endforeach; ?>
									<?php endif; ?>
								</div>
							</div>


							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Indikasi Penyakit </label>

								<div class="col-sm-8">
									<span
										class="detail_group-perkembangan_indikasi"><?= _ent($perkembangan_anak->perkembangan_indikasi); ?></span>
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Keterangan </label>

								<div class="col-sm-8">
									<span
										class="detail_group-perkembangan_keterangan"><?= _ent($perkembangan_anak->perkembangan_keterangan); ?></span>
								</div>
							</div>

							<br>
							<br>




							<div class="view-nav">
								<?php is_allowed('perkembangan_anak_update', function() use ($perkembangan_anak){?>
								<a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back'
									title="edit perkembangan_anak (Ctrl+e)"
									href="<?= site_url('administrator/perkembangan_anak/edit/'.$perkembangan_anak->perkembangan_id); ?>"><i
										class="fa fa-edit"></i> <?= cclang('update', ['Perkembangan Anak']); ?> </a>
								<?php }) ?>
								<a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)"
									href="<?= site_url('administrator/perkembangan_anak/'); ?>"><i
										class="fa fa-undo"></i>
									<?= cclang('go_list_button', ['Perkembangan Anak']); ?></a>
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
			var perkembangan_anak_id = $('.detail_group-perkembangan_anak_id');
			var perkembangan_tgl = $('.detail_group-perkembangan_tgl');
			var perkembangan_deskripsi = $('.detail_group-perkembangan_deskripsi');
			var perkembangan_foto = $('.detail_group-perkembangan_foto');
			var perkembangan_indikasi = $('.detail_group-perkembangan_indikasi');
			var perkembangan_keterangan = $('.detail_group-perkembangan_keterangan');
		})()

	});
</script>