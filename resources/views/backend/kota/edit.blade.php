@extends ('backend.layouts.app', ['title' => 'Edit Data Kota'])

@section('content')

    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Kota</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('admin.kota.update', $kota->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nama_kota">Nama Kota</label>
                                                <input type="text" id="nama_kota" class="form-control @error('nama_kota') is-invalid @enderror"
                                                    name="nama_kota" placeholder="Nama Kota" value="{{ old('nama_kota', $kota->nama_kota) }}">
                                                @error('nama_kota')
                                                    <div class="text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="gambar_kota">Gambar Kota</label>
                                                <input type="file" id="gambar_kota" class="form-control @error('gambar_kota') is-invalid @enderror"
                                                    name="gambar_kota" placeholder="Gambar Kota" >
                                                @error('gambar_kota')
                                                    <div class="text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror

                                                @if($kota->gambar_kota)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/kota/' . $kota->gambar_kota) }}" alt="{{ $kota->nama_kota }}" width="100">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <a href="{{ route('admin.kota.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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