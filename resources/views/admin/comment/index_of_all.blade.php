@extends('admin.layouts.app')
@section('title', 'List Full Comment')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                @if (session('massage'))
                    <div>{{ session('massage') }}</div>
                @endif
                <div class="">
                    <div class="x_title">
                        <h2>KeyTable example All Comment</h2>
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
                                                <th>Name User</th>
                                                <th>Name comment</th>
                                                <th>Content</th>
                                                <th>Trang thái</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($comments as $comment)
                                                <tr>
                                                    {{-- {{ dd($comment) }} --}}
                                                    <td>{{ $comment->id }}</td>
                                                    <td>{{ $comment->users->fullname }}</td>
                                                    <td>{{ $comment->stories->name }}</td>
                                                    <td>{{ /*dd($comment->users->first()->fullname)*/ $comment->users->first()->fullname }}
                                                        @if ($comment->status == 0)
                                                    <td>
                                                        <p
                                                            class="bg-warning bg-gradient p-1 fs-6 text-center text-dark bg-opacity-10 fw-bolder border border-warning rounded">
                                                            <i class="fas fa-check" style="color: #fbff00;"></i> Đang
                                                            chờ
                                                            xét duyệt
                                                        </p>
                                                    </td>
                                                @elseif ($comment->status == 2)
                                                    <td>
                                                        <p
                                                            class="bg-success bg-gradient p-1 fs-6 text-center text-dark bg-opacity-10 fw-bolder border border-success rounded">
                                                            <i class="fas fa-check-double" style="color: #00ff7b;"></i>
                                                            Đã
                                                            xét duyệt
                                                        </p>
                                                    </td>
                                            @endif
                                            <td>
                                                <div class="btn-group">
                                                    @can('update-comment')
                                                        <a class="dropdown-item"
                                                            href="{{ route('list-stories-comment.show', $comment->id) }}"><i
                                                                class="fas fa-edit"></i>View</a>
                                                    @endcan
                                                </div>
                                            </td>
                                            </tr>
                                            </form>
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
