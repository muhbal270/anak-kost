@extends ('backend.layouts.app', ['title' => 'Edit Data Fasilitas'])

@section('content')

    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Fasilitas</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nama_fasilitas">Nama Fasilitas</label>
                                                <input type="text" id="nama_fasilitas" class="form-control @error('nama_fasilitas') is-invalid @enderror"
                                                    name="nama_fasilitas" placeholder=""
                                                    value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}">
                                                @error('nama_fasilitas')
                                                    <div class="text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="icon_fasilitas">Icon Fasilitas</label>
                                                <input type="text" id="icon_fasilitas" class="form-control @error('icon_fasilitas') is-invalid @enderror"
                                                    name="icon_fasilitas" placeholder=""
                                                    value="{{ old('icon_fasilitas', $fasilitas->icon_fasilitas) }}">
                                                @error('icon_fasilitas')
                                                    <div class="text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection