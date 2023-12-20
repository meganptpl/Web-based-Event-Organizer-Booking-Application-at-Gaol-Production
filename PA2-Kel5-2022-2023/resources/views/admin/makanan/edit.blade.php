<x-app-layout title="Edit Paket Makanan">
    <!-- Page Sidebar Ends-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3>
                            Edit Paket Makanan</h3>
                    </div>
                    <div class="col-12 col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Paket Makanan</li>
                            <li class="breadcrumb-item active">Edit Paket Makanan </li>
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
                        <div class="card-body">
                            <form class="form theme-form projectcreate"
                                action="{{ route('admin.paketmakanan.update', $paketmakanan->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input class="form-control @error('name') is-invalid @enderror"
                                                type="text" placeholder="Name" name="name"
                                                value="{{ $paketmakanan->name }}">
                                            @error('makanan')
                                                <span class="alert-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Harga</label>
                                            <input class="form-control @error('harga') is-invalid @enderror"
                                                type="text" placeholder="Harga" name="harga"
                                                value="{{ $paketmakanan->harga }}">
                                            @error('harga')
                                                <span class="alert-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="exampleFormControlTextarea4" rows="3"
                                                name="deskripsi">{{ $paketmakanan->deskripsi }}</textarea>
                                            @error('deskripsi')
                                                <span class="alert-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Gambar</label>
                                            <input type="file"
                                                class="form-control @error('gambar') is-invalid @enderror"
                                                name="gambar" value="{{ $paketmakanan->gambar }}">
                                            @error('gambar')
                                                <span class="alert-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-secondary me-3">Add</button>
                                            <a class="btn btn-danger"
                                                href="{{ route('admin.paketmakanan.index') }}">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
