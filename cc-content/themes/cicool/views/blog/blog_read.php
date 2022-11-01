<?= get_header(); ?>
<main>
	<!-- blog area start -->
	<section class="blog__area pt-120 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-xxl-8 col-xl-8 col-lg-8">
					<div class="postbox__wrapper postbox__details pr-20">
						<div class="postbox__item transition-3 mb-70">
							<div class="postbox__thumb m-img">
						<?php
							if (!empty($blog->image)) {
								$file = FCPATH . 'uploads/blog/' . $blog->image;

								if (is_image($blog->image)) {
									if (file_exists($file)) {
										echo '<img src="' . base_url() . 'uploads/blog/' . $blog->image . '" alt="">';
									} else {
										$titlenya = str_replace(' ', '+', $blog->title);

										echo '<img src="https://via.placeholder.com/760x405.png?text=' . $titlenya . '" alt="">';
									}
								} else {
									$titlenya = str_replace(' ', '+', $blog->title);

									echo '<img src="https://via.placeholder.com/760x405.png?text=' . $titlenya . '" alt="">';
								}
							} else {
								$titlenya = str_replace(' ', '+', $blog->title);

								echo '<img src="https://via.placeholder.com/760x405.png?text=' . $titlenya . '" alt="">';
							}
						?>
							</div>
							<div class="postbox__content">
								<div class="postbox__meta">
									<span>
										<i class="far fa-calendar-check"></i>
								<?php
									if (strtotime($blog->updated_at) != strtotime('0000-00-00 00:00:00')) {
										echo date('M d, y', strtotime($blog->updated_at));
									}else{
										echo date('M d, y', strtotime($blog->created_at));
									}
								?>
									</span>
									<span><i class="far fa-user"></i><?= $blog->user_username;?></span>
									<span><i class="fal fa-eye"></i> <?= $blog->viewers;?></span>
									<span><a href="<?= base_url().'blog/category/'.$blog->id_kategori;?>"><i class="fal fa-bookmark"></i> <?= $blog->nama_kategori;?></a></span>
								</div>
								<h3 class="postbox__title"><?= $title;?></h3>
								<div class="postbox__text mb-40">
									<?= $blog->content;?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xxl-4 col-xl-4 col-lg-4">
					<div class="blog__sidebar pl-30">
						<div class="sidebar__widget mb-60">
							<div class="sidebar__widget-content">
								<div class="sidebar__search p-relative">
									<form action="" method="get" id="form-blog-search">
										<input type="text" name="q" placeholder="Cari sesuatu disini...">
										<button type="button" onclick="$('#form-blog-search').submit();"><i class="fa fa-search"></i></button>
									</form>
								</div>
							</div>
						</div>
				<?php
					if (count($related) > 1) {
				?>
						<div class="sidebar__widget mb-55">
							<div class="sidebar__widget-head mb-35">
								<h3 class="sidebar__widget-title">Berita Terkait</h3>
							</div>
							<div class="sidebar__widget-content">
								<div class="rc__post-wrapper">
							<?php
								foreach ($related as $terkait) {
									if ($terkait->id != $blog->id) {
							?>
								<div class="rc__post d-flex align-items-start">
									<div class="rc__thumb mr-20">
										<a href="blog-details.html">
								<?php
									if (!empty($terkait->image)) {
										$file = FCPATH . 'uploads/blog/' . $terkait->image;

										if (is_image($terkait->image)) {
											if (file_exists($file)) {
												echo '<img src="' . base_url() . 'uploads/blog/' . $terkait->image . '" alt="'.$terkait->title.'">';
											} else {
												echo '<img src="https://via.placeholder.com/74x70.png?text=NO+IMAGE" alt="'.$terkait->title.'">';
											}
										} else {
											echo '<img src="https://via.placeholder.com/74x70.png?text=NO+IMAGE" alt="'.$terkait->title.'">';
										}
									} else {
										echo '<img src="https://via.placeholder.com/74x70.png?text=NO+IMAGE" alt="'.$terkait->title.'">';
									}
								?>
										</a>
									</div>
									<div class="rc__content">
										<div class="rc__meta">
											<span><?= date('M d, y', strtotime($terkait->created_at));?></span>
										</div>
										<h6 class="rc__title">
											<a href="<?= base_url() . 'blog/' . $terkait->slug;?>">
										<?php
											if (strlen($terkait->title) < 30) {
												echo $terkait->title;
											} else {
												echo substr($terkait->title, 0, 30) . '...';
											}
										?>
											</a>
										</h6>
									</div>
								</div>
							<?php
									}
								}
							?>
								</div>
							</div>
						</div>
				<?php
					}

					if (count($categories) > 0) {
				?>
					<div class="sidebar__widget mb-55">
						<div class="sidebar__widget-head mb-35">
							<h3 class="sidebar__widget-title">Category</h3>
						</div>
						<div class="sidebar__widget-content">
							<ul>
						<?php
							foreach ($categories as $category) {
								echo '<li><a href="'.base_url().'blog/category/'.$category->id_kategori.'">'.$category->nama_kategori.' ('.$category->jumlah.')</a></li>';
							}
						?>
							</ul>
						</div>
					</div>
				<?php
					}
				?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- blog area end -->

</main>
<?= get_footer(); ?>