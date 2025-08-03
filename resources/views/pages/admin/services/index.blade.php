@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Danh sách dịch vụ</h1>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full divide-y divide-gray-200 shadow-sm border rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tiêu đề</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nội dung</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Hành động</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($services as $s)
                <tr>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $s->title }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $s->description }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.services.edit', $s) }}" class="text-blue-600 hover:text-blue-800 mr-2">Chỉnh sửa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
