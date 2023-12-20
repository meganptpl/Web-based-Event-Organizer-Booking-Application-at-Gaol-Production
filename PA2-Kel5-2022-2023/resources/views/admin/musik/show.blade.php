<x-app-layout title="Paket Musik">
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3>Paket Musik</h3>
                    </div>
                    <div class="col-12 sol-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Paket Musik</li>
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
                            <h5>{{ $paketmusik->name }}</h5>
                            <p> {{ $paketmusik->harga }} </p>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid" src="{{ asset('images/musik/' . $paketmusik->gambar) }}"
                                alt="#">
                            <p class="pt-5">
                                {{ $paketmusik->deskripsi }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
