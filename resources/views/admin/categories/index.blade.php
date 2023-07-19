@extends('admin.layouts.app')
@section('title', 'Category')
@section('content')
    <div class="right_col" role="main">
        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                @if (session('massage'))
                    <div>{{ session('massage') }}</div>
                @endif
                <div class="">
                    <div class="x_title">
                        <h2>KeyTable example Category</h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <a type="button" href="{{ URL::route('categories.create') }}" class="btn btn-secondary">
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
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('update-category')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('categories.edit', $category->id) }}"><i
                                                                        class="fas fa-edit"></i> Edit</a>
                                                            @endcan
                                                            @can('delete-category')
                                                                <a class="dropdown-item"
                                                                    onclick="confirmDelete({{ $category->id }})"><i
                                                                        class="fas fa-trash-alt"></i>
                                                                    Delete</a>
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
    function confirmDelete(categoryId) {
        if (confirm('Are you sure you want to delete categorie with ID ' + categoryId + '?')) {
            $.ajax({
                url: '/admin/categories/' + categoryId,
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
