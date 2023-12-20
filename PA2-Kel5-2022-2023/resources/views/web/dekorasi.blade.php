<x-web-layout title="Paket Dekorasi">
   <main>
       <!-- banner-area-start -->
       <section class="banner-area pb-400 grey-bg pt-70">
           <div class="container">
               <div class="row">
                   <div class="col-lg-4 col-md-6">
                       <div class="tpbanner__item mb-30">
                           <a href="shop-3.html">
                               <div class="tpbanner__content" data-background="assets/img/banner/oke1.jpg">
                                   <span class="tpbanner__sub-title mb-10">Top Music</span>
                                   <h4 class="tpbanner__title mb-30">Kualitas Suara <br> Yang Terbaik dan Bagus</h4>
                               </div>
                           </a>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-6">
                       <div class="tpbanner__item mb-30">
                           <a href="shop-3.html">
                               <div class="tpbanner__content" data-background="assets/img/banner/oke2.jpg">
                                   <span class="tpbanner__sub-title tpbanner__white mb-10">Kualiats Lighting</span>
                                   <h4 class="tpbanner__title mb-30">Lampu Sorot <br> Yang Mewah</h4>
                               </div>
                           </a>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-6">
                       <div class="tpbanner__item mb-30">
                           <a href="shop-3.html">
                               <div class="tpbanner__content" data-background="assets/img/banner/oke3.jpg">
                                   <span class="tpbanner__sub-title mb-10">Top Seller</span>
                                   <h4 class="tpbanner__title mb-30">Suara Mic <br> Yang Jernih</h4>
                               </div>
                           </a>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- banner-area-end -->
       <!-- breadcrumb-area-start -->
       <div class="breadcrumb__area grey-bg pt-5 pb-5">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="tp-breadcrumb__content">
                           <div class="tp-breadcrumb__list">
                               <span class="tp-breadcrumb__active"><a href="index.html">Paket</a></span>
                               <span class="dvdr">/</span>
                               <span>Paket Dekorasi</span>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- breadcrumb-area-end -->

       <!-- shop-area-start -->
       <section class="shop-area-start grey-bg pb-200">
           <div class="container">
               <div class="row">
                   <div class="col-xl-12 col-lg-12 col-md-12">
                       <div class="tpshop__details">
                           <div class="tpshop__category">

                           </div>

                           <div class="tab-content" id="nav-tabContent">
                               <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel"
                                   aria-labelledby="nav-popular-tab">
                                   <div
                                       class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">
                                       @foreach ($paket_dekorasi as $item)
                                           <div class="col">
                                               <div class="tpproduct p-relative mb-20">
                                                   <div class="tpproduct__thumb p-relative text-center">
                                                       <a href="#"><img
                                                               src="{{ asset('images/produk/' . $item->gambar) }}"
                                                               alt=""></a>
                                                       <a class="tpproduct__thumb-img"
                                                           href="shop-details-grid.html"><img
                                                               src="{{ asset('images/produk/' . $item->gambar) }}"
                                                               alt=""></a>
                                                       
                                                   </div>
                                                   <div class="tpproduct__content">
                                                       <h4 class="tpproduct__title">
                                                           <a href="shop-details-top-.html">{{ $item->name }}</a>
                                                       </h4>
                                                       <div class="tpproduct__price">
                                                           <span>Rp. {{ number_format($item->harga, 2, ',', '.') }}</span></span>
                                                       </div>
                                                   </div>
                                                   <div class="tpproduct__hover-text">
                                                       <div
                                                           class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                                           <a class="tp-btn-2" href="{{ Route('pesan.show',$item->id) }}">Pesan</a>
                                                       </div>
                                                       <div class="tpproduct__descrip">
                                                           <p>{{ $item->deskripsi }}</p>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       @endforeach
                                   </div>
                               </div>
                           </div>

                           <div class="basic-pagination text-center mt-35">
                               <nav>
                                   <ul>
                                       <li>
                                           <span class="current">1</span>
                                       </li>
                                       <li>
                                           <a href="blog.html">2</a>
                                       </li>
                                       <li>
                                           <a href="blog.html">3</a>
                                       </li>
                                       <li>
                                           <a href="blog.html">
                                               <i class="icon-chevrons-right"></i>
                                           </a>
                                       </li>
                                   </ul>
                               </nav>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- shop-area-end -->
   </main>
</x-web-layout>
