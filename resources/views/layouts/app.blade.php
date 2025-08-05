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
<!-- Floating Call Button -->
<a href="tel:0962918988"
   class="fixed bottom-6 right-6 z-50 bg-white rounded-full shadow-lg p-4 hover:bg-blue-100 transition"
   title="Gọi ngay: 0962 918 988">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.04 3.12a1 1 0 01-.27 1.06L9.34 9.34a11.05 11.05 0 005.32 5.32l1.48-1.48a1 1 0 011.06-.27l3.12 1.04a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.163 21 3 14.837 3 7V6a2 2 0 012-1z"/>
    </svg>
</a>


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
