<x-app-layout title="Pembayaran">
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3>Pembayaran</h3>
                    </div>
                    <div class="col-12 col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Pembayaran</li>
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
                                    <h5 class="mb-0">Daftar Pembayaran</h5>
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
                                            <th> <span>Total Pesanan </span></th>
                                            <th> <span>Bukti Pembayaran </span></th>
                                            <th> <span>Status</span></th>
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
                                                    <h6>Rp. {{ number_format($pembelian->total_harga, 2, ',', '.') }}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('kasir.download.gambar', ['id' => $pembelian->id]) }}"><i
                                                            class="icon-image mx-2"></i>{{ $pembelian->bukti_pembayaran }}
                                                        {{-- <img class="img-fluid img-40"
                                                            src="{{ asset('images/pembayaran/' . $pembelian->bukti_pembayaran) }}"
                                                            alt="#"> --}}
                                                        {{-- <i class="fas fa-download"></i> --}}
                                                    </a>
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

                                                    @if ($pembelian->status == 'Pending')
                                                        <a href="javascript:;" class="btn btn-info btn-sm"
                                                            onclick="handle_confirm('Apakah anda sedang menyiapkan pesanan ini?', 'Ya, benar', 'Tidak, belum', 'POST',
                                                            '{{ route('kasir.Diproses', ['id' => $pembelian->id]) }}')">
                                                            Diproses
                                                        </a>
                                                    @elseif($pembelian->status == 'Diproses')
                                                        <a href="javascript:;" class="btn btn-success btn-sm"
                                                            onclick="handle_confirm('Apakah anda pesanan ini telah selesai?', 'Ya, selesai', 'Tidak, belum', 'POST',
                                                            '{{ route('kasir.Selesai', ['id' => $pembelian->id]) }}')">
                                                            Selesai
                                                        </a>
                                                    @endif
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
    </div>
</x-app-layout>
