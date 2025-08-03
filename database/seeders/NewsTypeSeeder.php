<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsType;
use Illuminate\Support\Str;

class NewsTypeSeeder extends Seeder
{
    public function run()
    {
        $types = ['Tin tức', 'Dự án', 'Ứng dụng'];

        foreach ($types as $type) {
            NewsType::create([
                'name' => $type,
                'slug' => Str::slug($type)
            ]);
        }
    }
}

