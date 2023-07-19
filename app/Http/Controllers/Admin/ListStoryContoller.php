<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Story\StoryRepositoryInterface;
use Illuminate\Http\Request;
use Pusher\Pusher;

class ListStoryContoller extends Controller
{
    protected $storyRepo;

    public function __construct(StoryRepositoryInterface $storyRepo)
    {
        $this->storyRepo = $storyRepo;
    }

    public function index()
    {
        $stories = $this->storyRepo->getList_all_story();
        return view('admin.list-stories.index_of_all', compact('stories'));
    }

    public function view($id)
    {
        $stories = $this->storyRepo->find($id);
        return view('admin.list-stories.view_story', compact('stories'));
    }

    public function update(Request $request, $id)
    {
        $dataUpdate = $request->all();

        $data['title'] = 'Admin';
        $data['content'] = 'Bạn đã được phê duyệt bài';

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
        $stories = $this->storyRepo->update_approval($id, $dataUpdate['status']);


        return redirect()->route('list-stories.index')->with(['messager' => 'Update success']);
    }
}
