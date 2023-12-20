<x-app-layout title="Paket Dekorasi">
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3>Paket Acara</h3>
                    </div>
                    <div class="col-12 sol-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Paket Acara</li>
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
                            <h5>{{ $paketacara->name }}</h5>
                            <p> {{ $paketacara->jenis }} </p>
                            <p> {{ $paketacara->harga }} </p>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid" src="{{ asset('images/acara/' . $paketacara->gambar) }}"
                                alt="#">
                            <p class="pt-5">
                                {{ $paketacara->deskripsi }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
