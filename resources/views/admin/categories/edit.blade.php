@extends('admin.layouts.app')
@section('title', 'Edit Category')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Category</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('categories.update', $category->id) }}" id="demo-form"
                                data-parsley-validate enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <label style="font-weight: bold; font-size:15px;" for="icon">Icon * :</label>
                                <input type="text" value="{{ old('icon') ?? $category->icon }}" id="fuleicon"
                                    class="form-control" icon="icon" />
                                @error('icon')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold; font-size:15px;" for="name">Name * :</label>
                                <input type="text" value="{{ old('name') ?? $category->name }}" id="fulename"
                                    class="form-control" name="name" />
                                @error('name')
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
