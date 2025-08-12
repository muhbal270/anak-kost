@extends ('backend.layouts.app', ['title' => 'Edit Data Kost'])

@section('content')

    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Kost</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('admin.kost.update', $kost->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nama_kost">Nama Kost</label>
                                                <input type="text" id="nama_kost" class="form-control" name="nama_kost"
                                                    value="{{ old('nama_kost', $kost->nama_kost) }}" placeholder="">
                                                @error('nama_kost')
                                                    <div class="text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="kota_id">Kota</label>
                                                <select name="kota_id" id="kota_id" class="form-select"
                                                    aria-label="Default select example">
                                                    <option selected>-- Pilih Kota --</option>
                                                    @foreach ($kotas as $item)
                                                        <option value="{{ $item->id }}" {{ old('kota_id', $kost->kota_id) == $item->id ? 'selected' : ''}}>
                                                            {{ $item->nama_kota }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kota_id')
                                                    <div class="text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="gambar_kost1">Gambar Kost 1</label>
                                                    <input type="file" id="gambar_kost1" class="form-control"
                                                        name="gambar_kost1">
                                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti</small>
                                                    @error('gambar_kost1')
                                                        <div class="text-danger">
                                                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="gambar_kost2">Gambar Kost 2</label>
                                                    <input type="file" id="gambar_kost2" class="form-control"
                                                        name="gambar_kost2">
                                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti</small>
                                                    @error('gambar_kost2')
                                                        <div class="text-danger">
                                                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="gambar_kost3">Gambar Kost 3</label>
                                                    <input type="file" id="gambar_kost3" class="form-control"
                                                        name="gambar_kost3">
                                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti</small>
                                                    @error('gambar_kost3')
                                                        <div class="text-danger">
                                                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" name="alamat" id="alamat" rows="3">
                                                        {{ old('alamat', $kost->alamat) }}
                                                    </textarea>
                                                @error('alamat')
                                                    <div class="text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="map">Link Google Maps</label>
                                                <textarea class="form-control" name="map" id="map" rows="3">
                                                        {{ old('map', $kost->map) }}
                                                    </textarea>
                                                @error('map')
                                                    <div class="text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="harga">Harga Kost</label>
                                                <input type="number" id="harga" class="form-control" name="harga"
                                                    value="{{ old('harga', $kost->harga) }}">
                                                @error('harga')
                                                    <div class="text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="jumlah_kamar">jumlah Kamar</label>
                                                <input type="number" id="jumlah_kamar" class="form-control"
                                                    name="jumlah_kamar"
                                                    value="{{ old('jumlah_kamar', $kost->jumlah_kamar) }}">
                                                @error('jumlah_kamar')
                                                    <div class="text-danger">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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