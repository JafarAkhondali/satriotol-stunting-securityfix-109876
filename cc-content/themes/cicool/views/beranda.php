<?= get_header(); ?>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->


    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <!-- <svg id="loader">
					<path id="corners" d="m 0 12.5 l 0 -12.5 l 50 0 l 0 50 l -50 0 l 0 -50.5" />
				</svg> -->
                <img src="assets_stunting/favicon/android-chrome-192x192.png" alt="">
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->

    <!-- header area start -->
    <header>
        <div class="header__area">
            <div class="header__bottom header__bottom-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-6 d-none d-lg-block">
                            <!-- <div class="header__call d-flex align-items-start">
                                <div class="header__call-icon mr-10">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.045 25.495C1.045 26.035 1.165 26.59 1.42 27.13C1.675 27.67 2.005 28.18 2.44 28.66C3.175 29.47 3.985 30.055 4.9 30.43C5.8 30.805 6.775 31 7.825 31C9.355 31 10.99 30.64 12.715 29.905C14.44 29.17 16.165 28.18 17.875 26.935C19.6 25.675 21.235 24.28 22.795 22.735C24.34 21.175 25.735 19.54 26.98 17.83C28.21 16.12 29.2 14.41 29.92 12.715C30.64 11.005 31 9.37 31 7.81C31 6.79 30.82 5.815 30.46 4.915C30.1 4 29.53 3.16 28.735 2.41C27.775 1.465 26.725 1 25.615 1C25.195 1 24.775 1.09 24.4 1.27C24.01 1.45 23.665 1.72 23.395 2.11L19.915 7.015C19.645 7.39 19.45 7.735 19.315 8.065C19.18 8.38 19.105 8.695 19.105 8.98C19.105 9.34 19.21 9.7 19.42 10.045C19.615 10.39 19.9 10.75 20.26 11.11L21.4 12.295C21.565 12.46 21.64 12.655 21.64 12.895C21.64 13.015 21.625 13.12 21.595 13.24C21.55 13.36 21.505 13.45 21.475 13.54C21.205 14.035 20.74 14.68 20.08 15.46C19.405 16.24 18.685 17.035 17.905 17.83C17.095 18.625 16.315 19.36 15.52 20.035C14.74 20.695 14.095 21.145 13.585 21.415C13.51 21.445 13.42 21.49 13.315 21.535C13.195 21.58 13.075 21.595 12.94 21.595C12.685 21.595 12.49 21.505 12.325 21.34L11.185 20.215C10.81 19.84 10.45 19.555 10.105 19.375C9.76 19.165 9.415 19.06 9.04 19.06C8.755 19.06 8.455 19.12 8.125 19.255C7.795 19.39 7.45 19.585 7.075 19.84L2.11 23.365C1.72 23.635 1.45 23.95 1.285 24.325C1.135 24.7 1.045 25.075 1.045 25.495Z" stroke="#007A70" stroke-width="1.5" stroke-miterlimit="10" />
                                    </svg>
                                </div>
                                <div class="header__call-content">
                                    <h4><a href="tel:+234-567-899">+(088) 234 567 899</a></h4>
                                    <p><a href="mailto:info@educal.com">info@educal.com</a></p>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-6">
                            <div class="logo text-lg-center">
                                <a href="index.html">
                                    <img src="assets_stunting/logo-bappeda.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-8 col-6">
                            <div class="header__bottom-right d-flex justify-content-end align-items-center pl-30">
                                <div class="header__login-2 d-none d-md-flex align-items-center ml-20 pl-20">
                                    <div class="header__login-icon mr-10">
                                        <a href="<?= base_url();?>administrator/login">
                                            <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.99995 6.83333C7.61078 6.83333 8.91662 5.5275 8.91662 3.91667C8.91662 2.30584 7.61078 1 5.99995 1C4.38912 1 3.08328 2.30584 3.08328 3.91667C3.08328 5.5275 4.38912 6.83333 5.99995 6.83333Z" stroke="#031220" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M11.0108 12.6667C11.0108 10.4092 8.76497 8.58333 5.99997 8.58333C3.23497 8.58333 0.989136 10.4092 0.989136 12.6667" stroke="#031220" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="header__login-content">
                                        <p><a href="<?= base_url();?>administrator/login">Login</a></p>
                                    </div>
                                </div>
                                <div class="header__hamburger ml-50 d-lg-none">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#offcanvasmodal" class="hamurger-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__menu theme-bg-3 d-none d-lg-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xxl-8 col-xl-8 col-lg-8">
                            <div class="main-menu main-menu-3 d-flex align-items-center">
                                <div class="main-menu-icon mr-10">
                                    <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.8125 7.90625L3 6.9375V14C3 14.2708 3.09375 14.5 3.28125 14.6875C3.48958 14.8958 3.72917 15 4 15H7C7.27083 15 7.5 14.8958 7.6875 14.6875C7.89583 14.5 8 14.2708 8 14V10H10V14C10 14.2708 10.0938 14.5 10.2812 14.6875C10.4896 14.8958 10.7292 15 11 15H14C14.2708 15 14.5 14.8958 14.6875 14.6875C14.8958 14.5 15 14.2708 15 14V6.9375L16.1875 7.90625C16.2708 7.96875 16.375 8 16.5 8C16.6667 8 16.8021 7.9375 16.9062 7.8125C17.0938 7.54167 17.0625 7.30208 16.8125 7.09375L9.3125 1.09375C9.10417 0.947917 8.89583 0.947917 8.6875 1.09375L6 3.25V2C6 1.72917 5.89583 1.5 5.6875 1.3125C5.5 1.10417 5.27083 1 5 1C4.72917 1 4.48958 1.10417 4.28125 1.3125C4.09375 1.5 4 1.72917 4 2V4.84375L1.1875 7.09375C0.9375 7.30208 0.90625 7.54167 1.09375 7.8125C1.30208 8.0625 1.54167 8.09375 1.8125 7.90625ZM9 2.125L14 6.125V14H11V9H7V14H4V6.15625L9 2.125Z" fill="white" />
                                        <path d="M1.8125 7.90625L1.8696 7.98872L1.87571 7.98374L1.8125 7.90625ZM3 6.9375H3.1V6.72687L2.93679 6.86001L3 6.9375ZM3.28125 14.6875L3.21054 14.7582L3.28125 14.6875ZM7.6875 14.6875L7.62023 14.6128L7.61317 14.6206L7.6875 14.6875ZM8 10V9.9H7.9V10H8ZM10 10H10.1V9.9H10V10ZM10.2812 14.6875L10.2105 14.7582L10.2812 14.6875ZM14.6875 14.6875L14.6202 14.6128L14.6132 14.6206L14.6875 14.6875ZM15 6.9375L15.0632 6.86001L14.9 6.72687V6.9375H15ZM16.1875 7.90625L16.1242 7.9838L16.1275 7.98625L16.1875 7.90625ZM16.9062 7.8125L16.9834 7.87677L16.9885 7.86942L16.9062 7.8125ZM16.8125 7.09375L16.8765 7.01691L16.875 7.01566L16.8125 7.09375ZM9.3125 1.09375L9.3751 1.0155L9.36985 1.01183L9.3125 1.09375ZM8.6875 1.09375L8.63003 1.01165L8.62492 1.01575L8.6875 1.09375ZM6 3.25H5.9V3.45844L6.06258 3.328L6 3.25ZM5.6875 1.3125L5.61276 1.37977L5.6206 1.38683L5.6875 1.3125ZM4.28125 1.3125L4.35196 1.38321L4.28125 1.3125ZM4 4.84375L4.06247 4.92184L4.1 4.89181V4.84375H4ZM1.1875 7.09375L1.12502 7.01565L1.12348 7.01693L1.1875 7.09375ZM1.09375 7.8125L1.0112 7.86965L1.01693 7.87652L1.09375 7.8125ZM9 2.125L9.06247 2.04691L8.99976 1.99674L8.93723 2.04715L9 2.125ZM14 6.125H14.1V6.07694L14.0625 6.04691L14 6.125ZM14 14V14.1H14.1V14H14ZM11 14H10.9V14.1H11V14ZM11 9H11.1V8.9H11V9ZM7 9V8.9H6.9V9H7ZM7 14V14.1H7.1V14H7ZM4 14H3.9V14.1H4V14ZM4 6.15625L3.93723 6.0784L3.9 6.10842V6.15625H4ZM1.87571 7.98374L3.06321 7.01499L2.93679 6.86001L1.74929 7.82876L1.87571 7.98374ZM2.9 6.9375V14H3.1V6.9375H2.9ZM2.9 14C2.9 14.2967 3.00384 14.5515 3.21054 14.7582L3.35196 14.6168C3.18366 14.4485 3.1 14.2449 3.1 14H2.9ZM3.21054 14.7582C3.43581 14.9835 3.70018 15.1 4 15.1V14.9C3.75815 14.9 3.54336 14.8082 3.35196 14.6168L3.21054 14.7582ZM4 15.1H7V14.9H4V15.1ZM7 15.1C7.30029 15.1 7.55612 14.983 7.76183 14.7544L7.61317 14.6206C7.44388 14.8087 7.24138 14.9 7 14.9V15.1ZM7.7544 14.7618C7.98297 14.5561 8.1 14.3003 8.1 14H7.9C7.9 14.2414 7.8087 14.4439 7.6206 14.6132L7.7544 14.7618ZM8.1 14V10H7.9V14H8.1ZM8 10.1H10V9.9H8V10.1ZM9.9 10V14H10.1V10H9.9ZM9.9 14C9.9 14.2967 10.0038 14.5515 10.2105 14.7582L10.352 14.6168C10.1837 14.4485 10.1 14.2449 10.1 14H9.9ZM10.2105 14.7582C10.4358 14.9835 10.7002 15.1 11 15.1V14.9C10.7582 14.9 10.5434 14.8082 10.352 14.6168L10.2105 14.7582ZM11 15.1H14V14.9H11V15.1ZM14 15.1C14.3003 15.1 14.5561 14.983 14.7618 14.7544L14.6132 14.6206C14.4439 14.8087 14.2414 14.9 14 14.9V15.1ZM14.7544 14.7618C14.983 14.5561 15.1 14.3003 15.1 14H14.9C14.9 14.2414 14.8087 14.4439 14.6206 14.6132L14.7544 14.7618ZM15.1 14V6.9375H14.9V14H15.1ZM14.9368 7.01499L16.1243 7.98374L16.2507 7.82876L15.0632 6.86001L14.9368 7.01499ZM16.1275 7.98625C16.2314 8.06417 16.3578 8.1 16.5 8.1V7.9C16.3922 7.9 16.3103 7.87333 16.2475 7.82625L16.1275 7.98625ZM16.5 8.1C16.6955 8.1 16.8594 8.02495 16.9831 7.87652L16.8294 7.74848C16.7448 7.85005 16.6378 7.9 16.5 7.9V8.1ZM16.9885 7.86942C17.0912 7.7211 17.1424 7.56886 17.1226 7.41675C17.1027 7.2644 17.014 7.13152 16.8765 7.01693L16.7485 7.17057C16.861 7.26431 16.9129 7.35539 16.9243 7.44262C16.9357 7.5301 16.9088 7.63307 16.824 7.75558L16.9885 7.86942ZM16.875 7.01566L9.37497 1.01566L9.25003 1.17184L16.75 7.17184L16.875 7.01566ZM9.36985 1.01183C9.25264 0.929779 9.12884 0.884375 9 0.884375C8.87116 0.884375 8.74736 0.929779 8.63015 1.01183L8.74485 1.17567C8.83597 1.11189 8.92051 1.08437 9 1.08437C9.07949 1.08437 9.16403 1.11189 9.25515 1.17567L9.36985 1.01183ZM8.62492 1.01575L5.93742 3.172L6.06258 3.328L8.75008 1.17175L8.62492 1.01575ZM6.1 3.25V2H5.9V3.25H6.1ZM6.1 2C6.1 1.69971 5.98297 1.44388 5.7544 1.23817L5.6206 1.38683C5.8087 1.55612 5.9 1.75862 5.9 2H6.1ZM5.76183 1.2456C5.55612 1.01703 5.30029 0.9 5 0.9V1.1C5.24138 1.1 5.44388 1.1913 5.61317 1.3794L5.76183 1.2456ZM5 0.9C4.70018 0.9 4.43581 1.01652 4.21054 1.24179L4.35196 1.38321C4.54336 1.19182 4.75815 1.1 5 1.1V0.9ZM4.21054 1.24179C4.00384 1.44849 3.9 1.70328 3.9 2H4.1C4.1 1.75505 4.18366 1.55151 4.35196 1.38321L4.21054 1.24179ZM3.9 2V4.84375H4.1V2H3.9ZM3.93753 4.76566L1.12503 7.01566L1.24997 7.17184L4.06247 4.92184L3.93753 4.76566ZM1.12348 7.01693C0.985969 7.13152 0.897274 7.2644 0.877402 7.41675C0.857563 7.56886 0.908848 7.7211 1.01153 7.86942L1.17597 7.75558C1.09115 7.63307 1.06431 7.5301 1.07572 7.44262C1.0871 7.35539 1.13903 7.26431 1.25152 7.17057L1.12348 7.01693ZM1.01693 7.87652C1.13152 8.01403 1.2644 8.10273 1.41675 8.1226C1.56886 8.14244 1.7211 8.09115 1.86942 7.98847L1.75558 7.82403C1.63307 7.90885 1.5301 7.93569 1.44262 7.92428C1.35539 7.9129 1.26431 7.86097 1.17057 7.74848L1.01693 7.87652ZM8.93753 2.20309L13.9375 6.20309L14.0625 6.04691L9.06247 2.04691L8.93753 2.20309ZM13.9 6.125V14H14.1V6.125H13.9ZM14 13.9H11V14.1H14V13.9ZM11.1 14V9H10.9V14H11.1ZM11 8.9H7V9.1H11V8.9ZM6.9 9V14H7.1V9H6.9ZM7 13.9H4V14.1H7V13.9ZM4.1 14V6.15625H3.9V14H4.1ZM4.06277 6.2341L9.06277 2.20285L8.93723 2.04715L3.93723 6.0784L4.06277 6.2341Z" fill="#E7F4F3" />
                                    </svg>
                                </div>
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="/">Beranda</a>
                                        </li>
                                        <li>
                                            <a href="about.html">About</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="course-v1.html">Courses</a>
                                            <ul class="submenu">
                                                <li><a href="course-v1.html">Course Style 1</a></li>
                                                <li><a href="course-v2.html">Course Style 2</a></li>
                                                <li><a href="course-sidebar.html">Course Sidebar</a></li>
                                                <li><a href="course-details.html">Course Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="about.html">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="event.html">Our Events</a></li>
                                                <li><a href="event-details.html">Event Details</a></li>
                                                <li><a href="team.html">Team</a></li>
                                                <li><a href="team-details.html">Team Details</a></li>
                                                <li><a href="error.html">404 Error</a></li>
                                                <li><a href="my-profile.html">My Profile</a></li>
                                                <li><a href="my-course.html">My Courses</a></li>
                                                <li><a href="sign-in.html">Sign In</a></li>
                                                <li><a href="sign-up.html">Sign Up</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4">
                            <div class="header__category d-flex align-items-center justify-content-end">
                                <div class="header__category-icon mr-10">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="header-dot-menu-opacity" opacity="0.7" d="M7.5217 2.9096C8.32516 2.9096 8.9765 2.25826 8.9765 1.4548C8.9765 0.651336 8.32516 0 7.5217 0C6.71823 0 6.06689 0.651336 6.06689 1.4548C6.06689 2.25826 6.71823 2.9096 7.5217 2.9096Z" fill="white" />
                                        <path d="M13.5193 2.9096C14.3227 2.9096 14.9741 2.25826 14.9741 1.4548C14.9741 0.651336 14.3227 0 13.5193 0C12.7158 0 12.0645 0.651336 12.0645 1.4548C12.0645 2.25826 12.7158 2.9096 13.5193 2.9096Z" fill="white" />
                                        <path d="M1.4548 2.9096C2.25826 2.9096 2.9096 2.25826 2.9096 1.4548C2.9096 0.651336 2.25826 0 1.4548 0C0.651336 0 0 0.651336 0 1.4548C0 2.25826 0.651336 2.9096 1.4548 2.9096Z" fill="white" />
                                        <path d="M7.5217 9.00193C8.32516 9.00193 8.9765 8.35059 8.9765 7.54713C8.9765 6.74367 8.32516 6.09233 7.5217 6.09233C6.71823 6.09233 6.06689 6.74367 6.06689 7.54713C6.06689 8.35059 6.71823 9.00193 7.5217 9.00193Z" fill="white" />
                                        <path class="header-dot-menu-opacity" opacity="0.7" d="M13.5193 9.00193C14.3227 9.00193 14.9741 8.35059 14.9741 7.54713C14.9741 6.74367 14.3227 6.09233 13.5193 6.09233C12.7158 6.09233 12.0645 6.74367 12.0645 7.54713C12.0645 8.35059 12.7158 9.00193 13.5193 9.00193Z" fill="white" />
                                        <path class="header-dot-menu-opacity" opacity="0.7" d="M7.5217 15C8.32516 15 8.9765 14.3487 8.9765 13.5452C8.9765 12.7417 8.32516 12.0904 7.5217 12.0904C6.71823 12.0904 6.06689 12.7417 6.06689 13.5452C6.06689 14.3487 6.71823 15 7.5217 15Z" fill="white" />
                                        <path d="M13.5193 15C14.3227 15 14.9741 14.3487 14.9741 13.5452C14.9741 12.7417 14.3227 12.0904 13.5193 12.0904C12.7158 12.0904 12.0645 12.7417 12.0645 13.5452C12.0645 14.3487 12.7158 15 13.5193 15Z" fill="white" />
                                        <path class="header-dot-menu-opacity" opacity="0.7" d="M1.4548 9.00193C2.25826 9.00193 2.9096 8.35059 2.9096 7.54713C2.9096 6.74367 2.25826 6.09233 1.4548 6.09233C0.651336 6.09233 0 6.74367 0 7.54713C0 8.35059 0.651336 9.00193 1.4548 9.00193Z" fill="white" />
                                        <path d="M1.4548 15C2.25826 15 2.9096 14.3487 2.9096 13.5452C2.9096 12.7417 2.25826 12.0904 1.4548 12.0904C0.651336 12.0904 0 12.7417 0 13.5452C0 14.3487 0.651336 15 1.4548 15Z" fill="white" />
                                    </svg>
                                </div>
                                <div class="header__category-content">
                                    <select>
                                        <option>All Categories</option>
                                        <option>Web Development</option>
                                        <option>UI/UX Design</option>
                                        <option>Illustration</option>
                                        <option>Java</option>
                                        <option>Next Js</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <!-- mobile menu start -->
    <section id="header-sticky" class="mobile__menu header__area">
        <div class="header__bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-8 col-xl-9 col-lg-10 col-md-6 col-6">
                        <div class="header__bottom-left d-flex align-items-center">
                            <div class="logo">
                                <a href="/">
                                    <img src="assets_stunting/logo-bappeda.png" alt="logo">
                                </a>
                            </div>
                            <div class="main-menu main-menu-2 main-menu-mobile ml-30 pl-30">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="/">Beranda</a>
                                        </li>
                                        <li>
                                            <a href="about.html">About</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="course-v1.html">Courses</a>
                                            <ul class="submenu">
                                                <li><a href="course-v1.html">Course Style 1</a></li>
                                                <li><a href="course-v2.html">Course Style 2</a></li>
                                                <li><a href="course-sidebar.html">Course Sidebar</a></li>
                                                <li><a href="course-details.html">Course Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="about.html">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="event.html">Our Events</a></li>
                                                <li><a href="event-details.html">Event Details</a></li>
                                                <li><a href="team.html">Team</a></li>
                                                <li><a href="team-details.html">Team Details</a></li>
                                                <li><a href="error.html">404 Error</a></li>
                                                <li><a href="my-profile.html">My Profile</a></li>
                                                <li><a href="my-course.html">My Courses</a></li>
                                                <li><a href="sign-in.html">Sign In</a></li>
                                                <li><a href="sign-up.html">Sign Up</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-3 col-lg-2 col-md-6 col-6">
                        <div class="header__bottom-right d-flex justify-content-end align-items-center pl-30">
                            <div class="header__action d-none d-xl-block">
                                <ul>
                                    <li>
                                        <a href="<?= base_url();?>administrator/login">
                                            <svg width="15" height="20" viewBox="0 0 15 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.1466 8.96416C7.05493 8.95499 6.94493 8.95499 6.8441 8.96416C4.66243 8.89083 2.92993 7.10333 2.92993 4.90333C2.92993 2.65749 4.74493 0.833328 6.99993 0.833328C9.24576 0.833328 11.0699 2.65749 11.0699 4.90333C11.0608 7.10333 9.32826 8.89083 7.1466 8.96416Z" stroke="#0C140F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M2.56341 12.3467C0.345075 13.8317 0.345075 16.2517 2.56341 17.7275C5.08424 19.4142 9.21841 19.4142 11.7392 17.7275C13.9576 16.2425 13.9576 13.8225 11.7392 12.3467C9.22758 10.6692 5.09341 10.6692 2.56341 12.3467Z" stroke="#0C140F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header__hamburger ml-50 d-xl-none">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#offcanvasmodal" class="hamurger-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- mobile menu end -->

    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="modal fade" id="offcanvasmodal" tabindex="-1" aria-labelledby="offcanvasmodal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="offcanvas__wrapper">
                        <div class="offcanvas__content">
                            <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                                <div class="offcanvas__logo logo">
                                    <a href="index.html">
                                        <img src="assets_stunting/img/logo/logo-3.png" alt="logo">
                                    </a>
                                </div>
                                <div class="offcanvas__close">
                                    <button class="offcanvas__close-btn" data-bs-toggle="modal" data-bs-target="#offcanvasmodal">
                                        <i class="fal fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="offcanvas__search mb-25">
                                <form action="#">
                                    <input type="text" placeholder="What are you searching for?">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                            <div class="mobile-menu fix"></div>
                            <div class="offcanvas__text d-none d-lg-block">
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and
                                    praising pain was born and will give you a complete account of the system and
                                    expound the actual teachings of the great explore</p>
                            </div>
                            <div class="offcanvas__map d-none d-lg-block mb-15">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd"></iframe>
                            </div>
                            <div class="offcanvas__contact mt-30 mb-20">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <div class="offcanvas__contact-icon mr-15">
                                            <i class="fal fa-map-marker-alt"></i>
                                        </div>
                                        <div class="offcanvas__contact-text">
                                            <a target="_blank" href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">12/A,
                                                Mirnada City Tower, NYC</a>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="offcanvas__contact-icon mr-15">
                                            <i class="far fa-phone"></i>
                                        </div>
                                        <div class="offcanvas__contact-text">
                                            <a href="mailto:support@gmail.com">088889797697</a>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="offcanvas__contact-icon mr-15">
                                            <i class="fal fa-envelope"></i>
                                        </div>
                                        <div class="offcanvas__contact-text">
                                            <a href="tel:+012-345-6789">support@mail.com</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="offcanvas__social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas area end -->
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <main>
        <!-- slider area start -->
        <section class="slider__area">
            <div class="slider__active swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($sliders as $slider) { ?>
                        <div class="slider__item swiper-slide p-relative slider__height slider__height-3 d-flex align-items-center z-index-1">
                            <div class="slider__bg slider__overlay slider__overlay-3 include-bg" data-background="<?php echo base_url();?>uploads/sliders/<?php echo $slider->slider_image; ?>"></div>
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

        <!-- category area start -->
        <section class="category__area pb-90 pt-115">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xxl-5 col-xl-5">
                        <div class="section__title-wrapper mb-60">
                            <span class="section__title-pre-3">Top Categories</span>
                            <h2 class="section__title-2">All featured <br> Topices by Categories</h2>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-7">
                        <div class="category__wrapper-3 mb-60 d-sm-flex align-items-end justify-content-between">
                            <p>Elementum facilisis leo vel est ullamcorper get facilisi.Sagittis orci a purus semper
                                eget.</p>
                            <div class="category__more mb-10">
                                <a href="course-v1.html" class="tp-btn-5 tp-btn-8">All Categories</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="category__item-3 fix transition-3 white-bg mb-30">
                            <h3 class="category__title-3">Development</h3>
                            <div class="category__list">
                                <ul>
                                    <li><a href="course-v1.html">Python <i class="fa-regular fa-arrow-right"></i></a>
                                    </li>
                                    <li><a href="course-v1.html">Web Development <i class="fa-regular fa-arrow-right"></i></a></li>
                                    <li><a href="course-v1.html">Machine Learning <i class="fa-regular fa-arrow-right"></i></a></li>
                                    <li><a href="course-v1.html">App Development <i class="fa-regular fa-arrow-right"></i></a></li>
                                </ul>
                            </div>
                            <div class="category__btn-3">
                                <a href="course-v1.html" class="tp-btn-9 w-100">Explore</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="category__item-3 fix transition-3 white-bg mb-30">
                            <h3 class="category__title-3">IT and Softwere</h3>
                            <div class="category__list">
                                <ul>
                                    <li><a href="course-v1.html">Cyber Security <i class="fa-regular fa-arrow-right"></i></a></li>
                                    <li><a href="course-v1.html">Visual Studio Code <i class="fa-regular fa-arrow-right"></i></a></li>
                                    <li><a href="course-v1.html">AWS Certification <i class="fa-regular fa-arrow-right"></i></a></li>
                                    <li><a href="course-v1.html">Ethical Hacking <i class="fa-regular fa-arrow-right"></i></a></li>
                                </ul>
                            </div>
                            <div class="category__btn-3">
                                <a href="course-v1.html" class="tp-btn-9 w-100">Explore</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="category__item-3 fix transition-3 white-bg mb-30">
                            <h3 class="category__title-3">Design</h3>
                            <div class="category__list">
                                <ul>
                                    <li><a href="course-v1.html">Advertising <i class="fa-regular fa-arrow-right"></i></a></li>
                                    <li><a href="course-v1.html">UX Design <i class="fa-regular fa-arrow-right"></i></a>
                                    </li>
                                    <li><a href="course-v1.html">History of Art <i class="fa-regular fa-arrow-right"></i></a></li>
                                    <li><a href="course-v1.html">Color & Form <i class="fa-regular fa-arrow-right"></i></a></li>
                                </ul>
                            </div>
                            <div class="category__btn-3">
                                <a href="course-v1.html" class="tp-btn-9 w-100">Explore</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                        <div class="category__item-3 fix transition-3 white-bg mb-30">
                            <h3 class="category__title-3">Business</h3>
                            <div class="category__list">
                                <ul>
                                    <li><a href="course-v1.html">Accounting <i class="fa-regular fa-arrow-right"></i></a></li>
                                    <li><a href="course-v1.html">Financial Analysis <i class="fa-regular fa-arrow-right"></i></a></li>
                                    <li><a href="course-v1.html">SQL <i class="fa-regular fa-arrow-right"></i></a></li>
                                    <li><a href="course-v1.html">Business statistics <i class="fa-regular fa-arrow-right"></i></a></li>
                                </ul>
                            </div>
                            <div class="category__btn-3">
                                <a href="course-v1.html" class="tp-btn-9 w-100">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category area end -->

        <!-- counter area start -->
        <section class="counter__area pb-120 pb-140">
            <div class="container">
                <div class="counter__inner counter__inner-2 grey-bg-8">
                    <div class="row">
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="counter__item d-flex align-items-start counter__item-border counter__item-border-2">
                                <div class="counter__icon counter__icon-2 mr-15">
                                    <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M37 19.1667C37 9.23075 28.936 1.16675 19 1.16675C9.064 1.16675 1 9.23075 1 19.1667C1 29.1027 9.064 37.1667 19 37.1667" stroke="#031220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.8 2.9668H13.6C10.09 13.4788 10.09 24.8548 13.6 35.3668H11.8" stroke="#031220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M24.4 2.9668C26.146 8.2228 27.028 13.6948 27.028 19.1668" stroke="#031220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2.80005 26.3667V24.5667C8.05605 26.3127 13.528 27.1947 19 27.1947" stroke="#031220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2.80005 13.7665C13.312 10.2565 24.688 10.2565 35.2001 13.7665" stroke="#031220" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path class="search" d="M30.16 36.0867C33.3412 36.0867 35.92 33.5078 35.92 30.3267C35.92 27.1455 33.3412 24.5667 30.16 24.5667C26.9789 24.5667 24.4 27.1455 24.4 30.3267C24.4 33.5078 26.9789 36.0867 30.16 36.0867Z" stroke="#3D6CE7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path class="search" d="M37.0001 37.1667L35.2001 35.3667" stroke="#3D6CE7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="counter__content counter__content-2">
                                    <h4><span class="counter">17</span>+</h4>
                                    <p>Years of Language Education Experience</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="counter__item d-flex align-items-start counter__item-border counter__item-border-2">
                                <div class="counter__icon counter__icon-2 mr-15">
                                    <svg width="50" height="38" viewBox="0 0 50 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.6984 27.5676V25.3757H16.1609V27.5676H14.6984Z" fill="#031220" stroke="#F5F6F8" stroke-width="0.1" />
                                        <path d="M18.9289 27.5676V25.3757H20.3914V27.5676H18.9289Z" fill="#031220" stroke="#F5F6F8" stroke-width="0.1" />
                                        <path d="M17.5234 25.9512C14.1936 25.9512 11.7765 23.4538 11.7765 20.0065V19.0436H13.239V20.0065C13.239 21.2677 13.6787 22.3416 14.436 23.1004C15.1932 23.8591 16.2649 24.2997 17.5234 24.2997C18.7821 24.2997 19.8538 23.8591 20.611 23.1004C21.3682 22.3416 21.8078 21.2677 21.8078 20.0065V14.6279H23.2703V20.006C23.2707 23.4538 20.8532 25.9512 17.5234 25.9512Z" fill="#031220" stroke="#F5F6F8" stroke-width="0.1" />
                                        <path d="M15.2448 8.89414L25.4444 8.89327V12.1213C25.4444 14.2014 23.9423 15.8832 22.1085 15.8832H13.9511C13.5654 15.8832 13.262 16.2371 13.262 16.6588V23.2591L9.42375 18.0384V13.3221C9.42375 11.6064 10.6626 10.221 12.1734 10.221H12.6784H12.7032L12.7182 10.2013C13.3495 9.37396 14.2661 8.89414 15.2448 8.89414ZM10.8859 17.4764H10.911L11.7096 18.5626L11.7999 18.6854V18.533V16.6588C11.7999 15.3145 12.7704 14.2316 13.9515 14.2316H22.1085C23.1468 14.2316 23.9816 13.2789 23.9816 12.1213V10.5948V10.5448H23.9316L15.2445 10.5448L15.2444 10.5448C14.6109 10.5457 14.0256 10.9051 13.6774 11.5015C13.6774 11.5015 13.6774 11.5015 13.6774 11.5015L13.4607 11.8725H12.173C11.4577 11.8725 10.8859 12.5288 10.8859 13.3221V17.4264V17.4764Z" fill="#031220" stroke="#F5F6F8" stroke-width="0.1" />
                                        <path d="M42.9272 32.716V21.0804H44.3897V32.716H42.9272Z" fill="#031220" stroke="#F5F6F8" stroke-width="0.1" />
                                        <path d="M7.07152 32.7159H5.60862V6.08232C5.60862 4.82863 6.51389 3.81892 7.61448 3.81892H26.0965V5.4705H7.61487C7.3095 5.4705 7.07152 5.75095 7.07152 6.08232V32.7159Z" fill="#031220" stroke="#F5F6F8" stroke-width="0.1" />
                                        <path d="M10.2844 32.0648H8.82229V30.104C8.82229 28.2623 10.2812 26.7664 12.0711 26.7664H23.1184C24.9083 26.7664 26.3668 28.2627 26.3668 30.104V31.5266H24.9043V30.104C24.9043 29.1711 24.1002 28.418 23.1184 28.418H12.0707C11.0885 28.418 10.2844 29.1715 10.2844 30.104V32.0648Z" fill="#031220" stroke="#F5F6F8" stroke-width="0.1" />
                                        <path d="M0.34435 35.8766L0.344278 35.8765L0.05 35.6292V31.807H49.95V35.6292L49.6558 35.8773C49.5603 35.9573 49.0814 36.3514 48.4465 36.7253C47.81 37.1002 47.0245 37.4499 46.3141 37.4499H3.68516C2.9745 37.4499 2.18909 37.1002 1.55278 36.7252C0.918101 36.3512 0.439536 35.9568 0.34435 35.8766ZM1.5125 34.7592V34.7844L1.5328 34.7994C1.84194 35.0277 2.22749 35.2768 2.61064 35.469C2.99207 35.6603 3.3778 35.7988 3.68516 35.7988H46.3145C46.6216 35.7988 47.0073 35.6603 47.3888 35.469C47.772 35.2768 48.1578 35.0277 48.4676 34.7994L48.4879 34.7844V34.7592V33.509V33.459H48.4379H1.5625H1.5125V33.509V34.7592Z" fill="#031220" stroke="#F5F6F8" stroke-width="0.1" />
                                        <path class="video" d="M31.8141 23.2115V19.0489V18.9989H31.7641H30.2215C29.1088 18.9989 28.1863 17.876 28.1863 16.4732V2.57745C28.1863 1.17324 29.1089 0.05 30.2215 0.05H45.3773C46.4916 0.05 47.4164 1.17335 47.4164 2.57745V16.4732C47.4164 17.8759 46.492 18.9989 45.3773 18.9989H36.2426H36.2225L36.208 19.0127L31.8141 23.2115ZM30.1715 1.70158V1.70539C30.0271 1.72498 29.9017 1.82807 29.8117 1.97022C29.7108 2.12959 29.6488 2.34555 29.6488 2.57789V16.4732C29.6488 16.7051 29.7108 16.9206 29.8117 17.0797C29.912 17.2377 30.0562 17.3473 30.2215 17.3473H33.2766V19.5336V19.6506L33.3611 19.5698L35.6865 17.3473H45.3769C45.543 17.3473 45.6882 17.2379 45.7893 17.0798C45.891 16.9208 45.9535 16.7052 45.9535 16.4732V2.57745C45.9535 2.34526 45.8911 2.12925 45.7895 1.96982C45.6885 1.81136 45.5433 1.70158 45.3769 1.70158H30.2215H30.1715Z" fill="#3D6CE7" stroke="#F5F6F8" stroke-width="0.1" />
                                        <path class="video" d="M36.2705 6.36712L36.1933 6.3168V6.40902V11.6887V11.7809L36.2705 11.7306L40.3256 9.09143L40.39 9.04954L40.3256 9.00763L36.2705 6.36712ZM43.318 9.04952L34.7308 14.6386V3.45831L43.318 9.04952Z" fill="#3D6CE7" stroke="#F5F6F8" stroke-width="0.1" />
                                    </svg>
                                </div>
                                <div class="counter__content counter__content-2">
                                    <h4><span class="counter">26</span>k</h4>
                                    <p>Innovative Foreign Online Courses</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="counter__item d-flex align-items-start counter__item-border counter__item-border-2">
                                <div class="counter__icon counter__icon-2 mr-15">
                                    <svg width="44" height="41" viewBox="0 0 44 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.3422 18.3518C23.5378 18.3322 23.7725 18.3322 23.9877 18.3518C28.6435 18.1953 32.3408 14.3806 32.3408 9.68568C32.3408 4.89291 28.4675 1 23.6551 1C18.8624 1 14.9695 4.89291 14.9695 9.68568C14.989 14.3806 18.6863 18.1953 23.3422 18.3518Z" stroke="#031220" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10.8983 4.91248C7.10324 4.91248 4.05152 7.98376 4.05152 11.7593C4.05152 15.4566 6.98587 18.4692 10.644 18.6061C10.8005 18.5866 10.9766 18.5866 11.1526 18.6061" stroke="#031220" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M33.1235 25.5703C37.8576 28.7394 37.8576 33.9039 33.1235 37.0534C27.7438 40.6529 18.9212 40.6529 13.5416 37.0534C8.80748 33.8843 8.80748 28.7198 13.5416 25.5703C18.9016 21.9904 27.7243 21.9904 33.1235 25.5703Z" stroke="#031220" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.12298 36.2123C5.71449 35.9188 4.38426 35.3515 3.28876 34.5103C0.237038 32.2215 0.237038 28.446 3.28876 26.1572C4.36469 25.3356 5.67537 24.7879 7.06429 24.4749" stroke="#031220" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                        <path class="star" d="M35.8077 22.6875L37.3377 25.7729C37.5464 26.2024 38.1027 26.6143 38.5722 26.6932L41.3454 27.1578C43.1188 27.4558 43.5361 28.7531 42.2582 30.0328L40.1022 32.2066C39.7371 32.5747 39.5372 33.2847 39.6502 33.7931L40.2674 36.484C40.7542 38.614 39.6328 39.4379 37.7637 38.3247L35.1644 36.7733C34.6949 36.4928 33.9212 36.4928 33.4431 36.7733L30.8437 38.3247C28.9834 39.4379 27.8532 38.6052 28.34 36.484L28.9573 33.7931C29.0703 33.2847 28.8703 32.5747 28.5052 32.2066L26.3492 30.0328C25.08 28.7531 25.4886 27.4558 27.2621 27.1578L30.0353 26.6932C30.496 26.6143 31.0524 26.2024 31.261 25.7729L32.7911 22.6875C33.6256 21.0133 34.9818 21.0133 35.8077 22.6875Z" fill="#F5F6F8" stroke="#3D6CE7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="counter__content counter__content-2">
                                    <h4><span class="counter">44</span>+</h4>
                                    <p>Qualified Teachers and language experts</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="counter__item d-flex align-items-start">
                                <div class="counter__icon counter__icon-2 mr-15">
                                    <svg x="0px" y="0px" viewBox="0 0 67.4 70.6" xml:space="preserve">
                                        <path class="st0" d="M59.7,25.4c0,0.1,0.4,2.8,6.4,12.2c0.6,0.8,0.8,1.8,0.6,2.8c-0.1,0.5-0.4,1-0.7,1.4c-0.3,0.4-0.8,0.8-1.2,1
                             c-1.7,0.9-3.4,1.8-5.2,2.5c0.4,3.7,0.4,7.4,0,11.1c-0.7,3.7-7.1,4.3-10.8,4.3c-0.3,0-0.7,0-1,0.1c-0.3,0.1-0.6,0.3-0.8,0.5
                             c-0.2,0.2-0.4,0.5-0.5,0.8c-0.1,0.3-0.2,0.6-0.1,1v5c0,0.1,0,0.3-0.1,0.4c0,0.1-0.1,0.2-0.2,0.4c-0.1,0.1-0.2,0.2-0.3,0.2
                             c-0.1,0.1-0.3,0.1-0.4,0.1s-0.3,0-0.4-0.1c-0.1-0.1-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.2-0.4c0-0.1-0.1-0.3-0.1-0.4v-5
                             c0-0.6,0.1-1.2,0.3-1.8c0.2-0.6,0.6-1.1,1-1.5c0.4-0.4,1-0.7,1.5-0.9c0.6-0.2,1.2-0.3,1.8-0.2c4.9,0,8.4-1,8.7-2.6
                             c0.7-3.6-0.1-10.8-0.1-11.3c0,0,0,0,0,0c0-0.2,0-0.5,0.1-0.7c0.1-0.2,0.3-0.3,0.5-0.4c1.9-0.8,3.8-1.7,5.6-2.7
                             c0.2-0.1,0.4-0.3,0.6-0.4c0.2-0.2,0.3-0.4,0.4-0.6c0.1-0.4,0-0.9-0.3-1.2c-6.4-10.1-6.8-12.9-6.8-13.2C55.1,4.4,38,2.7,32.8,2.7
                             c-0.5,0-0.9,0-1.2,0l0,0c-0.2,0-0.4,0-0.5,0c-3.2,0-15.6,0.7-21.9,10.1h11c0.8,0,1.6,0.2,2.3,0.6c0.7,0.4,1.3,0.9,1.8,1.5
                             c0.5-0.6,1.1-1.2,1.8-1.5c0.7-0.4,1.5-0.6,2.3-0.6h18c0.3,0,0.5,0.1,0.7,0.3c0.2,0.2,0.3,0.5,0.3,0.7V52c0,0.1,0,0.3-0.1,0.4
                             c-0.1,0.1-0.1,0.2-0.2,0.3c-0.1,0.1-0.2,0.2-0.3,0.2c-0.1,0.1-0.3,0.1-0.4,0.1h-18c-0.8,0-1.6,0.3-2.2,0.9s-0.9,1.4-0.9,2.2
                             c0,0.3-0.1,0.5-0.3,0.7c-0.2,0.2-0.5,0.3-0.7,0.3c-0.3,0-0.5-0.1-0.7-0.3c-0.2-0.2-0.3-0.4-0.3-0.7c0-0.8-0.3-1.6-0.9-2.2
                             c-0.6-0.6-1.4-0.9-2.2-0.9h-4.5c0,0,0,0,0,0.1c0,0,0.1,0.1,0.1,0.1c2.2,4.8,2.3,14.5,2.3,14.9c0,0.3-0.1,0.5-0.3,0.7
                             c-0.2,0.2-0.5,0.3-0.7,0.3h0c-0.3,0-0.5-0.1-0.7-0.3c-0.2-0.2-0.3-0.5-0.3-0.7l0,0c0-0.2-0.1-9.7-2.1-14c-0.2-0.4-0.4-0.7-0.6-1.1
                             H2.2c-0.3,0-0.5-0.1-0.7-0.3c-0.2-0.2-0.3-0.5-0.3-0.7V13.9c0-0.3,0.1-0.5,0.3-0.7c0.2-0.2,0.5-0.3,0.7-0.3h4.5
                             C13.5,1.2,28.8,0.7,31,0.7l0.5,0c0.3,0,0.8,0,1.3,0C38.4,0.7,57,2.5,59.7,25.4z M26.2,15.8c-0.6,0.6-0.9,1.4-0.9,2.2v34
                             c0.9-0.7,2-1,3.1-1h17V14.9h-17C27.6,14.9,26.8,15.2,26.2,15.8z M22.4,15.8c-0.6-0.6-1.4-0.9-2.2-0.9h-17V51h17c1.1,0,2.2,0.4,3.1,1
                             V18C23.3,17.2,22.9,16.4,22.4,15.8z M7.7,22.2h11.1c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.5,0.3-0.7c0-0.3-0.1-0.5-0.3-0.7
                             c-0.2-0.2-0.5-0.3-0.7-0.3H7.7c-0.3,0-0.5,0.1-0.7,0.3s-0.3,0.5-0.3,0.7c0,0.3,0.1,0.5,0.3,0.7C7.2,22.1,7.4,22.2,7.7,22.2z
                              M7.7,30.1h11.1c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7C19.3,28.1,19,28,18.8,28H7.7
                             c-0.3,0-0.5,0.1-0.7,0.3c-0.2,0.2-0.3,0.5-0.3,0.7s0.1,0.5,0.3,0.7C7.1,30,7.4,30.1,7.7,30.1z M18.8,37.9H7.7c-0.1,0-0.3,0-0.4-0.1
                             c-0.1-0.1-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.2-0.3c-0.1-0.1-0.1-0.3-0.1-0.4c0-0.1,0-0.3,0.1-0.4c0.1-0.1,0.1-0.2,0.2-0.3
                             c0.1-0.1,0.2-0.2,0.3-0.2c0.1-0.1,0.3-0.1,0.4-0.1h11.1c0.1,0,0.3,0,0.4,0.1c0.1,0.1,0.2,0.1,0.3,0.2c0.1,0.1,0.2,0.2,0.2,0.3
                             c0.1,0.1,0.1,0.3,0.1,0.4c0,0.1,0,0.3-0.1,0.4c-0.1,0.1-0.1,0.2-0.2,0.3c-0.1,0.1-0.2,0.2-0.3,0.2C19,37.9,18.9,37.9,18.8,37.9z
                              M7.7,45.8h11.1c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7c-0.2-0.2-0.5-0.3-0.7-0.3H7.7
                             c-0.3,0-0.5,0.1-0.7,0.3c-0.2,0.2-0.3,0.5-0.3,0.7s0.1,0.5,0.3,0.7C7.1,45.7,7.4,45.8,7.7,45.8z M40.9,22.2H29.8
                             c-0.3,0-0.5-0.1-0.7-0.3c-0.2-0.2-0.3-0.5-0.3-0.7c0-0.3,0.1-0.5,0.3-0.7c0.2-0.2,0.5-0.3,0.7-0.3h11.1c0.3,0,0.5,0.1,0.7,0.3
                             s0.3,0.5,0.3,0.7c0,0.3-0.1,0.5-0.3,0.7C41.5,22.1,41.2,22.2,40.9,22.2z M29.8,30.1h11.1c0.3,0,0.5-0.1,0.7-0.3
                             c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7c-0.2-0.2-0.5-0.3-0.7-0.3H29.8c-0.3,0-0.5,0.1-0.7,0.3c-0.2,0.2-0.3,0.5-0.3,0.7
                             s0.1,0.5,0.3,0.7C29.3,30,29.6,30.1,29.8,30.1z M40.9,37.9H29.8c-0.1,0-0.3,0-0.4-0.1c-0.1-0.1-0.2-0.1-0.3-0.2
                             c-0.1-0.1-0.2-0.2-0.2-0.3c-0.1-0.1-0.1-0.3-0.1-0.4c0-0.1,0-0.3,0.1-0.4c0.1-0.1,0.1-0.2,0.2-0.3c0.1-0.1,0.2-0.2,0.3-0.2
                             c0.1-0.1,0.3-0.1,0.4-0.1h11.1c0.1,0,0.3,0,0.4,0.1c0.1,0.1,0.2,0.1,0.3,0.2c0.1,0.1,0.2,0.2,0.2,0.3c0.1,0.1,0.1,0.3,0.1,0.4
                             c0,0.1,0,0.3-0.1,0.4c-0.1,0.1-0.1,0.2-0.2,0.3c-0.1,0.1-0.2,0.2-0.3,0.2C41.2,37.9,41,37.9,40.9,37.9z M29.8,45.8h5.5
                             c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7c-0.2-0.2-0.5-0.3-0.7-0.3h-5.5c-0.3,0-0.5,0.1-0.7,0.3
                             c-0.2,0.2-0.3,0.5-0.3,0.7s0.1,0.5,0.3,0.7C29.3,45.7,29.6,45.8,29.8,45.8z" />
                                        <path class="st1" d="M7.7,22.2h11.1c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.5,0.3-0.7c0-0.3-0.1-0.5-0.3-0.7c-0.2-0.2-0.5-0.3-0.7-0.3
                             H7.7c-0.3,0-0.5,0.1-0.7,0.3s-0.3,0.5-0.3,0.7c0,0.3,0.1,0.5,0.3,0.7C7.2,22.1,7.4,22.2,7.7,22.2z" />
                                        <path class="st1" d="M7.7,30.1h11.1c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7C19.3,28.1,19,28,18.8,28H7.7
                             c-0.3,0-0.5,0.1-0.7,0.3c-0.2,0.2-0.3,0.5-0.3,0.7s0.1,0.5,0.3,0.7C7.1,30,7.4,30.1,7.7,30.1z" />
                                        <path class="st1" d="M7.7,37.9h11.1c0.1,0,0.3,0,0.4-0.1c0.1-0.1,0.2-0.1,0.3-0.2c0.1-0.1,0.2-0.2,0.2-0.3c0.1-0.1,0.1-0.3,0.1-0.4
                             c0-0.1,0-0.3-0.1-0.4c-0.1-0.1-0.1-0.2-0.2-0.3c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1-0.1-0.3-0.1-0.4-0.1H7.7c-0.1,0-0.3,0-0.4,0.1
                             C7.2,36,7.1,36.1,7,36.2c-0.1,0.1-0.2,0.2-0.2,0.3c-0.1,0.1-0.1,0.3-0.1,0.4c0,0.1,0,0.3,0.1,0.4c0.1,0.1,0.1,0.2,0.2,0.3
                             c0.1,0.1,0.2,0.2,0.3,0.2C7.4,37.9,7.6,37.9,7.7,37.9L7.7,37.9z" />
                                        <path class="st1" d="M7.7,45.8h11.1c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7c-0.2-0.2-0.5-0.3-0.7-0.3H7.7
                             c-0.3,0-0.5,0.1-0.7,0.3c-0.2,0.2-0.3,0.5-0.3,0.7s0.1,0.5,0.3,0.7C7.1,45.7,7.4,45.8,7.7,45.8L7.7,45.8z" />
                                        <path class="st1" d="M29.8,22.2h11.1c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.5,0.3-0.7c0-0.3-0.1-0.5-0.3-0.7s-0.5-0.3-0.7-0.3H29.8
                             c-0.3,0-0.5,0.1-0.7,0.3c-0.2,0.2-0.3,0.5-0.3,0.7c0,0.3,0.1,0.5,0.3,0.7C29.3,22.1,29.6,22.2,29.8,22.2L29.8,22.2z" />
                                        <path class="st1" d="M29.8,30.1h11.1c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7c-0.2-0.2-0.5-0.3-0.7-0.3
                             H29.8c-0.3,0-0.5,0.1-0.7,0.3c-0.2,0.2-0.3,0.5-0.3,0.7s0.1,0.5,0.3,0.7C29.3,30,29.6,30.1,29.8,30.1z" />
                                        <path class="st1" d="M29.8,37.9h11.1c0.1,0,0.3,0,0.4-0.1c0.1-0.1,0.2-0.1,0.3-0.2c0.1-0.1,0.2-0.2,0.2-0.3c0.1-0.1,0.1-0.3,0.1-0.4
                             c0-0.1,0-0.3-0.1-0.4c-0.1-0.1-0.1-0.2-0.2-0.3c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1-0.1-0.3-0.1-0.4-0.1H29.8c-0.1,0-0.3,0-0.4,0.1
                             c-0.1,0.1-0.2,0.1-0.3,0.2c-0.1,0.1-0.2,0.2-0.2,0.3c-0.1,0.1-0.1,0.3-0.1,0.4c0,0.1,0,0.3,0.1,0.4c0.1,0.1,0.1,0.2,0.2,0.3
                             c0.1,0.1,0.2,0.2,0.3,0.2C29.6,37.9,29.7,37.9,29.8,37.9L29.8,37.9z" />
                                        <path class="st1" d="M29.8,45.8h5.5c0.3,0,0.5-0.1,0.7-0.3c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7c-0.2-0.2-0.5-0.3-0.7-0.3h-5.5
                             c-0.3,0-0.5,0.1-0.7,0.3c-0.2,0.2-0.3,0.5-0.3,0.7s0.1,0.5,0.3,0.7C29.3,45.7,29.6,45.8,29.8,45.8L29.8,45.8z" />
                                    </svg>
                                </div>
                                <div class="counter__content counter__content-2">
                                    <h4><span class="counter">52</span>+</h4>
                                    <p>Learners Enrolled in Educal Courses</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- counter area end -->


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
                                                    <img src="assets_stunting/img/course/tutor/course-tutor-1.jpg" alt="">
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
                                                    <img src="assets_stunting/img/course/tutor/course-tutor-2.jpg" alt="">
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
                                                    <img src="assets_stunting/img/course/tutor/course-tutor-3.jpg" alt="">
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
                        <div class="course__enroll-wrapper mt-40 p-relative d-sm-flex align-items-center justify-content-between include-bg" data-background="assets_stunting/img/course/bg/course-bg.png">
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

        <!-- certificate area start -->
        <section class="certificate__area pb-120 pt-120">
            <div class="container">
                <div class="certificate__inner grey-bg-9 p-relative">
                    <div class="certificate__thumb">
                        <img src="assets_stunting/img/certificate/certificate.png" alt="">
                    </div>
                    <div class="row">
                        <div class="col-xxl-7">
                            <div class="certificate__content">
                                <div class="section__title-wrapper mb-10">
                                    <span class="section__title-pre-3">Online Certification</span>
                                    <h2 class="section__title section__title-44">You can be your own <br> Guiding star
                                        with our help!</h2>
                                </div>
                                <p>They blend their knowledge and enthusiasm to communicate.</p>
                                <div class="certificate__links d-sm-flex align-items-center">
                                    <a href="https://www.youtube.com/watch?v=4XGLPTtn4xQ" class="play-video popup-video"><i class="fa-solid fa-play"></i> Play video</a>

                                    <ul>
                                        <li><a href="about.html">Ridiculus</a></li>
                                        <li><a href="about.html">Retrun</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- certificate area end -->

        <!-- price area start -->
        <section class="price__area pb-85">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="section__title-wrapper text-center mb-60">
                            <span class="section__title-pre-3">Our Pricing</span>
                            <h2 class="section__title-2">Simple, transparent pricing</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="price__banner theme-bg-3 mb-30 fix p-relative">
                            <div class="price__shape">
                                <img src="assets_stunting/img/price/price-shape.png" alt="">
                            </div>
                            <div class="price__banner-content p-relative z-index-1">
                                <h3>
                                    <span>Save More</span>
                                    With Goodplans.
                                </h3>
                                <p>Choose a plan and getunboard minutes.Then get $100 credits for your next payment</p>

                                <a href="contact.html" class="tp-price-btn">Choose Plan</a>
                            </div>
                            <div class="price__thumb">
                                <img src="assets_stunting/img/price/price-thumb.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="price__item white-bg mb-30 transition-3 fix">
                            <h3 class="price__title">Day pass</h3>

                            <div class="price__content">
                                <div class="price__list mb-35">
                                    <ul>
                                        <li>All limited links <span><i class="fa-solid fa-check"></i></span></li>
                                        <li>Own analytics platform <span><i class="fa-solid fa-check"></i></span></li>
                                        <li>Chat support <span><i class="fa-solid fa-check"></i></span></li>
                                        <li class="unavailable">Optimuze hashtags <span><i class="fa-solid fa-xmark"></i></span></li>
                                        <li class="unavailable">Unlimited user <span><i class="fa-solid fa-xmark"></i></span></li>
                                    </ul>
                                </div>
                                <div class="price__amount mb-30">
                                    <h4>$16.00 <span>/ perday</span></h4>
                                </div>
                                <div class="price__btn">
                                    <a href="contact.html" class="tp-btn-9 tp-btn-12 w-100">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="price__item active white-bg mb-30 transition-3 fix">
                            <h3 class="price__title">Monthly pass</h3>

                            <div class="price__content">
                                <div class="price__list mb-35">
                                    <ul>
                                        <li>All limited links <span><i class="fa-solid fa-check"></i></span></li>
                                        <li>Own analytics platform <span><i class="fa-solid fa-check"></i></span></li>
                                        <li>Chat support <span><i class="fa-solid fa-check"></i></span></li>
                                        <li>Optimuze hashtags <span><i class="fa-solid fa-xmark"></i></span></li>
                                        <li>Unlimited user <span><i class="fa-solid fa-xmark"></i></span></li>
                                    </ul>
                                </div>
                                <div class="price__amount mb-30">
                                    <h4>$34.00 <span>/ monthly</span></h4>
                                </div>
                                <div class="price__btn">
                                    <a href="contact.html" class="tp-btn-9 tp-btn-12 w-100">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- price area end -->

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

                            <div class="faq__btn">
                                <a href="about.html" class="tp-btn-5 tp-btn-13">Read our full FAQ</a>
                            </div>
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
                        <img class="app__shape-1" src="assets_stunting/img/app/app-shape-1.png" alt="">
                        <img class="app__shape-2" src="assets_stunting/img/app/app-shape-2.png" alt="">
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
                                        <span><img src="assets_stunting/img/app/google-play.png" alt=""></span>
                                        Google play
                                    </a>
                                </div>
                                <div class="app__item">
                                    <a href="#" class="active">
                                        <span class="apple"><img src="assets_stunting/img/app/apple.png" alt=""></span>
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