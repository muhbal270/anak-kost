@extends ('backend.layouts.app', ['title' => 'Tambah Kost Fasilitas'])

@section('content')

    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Kost Fasilitas</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('admin.kost_fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="kost_id">Pilih Kost</label>
                                                <select name="kost_id" id="kost_id" class="form-select" aria-label="Default select example">
                                                    <option>-- Pilih Kost --</option>
                                                    @foreach ($kosts as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_kost }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kost_id')
                                                    <div class="text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Fasilitas</label>
                                                @foreach ($fasilitas as $item)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="fasilitas_id[]" value="{{ $item->id }}"
                                                            id="fasilitas_{{ $item->id }}">
                                                        <label class="form-check-label" for="fasilitas_{{ $item->id }}">
                                                            {{ $item->nama_fasilitas }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @error('fasilitas_id')
                                                <div class="text-danger">
                                                    <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <a href="{{ route('admin.kost_fasilitas.index') }}"
                                                class="btn btn-light-secondary me-1 mb-1">Batal</a>
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