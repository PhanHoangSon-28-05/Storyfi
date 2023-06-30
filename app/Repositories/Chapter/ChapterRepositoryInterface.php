<?php

namespace App\Repositories\Chapter;

use App\Repositories\RepositoryInterface;

interface ChapterRepositoryInterface extends RepositoryInterface
{
    public function getChapter();
    public function findChapter($id);
    public function findChapterEdit($id);

    public function CreateChapter($array = []);

    public function deleteChapter($id);
}
