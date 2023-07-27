<?php

namespace App\Repositories\Comment;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{

    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Comment::class;
    }
    

    public function update_approval($id, $status)
    {
        $result = $this->model->where('id', $id)->first();
        // dd($result);

        $result->update(['status' => $status]);

        return $result;
    }
}
