@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Danh sách bài viết</h1>
            <a href="{{ route('admin.news.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                + Thêm bài viết
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Tiêu đề</th>
                    <th class="px-4 py-3">Loại</th>
                    <th class="px-4 py-3">Ảnh</th>
                    <th class="px-4 py-3">Ngày tạo</th>
                    <th class="px-4 py-3">Hành động</th>
                </tr>
                </thead>
                <tbody class="text-sm text-gray-600 divide-y divide-gray-200">
                @forelse ($news as $index => $item)
                    <tr>
                        <td class="px-4 py-3">{{ $index + 1 }}</td>
                        <td class="px-4 py-3">{{ $item->title }}</td>
                        <td class="px-4 py-3 capitalize">{{ $item->type->name ?? '' }}</td>
                        <td class="px-4 py-3">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-20 h-auto rounded" alt="{{ $item->title }}">
                            @else
                                <span class="text-gray-400 italic">Không có ảnh</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $item->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('admin.news.edit', $item) }}" class="text-blue-600 hover:underline">Sửa</a>
                            <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">Không có bài viết nào.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $news->links() }}
        </div>
    </div>
@endsection
