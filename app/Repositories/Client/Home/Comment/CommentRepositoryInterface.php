<?php

namespace App\Repositories\Client\Home\Comment;

use App\Repositories\RepositoryInterface;

interface CommentRepositoryInterface extends RepositoryInterface
{
    public function show_comment($id);
    public function post_comment($array);
}
