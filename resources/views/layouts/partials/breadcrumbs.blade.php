<nav class="flex mx-auto px-4 sm:px-6 py-6 gap-8 pb-0" aria-label="Breadcrumb">
    <div class="flex items-center space-x-2">
        @foreach (Breadcrumbs::generate() as $key => $breadcrumb)
            @if ($breadcrumb->url)
                <a href="{{ $breadcrumb->url }}" class="text-gray-600 hover:text-blue-600">{{ $breadcrumb->title }}</a>
            @else
                <span class="text-gray-500">{{ $breadcrumb->title }}</span>
            @endif

            {{-- Add ">" separator if this is not the last breadcrumb --}}
            @if (!$loop->last)
                <span class="text-gray-400"> &gt; </span>
            @endif
        @endforeach
    </div>
</nav>
