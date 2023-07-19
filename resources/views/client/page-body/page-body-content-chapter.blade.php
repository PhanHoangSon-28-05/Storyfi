@extends('client.layouts.story')

@section('CSS')
    <link rel="stylesheet" href="{{ URL::asset('client/css/content_chapter.css') }}">
@endsection

@section('content')
    @include('client.main-content.conent-chapter')
@endsection

@section('scripts')
    <script src="{{ URl::asset('client/js/content_chapter.js') }}"></script>
@endsection
