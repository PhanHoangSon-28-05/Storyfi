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

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="name"
                                        style="font-weight: bold; font-size:15px;">Name
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2"
                                            value="{{ old('name') }}" name="name" id="name"
                                            placeholder="...." required="required" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="name_other"
                                        style="font-weight: bold; font-size:15px;">Name other
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2"
                                            value="{{ old('name_other') }}" name="name_other" id="name_other"
                                            placeholder="...." required="required" />
                                        @error('name_other')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="summary"
                                        style="font-weight: bold; font-size:15px;">Summary
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <textarea value="" id="editor" class="form-control" name="summary" rows="12">{{ old('summary') }}</textarea>
                                        @error('summary')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="title"
                                        style="font-weight: bold; font-size:15px;">Title
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-8 col-sm-6" style="margin-top:10px">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @foreach ($titles as $title)
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input name="title_id" class="form-check-input" type="radio"
                                                                value="{{ $title->id }}" id="{{ $title->id }}">
                                                            <label style="font-weight: bold; font-size:15px;" class="form-check-label"
                                                                for="{{ $title->id }}">{{ $title->name }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="title"
                                        style="font-weight: bold; font-size:15px;">Category
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-8 col-sm-6" style="margin-top:10px">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @foreach ($categories as $category)
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input name="categories_ids[]" class="form-check-input"
                                                                type="checkbox" value="{{ $category->id }}"
                                                                id="{{ $category->id }}">
                                                            <label style="font-weight: bold; font-size:15px;" class="form-check-label"
                                                                for="{{ $category->id }}">{{ $category->name }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
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
@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
