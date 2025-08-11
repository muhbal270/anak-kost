@extends ('frontend.layouts.app', ['title' => 'Kost Tesedia'])

@section('content')

<!-- detail kota -->
<section class="detail-kota">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6">
                <h3>Kost Tersedia di Kota Palembang</h3>
                <p>Temukan kost terbaik di kota Palembang dengan berbagai pilihan harga dan fasilitas yang sesuai
                    dengan kebutuhanmu.</p>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-end">
                    <img src="{{ asset('assets/img-palembang.png') }}" class="img-fluid rounded" alt="Jembatan Ampera">
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <h5>Kostan tersedia untukmu</h5>
            <a href="{{ route('kost.detail') }}" class="text-decoration-none">
                @include('frontend.layouts.partials.product')
            </a>
        </div>
    </div>
</section>
<!-- detail kota -->

@endsection
