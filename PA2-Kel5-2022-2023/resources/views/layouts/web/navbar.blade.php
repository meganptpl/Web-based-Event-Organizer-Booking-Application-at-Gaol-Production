<header>
    <div class="header__top theme-bg-1 d-none d-md-block">

    </div>
    <div id="header-sticky" class="header__main-area d-none d-xl-block">
        <div class="container">
            <div class="header__for-megamenu p-relative">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <div class="header__logo">
                            <a href="index.html"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="header__menu main-menu text-center">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class=" has-homemenu">
                                        <a href="{{ url('/') }}">Home</a>

                                    </li>


                                    <li class="has-dropdown">
                                        <a href="#">Paket</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ url('/paketmusik') }}">Paket Musik</a></li>
                                            <li><a href="{{ url('/paketmakanan') }}">Paket Makanan</a></li>
                                            <li><a href="{{ url('/paketdekorasi') }}">Paket Dekorasi</a></li>
                                            <li><a href="{{ url('/paketacara') }}">Paket Acara</a></li>
                                        </ul>
                                    </li>

                                    <li class=" has-homemenu">
                                        <a href="{{ url('galeri') }}">Galeri</a>

                                    </li>
                                    <li><a href="{{ url('about') }}">About Us</a></li>
                                    <li><a href="{{ url('user/testimoni') }}">Testimoni</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="header__info d-flex align-items-center">
                            <div class="header__info-search tpcolor__purple ml-10">
                                <button class="tp-search-toggle"><i class="icon-search"></i></button>
                            </div>
                            @guest
                                <div class="header__info-user tpcolor__yellow ml-10">
                                    <a href="{{ url('login') }}"><i class="icon-user"></i></a>
                                </div>
                            @endguest
                            <?php
                            $banyak = \App\Models\Pesanan::join('produk', 'produk.id', '=', 'pesanan.product_id')
                                ->where('user_id', Auth::user()->id)
                                ->count();
                            ?>
                            <div class="header__info-cart tpcolor__oasis ml-10 tp-cart-toggle">
                                <button><i><img src="{{ asset('assets/img/icon/cart-1.svg') }}" alt=""></i>
                                    <span>{{ $banyak }}</span>
                                </button>
                            </div>
                            <div class="header__info-cart tpcolor__oasis ml-10">
                                @auth

                                    <a class="btn btn-outline-danger" href="{{ url('/do_logout') }}">Logout</a>

                                @endauth
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header-search -->
    <div class="tpsearchbar tp-sidebar-area">
        <button class="tpsearchbar__close"><i class="icon-x"></i></button>
        <div class="search-wrap text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6 pt-100 pb-100">
                        <h2 class="tpsearchbar__title">What Are You Looking For?</h2>
                        <div class="tpsearchbar__form">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search Product...">
                                <button class="tpsearchbar__search-btn"><i class="icon-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-body-overlay"></div>
    <!-- header-search-end -->

    <!-- header-cart-start -->
    <div class="tpcartinfo tp-cart-info-area p-relative">
        <button class="tpcart__close"><i class="icon-x"></i></button>
        <div class="tpcart">
            <?php
            $pesanan = \App\Models\Pesanan::join('produk', 'produk.id', '=', 'pesanan.product_id')
                ->where('user_id', Auth::user()->id)
                ->get();
            ?>
            <h4 class="tpcart__title">Pesanan </h4>
            <div class="tpcart__product">
                <div class="tpcart__product-list">
                    <ul>
                        <?php $subtotal = 0; ?>
                        @foreach ($pesanan as $key)
                            <li>
                                <div class="tpcart__item">
                                    <div class="tpcart__img">
                                        <img src="{{ asset('images/produk/' . $key->gambar) }}" alt="">
                                        <div class="tpcart__del">
                                            <a href="#"><i class="icon-x-circle"></i></a>
                                        </div>
                                    </div>
                                    <div class="tpcart__content">
                                        <span class="tpcart__content-title"><a
                                                href="shop-details.html">{{ $key->name }}</a>
                                        </span>
                                        <div class="tpcart__cart-price">
                                            <span class="new-price">Rp {{ number_format($key->harga, 2) }}</span>
                                            <?php
                                            $hargatotal = $key->total * $key->harga;
                                            $subtotal += $hargatotal;
                                            ?>
                                            <span class="quantity">x {{ $key->total }} =
                                                {{ number_format($hargatotal, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tpcart__checkout">
                    <div class="tpcart__total-price d-flex justify-content-between align-items-center">
                        <span> Subtotal:</span>
                        <span class="heilight-price"> Rp {{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="tpcart__checkout-btn">
                        <a class="tpcart-btn mb-10" href="{{ route('pembayaran.show', Auth::user()->id) }}">Bayar
                            Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cartbody-overlay"></div>
    <!-- header-cart-end -->

    <!-- mobile-menu-area -->
    <div id="header-sticky-2" class="tpmobile-menu secondary-mobile-menu d-xl-none">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-3 col-sm-3">
                    <div class="mobile-menu-icon">
                        <button class="tp-menu-toggle"><i class="icon-menu1"></i></button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 col-sm-4">
                    <div class="header__logo text-center">
                        <a href="index.html"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-3 col-sm-5">
                    <div class="header__info d-flex align-items-center">
                        <div class="header__info-search tpcolor__purple ml-10 d-none d-sm-block">
                            <button class="tp-search-toggle"><i class="icon-search"></i></button>
                        </div>
                        <div class="header__info-user tpcolor__yellow ml-10 d-none d-sm-block">
                            <a href="#"><i class="icon-user"></i></a>
                        </div>
                        <div class="header__info-wishlist tpcolor__greenish ml-10 d-none d-sm-block">
                            <a href="#"><i class="icon-heart icons"></i></a>
                        </div>
                        <div class="header__info-cart tpcolor__oasis ml-10 tp-cart-toggle">
                            <button><i><img src="{{ asset('assets/img/icon/cart-1.svg') }}" alt=""></i>
                                <span>5</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- mobile-menu-area-end -->

    <!-- sidebar-menu-area -->
    <div class="tpsideinfo">
        <button class="tpsideinfo__close">Close<i class="fal fa-times ml-10"></i></button>
        <div class="tpsideinfo__search text-center pt-35">
            <span class="tpsideinfo__search-title mb-20">What Are You Looking For?</span>
            <form action="#">
                <input type="text" placeholder="Search Products...">
                <button><i class="icon-search"></i></button>
            </form>
        </div>
        <div class="tpsideinfo__nabtab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Menu</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Categories</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                    aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="mobile-menu"></div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div class="tpsidebar-categories">
                        <ul>
                            <li><a href="shop-details.html">Dairy Farm</a></li>
                            <li><a href="shop-details.html">Healthy Foods</a></li>
                            <li><a href="shop-details.html">Lifestyle</a></li>
                            <li><a href="shop-details.html">Organics</a></li>
                            <li><a href="shop-details.html">Photography</a></li>
                            <li><a href="shop-details.html">Shopping</a></li>
                            <li><a href="shop-details.html">Tips & Tricks</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="tpsideinfo__account-link">
            <a href="log-in.html"><i class="icon-user icons"></i> Login / Register</a>
        </div>
        <div class="tpsideinfo__wishlist-link">
            <a href="wishlist.html" target="_parent"><i class="icon-heart"></i> Wishlist</a>
        </div>
    </div>
    <!-- sidebar-menu-area-end -->
</header>
