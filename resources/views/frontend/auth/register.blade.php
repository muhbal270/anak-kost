@extends ('frontend.layouts.app', ['title' => 'Register'])

@section('content')

    <!-- register -->
    <section class="register">
        <div class="container">
            <div class="row mt-5 d-flex align-items-center">
                <div class="col-lg-6">
                    <h3>Yuk gabung, biar cari kost gak ribet!</h3>
                    <p>Pilih lokasi, lihat fasilitas, dan booking langsung!</p>

                    <!-- form -->
                    <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid
                            @enderror" id="name" name="name" placeholder="cth. ahmad Fulan">
                            @error('name')
                                <div class="text-danger">
                                    <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label">Nomor Whatsapp</label>
                            <input type="text" class="form-control @error('whatsapp') is-invalid
                            @enderror" id="whatsapp" name="whatsapp"
                                placeholder="cth. 628xxxx">
                            @error('whatsapp')
                                <div class="text-danger">
                                    <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid
                            @enderror" id="email" name="email"
                                placeholder="cth. username@email.com">
                            @error('email')
                                <div class="text-danger">
                                    <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Buat Password</label>
                            <input type="password" class="form-control @error('password') is-invalid
                            @enderror" id="password" name="password"
                                placeholder="Masukkan password">
                            @error('password')
                                <div class="text-danger">
                                    <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primer w-100 mt-3">Daftar</button>
                        <div class="mt-5">
                            <span>Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none mb-3">Masuk
                                    sekarang</a></span>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6">
                    <img src="./assets/img-register.png" alt="" width="100%">
                </div>
            </div>
        </div>
    </section>
    <!-- register -->

@endsection