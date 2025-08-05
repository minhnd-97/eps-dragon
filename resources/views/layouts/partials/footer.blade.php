<footer aria-labelledby="footer-heading" class="bg-gray-100">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="py-12 flex flex-col md:flex-row justify-between gap-8">
            <div class="flex-1">
                <img class="h-12 mb-4" src="{{ asset('static/logo.jpg') }}" alt="Logo">
            </div>

            <div class="flex-1 flex flex-col gap-6 text-sm">
                <div>
                    <p class="text-lg font-bold mb-2">Chi nhánh TP. Hà Nội</p>
                    <p>📍 Lô 03.04 Cụm CN Nguyên Khê, Đông Anh, Hà Nội</p>
                    <p>📞 0962 918 988 - 0972 696 988</p>
                </div>

                <div>
                    <p class="text-lg font-bold mb-2">Chi nhánh TP. Bắc Ninh</p>
                    <p>📍 Trung Chính, Bắc Ninh</p>
                    <p>📞 0962 918 988 - 0972 696 988</p>
                </div>
            </div>

            <div class="flex-1 flex flex-col gap-4">
                <p class="text-lg font-bold mb-2">Mạng xã hội</p>
                <div class="flex gap-3">
                    <a href="#" target="_blank"><img src="{{ asset('static/svg/facebook.svg') }}" alt="Facebook" class="w-6 h-6"></a>
                    <a href="#" target="_blank"><img src="{{ asset('static/svg/youtube.svg') }}" alt="YouTube" class="w-6 h-6"></a>
                </div>
            </div>
        </div>

        <div class="text-sm text-gray-300 py-6 border-t border-white/20">
            © {{ date('Y') }} - Công ty EPS LONG DANG - All rights reserved.
        </div>
    </div>
</footer>
