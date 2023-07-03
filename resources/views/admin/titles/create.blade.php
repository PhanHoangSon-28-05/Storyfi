@extends('admin.layouts.app')
@section('title', 'Create Title')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Title</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Title</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('titles.store') }}" id="demo-form"
                                data-parsley-validate enctype="multipart/form-data">
                                @csrf

                                <label style="font-weight: bold; font-size:15px;" for="name">Name * :</label>
                                <input type="text" value="{{ old('name') }}" id="name" class="form-control"
                                    name="name" />
                                @error('name')
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
