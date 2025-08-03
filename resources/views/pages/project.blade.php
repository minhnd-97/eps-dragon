@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-10 gap-6">
        {{-- Phần 1: Danh sách bài viết (col-span-8) --}}
        <div class="lg:col-span-8 space-y-6">
            @forelse ($news as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-40 h-32 object-cover" alt="{{ $item->title }}">
                    @endif
                    <div class="p-4 flex-1">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <a href="{{ route('news.show', $item->slug) }}" class="hover:text-blue-600 hover:underline">{{ $item->title }}</a>
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">{{ $item->created_at->format('d/m/Y') }}</p>
                        <p class="text-gray-700 mt-2 line-clamp-2">{{ $item->description }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Chưa có bài viết nào.</p>
            @endforelse

            <div class="mt-6">
                {{ $news->links('vendor.pagination.semantic-ui') }}
            </div>
        </div>

        {{-- Phần 2: Tin mới nhất (col-span-2) --}}
        <div class="lg:col-span-2 space-y-4">
            @foreach ($latestNews as $item)
                <div class="flex items-start gap-3 bg-white rounded shadow p-3 hover:shadow-md transition duration-200">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}"
                             alt="{{ $item->title }}"
                             class="w-16 h-16 object-cover rounded-md flex-shrink-0">
                    @endif
                    <div class="flex-1">
                        <h4 class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">
                            <a href="{{ route('news.show', $item->slug) }}" class="hover:text-blue-600">
                                {{ $item->title }}
                            </a>
                        </h4>
                        <p class="text-xs text-gray-500 mt-1">{{ $item->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
