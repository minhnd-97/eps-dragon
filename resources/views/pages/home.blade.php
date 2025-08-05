@extends('layouts.app')

@section('full_width', true)

@section('content')
    <!-- Swiper -->
    <div class="swiper mySwiper rounded-lg shadow-lg">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('static/banner.png') }}" class="w-full h-[300px] md:h-[400px] lg:h-[500px] xl:h-[600px] 2xl:h-[1000px] object-cover" alt="Banner 1">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('static/banner.png') }}" class="w-full h-[300px] md:h-[400px] lg:h-[500px] xl:h-[600px] 2xl:h-[1000px] object-cover" alt="Banner 1">
            </div>
        </div>

        <!-- Navigation arrows -->
        <div class="swiper-button-next text-white"></div>
        <div class="swiper-button-prev text-white"></div>

        <!-- Pagination dots -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Tầm nhìn & Giá trị -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 flex flex-col-reverse md:flex-row items-center gap-12">
            <!-- Hình ảnh -->
            <div class="w-full md:w-1/2">
                <video autoplay muted loop playsinline
                       class="w-full h-auto rounded-xl shadow-lg">
                    <source src="{{ asset('static/video-home.mp4') }}" type="video/mp4">
                    Trình duyệt của bạn không hỗ trợ video.
                </video>
            </div>

            <!-- Nội dung -->
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Tầm nhìn & Giá trị
                </h2>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    EPS Long Đặng là doanh nghiệp hàng đầu trong sản xuất xốp EPS, sử dụng công nghệ hiện đại để đảm bảo chất lượng sản phẩm từ quy trình sản xuất đến tay người tiêu dùng.
                    Chúng tôi đã tham gia vào nhiều dự án trên khắp cả nước, từ khu vực Bắc đến Nam, luôn đặt sự hài lòng của khách hàng lên hàng đầu.
                </p>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    Với tầm nhìn trở thành đơn vị tiên phong trong lĩnh vực vật liệu cách nhiệt và đóng gói, chúng tôi không ngừng cải tiến kỹ thuật, đầu tư vào công nghệ mới nhằm tối ưu hóa hiệu suất sản xuất và bảo vệ môi trường.
                </p>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    Đội ngũ nhân sự của chúng tôi luôn đề cao giá trị trung thực, trách nhiệm và sáng tạo. Mỗi sản phẩm đều được kiểm định kỹ lưỡng, đáp ứng các tiêu chuẩn chất lượng khắt khe nhất trong ngành.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Chúng tôi tin rằng sự phát triển bền vững chỉ đạt được khi có sự hài hòa giữa lợi ích doanh nghiệp, khách hàng và cộng đồng. Do đó, EPS Long Đặng luôn cam kết đồng hành lâu dài cùng đối tác và xây dựng giá trị thật cho xã hội.
                </p>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 leading-snug">
            <span class="relative inline-block">
                <span class="z-10 relative">Dịch vụ của chúng tôi</span>
            </span>
            </h2>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($services as $service)
                    <div class="{{ $service->bg_color }} rounded-2xl p-6 shadow-md transition hover:shadow-lg">
                        <div class="w-12 h-12 bg-orange-400 text-white flex items-center justify-center rounded-full mb-4 text-2xl">
                            {{ $service->icon ?? '📘' }}
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $service->title }}</h3>
                        <p class="text-gray-700 mb-4">{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @foreach ($categories as $category)
        <section class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} py-16">
            <div class="max-w-7xl mx-auto px-4">
                <!-- Tiêu đề danh mục -->
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                        {{ $category->name }}
                    </h2>
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                       class="text-blue-600 hover:underline text-sm md:text-base">
                        Xem tất cả →
                    </a>
                </div>

                <!-- Danh sách sản phẩm -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($category->products->take(4) as $product)
                        <a href="{{ route('products.show', $product->id) }}" class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-lg transition">
                            <img src="{{ asset('storage/' . $product->thumbnail) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-sm text-gray-600 mt-2">
                                    {{ Str::limit($product->description, 80) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach


    <section class="relative text-white py-10" style="background-image: url('{{ asset('static/bg-feedback-pc.png') }}')">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-semibold mb-12 text-center tracking-wide"> Phản hồi từ khách hàng</h2>

            <div class="swiper mySwiperCustomer">
                <div class="swiper-wrapper">

                    @foreach ($testimonials as $testimonial)
                        <div
                            class="swiper-slide transition-all duration-300 ease-in-outs">
                            <div class="max-w-[877px] mx-auto">
                                <!-- Avatar + Info: nằm trên 1 hàng -->
                                <div class="flex items-center gap-4 mb-6">
                                    <!-- Avatar -->
                                    <div class="w-16 h-16 rounded-full overflow-hidden border-4 border-white shadow-md">
                                        <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}"
                                             class="object-cover w-full h-full">
                                    </div>

                                    <!-- Name + Position -->
                                    <div>
                                        <p class="text-lg font-bold text-white">{{ $testimonial['name'] }}</p>
                                        <p class="text-sm text-blue-200">{{ $testimonial['position'] }}</p>
                                    </div>
                                </div>

                                <!-- Nội dung feedback -->
                                <p class="text-base italic leading-relaxed text-white">“{{ $testimonial['content'] }}
                                    ”</p>
                            </div>
                        </div>
                    @endforeach

                </div>

                <br>
                <!-- Pagination -->
                <div class="swiper-pagination mt-8 !bottom-0"></div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-white" id="partners">
        <div class="container mx-auto px-6">
            <!-- Swiper slider -->
            <div class="swiper mySwiperPartners">
                <div class="swiper-wrapper">
                    @foreach($partners as $partner)
                        <div class="swiper-slide flex items-center justify-center">
                            <a href="{{ $partner->url }}" target="_blank">
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="max-h-20 object-contain">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper(".mySwiper", {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            new Swiper(".mySwiperCustomer", {
                loop: true,
                autoplay: {delay: 10000000},
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
            new Swiper(".mySwiperPartners", {
                loop: true,
                slidesPerView: 2,
                spaceBetween: 20,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: { slidesPerView: 3 },
                    768: { slidesPerView: 4 },
                    1024: { slidesPerView: 5 },
                },
            });
        });
    </script>
@endsection
