<?= get_header(); ?>
<main>
	<!-- event area start -->
	<section class="event__area pt-115 p-relative">
		<div class="page__title-shape">
			<img class="page-title-shape-5 d-none d-sm-block" src="<?php echo base_url();?>assets_stunting/img/breadcrumb/page-title-shape-1.png" alt="">
			<img class="page-title-shape-6" src="<?php echo base_url();?>assets_stunting/img/breadcrumb/page-title-shape-2.png" alt="">
			<img class="page-title-shape-7" src="<?php echo base_url();?>assets_stunting/img/breadcrumb/page-title-shape-4.png" alt="">
			<img class="page-title-shape-8" src="<?php echo base_url();?>assets_stunting/img/breadcrumb/page-title-shape-5.png" alt="">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="event__wrapper">
						<div class="page__title-content mb-25">
							<h5 class="breadcrumb__title-2">RENCANA KEGIATAN</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- event area end -->

	<!-- event details area start -->
	<section class="event__area pb-110">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12 col-xl-12 col-lg-12">
					<div class="event__details mb-35">
                        <h3>Definisi</h3>
						<?= $rencana->rencana_kegiatan_definisi;?>
					</div>
					<div class="event__details mb-35">
                        <h3>Tujuan</h3>
						<?= $rencana->rencana_kegiatan_tujuan;?>
					</div>
					<div class="event__details mb-35">
                        <h3>Output</h3>
						<?= $rencana->rencana_kegiatan_output;?>
					</div>
					<div class="event__allow mb-40">
						<h3>Rencana Kegiatan Meliputi:</h3>
						<?= $rencana->rencana_kegiatan_meliputi;?>
					</div>
					<div class="event__allow mb-40">
						<h3>Peran OPD Kota Semarang dalam Aksi :</h3>
						<?= $rencana->rencana_kegiatan_peran_opd;?>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<!-- event details area end -->
</main>
<?= get_footer(); ?>