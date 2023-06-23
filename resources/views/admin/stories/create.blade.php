@extends('admin.layouts.app')
@section('title', 'Create Story')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Story</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Story</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('stories.store') }}" id="demo-form" data-parsley-validate
                                enctype="multipart/form-data">
                                @csrf

                                <label style="font-weight: bold;" for="name">Name * :</label>
                                <input type="text" value="{{ old('name') }}" id="name" class="form-control"
                                    name="name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="name_other">Name other * :</label>
                                <input type="text" value="{{ old('name_other') }}" id="name_other" class="form-control"
                                    name="name_other" />
                                @error('name_other')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="summary">Summary * :</label>
                                <textarea value="" id="summary" class="form-control" name="summary" rows="6">{{ old('summary') }}</textarea>
                                @error('summary')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="exampleFormControlSelect1" class="ms-0">Title:
                                </label>
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach ($titles as $title)
                                            <div class="col-md-6">
                                                <div class="form-check form-check-inline">
                                                    <input name="title_id" class="form-check-input" type="radio"
                                                        value="{{ $title->id }}" id="{{ $title->id }}">
                                                    <label style="font-weight: bold;" class="form-check-label"
                                                        for="{{ $title->id }}">{{ $title->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <label style="font-weight: bold;" for="exampleFormControlSelect1" class="ms-0">Category:
                                </label>
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach ($categories as $category)
                                            <div class="col-md-6">
                                                <div class="form-check form-check-inline">
                                                    <input name="categories_ids[]" class="form-check-input" type="checkbox"
                                                        value="{{ $category->id }}" id="{{ $category->id }}">
                                                    <label style="font-weight: bold;" class="form-check-label"
                                                        for="{{ $category->id }}">{{ $category->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <br />
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
