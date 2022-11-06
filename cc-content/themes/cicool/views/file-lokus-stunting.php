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
		echo "Data Tidak Ada !";
	}
?>