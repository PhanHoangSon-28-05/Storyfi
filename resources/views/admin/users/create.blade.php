@extends('admin.layouts.app')
@section('title', 'Create Users')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Users</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Users</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('users.store') }}" id="demo-form" data-parsley-validate
                                enctype="multipart/form-data">
                                @csrf

                                <label style="font-weight: bold;" for="fullname">Full Name * :</label>
                                <input type="text" value="{{ old('fullname') }}" id="fullname" class="form-control"
                                    name="fullname" />
                                @error('fullname')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="email">Email * :</label>
                                <input type="email" value="{{ old('email') }}" id="email" class="form-control"
                                    name="email" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="password">Password * :</label>
                                <input type="password" value="{{ old('password') }}" id="password" class="form-control"
                                    name="password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="birthday">Birthday * :</label>
                                <input type="date" value="{{ old('birthday') }}" id="birthday" class="form-control"
                                    name="birthday" />
                                @error('birthday')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="exampleFormControlSelect1"
                                    class="ms-0">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="male">Male</option>
                                    <option value="fe-male">FeMale</option>
                                </select>
                                @error('group')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="phone">Phone * :</label>
                                <input type="text" value="{{ old('phone') }}" id="phone" class="form-control"
                                    name="phone" />
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror


                                <label style="font-weight: bold;" for="role">Roles:</label>
                                <div class="row">
                                    @foreach ($roles as $groupName => $role)
                                        <div class="col-md-6">
                                            <h4>{{ $groupName }}</h4>
                                            <div class="row">
                                                @foreach ($role as $item)
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input name="role_ids[]" class="form-check-input"
                                                                type="checkbox" value="{{ $item->id }}"
                                                                id="{{ $item->id }}">
                                                            <label style="font-weight: bold;" class="form-check-label"
                                                                for="{{ $item->id }}">{{ $item->display_name }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
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
