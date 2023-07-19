<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Truyện tranh'],
            ['name' => 'Truyện ngắn'],
            ['name' => 'Hài hước'],
            ['name' => 'Tình cảm'],
            ['name' => 'Phiêu lưu'],
            ['name' => 'Kinh dị'],
            ['name' => 'Viễn tưởng'],
            ['name' => 'Thần thoại'],
            ['name' => 'Cổ tích'],
            ['name' => 'Truyện cười'],
            ['name' => 'Tâm lý'],
            ['name' => 'Linh dị'],
            ['name' => 'Đam mỹ'],
            ['name' => 'Viễn cảnh'],
            ['name' => 'Thể thao'],
            ['name' => 'Đồng nhân'],
            ['name' => 'Truyện gia đấu'],
            ['name' => 'Trọng sinh'],
            ['name' => 'Dị năng'],
            ['name' => 'Bách hợp'],
            ['name' => 'Tương lai'],
            ['name' => 'Thám tử'],
            ['name' => 'Xuyên tâm'],
            ['name' => 'Truyện chữ'],
            ['name' => 'Cuộc sống'],
            ['name' => 'Tiểu thuyết'],
            ['name' => 'Sủng'],
            ['name' => 'Kiếm hiệp'],
            ['name' => 'Tiên hiệp'],
            ['name' => 'Truyện sắc'],
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
            ['name' => 'Tình'],
            ['name' => 'Dài'],
            ['name' => 'Ngôn tình'],
            ['name' => 'Học đường'],
            ['name' => 'Kỳ ảo'],
            ['name' => 'Tâm linh'],
            ['name' => 'Phiêu bạt'],
            ['name' => 'Kỳ huyễn'],
            ['name' => 'Huyền ảo'],
            ['name' => 'Tưởng tượng'],
            ['name' => 'Tội phạm'],
            ['name' => 'Tâm lý học'],
            ['name' => 'Lãng mạn'],
            ['name' => 'Hài'],
            ['name' => 'Trinh thám'],
            ['name' => 'Chiến tranh'],
            ['name' => 'Tình yêu'],
            ['name' => 'Tội ác'],
            ['name' => 'Siêu nhiên'],
            ['name' => 'Tình dục'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}
