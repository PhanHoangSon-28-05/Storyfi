@extends('client.layouts.story')

@section('CSS')
    <link rel="stylesheet" href="{{ URL::asset('client/css/view_storry.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('client.main-content.content-story')

            @include('client.sidebar.sidebar-story')
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URl::asset('client/js/view_story.js') }}"></script>
@endsection
