<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Title\CreateTitleRequest;
use App\Http\Requests\Title\UpdateTitleRequest;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = Title::all();

        return view('admin.titles.index', compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.titles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTitleRequest $request)
    {
        $dataCreate = $request->all();
        $titles = Title::create($dataCreate);

        return redirect()->route('titles.index')->with('message', 'Create success');
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
        $titles = Title::findOrFail($id);

        return view('admin.titles.edit', compact('titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTitleRequest $request, $id)
    {
        $dateUpdate = $request->all();
        $titles = Title::findOrFail($id);
        $titles->update($dateUpdate);

        return redirect()->route('titles.index')->with('message', 'Update sucess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $titles = Title::findOrFail($id);

        $titles->delete();

        return response()->json([
            'message' => 'Title deleted successfully.'
        ]);
    }
}
