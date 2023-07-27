<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Story\StoryRepositoryInterface;
use Illuminate\Http\Request;
use Pusher\Pusher;

class CommentControlelr extends Controller
{
    protected $commentRepo;
    protected $storyRepo;

    public function __construct(CommentRepositoryInterface $commentRepo, StoryRepositoryInterface $storyRepo)
    {
        $this->commentRepo = $commentRepo;
        $this->storyRepo = $storyRepo;
    }

    public function index()
    {
        $comments = $this->commentRepo->getAll();
        return view('admin.comment.index_of_all', compact('comments'));
    }

    public function view($id)
    {
        $comments = $this->commentRepo->find($id);
        // dd($comments['id']);
        $stories = $this->storyRepo->find($comments['id']);
        // dd($stories);
        return view('admin.comment.view', compact('stories', 'comments'));
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $dataUpdate = $request->all();
        // dd($dataUpdate);
        $data['title'] = 'Admin';
        if ($dataUpdate['status'] == 0) {
            $data['content'] = 'Vì comment của bạn có một số lời cấm nên đã bị xóa';
        } else {
            $data['content'] = 'Bình luận của bạn đã được cho phép';
        }

        $options = array(
            'cluster' => 'mt1',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $pusher->trigger('Notify', 'send-message', $data);
        // dd($dataUpdate);
        $stories = $this->commentRepo->update_approval($id, $dataUpdate['status']);


        return redirect()->route('list-stories-comment.index')->with(['messager' => 'Update success']);
    }
}
