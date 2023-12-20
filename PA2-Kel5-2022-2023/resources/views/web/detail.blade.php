<x-web-layout title="Detail Pemesanan">
    <main>

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                                <span class="dvdr">/</span>
                                <span>Pesanan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->


        <!-- checkout-area start -->
        <section class="checkout-area pb-50">
            <div class="container">
                <form action="{{ route('pembelian.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="checkbox-form">
                                <h3>Detail Pesanan</h3>
                                <?php
                                $detail = \App\Models\Pesanan::where('user_id', auth()->user()->id)
                                    ->join('produk', 'produk.id', '=', 'pesanan.product_id')
                                    ->get();
                                ?>
                                {{-- {{dd($produk)}} --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Nama Lengkap <span class="required">*</span></label>
                                            <input type="text" placeholder="Nama Lengkap" value=""
                                                name="username">
                                            @error('username')
                                                <span class="alert-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Alamat/Lokasi <span class="required">*</span></label>
                                            <input class="form-control @error('Alamat/Lokasi') is-invalid @enderror"
                                                type="text" placeholder="Alamat/Lokasi" name="alamat">
                                            @error('alamat')
                                                <span class="alert-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Tanggal<span class="required">*</span></label>
                                            <input class="form-control @error('tanggal') is-invalid @enderror"
                                                type="date" placeholder="Tanggal" name="tanggal_pembelian">
                                            @error('tanggal_pembelian')
                                                <span class="alert-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Nomor Telepon <span class="required">*</span></label>
                                            <input type="text" placeholder="Nomor Telepon" name="no_telpon"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="order-notes">
                                        <div class="checkout-form-list">
                                            <label>Bukti Pembayaran</label>
                                            <input type="file"
                                                class="form-control @error('gambar') is-invalid @enderror"
                                                name="bukti_pembayaran">
                                            @error('bukti_pembayaran')
                                                <span class="alert-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="your-order mb-30 ">
                                <h3>Pesanan Anda</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-name">Harga</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <?php $subtotal = 0; ?>
                                        @foreach ($detail as $key => $value)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $value->name }} <strong class="product-quantity"> ×
                                                        {{ $value->total }}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">Rp.{{ number_format($value->harga, 2) }}</span>
                                                </td>
                                                <td class="product-total">
                                                    <?php
                                                    $total = $value->harga * $value->total;
                                                    $subtotal += $total;
                                                    ?>
                                                    <span class="amount">Rp.{{ number_format($total, 2) }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td></td>
                                                <td><strong><span
                                                            class="amount">{{ number_format($subtotal, 2) }}</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="accordion" id="checkoutAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="checkoutOne">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#bankOne"
                                                    aria-expanded="true" aria-controls="bankOne">
                                                    Direct Bank Transfer
                                                </button>
                                            </h2>
                                            <div id="bankOne" class="accordion-collapse collapse show"
                                                aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
                                                <div class="accordion-body">
                                                    No Rek. 7100 6789 8965
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment mt-20">
                                        <button type="submit" class="tp-btn tp-color-btn w-100 banner-animation">Pesan
                                            Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- checkout-area end -->
    </main>

</x-web-layout>
