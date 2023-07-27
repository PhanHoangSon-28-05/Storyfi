@extends('client.layouts.index')

@section('CSS')
    <link rel="stylesheet" href="{{ URL::asset('client/css/index.css') }}">
    <link rel="stylesheet" href="http://brokensquare.com/Code/jquery-flipster/dist/jquery.flipster.min.css">
    <link rel="stylesheet" href="{{ URL::asset('client/css/slider.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('client/css/index-content-4.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('client/css/index-content-5.css') }}">
@endsection

@section('content')
    <page-body>
        @include('client.navagation.nav-index')
        <div class="content">
            <div class="container">
                <div class="row">
                    @include('client.sidebar.sidebar-index.content-1.sidebar-left')

                    @include('client.main-content.index.content-center-index-1')

                    @include('client.sidebar.sidebar-index.content-1.sidebar-right')
                </div>
            </div>
            <div class="content mt-2">
                <div class="container">
                    <div class="row">
                        @include('client.sidebar.sidebar-index.content-2.sidebar-left')

                        @include('client.main-content.index.content-center-index-2')

                        @include('client.sidebar.sidebar-index.content-2.sidebar-right')
                    </div>
                </div>
            </div>
            <div class="container" style="margin-left:35px;">
                @include('client.main-content.index.content-center-index-3')
            </div>
        </div>
        <div class="container" style="margin-left:35px;">
            @include('client.main-content.index.content-center-index-4')
            @include('client.main-content.index.content-center-index-5')
        </div>

    </page-body>
@endsection

@section('scripts')
    <script src="{{ URl::asset('client/js/index-slider.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://brokensquare.com/Code/jquery-flipster/dist/jquery.flipster.min.js"></script>
    {{-- <script src="//codepen.io/shshaw/pen/epmrgO.js"></script> --}}
    <script src="{{ URL::asset('client/js/slider.js') }}"></script>
@endsection
