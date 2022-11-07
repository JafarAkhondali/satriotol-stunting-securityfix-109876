<?php
	if (count($results) > 0) {
?>
<a href="<?= base_url().'uploads/lokus_years/'.$result->file_lokus;?>" target="blank" class="btn btn-danger mb-25">Lihat File</a>
<div class="table-content table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th class="product-price">Nama Kecamatan</th>
				<th class="cart-product-name">Nama Kelurahan</th>
			</tr>
		</thead>
		<tbody>
	<?php
		foreach ($results->result() as $result) {
	?>
			<tr>
				<td><?= $result->kecamatan_nama;?></td>
				<td><?= $result->kelurahan_nama;?></td>
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