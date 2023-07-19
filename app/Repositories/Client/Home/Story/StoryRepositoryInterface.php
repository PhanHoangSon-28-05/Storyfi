<?php

namespace App\Repositories\Client\Home\Story;

use App\Repositories\RepositoryInterface;

interface StoryRepositoryInterface extends RepositoryInterface
{
    public function getStory_all();
    public function getIndex_story_sung_hot();
    public function getIndex_story_ngontinh();
    public function getHot_story();
    public function getStory_category($id);
    public function getNew_story();
    public function getStory_short();
    public function getStory_countChapter();

    public function getStory_summary($slug);
    public function getStory_user($slug);
    public function getNews_story_InSummary();
    public function getStory_chapter($slug);
}
