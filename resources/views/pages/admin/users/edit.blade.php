@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Chỉnh sửa người dùng</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-gray-700 font-medium">Tên</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div>
                <label for="role" class="block text-gray-700 font-medium">Vai trò</label>
                <select name="role" id="role" class="w-full px-4 py-2 border rounded" required>
                    <option value="">Chọn vai trò</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ (old('role', $user->roles->first()->name ?? '') == $role->name) ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Cập nhật</button>
                <a href="{{ route('admin.users.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded">Huỷ</a>
            </div>
        </form>
    </div>
@endsection
