@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.products.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Thêm sản phẩm</a>
    </div>

    <table class="w-full table-auto border">
        <thead>
        <tr class="bg-gray-100">
            <th class="p-2">Tên</th>
            <th class="p-2">Danh mục</th>
            <th class="p-2">Ảnh đại diện</th>
            <th class="p-2">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr class="border-t">
                <td class="p-2">{{ $product->name }}</td>
                <td class="p-2">{{ $product->category->name ?? 'Không có' }}</td>
                <td class="p-2"><img src="{{ asset('storage/' . $product->thumbnail) }}" class="h-12"></td>
                <td class="p-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600">Sửa</a> |
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline"
                          onsubmit="return confirm('Xóa sản phẩm này?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4 flex justify-end">
        {{ $products->links('vendor.pagination.semantic-ui') }}
    </div>
@endsection
