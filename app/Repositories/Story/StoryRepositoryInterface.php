<?php

namespace App\Repositories\Story;

use App\Repositories\RepositoryInterface;

interface StoryRepositoryInterface extends RepositoryInterface
{
    public function getStory();

    public function getList_all_story();
    public function getList_all_story_view($id);
    public function getstory_slug($slug);
    public function update_approval($id, $status);
}
