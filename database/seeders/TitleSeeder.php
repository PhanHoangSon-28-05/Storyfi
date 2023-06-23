<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [['name' => 'Truyện sáng tác'], ['name' => 'Truyện dịch']];
        foreach ($titles as $title) {
            Title::updateOrCreate($title);
        }
    }
}
