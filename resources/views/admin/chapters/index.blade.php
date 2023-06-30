@extends('admin.layouts.app')
@section('title', 'The story has chapters')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        @if (session('massage'))
            <div>{{ session('massage') }}</div>
        @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>KeyTable example <small>The story has chapters</small></h2>

                <ul class="nav navbar-right panel_toolbox">
                    @can('create-chapter')
                        <a type="button" href="{{ URL::route('chapters.create') }}" class="btn btn-secondary">
                            Create
                        </a>
                    @endcan
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
                                        <th>#</th>
                                        <th>Name Story</th>
                                        <th>Total chapters</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($chapters as $chapter)
                                        <tr>
                                            <td>{{ $chapter->id }}</td>
                                            <td>
                                                {{ $chapter->name }}
                                            </td>
                                            <td>
                                                {{ $chapter->sum_chapter }}
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    @can('show-chapter')
                                                        <a class="dropdown-item"
                                                            href="{{ route('chapters.show', $chapter->id) }}">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>
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
@endsection
