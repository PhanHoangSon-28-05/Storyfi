@extends('client.layouts.index')

@section('CSS')
    <link rel="stylesheet" href="{{ URL::asset('client/css/index.css') }}">
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
            <div class="content">
                <div class="container">
                    <div class="row">
                        @include('client.sidebar.sidebar-index.content-2.sidebar-left')

                        @include('client.main-content.index.content-center-index-2')

                        @include('client.sidebar.sidebar-index.content-2.sidebar-right')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-md-4 col-lg-3 col-xl-1 "></div>
            <div class="col-sm-8 col-md-4 col-lg-6 col-xl-10 ">
                <div class="row">
                    <div class="col-sm-3 pt-2 pb-2 ">
                        <div class="rank-list" data-l2="1">
                            <h3 class="wrap-title lang">
                                <a class="name" href="" target="_blank">
                                    Truyện mới ra
                                </a>
                            </h3>
                            <div class="book-list">
                                <ul>
                                    <li class="unfold" data-rid="1">
                                        <div class="book-wrap cf">
                                            <div class="book-details">
                                                <h4 class="book-title"><a class="name"
                                                        href="{{ URL::route('home.story.index', $stories_new->first()->slug) }}">{{ $stories_new->first()->name }}</a>
                                                </h4>
                                                <p class="book-info" name="TacGia"><i class="fas fa-user"></i>
                                                    {{ /* dd($stories_new->first()->users->first()->fullname) */ $stories_new->first()->users->first()->fullname }}
                                                </p>
                                                <p class="book-info" name="Chapter"><i class="fas fa-th-list"></i>
                                                    @foreach ($stories_new->first()->categories as $category)
                                                        <span>{{ $category->name }},</span>
                                                    @endforeach
                                                </p>
                                                <p class="book-info"><i class="fas fa-book"></i>
                                                    <span>{{ $stories_new->first()->sum_chapter }} chương</span>
                                                </p>
                                                <p class="book-info view"><i class="fas fa-book-reader"></i>
                                                    <span>{{ $stories_new->first()->view }} lượt đọc
                                                    </span>
                                                </p>
                                            </div>

                                            <div class="book-cover">
                                                <a class="link"
                                                    href="{{ URL::route('home.story.index', $stories_new->first()->slug) }}"
                                                    data-eid="qd_A117" target="_blank" data-bid="1037135031">
                                                    <img src="{{ url('storage/images/' . $stories_new->first()->image) }}"
                                                        alt="">
                                                </a>
                                                <span></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                    $number = 2;
                                    $stories_new->shift();
                                    ?>
                                    @foreach ($stories_new as $story)
                                        <li class="li">
                                            <div class="num-box">
                                                <span class="num2">{{ $number }}</span>
                                            </div>
                                            <div class="name-box">
                                                <a class="name" href="{{ URL::route('home.story.index', $story->slug) }}"
                                                    target="_blank" data-eid="qd_A117"
                                                    data-bid="1037068783">{{ $story->name }}</a>
                                                <i class="total"><i class="fas fa-book-reader"></i>
                                                    {{ $story->view }}</i>
                                            </div>
                                        </li>
                                        <?php $number++; ?>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pt-2 pb-2 ">
                        <div class="rank-list" data-l2="1">
                            <h3 class="wrap-title lang">
                                <a class="name" href="" target="_blank">
                                    Truyện ngắn
                                </a>
                            </h3>
                            <div class="book-list">
                                <ul>
                                    <li class="unfold" data-rid="1">
                                        <div class="book-wrap cf">
                                            <div class="book-details">
                                                <h4 class="book-title"><a class="name"
                                                        href="{{ URL::route('home.story.index', $stories_short->first()->slug) }}">{{ $stories_short->first()->name }}</a>
                                                </h4>
                                                <p class="book-info" name="TacGia"><i class="fas fa-user"></i>
                                                    {{ /* dd($stories_short->first()->users->first()->fullname) */ $stories_short->first()->users->first()->fullname }}
                                                </p>
                                                <p class="book-info" name="Chapter"><i class="fas fa-th-list"></i>
                                                    @foreach ($stories_short->first()->categories as $category)
                                                        <span>{{ $category->name }},</span>
                                                    @endforeach
                                                </p>
                                                <p class="book-info"><i class="fas fa-book"></i>
                                                    <span>{{ $stories_short->first()->sum_chapter }} chương</span>
                                                </p>
                                                <p class="book-info view"><i class="fas fa-book-reader"></i>
                                                    <span>{{ $stories_short->first()->view }} lượt đọc
                                                    </span>
                                                </p>
                                            </div>

                                            <div class="book-cover">
                                                <a class="link"
                                                    href="{{ URL::route('home.story.index', $stories_short->first()->slug) }}"
                                                    data-eid="qd_A117" target="_blank" data-bid="1037135031">
                                                    <img src="{{ url('storage/images/' . $stories_short->first()->image) }}"
                                                        alt="">
                                                </a>
                                                <span></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                    $number = 2;
                                    $stories_short->shift();
                                    ?>
                                    @foreach ($stories_short as $story)
                                        <li class="li">
                                            <div class="num-box">
                                                <span class="num2">{{ $number }}</span>
                                            </div>
                                            <div class="name-box">
                                                <a class="name" href="{{ URL::route('home.story.index', $story->slug) }}"
                                                    target="_blank" data-eid="qd_A117"
                                                    data-bid="1037068783">{{ $story->name }}</a>
                                                <i class="total"><i class="fas fa-book-reader"></i>
                                                    {{ $story->view }}</i>
                                            </div>
                                        </li>
                                        <?php $number++; ?>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pt-2 pb-2">
                        <div class="rank-list" data-l2="1">
                            <h3 class="wrap-title lang">
                                <a class="name"href="" target="_blank">
                                    Truyện có nhiều lượt đọc
                                </a>
                            </h3>
                            <div class="book-list">
                                <ul>
                                    <li class="unfold" data-rid="1">
                                        <div class="book-wrap cf">
                                            <div class="book-details">
                                                <h4 class="book-title"><a class="name"
                                                        href="{{ URL::route('home.story.index', $stories_hot->first()->slug) }}">{{ $stories_hot->first()->name }}</a>
                                                </h4>
                                                <p class="book-info" name="TacGia"><i class="fas fa-user"></i>
                                                    {{ /* dd($stories_hot->first()->users->first()->fullname) */ $stories_hot->first()->users->first()->fullname }}
                                                </p>
                                                <p class="book-info" name="Chapter"><i class="fas fa-th-list"></i>
                                                    @foreach ($stories_hot->first()->categories as $category)
                                                        <span>{{ $category->name }},</span>
                                                    @endforeach
                                                </p>
                                                <p class="book-info"><i class="fas fa-book"></i>
                                                    <span>{{ $stories_hot->first()->sum_chapter }} chương</span>
                                                </p>
                                                <p class="book-info view"><i class="fas fa-book-reader"></i>
                                                    <span>{{ $stories_hot->first()->view }} lượt đọc
                                                    </span>
                                                </p>
                                            </div>

                                            <div class="book-cover">
                                                <a class="link"
                                                    href="{{ URL::route('home.story.index', $stories_hot->first()->slug) }}"
                                                    data-eid="qd_A117" target="_blank" data-bid="1037135031">
                                                    <img src="{{ url('storage/images/' . $stories_hot->first()->image) }}"
                                                        alt="">
                                                </a>
                                                <span></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                    $number = 2;
                                    $stories_hot->shift();
                                    ?>
                                    @foreach ($stories_hot as $story)
                                        <li class="li">
                                            <div class="num-box">
                                                <span class="num2">{{ $number }}</span>
                                            </div>
                                            <div class="name-box">
                                                <a class="name"
                                                    href="{{ URL::route('home.story.index', $story->slug) }}"
                                                    target="_blank" data-eid="qd_A117"
                                                    data-bid="1037068783">{{ $story->name }}</a>
                                                <i class="total"><i class="fas fa-book-reader"></i>
                                                    {{ $story->view }}</i>
                                            </div>
                                        </li>
                                        <?php $number++; ?>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pt-2 pb-2 ">
                        <div class="rank-list" data-l2="1">
                            <h3 class="wrap-title lang">
                                <a class="name"href="" target="_blank">
                                    Truyện có nhiều chương
                                </a>
                            </h3>
                            <div class="book-list">
                                <ul>
                                    <li class="unfold" data-rid="1">
                                        <div class="book-wrap cf">
                                            <div class="book-details">
                                                <h4 class="book-title"><a class="name"
                                                        href="{{ URL::route('home.story.index', $stories_count_chapter->first()->slug) }}">{{ $stories_count_chapter->first()->name }}</a>
                                                </h4>
                                                <p class="book-info" name="TacGia"><i class="fas fa-user"></i>
                                                    {{ /* dd($stories_count_chapter->first()->users->first()->fullname) */ $stories_count_chapter->first()->users->first()->fullname }}
                                                </p>
                                                <p class="book-info" name="Chapter"><i class="fas fa-th-list"></i>
                                                    @foreach ($stories_count_chapter->first()->categories as $category)
                                                        <span>{{ $category->name }},</span>
                                                    @endforeach
                                                </p>
                                                <p class="book-info"><i class="fas fa-book"></i>
                                                    <span>{{ $stories_count_chapter->first()->sum_chapter }} chương</span>
                                                </p>
                                                <p class="book-info view"><i class="fas fa-book-reader"></i>
                                                    <span>{{ $stories_count_chapter->first()->view }} lượt đọc
                                                    </span>
                                                </p>
                                            </div>

                                            <div class="book-cover">
                                                <a class="link"
                                                    href="{{ URL::route('home.story.index', $stories_count_chapter->first()->slug) }}"
                                                    data-eid="qd_A117" target="_blank" data-bid="1037135031">
                                                    <img src="{{ url('storage/images/' . $stories_count_chapter->first()->image) }}"
                                                        alt="">
                                                </a>
                                                <span></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                    $number = 2;
                                    $stories_count_chapter->shift();
                                    ?>
                                    @foreach ($stories_count_chapter as $story)
                                        <li class="li">
                                            <div class="num-box">
                                                <span class="num2">{{ $number }}</span>
                                            </div>
                                            <div class="name-box">
                                                <a class="name"
                                                    href="{{ URL::route('home.story.index', $story->slug) }}"
                                                    target="_blank" data-eid="qd_A117"
                                                    data-bid="1037068783">{{ $story->name }}</a>
                                                <i class="total"><i class="fas fa-book-reader"></i>
                                                    {{ $story->view }}</i>
                                            </div>
                                        </li>
                                        <?php $number++; ?>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- pt-4 pb-4 -->
            <div class="col-sm-2 col-md-4 col-lg-3 col-xl-1"></div>
        </div>
    </page-body>
@endsection

@section('scripts')
    <script src="{{ URl::asset('client/js/index-slider.js') }}"></script>
@endsection
