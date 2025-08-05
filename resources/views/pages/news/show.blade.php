@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        {{-- Ảnh đại diện --}}
        @if ($news->image)
            <div class="mb-8">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                     class="w-full h-auto rounded-xl shadow-md object-cover transition-transform duration-300 hover:scale-105">
            </div>
        @endif

        {{-- Tiêu đề --}}
        <h1 class="text-4xl font-extrabold text-gray-900 leading-tight mb-4">
            {{ $news->title }}
        </h1>

        {{-- Ngày đăng --}}
        <div class="text-sm text-gray-500 mb-8">
            Ngày đăng: {{ $news->created_at->format('d/m/Y') }}
        </div>

        {{-- Nội dung mô tả --}}
        <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
            {!! $news->description !!}
        </div>
    </div>
@endsection
