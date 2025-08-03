@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="max-w-7xl mx-auto">

        <!-- Image + Detail Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div
                    x-data="{ currentImage: '{{ asset('storage/' . $product->thumbnail) }}' }"
                    class="space-y-4"
            >
                <!-- Main Image -->
                <div class="w-full aspect-video border rounded-lg overflow-hidden bg-white">
                    <img :src="currentImage" class="w-full h-full object-contain transition duration-300">
                </div>

                <!-- Thumbnails -->
                <div class="flex space-x-4">
                    @foreach($product->images as $img)
                        <img src="{{ asset('storage/' . $img) }}" class="w-20 h-20 object-cover border-2 rounded cursor-pointer"
                             @click="currentImage = '{{ asset('storage/' . $img) }}'">
                    @endforeach
                </div>
            </div>

            <!-- Detail Section -->
            <div class="space-y-6 bg-white rounded-xl p-6 shadow-md border border-gray-100">
                <!-- Product Name -->
                <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>

                <!-- Content Block -->
                <div class="space-y-4 text-gray-700 text-base">
                    <!-- Thông tin liên hệ -->
                    <div>
                        <h2 class="text-xl font-semibold text-blue-600 mb-2">Thông tin liên hệ</h2>
                        <ul class="space-y-1">
                            <li><strong>Địa chỉ CS1:</strong> Nguyên Khê - Đông Anh</li>
                            <li><strong>Địa chỉ CS2:</strong> Trung Chính - Bắc Ninh</li>
                            <li><strong>Hotline 1:</strong> <a href="tel:0962928988" class="text-blue-500 hover:underline">0962 928 988</a></li>
                            <li><strong>Hotline 2:</strong> <a href="tel:0972696988" class="text-blue-500 hover:underline">0972 696 988</a></li>
                        </ul>
                    </div>

                    <!-- Nội dung sản phẩm -->
                    <div>
                        <h2 class="text-xl font-semibold text-blue-600 mb-2">Thông số sản phẩm</h2>
                        <ul class="list-disc list-inside space-y-1">
                            <li><strong>Tiêu chuẩn:</strong> ASTM C578 (Hoa Kỳ), EN 13163 (Châu Âu), TCVN 8257 (Việt Nam)</li>
                            <li><strong>Trọng lượng:</strong> Từ 8 kg/m³ đến 35 kg/m³ (tùy thuộc vào mật độ)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description Section -->
        <div class="bg-white p-6 rounded-lg shadow mb-6 mt-6">
            <h2 class="text-2xl font-semibold mb-4 text-blue-800">XỐP EPS LONG ĐẰNG – CHẤT LƯỢNG CAO</h2>
            <div class="text-gray-700 leading-relaxed space-y-4 text-base">
                <p>Chúng tôi tự hào mang đến các sản phẩm xốp chất lượng cao, đáp ứng mọi nhu cầu của bạn:</p>

                <ul class="list-none space-y-2">
                    <li>✅ <strong>Cho các công ty gốm sứ, gỗ xuất khẩu:</strong> Tấm xốp, góc hình chèn hàng, chống sốc, bảo vệ sản phẩm nguyên vẹn.</li>
                    <li>✅ <strong>Cho ngành điện tử, điện lạnh:</strong> Đúc hàng hình, cắt hình theo yêu cầu, kê lót sản phẩm chính xác, chống trầy xước.</li>
                    <li>✅ <strong>Cho khách hàng lẻ:</strong> Dịch vụ đóng gói, kê lót chuyên nghiệp cho gương kính, gương soi, đảm bảo an toàn khi vận chuyển.</li>
                    <li>✅ <strong>Cho các nhà máy sản xuất tôn:</strong> Tấm xốp làm panel vách ngăn, cách nhiệt, chống ồn hiệu quả.</li>
                    <li>✅ <strong>Cho các xưởng điêu khắc:</strong> Cục xốp block với nhiều kích thước, đáp ứng mọi yêu cầu sáng tạo.</li>
                </ul>

                <p class="pt-4">🎯 <strong>Với kinh nghiệm dày dặn và công nghệ sản xuất hiện đại, XỐP EPS LONG ĐẰNG cam kết:</strong></p>

                <ul class="list-none space-y-2">
                    <li>🔹 Sản phẩm chất lượng cao, đa dạng mẫu mã</li>
                    <li>🔹 Giá cả cạnh tranh, chiết khấu hấp dẫn</li>
                    <li>🔹 Dịch vụ tư vấn, hỗ trợ tận tình</li>
                    <li>🔹 Giao hàng nhanh chóng, đúng hẹn</li>
                </ul>

                <p class="pt-4 font-semibold text-blue-700">📞 Hãy để chúng tôi giúp bạn bảo vệ hàng hóa một cách tốt nhất!</p>
            </div>
        </div>

        <!-- Other Items -->
        <div>
            <h2 class="text-2xl font-semibold mb-6">Sản phẩm khác</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($otherProducts as $item)
                    <div class="bg-white p-4 rounded shadow hover:shadow-md transition">
                        <img src="{{ asset('storage/' . $product->thumbnail) }}" class="w-full h-40 object-cover rounded mb-4" alt="">
                        <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                        <p class="text-sm text-gray-600 line-clamp-2">{{ Str::limit($item->description, 100) }}</p>
                        <a href="{{ route('products.show', $item->id) }}" class="text-blue-600 text-sm mt-2 inline-block">Xem chi tiết →</a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
