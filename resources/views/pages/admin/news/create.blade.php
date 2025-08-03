@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-8 px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tạo bài viết mới</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Tiêu đề</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Loại</label>
                <select name="type" id="type" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">-- Chọn loại --</option>
                    <option value="tin tuc" {{ old('type') == 'tin tuc' ? 'selected' : '' }}>Tin tức</option>
                    <option value="du an" {{ old('type') == 'du an' ? 'selected' : '' }}>Dự án</option>
                    <option value="ung dung" {{ old('type') == 'ung dung' ? 'selected' : '' }}>Ứng dụng</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Ảnh đại diện</label>
                <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Mô tả ngắn</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                <textarea name="content" id="content" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('content') }}</textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.news.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded mr-3">Hủy</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Lưu</button>
            </div>
        </form>
    </div>
@endsection
