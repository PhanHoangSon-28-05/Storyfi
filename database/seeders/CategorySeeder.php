<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Kiếm hiệp'],
            ['name' => 'Tiên hiệp'],
            ['name' => 'Truyện sắc'],
            ['name' => 'Đô thị'],
            ['name' => 'Truyện Khác'],
            ['name' => 'Lịch sử'],
            ['name' => 'Khoa học'],
            ['name' => 'Quân sự'],
            ['name' => 'Võng Du'],
            ['name' => 'Dị Giới'],
            ['name' => 'Huyền Huyễn'],
            ['name' => 'Khoa Huyễn'],
            ['name' => 'Ngôn Tình'],
            ['name' => 'Truyện Teen'],
            ['name' => 'Xuyên Không'],
            ['name' => 'Truyện ma'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}
