<div class="row">
    @forelse ($kosts as $item)
        <div class="col-lg-4">
            <a href="{{ route('kost.detail', $item->slug) }}" title="{{ $item->slug }}" class="text-decoration-none">
                <div class="card border-0 mt-3">
                    <img src="{{ asset('storage/kost/' . $item->gambar_kost1) }}" class="card-img-top rounded-3"
                        alt="{{ $item->nama_kost }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_kost }}</h5>
                        <p class="card-text text-muted">Kota {{ $item->kota->nama_kota }}</p>
                        <h5 class="card-price">Rp {{ number_format($item->harga, 0, ',', '.') }}<small>/bulan</small></h5>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-12 text-center">
            Belum ada kost yang tersedia.
        </div>
    @endforelse
</div>