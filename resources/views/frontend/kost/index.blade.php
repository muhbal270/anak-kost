@extends ('frontend.layouts.app', ['title' => 'Kost'])

@section('content')

    <!-- kostan -->
    <section class="kostan">
        <div class="container">
            <div class="row mt-5 d-flex align-items-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="content">
                                <h3 class="card-title">Cari kost yang cocok untukmu</h3>
                                <p class="card-text">Temukan kost terbaik di kota impianmu dengan harga terjangkau.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- kostan -->

    <section class="kota mt-5">
        <div class="container">
            <h5>Kota Tersedia</h5>
            <a href="./kota.html" class="text-decoration-none">
                @include ('frontend.layouts.partials.area')
            </a>
        </div>
    </section>

@endsection