<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Status;
use App\Models\Story;
use App\Models\Title;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::all();
        $titles = Title::all();
        return view('admin.stories.index', compact('stories', 'titles'));
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
    public function store(Request $request)
    {
        $dataCreate = $request->all();
        $story = Story::create($dataCreate);

        // dd($story->toArray());
        $story->categories()->attach($dataCreate['categories_ids']);
        return redirect()->route('stories.index')->with('message', 'Create sucess');
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
    public function update(Request $request, $id)
    {
        $stories = Story::findOrFail($id);
        $dataUpdate = $request->all();
        $stories->update($dataUpdate);

        $stories->categories()->sync($dataUpdate['categories_ids']);

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
