@extends ('frontend.layouts.app', ['title' => 'Pesanan'])

@section('content')

    <!-- order -->
    <section class="order mt-5">
        <div class="container">
            <h3>Pesananmu</h3>
            <p>Detail pesanan akan ditampilkan di sini.</p>

            <table class="table striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pesan</th>
                        <th>Nama Kost</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>05 Jan 2024</td>
                        <td>Kost C</td>
                        <td>Jl. Contoh No. 3, Jakarta</td>
                        <td><span class="badge bg-danger">Dibatalkan</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm" disabled>Dibatalkan</button>
                        </td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>03 Jan 2024</td>
                        <td>Kost B</td>
                        <td>Jl. Contoh No. 2, Jakarta</td>
                        <td><span class="badge bg-warning">Belum Bayar</span></td>
                        <td>
                            <button class="btn btn-primer btn-sm"
                                onclick="lihatDetail('Kost B', '03 Jan 2024', 'Jl. Contoh No. 2, Jakarta', 'Belum Bayar', 'KOST-0911')">
                                Lihat Detail
                            </button>

                            <button class="btn btn-success btn-sm"
                                onclick="bukaUploadModal('Kost B', '03 Jan 2024', 'KOST-0911', this)">
                                Bayar
                            </button>


                            <button class="btn btn-danger btn-sm" onclick="batalkanPesanan(this)">
                                Batalkan
                            </button>

                        </td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>01 Jan 2024</td>
                        <td>Kost A</td>
                        <td>Jl. Contoh No. 1, Jakarta</td>
                        <td><span class="badge bg-success">Disetujui</span></td>
                        <td>
                            <button class="btn btn-primer btn-sm"
                                onclick="lihatDetail('Kost A', '01 Jan 2024', 'Jl. Contoh No. 3, Jakarta', 'Disetujui', 'KOST-0235')">
                                Lihat Detail
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <!-- order -->

    <!-- modal detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Kost:</strong> <span id="modalNamaKost"></span></p>
                    <p><strong>Tanggal Check-in:</strong> <span id="modalTanggal"></span></p>
                    <p><strong>Alamat:</strong> <span id="modalAlamat"></span></p>
                    <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                    <p><strong>Kode Booking:</strong> <span id="modalKode" class="fw-bold text-primary"></span></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-outline-primary" onclick="salinKode()">Salin Kode</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal detail -->

    <!-- Modal Upload Pembayaran -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-3 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold" id="uploadModalLabel">Upload Bukti Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <!-- Info Transfer -->
                    <div class="text-center mb-3">
                        <img src="./assets/ic-bca.png" alt="Bank BCA" width="120" class="mb-2">
                        <h6 class="fw-semibold">Transfer ke:</h6>
                        <p class="mb-1">Bank BCA</p>
                        <p class="mb-1">a.n. PT AnakKost Indonesia</p>
                        <div class="bg-light p-2 rounded">
                            <strong class="text-primary fs-5">1234567890</strong>
                        </div>
                    </div>

                    <!-- Info Pembayaran -->
                    <div class="mb-3 text-center">
                        <p class="mb-1">Nominal yang harus dibayar:</p>
                        <h5 class="fw-bold text-success" id="uploadNominal">Rp 750.000</h5>
                    </div>

                    <!-- Info Pesanan jika perlu-->
                    <!-- <div class="mb-3">
                        <p class="mb-1"><strong>Nama Kost:</strong> <span id="uploadNamaKost">Kost A</span></p>
                        <p class="mb-1"><strong>Tanggal Check-in:</strong> <span id="uploadTanggal">05 Jan 2024</span>
                        </p>
                        <p class="mb-1"><strong>Kode Booking:</strong> <span id="uploadKode">KOST-12345</span></p>
                    </div> -->

                    <!-- Form Upload -->
                    <form id="uploadForm">
                        <div class="mb-3">
                            <label for="buktiBayar" class="form-label">Upload Bukti Transfer</label>
                            <input type="file" class="form-control" id="buktiBayar" name="buktiBayar" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Kirim Bukti Pembayaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection