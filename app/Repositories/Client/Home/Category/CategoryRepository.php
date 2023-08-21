<?php

namespace App\Repositories\Client\Home\Category;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function getIndex_category()
    {
        return $this->model->withCount('stories')
            ->orderBy('stories_count', 'desc')
            ->take(14)
            ->get();
    }

    public function get_category($slug)
    {
        // dd($slug);
        // Lấy name category từ slug
        $name_category = str_replace('-', ' ', Str::slug($slug));
        $array = $this->model->all();
        $list = [];
        $list_d = [];
        foreach ($array as  $value) {
            array_push($list, $value['name']);
        }
        foreach ($list as $value) {
            if (substr($value,  0, 2) == "Đ") {
                array_push($list_d, $value);
            }
        }
        foreach ($list_d as $value) {
            if (str_replace('-', ' ', Str::slug($value)) == $name_category) {
                # code...
                $name_category = str_replace('d', 'Đ', $name_category);
            }
        }
        $name_category = mb_convert_case($name_category, MB_CASE_TITLE, 'UTF-8');
        // dd($name_category);

        $value = $this->model->where('name', $name_category)->get();
        // dd($value);
        return $value;
    }
}
