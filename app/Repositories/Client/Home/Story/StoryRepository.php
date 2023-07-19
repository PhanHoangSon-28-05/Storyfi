<?php

namespace App\Repositories\Client\Home\Story;

use App\Repositories\BaseRepository;

class StoryRepository extends BaseRepository implements StoryRepositoryInterface
{

    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Story::class;
    }

    public function getStory_all()
    {
        return $this->model->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->get();
    }

    public function getIndex_story_sung_hot()
    {
        $sung_hot = $this->model->with(['titles', 'categories', 'users'])->whereHas('categories', function ($query) {
            $query->where('name', 'sủng');
        })->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->get();
        return $sung_hot;
    }

    public function getIndex_story_ngontinh()
    {
        return $this->model->with('titles', 'categories', 'users')->whereHas('categories', function ($query) {
            $query->where('name', 'ngôn tình');
        })->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->get();
    }

    public function getHot_story()
    {
        return $this->model->orderBY('view', 'desc')->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->take(14)->get();
    }

    // Lấy sách theo category_id
    public function getStory_category($id)
    {
        $storys = $this->model->whereHas('categories', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->paginate(10);

        return $storys;
    }

    public function getNew_story()
    {
        return $this->model->orderBY('created_at', 'desc')->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->take(14)->get();
    }

    public function getStory_short()
    {
        $story_short = $this->model->whereHas('categories', function ($query) {
            $query->where('method', '0');
        })->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->orderBY('created_at', 'desc')->take(14)->get();

        // dd($story_short);
        return $story_short;
    }

    public function getStory_countChapter()
    {
        return $this->model->orderBY('sum_chapter', 'desc')->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->take(14)->get();
    }

    public function getStory_summary($slug)
    {
        $result = $this->model->where('slug', $slug)->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->first();

        return $result;
    }

    public function getStory_user($slug)
    {
        $story = $this->getStory_summary($slug);

        if (!$story) {
            return null;
        }

        $userID = $story->users()->first()->id;

        return $this->model->whereHas('users', function ($query) use ($userID) {
            $query->where('user_id', $userID);
        })->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->paginate(3);
    }

    public function getNews_story_InSummary()
    {
        return $this->model->orderBY('created_at', 'desc')->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->take(8)->get();
    }

    public function getStory_chapter($slug)
    {
        $story = $this->model->where('slug', $slug)->first();

        $chapters = $story->chapters()->whereHas('users', function ($query) {
            $query->where('status', 2);
        })->paginate(12);

        return $chapters;
    }
}
