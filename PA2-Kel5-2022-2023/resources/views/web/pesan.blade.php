<x-web-layout title="Pesanan">
    <main>

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area grey-bg pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                                <span class="dvdr">/</span>
                                <span class="tp-breadcrumb__active"><a href="index.html">Peket Makanan</a></span>
                                <span class="dvdr">/</span>
                                <span>Pesanan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area-start -->
        <section class="shopdetails-area grey-bg pb-50">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-md-12">
                        <div class="tpdetails__area mr-60 pb-30">
                            <div class="tpdetails__product mb-30">
                                <div class="tpdetails__title-box">
                                    <h3 class="tpdetails__title">{{ $detail_pesan->name }}</h3>
                                    <ul class="tpdetails__brand">
                                        {{-- <li>
                                 No.Pesanan: <span>ORFARMVE005</span>
                              </li> --}}
                                    </ul>
                                </div>
                                <div class="tpdetails__box">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="tpproduct-details__nab">
                                                <div class="tab-content" id="nav-tabContents">
                                                    <div class="tab-pane fade show active w-img" id="nav-home"
                                                        role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                        <img src="{{ asset('images/produk/' . $detail_pesan->gambar) }}"
                                                            alt="">
                                                        <div class="tpproduct__info bage">
                                                            <span class="tpproduct__info-hot bage__hot">HOT</span>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade w-img" id="nav-contact" role="tabpanel"
                                                        aria-labelledby="nav-contact-tab" tabindex="0">
                                                        <img src="{{ asset('images/produk/' . $detail_pesan->gambar) }}"
                                                            alt="">
                                                        <div class="tpproduct__info bage">
                                                            <span class="tpproduct__info-hot bage__hot">HOT</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-50">
                                            <div class="product__details">
                                                <div class="product__details-price-box">
                                                    <h5 class="product__details-price">Rp. {{ number_format($detail_pesan->harga, 2, ',', '.') }}
                                                    </h5>
                                                    <ul class="product__details-info-list">
                                                        <li>Nama : {{ $detail_pesan->name }}</li>
                                                        <li>Jenis Paket : {{ $detail_pesan->jenis }}</li>
                                                        <li>Deskripsi: {{ $detail_pesan->deskripsi }}</li>
                                                    </ul>
                                                </div>
                                                <div class="product__details-cart">
                                                    <form class="form theme-form projectcreate" id="form-pesan"
                                                        method="POST">
                                                        @csrf
                                                        <div
                                                            class="product__details-quantity d-flex align-items-center mb-15">
                                                            <b>Qty:</b>
                                                            <div class="product__details-count mr-10">
                                                                <span class="cart-minus"><i
                                                                        class="far fa-minus"></i></span>
                                                                <input class="tp-cart-input" type="text"
                                                                    value="1" name="total">
                                                                <span class="cart-plus"><i
                                                                        class="far fa-plus"></i></span>
                                                            </div>
                                                            <div class="product__details-btn">
                                                                <button type="submit"
                                                                    class="btn btn-success me-3">Pesan Sekarang</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <div class="tpsidebar pb-30">
                            <div class="tpsidebar__warning mb-30">
                                <ul>
                                    <li>
                                        <div class="tpsidebar__warning-item">
                                            <div class="tpsidebar__warning-icon">
                                                <i class="icon-package"></i>
                                            </div>
                                            <div class="tpsidebar__warning-text">
                                                <p>Free shipping apply to all <br> orders over $90</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tpsidebar__warning-item">
                                            <div class="tpsidebar__warning-icon">
                                                <i class="icon-shield"></i>
                                            </div>
                                            <div class="tpsidebar__warning-text">
                                                <p>Guaranteed 100% Organic <br> from nature farms</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tpsidebar__warning-item">
                                            <div class="tpsidebar__warning-icon">
                                                <i class="icon-package"></i>
                                            </div>
                                            <div class="tpsidebar__warning-text">
                                                <p>60 days returns if you change <br> your mind</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tpsidebar__banner mb-30">
                                <img src="assets/img/shape/sidebar-product-1.png" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-details-area-end -->

    </main>
    @section('script')
        <script>
            $('#form-pesan').submit(function(e) {
                e.preventDefault();
                var data = $('#form-pesan').serialize();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('order.store') }}',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            toastr.success('Success messages');
                        } else {
                            toastr.error('errors messages');
                        }
                    }
                });
            });
        </script>
    @endsection
</x-web-layout>
