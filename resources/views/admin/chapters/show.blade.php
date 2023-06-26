@extends('admin.layouts.app')
@section('title', 'Chaper')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        @if (session('massage'))
            <div>{{ session('massage') }}</div>
        @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>KeyTable example <small>Chaper</small></h2>

                <ul class="nav navbar-right panel_toolbox">
                    <a type="button" href="{{ URL::route('chapters.create') }}" class="btn btn-secondary">
                        Create
                    </a>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="button"
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
                                        <th>Number Chapter</th>
                                        <th>Name Chapter</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($chapters as $chapter)
                                        <tr>
                                            <td>{{ $chapter->number_chaper }}</td>
                                            <td>{{ $chapter->name }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="dropdown-item"
                                                        href="{{ route('chapters.edit', $chapter->number_chaper, $chapter->story_id) }}"><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                    <a class="dropdown-item delete-chapter"
                                                        onclick="confirmDelete({{ $chapter->number_chaper }})"><i
                                                            class="fas fa-trash-alt"></i> Delete</a>
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
    function confirmDelete(chapterId) {
        if (confirm('Are you sure you want to delete chapter with ID ' + chapterId + '?')) {
            $.ajax({
                url: '/admin/chapters/' + chapterId,
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
