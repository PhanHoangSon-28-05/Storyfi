@extends('admin.layouts.app')
@section('title', 'Create Config')
<style>
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 300px;
        font-size: 15px;
        color: black;
    }

    .ck-content .image {
        /* block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title clearfix">
                <div class="title_left">
                    <h3>Create config</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('configs.add') }}" id="demo-form" data-parsley-validate
                                enctype="multipart/form-data">
                                @csrf

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="key_name"
                                        style="font-weight: bold; font-size:15px;">Key Name
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <input class="form-control" type="text" data-validate-length-range="6"
                                            data-validate-words="2" value="{{ old('key_name') }}" name="key_name"
                                            id="key_name" placeholder="Name_Web" required="required" />
                                        @error('key_name')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="value"
                                        style="font-weight: bold; font-size:15px;">Value
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <input class="form-control" type="text" data-validate-length-range="6"
                                            data-validate-words="2" value="{{ old('value') }}" name="value"
                                            id="value" placeholder="Truyện Tào Lao"
                                            required="required" />
                                        @error('value')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

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
