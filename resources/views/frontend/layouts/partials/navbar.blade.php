<!-- navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="./assets/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                @auth
                    <a class="nav-link" href="{{ route('kost.index') }}">Kost</a>
                    <a class="nav-link" href="{{ route('pesanan.index') }}">Pesananmu</a>
                    <div class="vr mx-3"></div>
                    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin keluar ?')">
                        @csrf
                        <button class="nav-link me-3"><i class="bi bi-box-arrow-right"></i> Keluar</button>
                    </form>
                @endauth
                @guest
                    <div class="vr mx-3"></div>
                    <a class="nav-link me-3" href="{{ route('login') }}">Masuk</a>
                    <a class="nav-link btn btn-primer px-4" href="{{ route('register') }}">Daftar</a>
                @endguest
            </div>
        </div>
    </div>
</nav>
<!-- navbar -->