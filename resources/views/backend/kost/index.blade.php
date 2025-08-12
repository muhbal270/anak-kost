@extends ('backend.layouts.app', ['title' => 'Data Kost'])

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Kost</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary">
                        <a href="{{ route('admin.kost.create') }}" class="text-white">Tambah Data</a>
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kost</th>
                                <th>Kota</th>
                                <th>Gambar 1</th>
                                <th>Gambar 2</th>
                                <th>Gambar 3</th>
                                <th>Alamat</th>
                                <th>Map</th>
                                <th>Harga</th>
                                <th>Jumlah Kamar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse ($kosts as $item)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kost }}</td>
                                        <td>{{ $item->kota->nama_kota }}</td>
                                        <td>
                                            @if ($item->gambar_kost1)
                                                <img src="{{ asset('storage/kost/' . $item->gambar_kost1) }}" alt="Gambar Kost 1" width="100">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->gambar_kost2)
                                                <img src="{{ asset('storage/kost/' . $item->gambar_kost2) }}" alt="Gambar Kost 2" width="100">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->gambar_kost3)
                                                <img src="{{ asset('storage/kost/' . $item->gambar_kost3) }}" alt="Gambar Kost 3" width="100">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            @if ($item->map)
                                                <a href="{{ $item->map }}" target="_blank">Lihat Map</a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td>{{ $item->jumlah_kamar }}</td>
                                        <td>
                                            <a href="{{ route('admin.kost.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.kost.delete', $item->id) }}" method="POST" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin hapus data ini ?')">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center">Tidak ada data kost</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection