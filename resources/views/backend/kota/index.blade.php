@extends ('backend.layouts.app', ['title' => 'Data Kota'])

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kota</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary">
                    <a href="{{ route('admin.kota.create') }}" class="text-white">Tambah Data</a>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kota</th>
                            <th>Gambar Kota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kotas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_kota }}</td>
                                <td>
                                    @if($item->gambar_kota)
                                        <img src="{{ asset('storage/kota/' . $item->gambar_kota) }}" alt="{{ $item->nama_kota }}" width="100">
                                    @else
                                        <span class="text-muted">tTidak ada gambar</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.kota.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                                    <form action="{{ route('admin.kota.delete', $item->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus data ini ?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data kota</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection