<x-app-layout title="Dashboard">

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3>Pesanan</h3>
                    </div>
                    <div class="col-12 col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Pesanan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid list-products">
            <div class="row">
                <!-- Individual column searching (text inputs) Starts-->
                <div class="col-sm-12">
                    <div class="card ongoing-project recent-orders">
                        <div class="card-header card-no-border">
                            <div class="media media-dashboard">
                                <div class="media-body">
                                    <h5 class="mb-0">Daftar Pesanan</h5>
                                </div>

                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> <span>Pesanan</span></th>
                                            <th> <span>Nama Pemesan</span></th>
                                            <th> <span>Tanggal </span></th>
                                            <th> <span>Total </span></th>
                                            <th> <span>Status </span></th>
                                            <th> <span>Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembelians as $pembelian)
                                            <tr>
                                                <td>
                                                    @foreach ($pembelian->pembelianItems as $item)
                                                        <p>{{ $item->produk->name }}</p>
                                                    @endforeach
                                                </td>
                                                <td class="img-content-box">
                                                    <h6>{{ $pembelian->username }}</h6>
                                                </td>
                                                <td>
                                                    <h6>{{ \Carbon\Carbon::parse($pembelian->tanggal_pembelian)->format('Y-m-d') }}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6>Rp. {{ number_format($pembelian->total_harga, 2, ',', '.') }}</h6>
                                                </td>
                                                <td>
                                                    @if ($pembelian->status == 'Pending')
                                                        <span class="badge badge-secondary text-white">Pending</span>
                                                    @elseif($pembelian->status == 'Diproses')
                                                        <span class="badge badge-info text-white">Diproses</span>
                                                    @elseif($pembelian->status == 'Selesai')
                                                        <span class="badge badge-success text-white">Selesai</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('kasir.pesanan.show', $pembelian->id) }}"
                                                        class="btn">
                                                        <i class="m-1" data-feather="eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </x-kasir-layout>
