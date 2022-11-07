<?php
	if (count($results) > 0) {
?>
<div class="table-content table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th class="cart-product-name">Nama Kelurahan</th>
				<th class="product-price">Tahun</th>
				<th class="product-quantity">File</th>
			</tr>
		</thead>
		<tbody>
	<?php
		foreach ($results as $result) {
	?>
			<tr>
				<td><?= $result->kelurahan_nama;?></td>
				<td><?= $result->lokus_year_nama;?></td>
				<td><a href="<?= base_url().'uploads/lokus_years/'.$result->file_lokus;?>" target="blank">Lihat File</a></td>
			</tr>
	<?php
		}
	?>
		</tbody>
	</table>
</div>
<?php
	}else{
?>
		<section class="error__area">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xxl-8">
						<div class="error__content text-center">
							<div class="error__thumb m-img">
								<img src="<?= base_url();?>assets_stunting/img/error/file-not-found.webp" alt="">
							</div>
							<div class="error__content">
								<h3 class="error__title">Data Not Available</h3>
								<p>Oops! The data you are looking for does not available.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php
	}
?>