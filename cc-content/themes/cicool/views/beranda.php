<?= get_header(); ?>



<main>
    <!-- slider area start -->
    <section class="slider__area">
        <div class="slider__active swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($sliders as $slider) { ?>
                    <div class="slider__item swiper-slide p-relative slider__height slider__height-3 d-flex align-items-center z-index-1">
                        <div class="slider__bg slider__overlay slider__overlay-3 include-bg" data-background="<?php echo base_url(); ?>uploads/sliders/<?php echo $slider->slider_image; ?>"></div>
                        <div class="carousel-caption">
                            <h2><?php echo $slider->slider_title; ?></h2>
                            <div class="carousel-caption-description">
                                <p><?php echo $slider->slider_title; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="main-slider-paginations main-slider-paginations-2">
                <button class="slider-button-next"><i class="fa-regular fa-arrow-right"></i></button>
                <button class="slider-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
            </div>
        </div>
    </section>
    <!-- slider area end -->
    <!-- certificate area start -->
    <section class="certificate__area pb-120 pt-120">
        <div class="container">
            <div class="certificate__inner grey-bg-9 p-relative">
                <div class="certificate__thumb">
                    <img src="<?= base_url(); ?>assets_stunting/img/certificate/certificate.png" alt="">
                </div>
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="certificate__content">
                            <div class="section__title-wrapper mb-10">
                                <span class="section__title-pre-3">Stunting Kota Semarang</span>
                                <h2 class="section__title section__title-44">Kata Pengantar</h2>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem molestias aspernatur eligendi adipisci eum saepe aliquam soluta necessitatibus dolorem facilis rerum, incidunt expedita eaque quas cumque tempora laborum laboriosam quis?</p>
                            <div class="certificate__links d-sm-flex align-items-center">
                                <a href="" class="play-video"><i class="fas fa-book"></i> Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- certificate area end -->
    <section class="course__area pt-115 pb-90 grey-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper text-center mb-60">
                        <span class="section__title-pre">Top Courses</span>
                        <h2 class="section__title section__title-44">Berita Terbaru</h2>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing aelit, sed do eiusmod</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($blogs as $blog) { ?>
                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                        <div class="course__item white-bg transition-3 mb-30">
                            <div class="course__thumb w-img fix">
                                <a href="course-details.html">
                                    <img src="assets_stunting/img/course/course-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="course__content p-relative">
                                <div class="course__tag">
                                    <a href="#">Digital</a>
                                </div>
                                <h3 class="course__title">
                                    <a href="course-details.html"><?php echo $blog->title; ?></a>
                                </h3>
                                <p>A beginner’s guide to designing or renovating interior spaces that pop.</p>

                                <div class="course__bottom d-sm-flex align-items-center justify-content-between">
                                    <div class="course__tutor">
                                        <a href="#"><img src="assets_stunting/img/course/tutor/course-tutor-1.jpg" alt="">Brian Cumin</a>
                                    </div>
                                    <div class="course__lesson">
                                        <a href="#"><svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 12.2V4.49999C1 1.7 1.70588 1 4.52941 1H9.47059C12.2941 1 13 1.7 13 4.49999V11.5C13 11.598 13 11.696 12.9929 11.794" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M3.01176 10.0999H13V12.5498C13 13.9008 11.8918 14.9998 10.5294 14.9998H3.47059C2.10824 14.9998 1 13.9008 1 12.5498V12.0948C1 10.9959 1.90353 10.0999 3.01176 10.0999Z" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M4.17647 4.5H9.82353" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M4.17647 6.94995H7.70589" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            12 Lessons
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- course area start -->
    <section class="course__area pt-115 pb-120 grey-bg-4">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper mb-60 text-center">
                        <span class="section__title-pre-3">Featured Courses</span>
                        <h2 class="section__title section__title-44">Most Popular Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                    <div class="course__item-3 white-bg transition-3 mb-30">
                        <div class="course__icon-3 mb-30">
                            <span>
                                <svg width="26" height="28" viewBox="0 0 26 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.76264 21.5L2.75015 16.4875C1.07515 14.8125 1.07515 13.15 2.75015 11.475L11.1001 3.125L20.2876 12.3125C20.7501 12.775 20.7501 13.525 20.2876 13.9875L12.7626 21.5125C11.1126 23.1625 9.43764 23.1625 7.76264 21.5Z" stroke="#031220" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.4375 1.4375L11.1125 3.11246" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1.58765 13.9002L20.4876 13.0752" stroke="#031220" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2.75 26.5H19" stroke="#007A70" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path class="fill-white" d="M22.5625 17.75C22.5625 17.75 20.25 20.2625 20.25 21.8C20.25 23.075 21.2875 24.1125 22.5625 24.1125C23.8375 24.1125 24.875 23.075 24.875 21.8C24.875 20.2625 22.5625 17.75 22.5625 17.75Z" fill="#007A70" stroke="#007A70" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="course__content-3">
                            <h3 class="course__title-3">
                                <a href="course-details.html">Mechanical Engineering and Engineering Explained.</a>
                            </h3>
                            <div class="course__meta d-flex align-items-center justify-content-between">
                                <div class="course__tag-3">
                                    <a href="#">Design Thinking</a>
                                </div>
                                <div class="course__price-3">
                                    <span>$204.36</span>
                                </div>
                            </div>
                            <div class="course__sort-info">
                                <ul>
                                    <li>
                                        <div class="course__lesson-3">
                                            <a href="#">
                                                <span>
                                                    <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1.91583C1 1.52025 1.43762 1.28133 1.77038 1.49524L8.12353 5.57941C8.42969 5.77623 8.42969 6.22377 8.12353 6.42059L1.77038 10.5048C1.43762 10.7187 1 10.4798 1 10.0842V1.91583Z" fill="#007A70" stroke="#007A70" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                56 videos
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="course__review-3">
                                            <a href="#">
                                                <span>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.03658 0.866411L8.09247 2.99539C8.23645 3.29176 8.62041 3.57603 8.94437 3.63046L10.8582 3.95102C12.082 4.15666 12.37 5.0518 11.4881 5.93484L10.0003 7.43481C9.74828 7.68883 9.6103 8.17874 9.68829 8.52954L10.1142 10.3864C10.4502 11.8561 9.67629 12.4246 8.38643 11.6565L6.59263 10.5859C6.26867 10.3924 5.73473 10.3924 5.40476 10.5859L3.61096 11.6565C2.3271 12.4246 1.54719 11.85 1.88315 10.3864L2.3091 8.52954C2.3871 8.17874 2.24911 7.68883 1.99714 7.43481L0.509303 5.93484C-0.3666 5.0518 -0.084631 4.15666 1.13923 3.95102L3.05302 3.63046C3.37099 3.57603 3.75494 3.29176 3.89893 2.99539L4.95481 0.866411C5.53075 -0.288804 6.46664 -0.288804 7.03658 0.866411Z" fill="#FFAE10" />
                                                    </svg>
                                                </span>
                                                2.8k Reviews
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="course__tutor-3">
                                            <a href="#">
                                                <img src="<?= base_url(); ?>assets_stunting/img/course/tutor/course-tutor-1.jpg" alt="">
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="course__join">
                                <a href="course-details.html" class="tp-btn-5 tp-btn-10">Join New</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                    <div class="course__item-3 white-bg transition-3 mb-30">
                        <div class="course__icon-3 mb-30">
                            <span>
                                <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 3.00759V15.0776C21 16.0376 20.22 16.9376 19.26 17.0576L18.93 17.0976C16.75 17.3876 13.39 18.4976 11.47 19.5576C11.21 19.7076 10.78 19.7076 10.51 19.5576L10.47 19.5376C8.54997 18.4876 5.20003 17.3876 3.03003 17.0976L2.73999 17.0576C1.77999 16.9376 1 16.0376 1 15.0776V2.99758C1 1.80758 1.96997 0.907591 3.15997 1.00759C5.25997 1.17759 8.43997 2.23762 10.22 3.34762L10.47 3.49758C10.76 3.67758 11.24 3.67758 11.53 3.49758L11.7 3.3876C12.33 2.9976 14.13 2.60759 15 2.25759V6.33761L16 5.00759L18 6.33761V1.11764C18.27 1.06764 18.53 1.0376 18.77 1.0176H18.83C20.02 0.917601 21 1.80759 21 3.00759Z" stroke="#031220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11 3.82764V18.8276" stroke="#007A70" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path class="fill-white" d="M18 1.11768V4.61768V8.11768L16.5 6.33412L15 8.11768V2.33765C15.9825 1.64032 17.0775 1.38588 18 1.11768Z" fill="#007A70" stroke="#007A70" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="course__content-3">
                            <h3 class="course__title-3">
                                <a href="course-details.html">The Challenge Of Global LearningIn Public
                                    Education.</a>
                            </h3>
                            <div class="course__meta d-flex align-items-center justify-content-between">
                                <div class="course__tag-3">
                                    <a href="#">Mechanical</a>
                                </div>
                                <div class="course__price-3">
                                    <span>$105.52</span>
                                </div>
                            </div>
                            <div class="course__sort-info">
                                <ul>
                                    <li>
                                        <div class="course__lesson-3">
                                            <a href="#">
                                                <span>
                                                    <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1.91583C1 1.52025 1.43762 1.28133 1.77038 1.49524L8.12353 5.57941C8.42969 5.77623 8.42969 6.22377 8.12353 6.42059L1.77038 10.5048C1.43762 10.7187 1 10.4798 1 10.0842V1.91583Z" fill="#007A70" stroke="#007A70" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                56 videos
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="course__review-3">
                                            <a href="#">
                                                <span>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.03658 0.866411L8.09247 2.99539C8.23645 3.29176 8.62041 3.57603 8.94437 3.63046L10.8582 3.95102C12.082 4.15666 12.37 5.0518 11.4881 5.93484L10.0003 7.43481C9.74828 7.68883 9.6103 8.17874 9.68829 8.52954L10.1142 10.3864C10.4502 11.8561 9.67629 12.4246 8.38643 11.6565L6.59263 10.5859C6.26867 10.3924 5.73473 10.3924 5.40476 10.5859L3.61096 11.6565C2.3271 12.4246 1.54719 11.85 1.88315 10.3864L2.3091 8.52954C2.3871 8.17874 2.24911 7.68883 1.99714 7.43481L0.509303 5.93484C-0.3666 5.0518 -0.084631 4.15666 1.13923 3.95102L3.05302 3.63046C3.37099 3.57603 3.75494 3.29176 3.89893 2.99539L4.95481 0.866411C5.53075 -0.288804 6.46664 -0.288804 7.03658 0.866411Z" fill="#FFAE10" />
                                                    </svg>
                                                </span>
                                                2.8k Reviews
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="course__tutor-3">
                                            <a href="#">
                                                <img src="<?= base_url(); ?>assets_stunting/img/course/tutor/course-tutor-2.jpg" alt="">
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="course__join">
                                <a href="course-details.html" class="tp-btn-5 tp-btn-10">Join New</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                    <div class="course__item-3 white-bg transition-3 mb-30">
                        <div class="course__icon-3 mb-30">
                            <span>
                                <svg width="20" height="26" viewBox="0 0 20 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-white" d="M15.4605 10.5815C15.4605 10.5815 15.2202 11.7831 11.6156 16.5892C8.13115 21.1551 13.1776 24.5194 13.7784 25H13.8985C14.6195 24.3992 23.7512 18.6319 15.4605 10.5815Z" fill="#007A70" stroke="#007A70" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.5768 7.93821C11.5768 5.17467 10.4954 2.65144 9.41406 1.20959C9.0536 0.849127 8.45283 0.969281 8.33268 1.4499C7.85206 3.2522 6.41021 7.09713 2.92575 11.663C-1.51994 17.4304 2.56529 23.6784 6.77068 24.8799C9.0536 25.4807 6.16991 23.6784 5.80944 19.9536C5.44898 15.2676 11.5768 11.7831 11.5768 7.93821Z" stroke="#031220" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="course__content-3">
                            <h3 class="course__title-3">
                                <a href="course-details.html">Become a UI/UX Designer Everything You need To
                                    Know.</a>
                            </h3>
                            <div class="course__meta d-flex align-items-center justify-content-between">
                                <div class="course__tag-3">
                                    <a href="#">Marketing</a>
                                </div>
                                <div class="course__price-3">
                                    <span>Free</span>
                                </div>
                            </div>
                            <div class="course__sort-info">
                                <ul>
                                    <li>
                                        <div class="course__lesson-3">
                                            <a href="#">
                                                <span>
                                                    <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1.91583C1 1.52025 1.43762 1.28133 1.77038 1.49524L8.12353 5.57941C8.42969 5.77623 8.42969 6.22377 8.12353 6.42059L1.77038 10.5048C1.43762 10.7187 1 10.4798 1 10.0842V1.91583Z" fill="#007A70" stroke="#007A70" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                56 videos
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="course__review-3">
                                            <a href="#">
                                                <span>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.03658 0.866411L8.09247 2.99539C8.23645 3.29176 8.62041 3.57603 8.94437 3.63046L10.8582 3.95102C12.082 4.15666 12.37 5.0518 11.4881 5.93484L10.0003 7.43481C9.74828 7.68883 9.6103 8.17874 9.68829 8.52954L10.1142 10.3864C10.4502 11.8561 9.67629 12.4246 8.38643 11.6565L6.59263 10.5859C6.26867 10.3924 5.73473 10.3924 5.40476 10.5859L3.61096 11.6565C2.3271 12.4246 1.54719 11.85 1.88315 10.3864L2.3091 8.52954C2.3871 8.17874 2.24911 7.68883 1.99714 7.43481L0.509303 5.93484C-0.3666 5.0518 -0.084631 4.15666 1.13923 3.95102L3.05302 3.63046C3.37099 3.57603 3.75494 3.29176 3.89893 2.99539L4.95481 0.866411C5.53075 -0.288804 6.46664 -0.288804 7.03658 0.866411Z" fill="#FFAE10" />
                                                    </svg>
                                                </span>
                                                2.8k Reviews
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="course__tutor-3">
                                            <a href="#">
                                                <img src="<?= base_url(); ?>assets_stunting/img/course/tutor/course-tutor-3.jpg" alt="">
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="course__join">
                                <a href="course-details.html" class="tp-btn-5 tp-btn-10">Join New</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="course__enroll-wrapper mt-40 p-relative d-sm-flex align-items-center justify-content-between include-bg" data-background="<?= base_url(); ?>assets_stunting/img/course/bg/course-bg.png">
                        <div class="course__enroll-icon">
                            <span>
                                <svg width="28" height="34" viewBox="0 0 28 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_268_615)">
                                        <path d="M7.59649 15.161H11.2015V23.561C11.2015 25.521 12.2632 25.9177 13.5582 24.4477L22.3898 14.4144C23.4748 13.1894 23.0198 12.1744 21.3748 12.1744H17.7698V3.77435C17.7698 1.81435 16.7082 1.41769 15.4132 2.88769L6.58149 12.921C5.50816 14.1577 5.96316 15.161 7.59649 15.161Z" fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_268_615" x="2" y="2" width="24.9795" height="31.3354" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="4" />
                                            <feGaussianBlur stdDeviation="2" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix" values="0 0 0 0 0.825 0 0 0 0 0.38207 0 0 0 0 0 0 0 0 0.5 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_268_615" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_268_615" result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </span>
                        </div>
                        <div class="course__enroll-content">
                            <p>Let Us Help</p>
                            <h4>Finding Your Right Courses</h4>
                        </div>
                        <div class="course__enroll-btn pt-5">
                            <a href="contact.html" class="tp-btn-5 tp-btn-11">Get started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- course area end -->
    <!-- faq area start -->
    <section class="faq__area pt-20 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-5">
                    <div class="faq__wrapper pt-45 pr-25">
                        <div class="section__title-wrapper mb-5">
                            <span class="section__title-pre-3">Learn how to get started</span>
                            <h2 class="section__title section__title-44">Frequently Asked Questions</h2>
                        </div>
                        <p>Join our club member community now to get free updates and also a lot of freebies are
                            waiting for you or <a href="contact.html">Contact Us</a></p>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7">
                    <div class="faq__item-wrapper pl-100">
                        <div class="faq__accordion">
                            <div class="accordion" id="faqaccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faqOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Who will view my content?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#faqaccordion">
                                        <div class="accordion-body">
                                            <p>Our authors are incredible storytellers driven by their passion for
                                                technology. They blend their knowledge and enthusiasm to communicate
                                                concepts and demonstrate</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faqTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            How long it take to create a video course?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#faqaccordion">
                                        <div class="accordion-body">
                                            <p>Our authors are incredible storytellers driven by their passion for
                                                technology. They blend their knowledge and enthusiasm to communicate
                                                concepts and demonstrate</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faqThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            What kind of support does Courselog provide?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#faqaccordion">
                                        <div class="accordion-body">
                                            <p>Our authors are incredible storytellers driven by their passion for
                                                technology. They blend their knowledge and enthusiasm to communicate
                                                concepts and demonstrate</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faqFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                            How to Change my Password easily?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour" data-bs-parent="#faqaccordion">
                                        <div class="accordion-body">
                                            <p>Our authors are incredible storytellers driven by their passion for
                                                technology. They blend their knowledge and enthusiasm to communicate
                                                concepts and demonstrate</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq area end -->

    <!-- app area start -->
    <section class="app__area app__bg">
        <div class="container">
            <div class="app__inner theme-bg-3 p-relative fix">
                <div class="app__shape">
                    <img class="app__shape-1" src="<?= base_url(); ?>assets_stunting/img/app/app-shape-1.png" alt="">
                    <img class="app__shape-2" src="<?= base_url(); ?>assets_stunting/img/app/app-shape-2.png" alt="">
                </div>
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="app__wrapper p-relative z-index-1">
                            <h3 class="app__title"> Start learning By Downloading Apps</h3>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="app__download p-relative z-index-1 d-sm-flex align-items-center justify-content-lg-end">
                            <div class="app__item mr-15">
                                <a href="#">
                                    <span><img src="<?= base_url(); ?>assets_stunting/img/app/google-play.png" alt=""></span>
                                    Google play
                                </a>
                            </div>
                            <div class="app__item">
                                <a href="#" class="active">
                                    <span class="apple"><img src="<?= base_url(); ?>assets_stunting/img/app/apple.png" alt=""></span>
                                    Apple Store
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- app area end -->

</main>
<?= get_footer(); ?>