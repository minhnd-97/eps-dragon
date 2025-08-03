<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Define the index method
    public function index()
    {
        $testimonials = [
            [
                'avatar' => asset('static/avatar.jpg'),
                'name' => 'Nguyễn Văn Hùng',
                'position' => 'Giám đốc kỹ thuật – Công ty Xây dựng Hoàng Gia',
                'content' => 'Sản phẩm xốp EPS của quý công ty có chất lượng rất ổn định, khả năng cách nhiệt tốt, thi công dễ dàng và giúp tiết kiệm đáng kể chi phí. Chúng tôi đã sử dụng trong nhiều công trình lớn.',
            ],
            [
                'avatar' => asset('static/avatar.jpg'),
                'name' => 'Lê Thị Mai',
                'position' => 'Trưởng phòng vật tư – Công ty Cổ phần Đầu tư Nam Hà',
                'content' => 'Chúng tôi rất hài lòng với chất lượng và thời gian giao hàng nhanh chóng của sản phẩm xốp EPS. Đội ngũ hỗ trợ chuyên nghiệp, giá cả cạnh tranh.',
            ],
            [
                'avatar' => asset('static/avatar.jpg'),
                'name' => 'Phạm Quốc Tuấn',
                'position' => 'Kỹ sư trưởng – Công ty TNHH Xây lắp Thành Đạt',
                'content' => 'Xốp EPS có khả năng chịu lực tốt và rất phù hợp để dùng làm lớp nền trong các công trình dân dụng. Đặc biệt là không bị biến dạng sau thời gian dài sử dụng.',
            ],
        ];

        $partners = Partner::all();
        $services = Service::latest()->take(3)->get();
        $categories = Category::with('products')->get();
        return view('pages.home', compact('testimonials', 'partners', 'services', 'categories'));
    }

    public function introduction()
    {
        return view('pages.introduction');
    }

}
