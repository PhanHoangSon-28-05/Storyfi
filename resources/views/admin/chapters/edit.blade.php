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

                                <h3 style="font-weight: bold;" for="name">{{ $chapters->stories->name }}</h3>

                                <label style="font-weight: bold;" for="number_chapter">Number chapter * :</label>
                                <input type="text" value="{{ old('number_chapter') ?? $chapters->number_chapter }}"
                                    id="number_chapter" class="form-control" name="number_chapter" />
                                @error('number_chapter')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="name">Name * :</label>
                                <input type="text" value="{{ old('name') ?? $chapters->name }}" id="name"
                                    class="form-control" name="name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="content">Content * :</label>
                                <textarea value="" id="content" class="form-control" name="content" rows="12">{{ old('content') ?? $chapters->content }}</textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

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
