<footer aria-labelledby="footer-heading" class="bg-gray-100">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="pt-20 pb-12 flex flex-col gap-8 md:flex-row">
            <div class="flex-1">
                <a href="/"><img class="h-12 mb-4" src="{{ asset('static/logo.jpg') }}" alt="Company name"></a>
            </div>{{--
                <p class="text-sm text-gray-500 mb-10">Nghe chép chính tả - Lan toả niềm vui</p>
--}}
            <div class="md:w-1/2 flex">
                <div class="flex flex-col gap-y-4 text-sm text-gray-900 mr-10 md:mr-32">
                    <p class="font-bold">Thông tin</p>
{{--                    <a class="hover:text-gray-500" href="/#about">Về chúng mình</a>--}}
{{--                    <a class="hover:text-gray-500" href="/#features">Tính năng</a>--}}
{{--                    <a class="hover:text-gray-500" href="/#pricing">Bảng giá</a>--}}
                    <a href="https://m.me/miojp.2024" target="_blank" class="hover:text-gray-500">Liên hệ</a>
                </div>
                <div class="flex flex-col gap-y-4 text-sm text-gray-900">
                    <p class="font-bold">Mạng xã hội</p>

{{--                    <a href="#" target="_blank" class="flex gap-x-2 items-center hover:text-gray-500">--}}
{{--                        <img src="{{ asset('static/svg/zalo.svg') }}" alt="Zalo" class="w-5 h-5"> Zalo--}}
{{--                    </a>--}}

                    <a href="https://www.facebook.com/miojp.2024" target="_blank" class="flex gap-x-2 items-center hover:text-gray-500">
                        <img src="{{ asset('static/svg/facebook.svg') }}" alt="Facebook" class="w-5 h-5"> Facebook
                    </a>

{{--                    <a href="#" target="_blank" class="flex gap-x-2 items-center hover:text-gray-500">--}}
{{--                        <img src="{{ asset('static/svg/line.svg') }}" alt="LINE" class="w-5 h-5"> LINE--}}
{{--                    </a>--}}

{{--                    <a href="#" target="_blank" class="flex gap-x-2 items-center hover:text-gray-500">--}}
{{--                        <img src="{{ asset('static/svg/threads.svg') }}" alt="Threads" class="w-5 h-5"> Threads--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
        <div class="text-sm text-gray-500 py-6 border-t border-solid border-gray-100">
            © Copyright {{ date('Y') }} - MIO
        </div>
    </div>
</footer>
