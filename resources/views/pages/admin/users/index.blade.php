@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Danh sách người dùng</h1>

            <a href="{{ route('admin.users.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                Tạo mới người dùng
            </a>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex justify-between items-center mb-6">
            <!-- Filter Form -->
            <form action="{{ route('admin.users.index') }}" method="GET" class="flex space-x-4">
                <!-- Search by Name -->
                <input type="text" name="name" value="{{ request()->name }}" placeholder="Tìm theo tên" class="px-4 py-2 border border-gray-300 rounded">

                <!-- Filter by Role -->
                <select name="role" class="px-4 py-2 border border-gray-300 rounded">
                    <option value="">Chọn vai trò</option>
                    <option value="admin" {{ request()->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="student" {{ request()->role == 'student' ? 'selected' : '' }}>Sinh viên</option>
                    <option value="teacher" {{ request()->role == 'teacher' ? 'selected' : '' }}>Giáo viên</option>
                </select>

                <!-- Filter by Status -->
                <select name="status" class="px-4 py-2 border border-gray-300 rounded">
                    <option value="">Trạng thái</option>
                    <option value="1" {{ request()->status == '1' ? 'selected' : '' }}>Đã kích hoạt</option>
                    <option value="0" {{ request()->status == '0' ? 'selected' : '' }}>Chưa kích hoạt</option>
                </select>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Tìm kiếm</button>
            </form>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tên</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Vai trò</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Trạng thái</th> <!-- Added new column -->
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Hành động</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4">{{ $user->id }}</td>
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->roles->first()->name ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span class="{{ $user->is_active ? 'text-green-500' : 'text-red-500' }}">
                        {{ $user->is_active ? 'Đã kích hoạt' : 'Chưa kích hoạt' }}
                    </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <form action="{{ route('admin.users.toggleActivation', $user->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-yellow-600 hover:text-yellow-900">
                                {{ $user->is_active ? 'Vô hiệu hóa' : 'Kích hoạt' }}
                            </button>
                        </form>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900">Chỉnh sửa</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="mt-4 flex justify-end">
            {{ $users->links('vendor.pagination.semantic-ui') }}
        </div>
    </div>
@endsection
