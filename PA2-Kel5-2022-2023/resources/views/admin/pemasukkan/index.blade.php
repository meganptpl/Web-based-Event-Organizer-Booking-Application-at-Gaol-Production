<x-app-layout title="Pemasukkan">
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/assets/css/vendors/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/assets/css/vendors/datatable-extension.css') }}">
    @endsection
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3>Pemasukkan</h3>
                    </div>
                    <div class="col-12 col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Pemasukkan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>Pemasukkan Hasil Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="dt-ext table-responsive">
                                <table class="display" id="export-button">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Alamat</th>
                                            <th>Produk</th>
                                            <th>Total Harga</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembelians as $pembelian)
                                            <tr>
                                                <td>{{ $pembelian->id }}</td>
                                                <td>{{ $pembelian->username }}</td>
                                                <td>{{ $pembelian->alamat }}</td>
                                                <td>
                                                    @foreach ($pembelian->pembelianItems as $item)
                                                        <p>{{ $item->produk->name }}</p>
                                                    @endforeach
                                                </td>
                                                <td> Rp. {{ number_format($pembelian->total_harga, 2, ',', '.') }}</td>
                                                <td>{{ $pembelian->created_at }}</td>
                                            </tr>
                                        @endforeach
                                            @php
                                                $total = 0;
                                                foreach ($pembelians as $pembelian) {
                                                    $total += $pembelian->total_harga;
                                                }
                                                $total = number_format($total,0,',','.');
                                            @endphp

                                            <h4>Total Pemasukkan = Rp. {{ $total }}</h4>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    </div>
    @section('script')
        <script src="{{ asset('assets/admin/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}">
        </script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}">
        </script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}">
        </script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}">
        </script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}">
        </script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}">
        </script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/js/datatable/datatable-extension/custom.js') }}"></script>
    @endsection
</x-app-layout>
