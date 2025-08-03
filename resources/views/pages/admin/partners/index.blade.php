@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Danh sách đối tác</h1>
            <a href="{{ route('admin.partners.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                Thêm đối tác
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Logo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tên</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Link</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Hành động</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($partners as $partner)
                <tr>
                    <td class="px-6 py-4">{{ $partner->id }}</td>
                    <td class="px-6 py-4">
                        @if($partner->logo)
                            <img src="{{ asset('storage/'.$partner->logo) }}" class="h-12" alt="{{ $partner->name }}">
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $partner->name }}</td>
                    <td class="px-6 py-4">
                        @if($partner->url)
                            <a href="{{ $partner->url }}" target="_blank" class="text-blue-600 hover:underline">Link</a>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.partners.edit', $partner->id) }}" class="text-blue-600 hover:text-blue-900">Chỉnh sửa</a>
                        <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Xoá đối tác này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4 flex justify-end">
            {{ $partners->links('vendor.pagination.semantic-ui') }}
        </div>
    </div>
@endsection
