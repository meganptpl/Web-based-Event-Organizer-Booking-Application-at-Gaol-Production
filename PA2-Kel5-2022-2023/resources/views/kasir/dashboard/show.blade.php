<x-app-layout title="Detail Pesanan">
    <div class="page-body checkout">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3>Detail Pesanan</h3>
                    </div>
                    <div class="col-12 col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Pesanan</li>
                            <li class="breadcrumb-item active">Detail Pesanan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Orderan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-sm-12">
                            <div class="checkout-details">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div class="checkbox-title">
                                            <h4 class="mb-0">Pesanan </h4>
                                        </div>
                                    </div>
                                    <ul class="qty">
                                        <li>
                                            Nama Pemesanan
                                            <span>
                                                <p>{{ $pembelian->username }}</p>
                                            </span>
                                        </li>
                                        <br>
                                        <li>
                                            Nomor Telp
                                            <span>
                                                <p>{{ $pembelian->no_telpon }}</p>
                                            </span>
                                        </li>
                                        <li>
                                            Alamat
                                            <span>
                                                <p>{{ $pembelian->alamat }}</p>
                                            </span>
                                        </li>
                                        <li>
                                            Tanggal Pesanan
                                            <span>
                                                <p>{{ \Carbon\Carbon::parse($pembelian->tanggal_pembelian)->format('Y-m-d') }}
                                                </p>
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="title-box">
                                        <div class="checkbox-title">
                                            <h4 class="mb-0">Product </h4><span>Total</span>
                                        </div>
                                    </div>
                                    <ul class="qty">
                                        @foreach ($pembelian->pembelianItems as $item)
                                            <li>
                                                {{ $item->produk->name }} × {{ $item->jumlah }}
                                                <span>Rp. {{ number_format($item->produk->harga, 2, ',', '.') }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="sub-total total">
                                        <li>Total <span class="count">Rp.
                                                {{ number_format($pembelian->total_harga, 2, ',', '.') }}</span>
                                        </li>
                                    </ul>
                                    <div class="animate-chk">

                                    </div>
                                    <div class="order-place"><a class="btn btn-primary"
                                            href="{{ route('kasir.request_download_pdf', $pembelian->id) }}">Cetak
                                            nota Pesanan</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
