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
									<form action="" id="form-blog-search">
										<input type="text" name="q" placeholder="Cari sesuatu disini...">
										<button type="submit">
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