<?= get_header(); ?>
<main>
	<!-- event area start -->
	<section class="event__area pt-115 pb-115">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="section__title-wrapper-2 text-center mb-60">
						<h3 class="section__title-2">FAQ</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="accordion" id="faqaccordion">
					<?php
						$no = '1';
						foreach ($faqs as $faq) {
					?>
					<div class="accordion-item">
						<h2 class="accordion-header" id="faq<?= $no; ?>">
							<button class="accordion-button <?= $no != '1' ?  'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $no; ?>" aria-expanded="true" aria-controls="collapse<?= $no; ?>">
								<?= $faq->faq_question; ?>
							</button>
						</h2>
						<div id="collapse<?= $no; ?>" class="accordion-collapse collapse <?= $no == '1' ?  'show' : ''; ?>" aria-labelledby="faq<?= $no; ?>" data-bs-parent="#faqaccordion">
							<div class="accordion-body">
								<p><?= $faq->faq_answer; ?></p>
							</div>
						</div>
					</div>
					<?php
							$no++;
						}
					?>

				</div>
			</div>
		</div>
	</section>
	<!-- event area end -->
</main>
<?= get_footer(); ?>