<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Story\CreateStotryRequest;
use App\Http\Requests\Story\UpdateStotryRequest;
use App\Models\Category;
use App\Models\Status;
use App\Models\Story;
use App\Models\Title;
use App\Repositories\Story\StoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class StoryController extends Controller
{
    protected $storyRepo;

    public function __construct(StoryRepositoryInterface $storyRepo)
    {
        $this->storyRepo = $storyRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $stories = Story::whereHas('users')->get();
        // $titles = Title::all();
        $stories = $this->storyRepo->getStory();
        return view('admin.stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $titles = Title::all();
        return view('admin.stories.create', compact('categories', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStotryRequest $request)
    {
        $dataCreate = $request->all();
        //dd($dataCreate);
        $path = $request->file('image')->store('public/images');
        $dataCreate['image'] = str_replace('public/images/', '', $path);
        $dataCreate['slug'] = Str::slug($dataCreate['name']);
        $story = Story::create($dataCreate);

        // dd($story->toArray());
        $story->categories()->attach($dataCreate['categories_ids']);

        if (auth()->check()) {
            // dd($dataCreate['status']);
            $story->users()->attach(auth()->user()->id, ['status' => $dataCreate['status'] ?? 0, 'point' => $dataCreate['point'] ?? 0]);
        }

        return redirect()->route('stories.index')->with('message', 'Create success');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stories = Story::with('categories')->findOrFail($id);
        // dd($stories);
        $titles = Title::all();
        $categories = Category::all();

        return view('admin.stories.edit', compact('stories', 'titles', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStotryRequest $request, $id)
    {
        $stories = Story::findOrFail($id);
        $dataUpdate = $request->all();
        $dataUpdate['slug'] = Str::slug($dataUpdate['name']);
        if ($dataUpdate['method'] == '1') {
            $dataUpdate['content'] == null;
        }
        // dd($dataUpdate);
        $stories->update($dataUpdate);

        $stories->categories()->sync($dataUpdate['categories_ids']);
        $stories->users()->updateExistingPivot(auth()->user()->id, ['status' => $dataCreate['status'] ?? 0]);
        return redirect()->route('stories.index')->with(['messager' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::findOrFail($id);

        $story->delete();

        return response()->json([
            'message' => 'Story deteled successfully '
        ]);
    }
}
