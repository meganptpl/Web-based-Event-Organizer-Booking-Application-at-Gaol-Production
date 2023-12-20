<x-app-layout title="Edit Galeri">
    <!-- Page Sidebar Ends-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3>
                            Edit Galeri</h3>
                    </div>
                    <div class="col-12 col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Galeri</li>
                            <li class="breadcrumb-item active">Tambah Galeri </li>
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
                                action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Judul</label>
                                            <input class="form-control @error('judul') is-invalid @enderror"
                                                type="text" placeholder="Judul" name="judul"
                                                value="{{ $galeri->judul }}">
                                            @error('judul')
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
                                            <label>Tempat</label>
                                            <input class="form-control @error('tempat') is-invalid @enderror"
                                                type="text" placeholder="Tempat" name="tempat"
                                                value="{{ $galeri->tempat }}">
                                            @error('tempat')
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
                                            <label>Tanggal</label>
                                            <input class="form-control @error('tanggal') is-invalid @enderror"
                                                type="date" placeholder="Tanggal" name="tanggal"
                                                value="{{ $galeri->tanggal }}">
                                            @error('tanggal')
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
                                                name="deskripsi">{{ $galeri->deskripsi }}</textarea>
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
                                                name="gambar" value="{{ $galeri->gambar }}">
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
                                                href="{{ route('admin.galeri.index') }}">Cancel</a>
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
