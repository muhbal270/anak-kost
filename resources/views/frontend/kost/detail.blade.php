@extends ('frontend.layouts.app', ['title' => 'Detail Kost'])

@section('content')

    <!-- detail kost -->
    <section class="detail">
        <div class="container">
            <div class="row align-items-stretch g-3">
                <!-- Gambar Utama -->
                <div class="col-lg-8">
                    <div class="h-100">
                        <img id="mainImage" src="{{ asset('storage/kost/' . $kost->gambar_kost1) }}" alt="Foto Kost"
                            class="img-fluid rounded-4 w-100 object-fit-cover">
                    </div>
                </div>

                <!-- Thumbnail -->
                <div class="col-lg-4 d-flex flex-column gap-3">
                    <img src="{{ asset('storage/kost/' . $kost->gambar_kost1) }}" class="thumbnail flex-fill"
                        onclick="previewImage(this)">
                    <img src="{{ asset('storage/kost/' . $kost->gambar_kost2) }}" class="thumbnail flex-fill"
                        onclick="previewImage(this)">
                    <img src="{{ asset('storage/kost/' . $kost->gambar_kost3) }}" class="thumbnail flex-fill"
                        onclick="previewImage(this)">
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2>{{ $kost->nama_kost }}</h2>
                            <p><i class="bi bi-geo-alt"></i> {{ $kost->alamat }} , Kota {{ $kost->kota->nama_kota }}</p>
                        </div>

                        <div class="col-lg-6">
                            <div class="d-flex-justify-content-end">
                                <h5 class="text-end text-primary">Rp. {{ number_format($kost->harga, 0, ',', '.') }}</h5>
                                <p class="text-end">
                                    <span class="text-muted">/bulan</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <p>Masih tersedia <span class="text-success">{{ $kost->jumlah_kamar }} Kamar</span></p>

                    <hr>

                    <h6>Fasilitas Kost</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td><i class="bi bi-wifi"></i> Free Internet</td>
                            <td><i class="bi bi-shop-window"></i> Tempat Parkir</td>
                            <td><i class="bi bi-usb-mini"></i> Dapur</td>
                            <td><i class="bi bi-badge-wc"></i> Kamar mandi dalam</td>
                        </tr>
                    </table>

                    <hr>

                    <h6>Lokasi</h6>
                    <p><i class="bi bi-geo-alt"></i> {{ $kost->alamat }} , Kota {{ $kost->kota->nama_kota }}</p>

                    @if ($kost->map)
                        <iframe src="{{ $kost->map }}" width="100%" height="200" class="rounded-3" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    @else
                        <div class="alert alert-warning mt-2">Link google maps belum tersedia</div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pilih tanggal pesan</h5>
                            <form id="formPesan" onsubmit="handleSubmit(event)">
                                <div class="mb-3">
                                    <label for="checkinDate" class="form-label">Tanggal Check-in</label>
                                    <input type="date" class="form-control" id="checkinDate" name="checkinDate">
                                </div>

                                <button type="submit" class="btn btn-primer w-100">Pesan Sekarang</button>
                                <a href="https://wa.me/6281234567890" class="btn btn-outline-dark w-100 mt-3"><i
                                        class="bi bi-headset"></i> Ada pertanyaan? Hubungi Kami</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection