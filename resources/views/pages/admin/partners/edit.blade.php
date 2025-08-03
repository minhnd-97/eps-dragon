@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Chỉnh sửa đối tác</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Tên đối tác</label>
                <input type="text" name="name" id="name" value="{{ old('name', $partner->name) }}"
                       class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700">Logo hiện tại</label>
                @if($partner->logo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$partner->logo) }}" class="h-20" alt="{{ $partner->name }}">
                    </div>
                @endif
                <input type="file" name="logo" id="logo"
                       class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                <input type="url" name="url" id="url" value="{{ old('url', $partner->url) }}"
                       class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Cập nhật
                </button>
            </div>
        </form>
    </div>
@endsection
