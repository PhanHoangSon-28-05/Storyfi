@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        @if (session('massage'))
            <div>{{ session('massage') }}</div>
        @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>KeyTable example <small>Users</small></h2>

                <ul class="nav navbar-right panel_toolbox">
                    <a type="button" href="{{ URL::route('users.create') }}" class="btn btn-secondary">
                        Create
                    </a>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" user="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
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
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>birthday</th>
                                        <th>gender</th>
                                        <th>phone</th>
                                        <th>point</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->fullname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->birthday }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->point }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}"><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                    <a class="dropdown-item delete-user"
                                                        data-user-id="{{ $user->id }}"><i class="fas fa-trash-alt"></i>
                                                        Delete</a>
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
        $('.delete-user').click(function(e) {
            e.preventDefault();

            var userId = $(this).data('user-id');
            if (confirm('Are you sure you want to delete user with ID ' + userId + '?')) {
                $.ajax({
                    url: '/admin/users/' + userId,
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
