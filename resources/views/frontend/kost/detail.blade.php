@extends ('frontend.layouts.app', ['title' => 'Detail Kost'])

@section('content')

    <!-- detail kost -->
    <section class="detail">
        <div class="container">
            <div class="row align-items-stretch g-3">
                <!-- Gambar Utama -->
                <div class="col-lg-8">
                    <div class="h-100">
                        <img id="mainImage" src="{{ asset ('assets/img-detail1.png') }}" alt="Foto Kost"
                            class="img-fluid rounded-4 w-100 object-fit-cover">
                    </div>
                </div>

                <!-- Thumbnail -->
                <div class="col-lg-4 d-flex flex-column gap-3">
                    <img src="{{ asset ('assets/img-detail1.png') }}" class="thumbnail flex-fill" onclick="previewImage(this)">
                    <img src="{{ asset ('assets/img-detail2.png') }}" class="thumbnail flex-fill" onclick="previewImage(this)">
                    <img src="{{ asset ('assets/img-detail3.png') }}" class="thumbnail flex-fill" onclick="previewImage(this)">
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2>Centering Kost</h2>
                            <p><i class="bi bi-geo-alt"></i> Jalan jendral sudirman , Kota Palembang</p>
                        </div>

                        <div class="col-lg-6">
                            <div class="d-flex-justify-content-end">
                                <h5 class="text-end text-primary">Rp. 1.500.000</h5>
                                <p class="text-end">
                                    <span class="text-muted">/bulan</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <p>Masih tersedia <span class="text-success">5 Kamar</span></p>

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
                    <p><i class="bi bi-geo-alt"></i> Jalan jendral sudirman , Kota Palembang</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.452873264188!2d104.76171707524102!3d-2.9717529970043794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75fb21469d1f%3A0x941c3b4f42a53340!2sSYNEPS%20ACADEMY%20%7C%20Tempat%20pelatihan%20coding%20menjadi%20web%20dan%20mobile%20developer!5e0!3m2!1sid!2sid!4v1751710424012!5m2!1sid!2sid"
                        width="100%" height="200" class="rounded-3" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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