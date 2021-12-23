<main role="main" class="container">
	<?php $this->load->view('layouts/_alert') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card mb-3">
				<div class="card-header">
					<h5>Keranjang Belanja</h5>
				</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>Produk</th>
								<th>Harga</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center">Subtotal</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($content as $row) : ?>
								<tr>
									<td>
										<p>
											<img src="<?= $row->image ? base_url("/images/product/$row->image") : 	base_url("/images/product/default.png"); ?>" alt="" height="50" />
											<strong><?= $row->title ?></strong>
										</p>
									</td>
									<td>Rp. <?= number_format($row->price, 0, ',', '.') ?>,-</td>
									<td>
										<form action="<?= base_url("cart/update/$row->id") ?>" method="POST">
											<input type="hidden" name="id" value="<?= $row->id ?>">
											<div class="input-group">
												<input name="qty" type="number" class="form-control text-center" value="<?= $row->qty ?>" />
												<div class="input-group-append">
													<button class="btn btn-info" type="submit">
														<i class="fas fa-check"></i>
													</button>
												</div>
											</div>
										</form>
									</td>
									<td class="text-center">Rp. <?= number_format($row->subtotal, 0, ',', '.'); ?>,-</td>
									<td>
										<form action="<?= base_url("cart/delete/$row->id") ?>" method="POST">
											<input type="hidden" name="id" value="<?= $row->id ?>">
											<button class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus?')">
												<i class="fas fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>
							<?php endforeach; ?>
							<tr>
								<td colspan="3"><strong>Total:</strong></td>
								<td class="text-center"><strong>Rp. <?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.'); ?>,-</strong></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('/checkout') ?>" class="btn btn-success float-right">Checkout <i class="fas fa-angle-right"></i></a>
					<a href="<?= base_url('/') ?>" class="btn btn-warning text-white"><i class="fas fa-angle-left"></i> Kembali belanja</a>
				</div>
			</div>
		</div>
	</div>
</main>
