<header class="bg-white text-black p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo + Navigation Links Section -->
        <div class="flex items-center space-x-4">
            <a href="{{ url('/') }}" class="text-2xl font-bold hover:text-gray-700">
                <img
                        src="{{ asset('static/logo.jpg') }}" alt="Logo" class="h-10 w-10">
            </a>

            <!-- Navigation Links -->
            <!-- Desktop Menu -->
            <nav class="hidden md:flex items-center space-x-6 ml-4 text-gray-800 font-medium">
                <a href="{{ url('/') }}" class="hover:text-indigo-600 transition duration-200">Trang chủ</a>
                <a href="{{ url('/gioi-thieu') }}" class="hover:text-indigo-600 transition duration-200">Giới thiệu</a>

                <!-- Sản phẩm dropdown -->
                <div class="relative group">
                    <a href="{{ route('products.index') }}" class="inline-block px-3 py-2 hover:text-indigo-600 transition duration-200">
                        Sản phẩm
                    </a>
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp
                    <div
                            class="absolute left-0 mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50"
                    >
                        @foreach($categories as $cat)
                            <a href="{{ route('products.index', ['category' => $cat->slug]) }}"
                               class="block px-5 py-3 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ url('/ung-dung') }}" class="hover:text-indigo-600 transition duration-200">Ứng dụng</a>
                <a href="{{ url('/tin-tuc') }}" class="hover:text-indigo-600 transition duration-200">Tin tức</a>
                <a href="{{ url('/du-an') }}" class="hover:text-indigo-600 transition duration-200">Dự án</a>
                <a href="{{ url('/lien-he') }}" class="hover:text-indigo-600 transition duration-200">Liên hệ</a>
            </nav>

        </div>

        <!-- Search and Profile Section -->
        <div class="flex items-center space-x-4">
            <!-- Search Bar -->
            <div class="relative hidden md:block">
                <form action="{{ route('products.index') }}" method="GET" class="relative hidden md:block">
                    <input type="text" name="search" placeholder="Tìm kiếm..."
                           value="{{ request('search') }}"
                           class="border border-gray bg-white text-gray-800 rounded-full pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                    <svg class="w-5 h-5 text-gray-500 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-4.35-4.35M17 11a6 6 0 1 0-12 0 6 6 0 0 0 12 0z"></path>
                    </svg>
                </form>
            </div>

            <!-- User Profile Section -->
        @auth
            <!-- Show User Profile if Logged In -->
                <div class="relative group z-50">
                    <button class="flex items-center focus:outline-none">
                        <img src="{{ asset('static/avatar.jpg') }}" alt="User Profile" class="h-10 w-10 rounded-full">
                    </button>
                    <!-- Dropdown Menu -->
                    <div
                            class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">

                        @if(auth()->check() && auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 hover:bg-gray-100">Quản lý
                                tài khoản</a>
                            <a href="{{ route('admin.partners.index') }}" class="block px-4 py-2 hover:bg-gray-100">Quản
                                lý
                                đối tác</a>
                            <a href="{{ route('admin.services.index') }}"
                               class="block px-4 py-2 hover:bg-gray-100">Quản lý dịch vụ</a>
                            <a href="{{ route('admin.products.index') }}"
                               class="block px-4 py-2 hover:bg-gray-100">Quản lý sản phẩm</a>
                            <a href="{{ route('admin.news.index') }}"
                               class="block px-4 py-2 hover:bg-gray-100">Quản lý tin tức</a>
                        @endif
                    </div>
                </div>
        @endauth


        <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
         class="hidden md:hidden bg-white shadow-lg rounded-b-xl z-50 absolute top-16 left-0 right-0 border border-gray-200">
        <nav class="px-6 py-4 space-y-3">
            <a href="{{ url('/') }}" class="block text-gray-800 font-medium hover:text-indigo-600 transition">Trang
                chủ</a>
            <a href="{{ url('/gioi-thieu') }}" class="block text-gray-800 font-medium hover:text-indigo-600 transition">Giới
                thiệu</a>

            <!-- Dropdown sản phẩm -->
            <div>
                <button id="toggle-submenu"
                        class="block text-gray-800 font-medium hover:text-indigo-600 transition">
                    <span>Sản phẩm</span>
                </button>

                <div id="submenu" class="mt-2 pl-4 space-y-2 hidden">
                    @foreach($categories as $cat)
                        <a href="{{ route('products.index', ['category' => $cat->slug]) }}"
                           class="block text-sm text-gray-600 hover:text-indigo-600 transition">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <a href="{{ url('/ung-dung') }}" class="block text-gray-800 font-medium hover:text-indigo-600 transition">Ứng
                dụng</a>
            <a href="{{ url('/tin-tuc') }}" class="block text-gray-800 font-medium hover:text-indigo-600 transition">Tin
                tức</a>
            <a href="{{ url('/du-an') }}" class="block text-gray-800 font-medium hover:text-indigo-600 transition">Dự
                án</a>
            <a href="{{ url('/lien-he') }}" class="block text-gray-800 font-medium hover:text-indigo-600 transition">Liên
                hệ</a>
        </nav>
    </div>


</header>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', () => {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
<script>
    const toggleBtn = document.getElementById('toggle-submenu');
    const submenu = document.getElementById('submenu');
    const icon = document.getElementById('submenu-icon');

    toggleBtn.addEventListener('click', () => {
        submenu.classList.toggle('hidden');
        icon.classList.toggle('rotate-180'); // Xoay icon xuống/lên
    });
</script>
