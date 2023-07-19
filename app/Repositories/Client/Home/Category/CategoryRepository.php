<?php

namespace App\Repositories\Client\Home\Category;

use App\Repositories\BaseRepository;

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
        return $this->model->where('name', $slug)->get();
    }
}
