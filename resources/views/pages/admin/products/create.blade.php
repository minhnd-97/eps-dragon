@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md mt-8">
        <h2 class="text-2xl font-bold mb-6">Thêm sản phẩm</h2>

        @if(session('success'))
            <div class="mb-4 text-green-600 font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold mb-1">Tên sản phẩm</label>
                <input type="text" name="name" class="w-full border rounded-lg px-4 py-2 focus:ring focus:outline-none" value="{{ old('name') }}">
            </div>

            <div>
                <label class="block font-semibold mb-1">Mô tả</label>
                <textarea name="description" rows="5" class="w-full border rounded-lg px-4 py-2 focus:ring focus:outline-none">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Ảnh đại diện</label>
                <input type="file" name="thumbnail" class="block mt-1">
            </div>

            <div>
                <label class="block font-semibold mb-1">Ảnh sản phẩm (nhiều ảnh)</label>
                <input type="file" name="images[]" multiple class="block mt-1">
            </div>

            <div>
                <label class="block font-semibold mb-1">Danh mục</label>
                <select name="category_id" class="w-full border rounded-lg px-4 py-2 focus:ring focus:outline-none">
                    <option value="">-- Chọn danh mục --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg">
                    Thêm sản phẩm
                </button>
            </div>
        </form>
    </div>
@endsection
