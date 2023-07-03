@extends('admin.layouts.app')
@section('title', 'Roles')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        @if (session('message'))
            <div>{{ session('message') }}</div>
        @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>KeyTable example <small>Roles</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a type="button" href="{{ URL::route('roles.create') }}" class="btn btn-secondary">
                        Create
                    </a>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <span class="text-muted font-13 m-b-30">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </span>
                            <table id="datatable-keytable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Position</th>
                                        <th>Display Name</th>
                                        <th>Group</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->display_name }}</td>
                                            <td>{{ $role->group }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}"><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                    @if ($role->name == 'super-admin')
                                                    @else
                                                        <a class="dropdown-item delete-role"
                                                            data-role-id="{{ $role->id }}"><i
                                                                class="fas fa-trash-alt"></i>
                                                            Delete</a>
                                                    @endif

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete-role').click(function(e) {
            e.preventDefault();

            var roleId = $(this).data('role-id');
            if (confirm('Are you sure you want to delete role with ID ' + roleId + '?')) {
                $.ajax({
                    url: '/admin/roles/' + roleId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
