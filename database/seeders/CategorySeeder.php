<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {

        $categories = [
            'Xốp định hình',
            'Xốp dạng khối',
            'Xốp đóng gói',
            'Xốp chống nóng xây dựng',
        ];

        foreach ($categories as $cat) {
            $category = Category::create([
                'name' => $cat,
                'slug' => \Str::slug($cat),
            ]);

            // Thêm 4 sản phẩm cho mỗi danh mục
            for ($i = 1; $i <= 4; $i++) {
                $category->products()->create([
                    'name' => "{$cat} mẫu {$i}",
                    'thumbnail' => 'products/demo.jpg',
                    'description' => 'Mô tả ngắn về sản phẩm ' . $i,
                    'images' => [
                        'products/demo.jpg',
                        'products/demo.jpg',
                    ],
                ]);
            }
        }
    }
}

