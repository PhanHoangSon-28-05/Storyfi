<?php

namespace App\Repositories\Client\Home\Comment;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{

    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Comment::class;
    }

    public function show_comment($id)
    {

        $result = $this->model->where('story_id', $id)->where('status', 2)->get();
        // dd($result == true);
        if ($result != true) {
            $result = null;
        }
        return $result;
    }

    public function post_comment($array = [])
    {
        // dd($id_user);
        // dd($array);
        $comment = $this->model->create($array);
        return $comment;
    }
}
