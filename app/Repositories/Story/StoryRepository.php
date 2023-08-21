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

    public function getList_all_story()
    {
        $query = $this->model->all();
        return $query;
    }

    public function getList_all_story_view($id)
    {
        $query = $this->model->find($id);
        return $query;
    }

    public function getstory_slug($slug)
    {
        $query = $this->model->where('slug', $slug)->get();
        return $query;
    }

    public function update_approval($id, $status)
    {
        $result = $this->model->where('id', $id)->first();
        $update_status = $result->users()->first()->pivot;

        $update_status->update(['status' => $status]);

        return $update_status;
    }
}
