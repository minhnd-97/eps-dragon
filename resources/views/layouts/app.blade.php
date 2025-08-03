<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EpsLongDang')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('static/logo.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="//vjs.zencdn.net/8.21.1/video-js.min.css" rel="stylesheet">

    <!-- Meta -->
    <meta property="og:image" content="{{ asset('static/logo.jpg') }}">
    <meta name="twitter:image" content="{{ asset('static/logo.jpg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">

<!-- Header -->
@include('layouts.partials.header')

@if (View::hasSection('full_width'))
    <main class="p-0">
        @yield('content')
    </main>
@else
    <div class="container mx-auto">
        @if (!request()->is('admin*') && !request()->is('/'))
            <div class="mb-0">
                @include('layouts.partials.breadcrumbs')
            </div>
        @endif
        <main class="p-6">
            @yield('content')
        </main>
    </div>
@endif

<!-- Footer -->
@include('layouts.partials.footer')

@yield('scripts')
</body>
</html>
