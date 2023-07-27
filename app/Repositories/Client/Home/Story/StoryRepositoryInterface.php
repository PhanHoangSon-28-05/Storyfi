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

    //content-4
    public function getIndex_story_kinh_di();
    public function getIndex_story_ngon_tinh();
    public function getIndex_story_tinh_yeu();
    public function getIndex_story_tam_ly();
    public function getIndex_story_teen();
    public function getIndex_story_hoc_duong();
    public function getIndex_story_hai();
    public function getIndex_story_trong_sinh();

    //content-5
    public function getHot_story_header();
}
