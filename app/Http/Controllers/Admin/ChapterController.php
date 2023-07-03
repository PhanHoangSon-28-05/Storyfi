<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chapter\CreateChapterRequest;
use App\Http\Requests\Chapter\UpdateChapterRequest;
use App\Models\Chapter;
use App\Models\Story;
use App\Repositories\Chapter\ChapterRepositoryInterface;
use App\Repositories\Story\StoryRepositoryInterface;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    protected $chapterRepo;
    protected $storyRepo;

    public function __construct(ChapterRepositoryInterface $chapterRepo, StoryRepositoryInterface $storyRepo)
    {
        $this->chapterRepo = $chapterRepo;
        $this->storyRepo = $storyRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // $stories = Story::whereHas('users')->get();
    // dd($stories->pluck('id')->toArray());
    // $chapters = Chapter::all();
    public function index()
    {
        $chapters = $this->chapterRepo->getChapter();
        return view('admin.chapters.index', compact('chapters'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $chapters = $this->chapterRepo->findChapter($id);
        $storyId = $id;
        return view('admin.chapters.show', compact('chapters', 'storyId'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $stories = $this->chapterRepo->getStory($id);
        // dd($story_id);

        return view('admin.chapters.create', compact('stories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateChapterRequest $request)
    {
        $dataCreate = $request->all();
        // dd($dataCreate);

        $chapters =  $this->chapterRepo->CreateChapter($dataCreate);

        return redirect()->route('stories.index')->with('message', 'Create success');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapters = $this->chapterRepo->findChapterEdit($id);
        // $stories = $this->storyRepo->getAll();
        // dd($chapters->toArray());
        return view('admin.chapters.edit', compact('chapters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChapterRequest $request, $id)
    {
        $dataUpdate = $request->all();

        // dd($dataUpdate);
        $chapters = $this->chapterRepo->update($id, $dataUpdate);

        return redirect()->route('stories.index')->with(['messager' => 'Update sucsse']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chapters = $this->chapterRepo->deleteChapter($id);

        return response()->json([
            'message' => 'Chapter deteled successfully '
        ]);
    }
}
