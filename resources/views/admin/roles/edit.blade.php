@extends('admin.layouts.app')
@section('title', 'Edit Roles')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Roles</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('roles.update', $role->id) }}" id="demo-form"
                                data-parsley-validate>
                                @csrf
                                @method('PUT')

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="name"
                                        style="font-weight: bold; font-size:15px;">Name
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        @if ($role->name == 'super-admin')
                                            <input class="form-control" type="text" data-validate-length-range="6"
                                                data-validate-words="2" value="{{ old('name') ?? $role->name }}"
                                                name="name" id="name" required="required" readonly />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span><br>
                                            @enderror
                                        @else
                                            <input class="form-control" type="text" data-validate-length-range="6"
                                                data-validate-words="2" value="{{ old('name') ?? $role->name }}"
                                                name="name" id="name" required="required" />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span><br>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="display_name"
                                        style="font-weight: bold; font-size:15px;">Display Name
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        @if ($role->name == 'super-admin')
                                            <input class="form-control" type="text" data-validate-length-range="6"
                                                data-validate-words="2"
                                                value="{{ old('display_name') ?? $role->display_name }}" name="display_name"
                                                id="display_name" required="required" readonly />
                                        @else
                                            <input class="form-control" type="text" data-validate-length-range="6"
                                                data-validate-words="2"
                                                value="{{ old('display_name') ?? $role->display_name }}" name="display_name"
                                                id="display_name" placeholder="...." required="required" />
                                        @endif

                                        @error('display_name')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-sm-2 label-align"
                                        style="font-weight: bold; font-size:15px;">Group
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div id="group" class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-secondary" data-toggle-class="btn-primary"
                                                data-toggle-passive-class="btn-default">
                                                <input type="radio" name="group"
                                                    value="system"{{ $role->group == 'system' ? 'checked' : '' }}
                                                    class="join-btn">
                                                &nbsp; System &nbsp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary"
                                                data-toggle-passive-class="btn-default">
                                                <input type="radio" name="group"
                                                    value="user"{{ $role->group == 'user' ? 'checked' : '' }}
                                                    class="join-btn">
                                                User
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="permission"
                                        style="font-weight: bold; font-size:15px;">Permission
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-6 col-sm-6" style="margin-top: 8px;">
                                        <div class="row">
                                            @foreach ($permissions as $groupName => $permission)
                                                <div class="col-md-6">
                                                    <h4>{{ $groupName }}</h4>
                                                    <div class="row">
                                                        @foreach ($permission as $item)
                                                            <div class="col-md-8">
                                                                <div class="form-check form-check-inline">
                                                                    <input name="permission_ids[]"
                                                                        class="form-check-input" type="checkbox"
                                                                        value="{{ $item->id }} "
                                                                        {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                                                        id="{{ $item->id }}">
                                                                    <label style="font-weight: bold; font-size:13px;"
                                                                        class="form-check-label"
                                                                        for="{{ $item->id }}">{{ $item->display_name }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <br />
                                <button type="submit" class="btn btn-primary">Update</button>

                            </form>
                            <!-- end form for validations -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
