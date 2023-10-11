<?php

namespace App\Repositories\Chapter;

use App\Models\Chapter;
use App\Models\Story;
use App\Models\User_story;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;


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

        $storys = Story::whereHas('users', function ($query) use ($userID) {
            $query->where('user_id', $userID);
        })->get();
        // dd($storys);
        $ids = [];
        foreach ($storys as $story) {
            $ids[] = $story['id'];
        }

        return $storys;
    }

    public function getStory($id)
    {
        $story = Story::where('id', $id)->first();

        return $story;
    }

    public function findChapter($story_id)
    {
        $result = $this->model->where('story_id', $story_id)->get();

        return $result;
    }

    public function findChapterEdit($id)
    {
        $result = $this->model->where('id', $id)->first();

        return $result;
    }

    public function createChapter($attributes = [])
    {
        $attributes['slug'] = Str::slug($attributes['number_chapter']) . '-' . Str::slug($attributes['name']);

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

    public function deleteChapter($id)
    {
        $storyId = Chapter::find($id)->story_id;

        $query = [
            'sumChapter' => Story::find($storyId)->decrement('sum_chapter', 1),
            'point' => User_story::where('story_id', $storyId)->decrement('point', 5)
        ];

        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
