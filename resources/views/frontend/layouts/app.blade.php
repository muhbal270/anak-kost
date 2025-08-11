<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }} | Booking Kost Online</title>

    @include('frontend.layouts.partials.style')

</head>

<body>
    <!-- navbar -->
    @include('frontend.layouts.partials.navbar')

    @yield('content')

</body>

</html>