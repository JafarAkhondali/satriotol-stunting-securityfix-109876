<?= get_header(); ?>
<style type="text/css">
	.table td{
		text-align: justify;
	}

	.table tbody th{
		vertical-align: middle;
		font-size: 14pt;
	}

	tbody td a:hover{
		color: var(--tp-theme-1);
	}
</style>

<main>
    <!-- event area start -->
    <section class="event__area pt-115 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper-2 text-center mb-60">
                        <h3 class="section__title-2">Rencana Kegiatan Dinas Instansi</h3>
                    </div>
                </div>
            </div>
            <div class="row">
				<div class="col-md-12">
			<?php
				if (count($opds) > 0) {
			?>
					<div class="table-content table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Instansi</th>
									<th>Kegiatan</th>
								</tr>
							</thead>
							<tbody>
					<?php
						foreach ($opds as $dinas) {
					?>
								<tr>
									<th rowspan="<?php echo ($dinas->jumlah_kegiatan)+1;?>"><?php echo $dinas->opd_nama;?></th>
								</tr>
					<?php
							foreach ($rentan_opds as $kegiatan) {
								if ($dinas->opd_id == $kegiatan->opd_id) {
					?>
								<tr>
									<td><a href="<?php echo base_url().'rencana-kegiatan-dinas?id='.$kegiatan->rentan_opd_id;?>"><?php echo $kegiatan->rentan_opd_kegiatan;?> <i class="fa-light fa-arrow-up-right-from-square"></i></a></td>
								</tr>
					<?php
								}
							}
						}
					?>
							</tbody>
						</table>
					</div>
			<?php
				}else{
			?>
					
						<div class="error__content text-center">
							<div class="error__thumb m-img">
								<img src="<?= base_url();?>assets_stunting/img/error/file-not-found.webp" alt="">
							</div>
							<div class="error__content">
								<h3 class="error__title">Data Not Available</h3>
								<p>Oops! The data you are looking for does not available.</p>
							</div>
						</div>
			<?php
				}
			?>
				</div>
			</div>
        </div>
    </section>
    <!-- event area end -->
</main>
<?= get_footer(); ?>