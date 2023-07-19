<?php

namespace App\Repositories\Client\Home\Chapter;

use App\Models\Story;
use App\Repositories\BaseRepository;
use App\Repositories\Client\Home\Chapter\ChapterRepositoryInterface;

class ChapterRepository extends BaseRepository implements ChapterRepositoryInterface
{

    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Chapter::class;
    }

    public function getContent_chapter($slugStory, $slug)
    {
        $story = Story::where('slug', $slugStory)->first();

        $chapter = $story->chapters->where('number_chapter', $slug);

        $query = [
            'sumChapter' => Story::where('slug', $slugStory)->first()->increment('view', 1),
        ];

        $results = [];

        foreach ($query as $key => $value) {
            $results[$key] = $value;
        }

        return $chapter;
    }
}
