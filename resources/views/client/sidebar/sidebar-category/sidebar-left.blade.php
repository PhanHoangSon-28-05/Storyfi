<div class="col-lg-2 col-md-2 col-sm-1">
    <nav class="navbar-transparent bg-transparent">
        <div class="row physical-condition">
            <div class="col">
                <div class="btn-container">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link btn active" id="nav-home-tab btn1" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Hot</button>
                        <button class="nav-link btn" id="nav-contact-tab btn3" data-bs-toggle="tab"
                            data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                            aria-selected="false">New</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
            tabindex="0">
            <div id="content1" class="content-physical-hot">
                <div class="list-group">
                    <h5 class="">Truyện</h5>
                    <div class="list-group">
                        <ul class="">
                            @foreach ($stories_hot as $story)
                                <li class="d-inline-flex p-1">
                                    <a href="{{ URL::route('home.story.index', $story->slug) }}"> <img
                                            src="{{ url('storage/images/' . $story->image) }}" alt=""></a>
                                    <div class="book-details">
                                        <h4 class="book-title">{{ $story->name }}</h4>
                                        <p class="book-info" name="Chapter"><i class="fas fa-th-list"></i>
                                            @foreach ($story->categories as $category)
                                                <a href=""><span>{{ $category->name }},</span></a>
                                            @endforeach
                                        </p>
                                        <p class="book-info"><i class="fas fa-book"></i> <span>{{ $story->sum_chapter }}
                                                chương</span>
                                        </p>
                                        <p class="book-info view"><i class="fas fa-book-reader"></i>
                                            <span>{{ $story->view }}
                                                lượt đọc
                                            </span>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
            <div id="content1" class="content-physical-hot">
                <div class="list-group">
                    <h5 class="">Truyện</h5>
                    <div class="list-group">
                        <ul class="">
                            @foreach ($stories_new as $story)
                                <li class="d-inline-flex p-1">
                                    <a href="{{ URL::route('home.story.index', $story->slug) }}"> <img
                                            src="{{ url('storage/images/' . $story->image) }}" alt=""></a>
                                    <div class="book-details">
                                        <h4 class="book-title">{{ $story->name }}</h4>
                                        <p class="book-info" name="Chapter"><i class="fas fa-th-list"></i>
                                            @foreach ($story->categories as $category)
                                                <a href=""><span>{{ $category->name }},</span></a>
                                            @endforeach
                                        </p>
                                        <p class="book-info"><i class="fas fa-book"></i>
                                            <span>{{ $story->sum_chapter }}
                                                chương</span>
                                        </p>
                                        <p class="book-info view"><i class="fas fa-book-reader"></i>
                                            <span>{{ $story->view }}
                                                lượt đọc
                                            </span>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- @section('scripts')
    <script src="{{ URL::asset('client/js/view_category.js') }}"></script>
@endsection --}}
