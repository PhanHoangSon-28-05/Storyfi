<div class="container page-body">
    <div class="row">
        <div class="container">
            <div class="row">
                <div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2 class="text-center">{{ $summaries->name }}</h2>
                        @if ($summaries->method == 0)
                        @else
                            <h4 class="text-center">{{ $contentChapter->first()->number_chapter }}:
                                {{ $contentChapter->first()->name }}
                            </h4>
                        @endif
                    </div>
                    @if ($summaries->method == 0)
                    @else
                        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                            <nav aria-label="Page navigation example  mx-auto">
                                <ul class="">
                                    <li class="page-item" style="">
                                        <a class="page-link" id="list-link" href="#" onclick="toggleElements()">
                                            <i class="fas fa-th-list" id="icon"></i>
                                        </a>
                                    </li>
                                    <li class="page-item hidden" id="select-menu">
                                        <select class="form-select" aria-label="Default select example">
                                            @foreach ($stories_chapter as $chapter)
                                                <a href="{{ URL::route('home.content', [Str::slug($summaries->name), Str::slug($chapter->number_chapter)]) }}"
                                                    title="" class="con">
                                                    <option selected>{{ $chapter->number_chapter }}:
                                                        {{ $chapter->name }} </option>
                                                </a>
                                            @endforeach
                                        </select>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row content-chapter">
                @if ($summaries->method == 0)
                    {!! $summaries->content !!}
                @else
                    {!! $contentChapter->first()->content !!}
                @endif
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div>
                    @if ($summaries->method == 0)
                    @else
                        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                            <nav aria-label="Page navigation example  mx-auto">
                                <ul class="pagination">
                                    <li class="page-item hidden" id="select-menu">
                                        <select class="form-select" aria-label="Default select example">
                                            @foreach ($stories_chapter as $chapter)
                                                <a href="{{ URL::route('home.content', [Str::slug($summaries->name), Str::slug($chapter->number_chapter)]) }}"
                                                    title="" class="con">
                                                    <option selected>{{ $chapter->number_chapter }}:
                                                        {{ $chapter->name }} </option>
                                                </a>
                                            @endforeach
                                        </select>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    @endif

                    <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-3">
                        <div class="all-btn">
                            <p class="normal-btn">
                                <button id="btn1" class="btn btn-danger" onclick="showContent(1)"><i
                                        class="fab fa-font-awesome-flag"></i> Báo cáo lỗi</button>
                                @if (auth()->check())
                                    <button id="btn2" class="btn btn-info" onclick="showContent(2)"><i
                                            class="fas fa-comment-alt"></i> Bình luận</button>
                                @else
                                    <a href="{{ URL::route('client.login.show') }}" class="btn btn-info"><i
                                            class="fas fa-comment-alt"></i> Bình luận</a>
                                @endif

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container mt-3 notification-comment">
    <div id="content1" class="content-report col-lg-12 col-md-12 col-sm-12"style=" display: none;">
        <form>
            <div class="row align-items-center pt-2 pb-2 enter-notification">
                <div class="col-auto">
                    <i class="fas fa-user-circle" style="color: #ff0000; font-size: 40px;"></i>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="textarea-container">
                            <textarea class="form-control border border-dark" rows="2" id="comment"></textarea>
                            <button type="submit" class="btn btn-danger rounded-circle submit-button"><i
                                    class="fas fa-bug"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- {{ dd(auth()->user()->id) }} --}}
    @if (auth()->check())
        <div id="content2" class="content-comment col-lg-12 col-md-12 col-sm-12" style="display: none;">
            <form id="commentForm" method="post"
                action="{{ route('comment', ['id_story' => $summaries->id, 'id_user' => auth()->user()->id]) }}"
                data-parsley-validate enctype="multipart/form-data">
                @csrf
                <div class="row align-items-center enter-comment">
                    <div class="col-auto ps-3">
                        <i class="fas fa-user-circle" style="color: #0e9ef2; font-size: 40px;"></i>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="textarea-container">
                                <textarea class="form-control border border-dark" name="content" rows="2" id="commentInput"></textarea>
                                <button type="submit" class="btn btn-primary rounded-circle submit-button"
                                    onclick="submitComment()"><i class="far fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if ($comments != null)
                @foreach ($comments as $comment)
                    <div class="container mt-3 comment" id="commentContainer">
                        <div class="row">
                            <div class="col-md-1 img_user">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="col-md-11 information">
                                <h4>{{ $comment->users->fullname }}</h4>
                                <p><i class="fas fa-clock"></i> <span>{{ $comment->created_at }}</span></p>
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @endif


</div>
