@extends ('frontend.layouts.app', ['title' => 'Login'])

@section('content')

    <!-- login -->
    <section class="login">
        <div class="container">
            <div class="row mt-5 d-flex align-items-center">
                <div class="col-lg-6">
                    <h3>Masuk untuk mulai cari kost</h3>
                    <p>Akses fitur lengkap dan pantau pesanan kost-mu di sini.</p>

                    <!-- form -->
                    <form action="{{ route('login.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                placeholder="cth. username@email.com">
                                @error('email')
                                    <div class="text-danger">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                placeholder="Masukkan password">
                                @error('password')
                                    <div class="text-danger">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primer w-100">Masuk</button>
                        <div class="mt-5">
                            <span>Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none mb-3">Daftar
                                    sekarang</a></span>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6">
                    <img src="./assets/img-login.png" alt="" width="100%">
                </div>
            </div>
        </div>
    </section>
    <!-- login -->

@endsection