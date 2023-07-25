<div class="col-lg-8">
    <div class="row">
        <div class="row border-3 rounded-3  mt-3">
            <div class="col-lg-4 mt-3">
                <div class="book-image">
                    <img src="{{ url('storage/images/' . $summaries->image ) }}" alt="">
                </div>
            </div>
            <div class="col-lg-8 mt-2">
                <div class="book-info">
                    <div class="book-info-top">
                        <h1 class="" id="bookName">{{ $summaries->name }}</h1>
                        <p class="author-name">
                            {!! $summaries->summary !!}
                        </p>
                    </div>
                    <div class="all-btn">
                        <p class="normal-btn">

                            {{-- {{ dd($summaries->method) }} --}}
                            @if ($summaries->method == 0)
                                <a class="btn btn-warning add-book" id="addBookBtn"
                                    href="{{ URL::route('home.content.short', [Str::slug($summaries->name)]) }}"
                                    rel="nofollow" data-eid="qd_G05" data-bookid="1037135031" data-cid="1037135031"
                                    data-bid="1037135031"><i class="fas fa-arrow-circle-right"></i> Đọc truyện</a>
                            @else
                                @if (Str::slug($stories_chapter->first()) == '')
                                @else
                                    <a class="btn btn-warning J-getJumpUrl" href="" id="readBtn"
                                        data-eid="qd_G03" data-bid="1037135031"
                                        data-firstchapterjumpurl="//www.qidian.com/chapter/1037135031/755125653/"
                                        target="_blank" rel="nofollow"><i class="fas fa-th-list"></i> Danh
                                        sách chương</a>
                                    <a class="btn btn-warning add-book" id="addBookBtn"
                                        href="{{ URL::route('home.content', [Str::slug($summaries->name), Str::slug($stories_chapter->first()->number_chapter)]) }}"
                                        rel="nofollow" data-eid="qd_G05" data-bookid="1037135031" data-cid="1037135031"
                                        data-bid="1037135031"><i class="fas fa-arrow-circle-right"></i> Đọc từ đầu</a>
                                @endif
                            @endif

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-3 rounded-3 mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex mt-3 physical-condition">
                <div class="all-btn btn-container">
                    <p class="normal-btn">
                        @if ($summaries->method == 0)
                        @else
                            @if (Str::slug($stories_chapter->first()) == '')
                            @else
                                <button id="btn1" class="btn active" onclick="showContent(1)">D.S
                                    chương</button>
                            @endif
                        @endif

                        <button id="btn2" class="btn" onclick="showContent(2)">Bình Luận</button>
                    </p>
                </div>
            </div>
            <div id="content1" class="">
                <div class="row border-3 rounded-3">
                    <div class="mt-1">
                        {{-- {{ dd($summaries->method) }} --}}
                        @if ($summaries->method == 0)
                        @else
                            {{-- {{ dd($stories_chapter) }} --}}
                            @if (Str::slug($stories_chapter->first()) == '')
                            @else
                                <div class="m-newest2">
                                    <div class="g-tit" id="ds-chuong">
                                        <h3 class="tit">
                                            <span class="glyphicon glyphicon-list"></span>
                                            Danh sách chương
                                        </h3>
                                    </div>
                                    <ul class="ul-list5 list-group list-group-flush">
                                        @foreach ($stories_chapter as $chapter)
                                            <li class="list-group-item">
                                                <span class="glyphicon glyphicon-book right-5"></span>
                                                <a href="{{ URL::route('home.content', [Str::slug($summaries->name), Str::slug($chapter->number_chapter)]) }}"
                                                    title="" class="con">{{ $chapter->number_chapter }}:
                                                    {{ $chapter->name }} </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="d-flex justify-content-center mb-3">
                                        {!! $stories_chapter->links() !!}
                                    </div>
                                </div>
                            @endif
                        @endif

                    </div>
                </div>
            </div>

            <div id="content2" class="content-physical-view mb-2" style="display: none;">
                <div class="container mt-1 comment">
                    <div class="row">
                        <div class="col-md-1 img_user">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="col-md-11 information">
                            <h4>Tên người dùng</h4>
                            <p><i class="fas fa-clock"></i> <span>Thời gian</span></p>
                            <p>Nội dung</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-3 rounded-3  mt-3">
            <div class="mt-3">
                <div class="col-slide">
                    <div class="m-newest m-newest-1">
                        <div class="col-l">
                            <div class="g-tit">
                                <h3 class="tit">
                                    <span class="glyphicon glyphicon-fire"></span>
                                    Truyện mới ra
                                </h3>
                            </div>
                            <div class="content-physical-new">
                                <div class="list-group">
                                    <ul class="">
                                        @foreach ($stories_new as $story)
                                            <div class="book-item d-inline-flex p-1">
                                                <a href="{{ URL::route('home.story.index', $story->slug) }}"> <img
                                                        src="{{ url('storage/images/' . $story->image) }}"
                                                        alt=""></a>
                                                <div class="book-details">
                                                    <a href="{{ URL::route('home.story.index', $story->slug) }}">
                                                        <h4 class="book-title">{{ $story->name }}</h4>
                                                    </a>
                                                    <a href="">
                                                        <p class="book-info" name="TacGia"><i class="fas fa-user"></i>
                                                            {{ /* dd($story->users->first()->fullname) */ $story->users->first()->fullname }}
                                                        </p>
                                                    </a>
                                                    <p class="book-info" name="Chapter"><i class="fas fa-th-list"></i>
                                                        @foreach ($story->categories as $category)
                                                            <a href=""><span>{{ $category->name }},</span></a>
                                                        @endforeach
                                                    </p>
                                                    <p class="book-info"><i class="fas fa-book"></i>
                                                        <span>{{ $story->sum_chapter }} chương</span>
                                                    </p>
                                                    <p class="book-info view"><i class="fas fa-book-reader"></i>
                                                        <span>{{ $story->view }} lượt đọc
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("readBtn").addEventListener("click", function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định khi nhấp vào liên kết

        // Cuộn đến vị trí của phần tử có id là "content1"
        document.getElementById("content1").scrollIntoView({
            behavior: "smooth" // Tạo hiệu ứng cuộn mượt
        });
    });
</script>
