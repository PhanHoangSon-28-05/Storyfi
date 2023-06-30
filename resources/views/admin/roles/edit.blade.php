@extends('admin.layouts.app')
@section('title', 'Edit Roles')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Roles</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Roles</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('roles.update', $role->id) }}" id="demo-form"
                                data-parsley-validate>
                                @csrf
                                @method('PUT')

                                <label style="font-weight: bold;" for="name">Name * :</label>
                                <input type="text" value="{{ old('name') ?? $role->name }}" id="name"
                                    class="form-control" name="name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="display_name">Display Name * :</label>
                                <input type="text" value="{{ old('display_name') ?? $role->display_name }}"
                                    id="display_name" class="form-control" name="display_name" />
                                @error('display_name')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <label style="font-weight: bold;" for="exampleFormControlSelect1"
                                    class="ms-0">Group</label>
                                <select name="group" class="form-control" >
                                    <option value="system"{{ $role->group == 'system' ? 'selected' : '' }}>System</option>
                                    <option value="user"{{ $role->group == 'user' ? 'selected' : '' }}>User</option>
                                </select>


                                @error('group')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror


                                <label style="font-weight: bold;" for="permission">Permission</label>
                                <div class="row">
                                    @foreach ($permissions as $groupName => $permission)
                                        <div class="col-md-6">
                                            <h4>{{ $groupName }}</h4>
                                            <div class="row">
                                                @foreach ($permission as $item)
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input name="permission_ids[]" class="form-check-input"
                                                                type="checkbox" value="{{ $item->id }}"
                                                                {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
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
