<div class="row">
    @forelse ($kotas as $item)
        <div class="col-lg-3">
            <a href="{{ route('kost.area', '=' . $item->slug) }}" title="{{ $item->slug }}" class="text-decoration-none">
                <div class="overlay mt-3">
                    <img src="{{ asset('storage/kota/' . $item->gambar_kota) }}" alt="{{ $item->nama_kota }}" width="100%"
                        class="rounded-3">
                    <div class="text">
                        <h5>{{ $item->nama_kota }}</h5>
                        <p>10 Kost Tersedia</p>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-12 text-center">
            Belum ada kota yang tersedia.
        </div>
    @endforelse
</div>