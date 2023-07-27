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
            ['icon' => '📚', 'name' => 'Truyện tranh'],
            ['icon' => '📖', 'name' => 'Truyện ngắn'],
            ['icon' => '😄', 'name' => 'Hài hước'],
            ['icon' => '💖', 'name' => 'Tình cảm'],
            ['icon' => '🏃‍♂️', 'name' => 'Phiêu lưu'],
            ['icon' => '👻', 'name' => 'Kinh dị'],
            ['icon' => '🚀', 'name' => 'Viễn tưởng'],
            ['icon' => '🏛️', 'name' => 'Thần thoại'],
            ['icon' => '🏰', 'name' => 'Cổ tích'],
            ['icon' => '😆', 'name' => 'Truyện cười'],
            ['icon' => '🧠', 'name' => 'Tâm lý'],
            ['icon' => '👬', 'name' => 'Đam mỹ'],
            ['icon' => '🚀', 'name' => 'Viễn cảnh'],
            ['icon' => '⚽', 'name' => 'Thể thao'],
            ['icon' => '🎥', 'name' => 'Đồng nhân'],
            ['icon' => '🥋', 'name' => 'Truyện gia đấu'],
            ['icon' => '🔄', 'name' => 'Trọng sinh'],
            ['icon' => '🌀', 'name' => 'Dị năng'],
            ['icon' => '👩‍❤️‍💋‍👩', 'name' => 'Bách hợp'],
            ['icon' => '🚀', 'name' => 'Tương lai'],
            ['icon' => '🕵️‍♂️', 'name' => 'Thám tử'],
            ['icon' => '🌀', 'name' => 'Xuyên tâm'],
            ['icon' => '📚', 'name' => 'Truyện chữ'],
            ['icon' => '🏙️', 'name' => 'Cuộc sống'],
            ['icon' => '📚', 'name' => 'Tiểu thuyết'],
            ['icon' => '💖', 'name' => 'Sủng'],
            ['icon' => '⚔️', 'name' => 'Kiếm hiệp'],
            ['icon' => '🧚‍♀️', 'name' => 'Tiên hiệp'],
            ['icon' => '🔞', 'name' => 'Truyện sắc'],
            ['icon' => '📜', 'name' => 'Lịch sử'],
            ['icon' => '🔬', 'name' => 'Khoa học'],
            ['icon' => '🎖️', 'name' => 'Quân sự'],
            ['icon' => '🕹️', 'name' => 'Võng Du'],
            ['icon' => '🗺️', 'name' => 'Dị Giới'],
            ['icon' => '🧙‍♂️', 'name' => 'Huyền Huyễn'],
            ['icon' => '🧙‍♂️', 'name' => 'Khoa Huyễn'],
            ['icon' => '💞', 'name' => 'Ngôn Tình'],
            ['icon' => '🧒', 'name' => 'Truyện Teen'],
            ['icon' => '🌀', 'name' => 'Xuyên Không'],
            ['icon' => '👻', 'name' => 'Truyện ma'],
            ['icon' => '💑', 'name' => 'Tình'],
            ['icon' => '📏', 'name' => 'Dài'],
            ['icon' => '💑', 'name' => 'Ngôn tình'],
            ['icon' => '🎒', 'name' => 'Học đường'],
            ['icon' => '🌀', 'name' => 'Kỳ ảo'],
            ['icon' => '🧘‍♀️', 'name' => 'Tâm linh'],
            ['icon' => '🚀', 'name' => 'Phiêu bạt'],
            ['icon' => '🌌', 'name' => 'Kỳ huyễn'],
            ['icon' => '🌌', 'name' => 'Huyền ảo'],
            ['icon' => '🧙‍♂️', 'name' => 'Tưởng tượng'],
            ['icon' => '🔪', 'name' => 'Tội phạm'],
            ['icon' => '🧠', 'name' => 'Tâm lý học'],
            ['icon' => '💕', 'name' => 'Lãng mạn'],
            ['icon' => '😄', 'name' => 'Hài'],
            ['icon' => '🕵️‍♂️', 'name' => 'Trinh thám'],
            ['icon' => '⚔️', 'name' => 'Chiến tranh'],
            ['icon' => '💑', 'name' => 'Tình yêu'],
            ['icon' => '💀', 'name' => 'Tội ác'],
            ['icon' => '👻', 'name' => 'Siêu nhiên'],
            ['icon' => '💑', 'name' => 'Tình dục'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}
