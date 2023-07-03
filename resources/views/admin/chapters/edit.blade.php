@extends('admin.layouts.app')
@section('title', 'Edit Chapter')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3></h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Chapter</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('chapters.update', $chapters->id) }}" id="demo-form"
                                data-parsley-validate enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="field item form-group">
                                    <input class="form-control" type="text" value="{{ $chapters->story_id }}"
                                        name="story_id" style="display: none;">
                                    <label class="col-form-label col-sm-10 label-align" for="name"
                                        style="font-weight: bold; font-size:20px;">{{ $chapters->stories->name }}
                                    </label>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="number_chapter"
                                        style="font-weight: bold; font-size:15px;">Number chapter
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2"
                                            value="{{ old('number_chapter') ?? $chapters->number_chapter }}"
                                            name="number_chapter" id="number_chapter" placeholder="Chương 1"
                                            required="required" />
                                        @error('number_chapter')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="name"
                                        style="font-weight: bold; font-size:15px;">Name
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2"
                                            value="{{ old('name') ?? $chapters->name }}" name="name" id="name"
                                            placeholder="....." required="required" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="content"
                                        style="font-weight: bold; font-size:15px;">Content
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <textarea value="" id="editor" class="form-control" name="content" rows="12">{{ old('summary') ?? $chapters->content }}</textarea>
                                        @error('content')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
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
