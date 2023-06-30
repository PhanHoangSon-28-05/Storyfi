<?php

namespace App\Repositories\Chapter;

use App\Models\Story;
use App\Models\User_story;
use App\Repositories\BaseRepository;


class ChapterRepository extends BaseRepository implements ChapterRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Chapter::class;
    }

    public function getChapter()
    {
        $userID = auth()->id();

        return $this->model->whereHas('users', function ($query) use ($userID) {
            $query->where('user_id', $userID);
        })->select('story_id')->groupBy('story_id')->get();
    }

    public function findChapter($story_id)
    {
        $result = $this->model->where('story_id', $story_id)->get();

        return $result;
    }

    public function findChapterEdit($number_chapter)
    {
        $result = $this->model->where('number_chapter', $number_chapter)->first();

        return $result;
    }

    public function createChapter($attributes = [])
    {
        $storyId = $attributes['story_id'];

        $query = [
            'sumChapter' => Story::find($storyId)->increment('sum_chapter', 1),
            'point' => User_story::where('story_id', $storyId)->increment('point', 5)
        ];

        $results = [];

        foreach ($query as $key => $value) {
            $results[$key] = $value;
        }

        return $this->model->create($attributes);
    }
}
