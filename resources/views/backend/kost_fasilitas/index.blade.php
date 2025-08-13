@extends ('backend.layouts.app', ['title' => 'Kost Fasilitas'])

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kost Fasilitas</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary">
                    <a href="{{ route('admin.kost_fasilitas.create') }}" class="text-white">Tambah Data</a>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kost</th>
                            <th>Nama Fasilitas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kostFasilitas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kost }}</td>
                            <td>
                                @if($item->fasilitas)
                                    @foreach ($item->fasilitas as $fasilitas)
                                        <span class="badge bg-primary">
                                            {{ $fasilitas->nama_fasilitas }}
                                        </span>
                                    @endforeach
                                @else
                                    <span>Tidak ada fasilitas</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.kost_fasilitas.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="{{ route('admin.kost_fasilitas.delete', $item->id) }}" method="POST" style="display: inline">
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
                            <td colspan="4" class="text-center">Tidak ada data kost fasilitas</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection