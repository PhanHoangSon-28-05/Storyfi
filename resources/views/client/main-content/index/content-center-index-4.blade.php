<?php use Carbon\Carbon; ?>
<div class="row mt-2">
    <div class="col-sm-2 col-md-4 col-lg-3 col-xl-4">
        <div class="flipster">
            <ul class="flip-items">
                @foreach ($stories_new as $value)
                    <li class="">
                        <div class="flip-content mt-2">
                            <!-- Thêm class mt-2 để tạo khoảng cách phía trên -->
                            <img class="text-center" src="{{ url('storage/images/' . $value->image) }}">
                            <div class="content-wrapper read-more-button">
                                <p class="text-center">{{ $value->name }}</p>
                                <a href="">
                                    <p class="book-info" name="TacGia"><i class="fas fa-user"></i>
                                        {{ optional($value->users->first())->fullname }}
                                    </p>
                                </a>
                                <p class="book-info" name="Chapter"><i class="fas fa-th-list"></i>
                                    @foreach ($value->categories as $category)
                                        <a href=""><span>{{ $category->name }},</span></a>
                                    @endforeach
                                </p>
                                <p class="book-info"><i class="fas fa-book"></i> <span>{{ $value->sum_chapter }}
                                        chương</span>
                                </p>
                                <p class="book-info view"><i class="fas fa-book-reader"></i> <span>{{ $value->view }}
                                        lượt đọc
                                    </span></p>
                                <p class="text-center"><a href="" type="button"
                                        class="btn btn-outline-secondary mb-2">Đọc
                                        truyện</a></p>

                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-sm-8 col-md-4 col-lg-6 col-xl-8">
        <div class="row content-4">
            <div class="col-sm-3 pt-2 pb-2 ps-1 pe-1 ">
                <div class="first" data-l2="1">
                    <h3 class="category">

                        <a class="name" href="{{ URL::route('home.category', 'kinh-di') }}" target="_blank">
                            Kinh dị
                        </a>
                        <img src="{{ URL::asset('client/img/kinhdi.png') }}" alt="" width="40px">
                    </h3>
                    <div class="book-list">
                        <ul>
                            @foreach ($stories_kinhdi as $story)
                                <li class="unfold" data-rid="1">
                                    <a href="">
                                        @if (Carbon::now()->diffInDays(Carbon::parse($story->created_at)) <= 30)
                                            <span>[</span>Mới<span>]</span>
                                        @else
                                            <span>[</span>Cũ<span>]</span>
                                        @endif
                                        {{ $story->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 pt-2 pb-2 ps-1 pe-1 ">
                <div class="first" data-l2="1">
                    <h3 class="category">

                        <a class="name" href="{{ URL::route('home.category', 'ngon-tinh') }}" target="_blank">
                            Ngôn tình
                        </a>
                        <img src="{{ URL::asset('client/img/kinhdi.png') }}" alt="" width="40px">
                    </h3>
                    <div class="book-list">
                        <ul>
                            @foreach ($stories_ngon_tinh as $story)
                                <li class="unfold" data-rid="1">
                                    <a href="">
                                        @if (Carbon::now()->diffInDays(Carbon::parse($story->created_at)) <= 30)
                                            <span>[</span>Mới<span>]</span>
                                        @else
                                            <span>[</span>Cũ<span>]</span>
                                        @endif
                                        {{ $story->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 pt-2 pb-2 ps-1 pe-1 ">
                <div class="first" data-l2="1">
                    <h3 class="category">

                        <a class="name" href="{{ URL::route('home.category', 'tinh-yeu') }}" target="_blank">
                            Tình yêu
                        </a>
                        <img src="{{ URL::asset('client/img/kinhdi.png') }}" alt="" width="40px">
                    </h3>
                    <div class="book-list">
                        <ul>
                            @foreach ($stories_tinhyeu as $story)
                                <li class="unfold" data-rid="1">
                                    <a href="">
                                        @if (Carbon::now()->diffInDays(Carbon::parse($story->created_at)) <= 30)
                                            <span>[</span>Mới<span>]</span>
                                        @else
                                            <span>[</span>Cũ<span>]</span>
                                        @endif
                                        {{ $story->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 pt-2 pb-2 ps-1 pe-1 ">
                <div class="first" data-l2="1">
                    <h3 class="category">

                        <a class="name" href="{{ URL::route('home.category', 'tam-ly') }}" target="_blank">
                            Tâm lý
                        </a>
                        <img src="{{ URL::asset('client/img/kinhdi.png') }}" alt="" width="40px">
                    </h3>
                    <div class="book-list">
                        <ul>
                            @foreach ($stories_tamly as $story)
                                <li class="unfold" data-rid="1">
                                    <a href="">
                                        @if (Carbon::now()->diffInDays(Carbon::parse($story->created_at)) <= 30)
                                            <span>[</span>Mới<span>]</span>
                                        @else
                                            <span>[</span>Cũ<span>]</span>
                                        @endif
                                        {{ $story->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row content-4">
            <div class="col-sm-3 pt-2 pb-2 ps-1 pe-1 ">
                <div class="first" data-l2="1">
                    <h3 class="category">

                        <a class="name" href="{{ URL::route('home.category', 'teen') }}" target="_blank">
                            Teen
                        </a>
                        <img src="{{ URL::asset('client/img/kinhdi.png') }}" alt="" width="40px">
                    </h3>
                    <div class="book-list">
                        <ul>
                            @foreach ($stories_teen as $story)
                                <li class="unfold" data-rid="1">
                                    <a href="">
                                        @if (Carbon::now()->diffInDays(Carbon::parse($story->created_at)) <= 30)
                                            <span>[</span>Mới<span>]</span>
                                        @else
                                            <span>[</span>Cũ<span>]</span>
                                        @endif
                                        {{ $story->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 pt-2 pb-2 ps-1 pe-1 ">
                <div class="first" data-l2="1">
                    <h3 class="category">

                        <a class="name" href="{{ URL::route('home.category', 'hoc-duong') }}" target="_blank">
                            Học đường
                        </a>
                        <img src="{{ URL::asset('client/img/kinhdi.png') }}" alt="" width="40px">
                    </h3>
                    <div class="book-list">
                        <ul>
                            @foreach ($stories_hocduong as $story)
                                <li class="unfold" data-rid="1">
                                    <a href="">
                                        @if (Carbon::now()->diffInDays(Carbon::parse($story->created_at)) <= 30)
                                            <span>[</span>Mới<span>]</span>
                                        @else
                                            <span>[</span>Cũ<span>]</span>
                                        @endif
                                        {{ $story->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 pt-2 pb-2 ps-1 pe-1 ">
                <div class="first" data-l2="1">
                    <h3 class="category">

                        <a class="name" href="{{ URL::route('home.category', 'hai') }}" target="_blank">
                            Hài
                        </a>
                        <img src="{{ URL::asset('client/img/kinhdi.png') }}" alt="" width="40px">
                    </h3>
                    <div class="book-list">
                        <ul>
                            @foreach ($stories_hai as $story)
                                <li class="unfold" data-rid="1">
                                    <a href="">
                                        @if (Carbon::now()->diffInDays(Carbon::parse($story->created_at)) <= 30)
                                            <span>[</span>Mới<span>]</span>
                                        @else
                                            <span>[</span>Cũ<span>]</span>
                                        @endif
                                        {{ $story->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 pt-2 pb-2 ps-1 pe-1 ">
                <div class="first" data-l2="1">
                    <h3 class="category">

                        <a class="name" href="{{ URL::route('home.category', 'trong-sinh') }}" target="_blank">
                            Trọng sinh
                        </a>
                        <img src="{{ URL::asset('client/img/kinhdi.png') }}" alt="" width="40px">
                    </h3>
                    <div class="book-list">
                        <ul>
                            @foreach ($stories_trongsinh as $story)
                                <li class="unfold" data-rid="1">
                                    <a href="">
                                        @if (Carbon::now()->diffInDays(Carbon::parse($story->created_at)) <= 30)
                                            <span>[</span>Mới<span>]</span>
                                        @else
                                            <span>[</span>Cũ<span>]</span>
                                        @endif
                                        {{ $story->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
