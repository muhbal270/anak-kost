<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }} | AnakKost Admin</title>

    @include ('backend.layouts.partials.style')

</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            @include ('backend.layouts.partials.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="flex-grow-1">
                @yield('content')
            </div>

            <footer class="text-center">
                <div class="container">
                    <p class="mb-0">2025 &copy; AnakKost</p>
                </div>
            </footer>
        </div>
    </div>

    @include ('backend.layouts.partials.script')

</body>

</html>