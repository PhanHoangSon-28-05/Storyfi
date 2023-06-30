<?php

namespace App\Repositories\Story;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class StoryRepository extends BaseRepository implements StoryRepositoryInterface
{

    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Story::class;
    }

    public function getStory()
    {
        $userID = auth()->id();

        return $this->model->whereHas('users', function ($query) use ($userID) {
            $query->where('user_id', $userID);
        })->get();
    }
}
