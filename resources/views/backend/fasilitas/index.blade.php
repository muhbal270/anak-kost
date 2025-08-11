@extends ('backend.layouts.app', ['title' => 'Data Fasilitas'])

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Fasilitas</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary">
                    <a href="{{ route('admin.fasilitas.create') }}" class="text-white">Tambah Data</a>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Fasilitas</th>
                            <th>Icon Fasilitas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse ($fasilitas as $item)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_fasilitas }}</td>
                            <td>
                                @if($item->icon_fasilitas)
                                    <i class="{{ $item->icon_fasilitas }}"></i>
                                    <span class="ms-2">{{ $item->icon_fasilitas }}</span>
                                @else
                                    <span>Tidak ada icon</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.fasilitas.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="{{ route('admin.fasilitas.delete', $item->id) }}" method="POST" style="display: inline">
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
                                <td colspan="4" class="text-center">Tidak ada data fasilitas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection