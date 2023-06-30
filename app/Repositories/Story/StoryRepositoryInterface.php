<?php

namespace App\Repositories\Story;

use App\Repositories\RepositoryInterface;

interface StoryRepositoryInterface extends RepositoryInterface
{
    public function getStory();
}
