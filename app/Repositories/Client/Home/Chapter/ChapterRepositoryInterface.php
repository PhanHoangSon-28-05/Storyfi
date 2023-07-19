<?php

namespace App\Repositories\Client\Home\Chapter;

use App\Repositories\RepositoryInterface;

interface ChapterRepositoryInterface extends RepositoryInterface
{
    public function getContent_chapter($slugStory, $slug);
}
