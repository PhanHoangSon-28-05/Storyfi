@extends('admin.layouts.app')
@section('title', 'List Full Story')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                @if (session('massage'))
                    <div>{{ session('massage') }}</div>
                @endif
                <div class="">
                    <div class="x_title">
                        <h2>KeyTable example All Story</h2>
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
                                                <th>Chapters</th>
                                                <th>User</th>
                                                <th>Trang thái</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($stories as $story)
                                                <tr>
                                                    <td>{{ $story->id }}</td>
                                                    <td><img src="{{ url('storage/images/' . $story->image) }}"
                                                            width="100px" height="140px" alt="">
                                                    </td>
                                                    <td>{{ $story->name }}</td>
                                                    <td>{{ $story->sum_chapter }}</td>
                                                    <td>{{ /*dd($story->users->first()->fullname)*/ $story->users->first()->fullname }}
                                                        @if ($story->users->first()->pivot->status == 0)
                                                    <td>
                                                        <p
                                                            class="bg-secondary bg-gradient p-1 fs-6 text-center text-dark bg-opacity-10 fw-bolder border border-secondary rounded">
                                                            <i class="fas fa-sticky-note" style="color: #d5d6d8;"></i> Bản
                                                            Nháp
                                                        </p>
                                                    </td>
                                                @elseif ($story->users->first()->pivot->status == 1)
                                                    <td>
                                                        <p
                                                            class="bg-warning bg-gradient p-1 fs-6 text-center text-dark bg-opacity-10 fw-bolder border border-warning rounded">
                                                            <i class="fas fa-check" style="color: #fbff00;"></i> Đang chờ
                                                            xét duyệt
                                                        </p>
                                                    </td>
                                                @elseif ($story->users->first()->pivot->status == 2)
                                                    <td>
                                                        <p
                                                            class="bg-success bg-gradient p-1 fs-6 text-center text-dark bg-opacity-10 fw-bolder border border-success rounded">
                                                            <i class="fas fa-check-double" style="color: #00ff7b;"></i> Đã
                                                            xét duyệt
                                                        </p>
                                                    </td>
                                            @endif
                                            <td>
                                                <div class="btn-group">
                                                    @can('update-story')
                                                        <a class="dropdown-item"
                                                            href="{{ route('list-stories.show', $story->id) }}"><i
                                                                class="fas fa-edit"></i>View</a>
                                                    @endcan
                                                    @if ($story->method == '1')
                                                        @can('show-chapter')
                                                            <a class="dropdown-item"
                                                                href="{{ route('chapters.show', $story->id) }}">
                                                                <i class="fas fa-eye"></i>Chapters</a>
                                                        @endcan
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
        </div>
    </div>
@endsection
