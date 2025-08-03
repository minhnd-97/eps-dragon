@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Chỉnh sửa sản phẩm</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                       class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Category -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Danh mục</label>
                <select name="category_id" id="category_id"
                        class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Thumbnail -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Ảnh đại diện</label>
                @if($product->thumbnail)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="Thumbnail" class="h-24">
                    </div>
                @endif
                <input type="file" name="thumbnail"
                       class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <!-- Images -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Ảnh chi tiết (có thể chọn nhiều)</label>
                @if($product->images && is_array($product->images))
                    <div class="flex flex-wrap gap-4 mb-2">
                        @foreach($product->images as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="Image" class="h-20">
                        @endforeach
                    </div>
                @endif
                <input type="file" name="images[]" multiple
                       class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Cập nhật
                </button>
            </div>
        </form>
    </div>
@endsection
