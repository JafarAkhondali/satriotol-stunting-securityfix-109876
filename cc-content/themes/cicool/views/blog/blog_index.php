<?= get_header(); ?>
<main>
	<!-- blog area start -->
	<section class="blog__area pt-120 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-xxl-8 col-xl-8 col-lg-8">
					<div class="postbox__wrapper pr-20">
					<?php
						foreach ($blogs as $blog) {
					?>
						<article class="postbox__item format-image mb-50 transition-3">
							<div class="postbox__thumb w-img">
							<a href="<?= base_url() . 'blog/' . $blog->slug; ?>">
					<?php
						if (!empty($blog->image)) {
							$file = FCPATH . 'uploads/blog/' . $blog->image;

							if (is_image($blog->image)) {
								if (file_exists($file)) {
									echo '<img src="' . base_url() . 'uploads/blog/' . $blog->image . '" alt="">';
								} else {
									$title = str_replace(' ', '+', $blog->title);

									echo '<img src="https://via.placeholder.com/760x405.png?text=' . $title . '" alt="">';
								}
							} else {
								$title = str_replace(' ', '+', $blog->title);

								echo '<img src="https://via.placeholder.com/760x405.png?text=' . $title . '" alt="">';
							}
						} else {
							$title = str_replace(' ', '+', $blog->title);

							echo '<img src="https://via.placeholder.com/760x405.png?text=' . $title . '" alt="">';
						}
					?>
								</a>
							</div>
							<div class="postbox__content">
								<div class="postbox__meta">
									<span><i class="far fa-calendar-check"></i> <?php echo date('d M Y', strtotime($blog->created_at));?> </span>
									<span><a href="javascript:void(0);"><i class="far fa-user"></i> <?php echo $blog->user_username;?></a></span>
									<span><a href="<?php echo base_url().'blog/category/'.$blog->category_id;?>"><i class="far fa-bookmark"></i> <?php echo $blog->category_name;?></a></span>
								</div>
								<h3 class="postbox__title">
								<a href="<?= base_url() . 'blog/' . $blog->slug; ?>"><?php echo $blog->title;?></a>
								</h3>
								<div class="postbox__text">
									<p>
								<?php
									if (strlen($blog->content) < 250) {
										echo $blog->content;
									} else {
										echo substr($blog->content, 0, 250) . ' [...]';
									}
								?>
									</p>
								</div>
								<div class="postbox__read-more">
									<a href="<?= base_url() . 'blog/' . $blog->slug; ?>" class="tp-btn">Baca Selengkapnya</a>
								</div>
							</div>
						</article>
					<?php
						}
					?>
						<div class="basic-pagination">
							<?= $pagination;?>
						</div>
					</div>
				</div>
				<div class="col-xxl-4 col-xl-4 col-lg-4">
					<div class="blog__sidebar pl-70">
						<div class="sidebar__widget mb-60">
							<div class="sidebar__widget-content">
								<div class="sidebar__search p-relative">
									<form action="" method="get" id="form-blog-search">
										<input type="text" name="q" placeholder="Cari Sesuatu Disini..." value="<?= $this->input->get('q');?>">
										<button type="button" onclick="$('#form-blog-search').submit();">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 584.4 584.4" style="enable-background:new 0 0 584.4 584.4;" xml:space="preserve">
												<g>
													<g>
														<path class="st0" d="M565.7,474.9l-61.1-61.1c-3.8-3.8-8.8-5.9-13.9-5.9c-6.3,0-12.1,3-15.9,8.3c-16.3,22.4-36,42.1-58.4,58.4    c-4.8,3.5-7.8,8.8-8.3,14.5c-0.4,5.6,1.7,11.3,5.8,15.4l61.1,61.1c12.1,12.1,28.2,18.8,45.4,18.8c17.1,0,33.3-6.7,45.4-18.8    C590.7,540.6,590.7,499.9,565.7,474.9z" />
														<path class="st1" d="M254.6,509.1c140.4,0,254.5-114.2,254.5-254.5C509.1,114.2,394.9,0,254.6,0C114.2,0,0,114.2,0,254.5    C0,394.9,114.2,509.1,254.6,509.1z M254.6,76.4c98.2,0,178.1,79.9,178.1,178.1s-79.9,178.1-178.1,178.1S76.4,352.8,76.4,254.5    S156.3,76.4,254.6,76.4z" />
													</g>
												</g>
											</svg>
										</button>
									</form>
								</div>
							</div>
						</div>

						<div class="sidebar__widget mb-55">
							<div class="sidebar__widget-head mb-35">
								<h3 class="sidebar__widget-title">Kategori</h3>
							</div>
							<div class="sidebar__widget-content">
								<ul>
						<?php
							foreach ($count_categories as $category) {
								echo '<li><a href="'.base_url().'blog/category/'.$category->id_kategori.'">'.$category->nama_kategori.' ('.$category->jumlah.')</a></li>';
							}
						?>
								</ul>
							</div>
						</div>
						<div class="sidebar__widget mb-55">
							<div class="sidebar__banner w-img">
								<img src="assets/img/blog/banner/banner-1.jpg" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- blog area end -->

</main>
<?= get_footer(); ?>