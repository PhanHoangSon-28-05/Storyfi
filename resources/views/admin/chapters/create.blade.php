@extends('admin.layouts.app')
@section('title', 'Create Chapter')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title clearfix">
                <div class="title_left">
                    <h3>Create Chapter</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Chapter</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('chapters.store') }}" id="demo-form" data-parsley-validate
                                enctype="multipart/form-data">
                                @csrf

                                <label style="font-weight: bold;" for="number_chaper">Number chapter * :</label>
                                <input type="text" value="{{ old('number_chaper') }}" id="number_chaper"
                                    class="form-control" name="number_chaper" />
                                @error('number_chaper')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="name">Story</label>
                                <select name="story_id" class="form-control">
                                    @foreach ($stories as $story)
                                        <option value="{{ $story->id }}">{{ $story->name }}</option>
                                    @endforeach
                                </select>
                                @error('group')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="name">Name * :</label>
                                <input type="text" value="{{ old('name') }}" id="name" class="form-control"
                                    name="name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="content">Content * :</label>
                                <textarea value="" id="content" class="form-control" name="content" rows="12">{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <br>
                                <button type="submit" class="btn btn-primary">ADD</button>


                            </form>
                            <!-- end form for validations -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
