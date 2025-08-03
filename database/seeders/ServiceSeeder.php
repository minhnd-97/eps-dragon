<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Sản xuất xốp EPS',
                'icon' => '🏭',
                'description' => 'Chuyên sản xuất xốp EPS định hình, dạng khối và tấm cách nhiệt với công nghệ hiện đại, đáp ứng đa dạng nhu cầu từ công nghiệp đến dân dụng.',
                'link' => '#san-pham',
                'bg_color' => 'bg-orange-50',
            ],
            [
                'title' => 'Đóng gói & Bao bì EPS',
                'icon' => '📦',
                'description' => 'Cung cấp giải pháp đóng gói bằng xốp EPS cho hàng điện tử, thực phẩm, thiết bị y tế với độ an toàn và chống sốc tối ưu.',
                'link' => '#dong-goi',
                'bg_color' => 'bg-green-50',
            ],
            [
                'title' => 'Chống nóng & Cách nhiệt',
                'icon' => '🌞',
                'description' => 'Sản phẩm xốp EPS chống nóng dùng trong thi công mái nhà, trần, tường công trình giúp tiết kiệm năng lượng và nâng cao độ bền công trình.',
                'link' => '#ung-dung',
                'bg_color' => 'bg-blue-50',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
