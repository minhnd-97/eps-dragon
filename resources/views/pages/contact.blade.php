@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 flex flex-col-reverse md:flex-row items-center gap-12">
        <div class="w-full md:w-1/2">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST"
                  class="bg-white p-8 rounded-xl shadow-md space-y-6 max-w-4xl mx-auto">
                @csrf

                <h2 class="text-2xl font-bold text-gray-800 mb-4">Liên hệ với chúng tôi</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Họ và tên -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                        <input type="text" name="name" id="name"
                               class="w-full border border-gray-300 px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email"
                               class="w-full border border-gray-300 px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>
                </div>

                <!-- Nội dung -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Nội dung</label>
                    <textarea name="message" id="message" rows="6"
                              class="w-full border border-gray-300 px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                              required></textarea>
                </div>

                <!-- Nút gửi -->
                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-600 text-white px-8 py-2 rounded-md hover:bg-blue-700 transition-all duration-200">
                        Gửi
                    </button>
                </div>
            </form>
        </div>

        <div class="w-full md:w-1/2">
            <div class="rounded overflow-hidden shadow-lg">
                <iframe
                        src="https://www.google.com/maps?q=Lô+03.04+Cụm+CN+Nguyên+Khê,+Đông+Anh,+Hà+Nội&output=embed"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
@endsection
