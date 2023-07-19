@extends('admin.layouts.app')
@section('title', 'Titles')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                @if (session('massage'))
                    <div>{{ session('massage') }}</div>
                @endif
                <div class="">
                    <div class="x_title">
                        <h2>KeyTable example Titles</h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <a type="button" href="{{ URL::route('titles.create') }}" class="btn btn-secondary">
                                Create
                            </a>
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
                                    <table id="datatable-keytable" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($titles as $title)
                                                <tr>
                                                    <td>{{ $title->id }}</td>
                                                    <td>{{ $title->name }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('update-title')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('titles.edit', $title->id) }}"><i
                                                                        class="fas fa-edit"></i> Edit</a>
                                                            @endcan

                                                            @can('delete-title')
                                                                <a class="dropdown-item delete-title"
                                                                    onclick="confirmDelete({{ $title->id }})"><i
                                                                        class="fas fa-trash-alt"></i> Delete</a>
                                                            @endcan
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
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function confirmDelete(titleId) {
        if (confirm('Are you sure you want to delete title with ID ' + titleId + '?')) {
            $.ajax({
                url: '/admin/titles/' + titleId,
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
    }
</script>
