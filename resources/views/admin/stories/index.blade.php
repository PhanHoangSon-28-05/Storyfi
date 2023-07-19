@extends('admin.layouts.app')
@section('title', 'Story')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                @if (session('massage'))
                    <div>{{ session('massage') }}</div>
                @endif
                <div class="">
                    <div class="x_title">
                        <h2>KeyTable example Story</h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <a type="button" href="{{ URL::route('stories.create') }}" class="btn btn-secondary">
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
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Total chapters</th>
                                                <th>View</th>
                                                <th>Title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($stories as $story)
                                                <tr>
                                                    <td>{{ $story->id }}</td>
                                                    <td><img src="{{ url('storage/images/' . $story->image) }}"
                                                            width="150px" height="200px" alt="">
                                                    </td>
                                                    <td>{{ $story->name }}</td>
                                                    <td>{{ $story->sum_chapter }}</td>
                                                    <td>{{ $story->view }}</td>
                                                    <td>{{ $story->titles->name }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('update-story')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('stories.edit', $story->id) }}"><i
                                                                        class="fas fa-edit"></i> Edit</a>
                                                            @endcan
                                                            @if ($story->method == '1')
                                                                @can('show-chapter')
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('chapters.show', $story->id) }}">
                                                                        <i class="fas fa-eye"></i> View
                                                                    </a>
                                                                @endcan
                                                            @endif
                                                            @can('delete-story')
                                                                <a class="dropdown-item delete-story"
                                                                    onclick="confirmDelete({{ $story->id }})"><i
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
    function confirmDelete(storyId) {
        if (confirm('Are you sure you want to delete story with ID ' + storyId + '?')) {
            $.ajax({
                url: '/admin/stories/' + storyId,
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
