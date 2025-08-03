@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Filter Tabs -->
        <div class="flex flex-wrap gap-4 mb-6">
            <a href="{{ route('products.index') }}"
               class="px-4 py-2 text-sm font-medium {{ request('category') ? 'text-gray-700 hover:text-red-500' : 'active-tab' }}">
                Tất cả
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('products.index', ['category' => $cat->slug]) }}"
                   class="px-4 py-2 text-sm font-medium {{ request('category') === $cat->slug ? 'active-tab' : 'text-gray-700 hover:text-red-500' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <a href="{{ route('products.show', $product->id) }}" class="block bg-white rounded-lg shadow hover:shadow-md transition overflow-hidden">
                    <img src="{{ asset('storage/' . $product->thumbnail) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800 line-clamp-1">{{ $product->name }}</h2>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ $product->description }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">Không có sản phẩm nào.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->withQueryString()->links('vendor.pagination.semantic-ui') }}
        </div>
    </div>

    <style>
        .active-tab {
            color: #ef4444;
            border-bottom: 2px solid #ef4444;
        }
    </style>
@endsection
