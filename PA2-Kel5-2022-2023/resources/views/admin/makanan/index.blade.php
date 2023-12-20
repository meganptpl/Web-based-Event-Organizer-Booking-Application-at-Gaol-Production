<x-app-layout title="Paket Makanan">
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3>Cart</h3>
                    </div>
                    <div class="col-12 col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Ecommerce</li>
                            <li class="breadcrumb-item active">Paket Makanan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.paketmakanan.create') }}" class="btn btn-info">Tambah Paket
                                    Makanan</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="order-history table-responsive wishlist">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Prdouct</th>
                                                <th>Prdouct Name</th>
                                                <th>Price</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($paket_makanan as $item)
                                                <tr>
                                                    <td>
                                                        <img class="img-fluid img-40"
                                                            src="{{ asset('images/makanan/' . $item->gambar) }}"
                                                            alt="#">
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href="#">
                                                                <h6>{{ $item->name }}</h6>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->harga }}</td>
                                                    <td>
                                                        {{ $item->deskripsi }}
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin.paketmakanan.edit', $item->id) }}"
                                                                class="btn">
                                                                <i class="m-1" data-feather="edit"></i>
                                                            </a>
                                                            <a href="{{ route('admin.paketmakanan.show', $item->id) }}"
                                                                class="btn">
                                                                <i class="m-1" data-feather="eye"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('admin.paketmakanan.destroy', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn">
                                                                    <i class="m-1" data-feather="x-circle"></i>
                                                                </button>
                                                            </form>
                                                        </div>
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
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
