@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Chỉnh sửa dịch vụ</h1>

    <form action="{{ route('admin.services.update', $service) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Tiêu đề</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" class="border p-2 w-full">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Mô tả</label>
            <textarea name="description" class="border p-2 w-full h-32">{{ old('description', $service->description) }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Cập nhật</button>
    </form>
@endsection
