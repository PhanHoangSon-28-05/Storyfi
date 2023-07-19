<div class="col-lg-4 mt-3">
    <div id="content1" class="content-physical-hot">
        <div class="list-group">
            <h5 class="">Truyện cùng tác giả</h5>
            <div class="list-group">
                <ul class="">
                    @foreach ($stories_user as $story)
                        <div class="book-item">
                            <a href="{{ URL::route('home.story.index', $story->slug) }}"> <img
                                    src="{{ url('storage/images/' . $story->image) }}" alt=""></a>
                            <div class="book-details">
                                <a href="{{ URL::route('home.story.index', $story->slug) }}">
                                    <h4 class="book-title">{{ $story->name }}</h4>
                                </a>
                                <a href="">
                                    <p class="book-info" name="TacGia"><i class="fas fa-user"></i>
                                        {{ /* dd($story->users[0]->fullname) */ $story->users[0]->fullname }}
                                    </p>
                                </a>
                                <p class="book-info" name="Chapter"><i class="fas fa-th-list"></i>
                                    @foreach ($story->categories as $category)
                                        <a href=""><span>{{ $category->name }},</span></a>
                                    @endforeach
                                </p>
                                <p class="book-info"><i class="fas fa-book"></i> <span>{{ $story->sum_chapter }}
                                        chương</span>
                                </p>
                                <p class="book-info view"><i class="fas fa-book-reader"></i>
                                    <span>{{ $story->view }} lượt đọc
                                    </span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </ul>
                <div class="d-flex justify-content-center">
                    {!! $stories_user->links() !!}
                </div>
            </div>
        </div>
        <div class="list-group mt-4">
            <h5 class="name-categori-list-book">Truyện sủng <span><i class="fab fa-hotjar"></i>
                    hot</span></h5>
            <div class="content-physical-categori">
                <div class="list-group">
                    <ul class="">
                        @foreach ($stories_sung_hot as $story)
                            <div class="book-item">
                                <a href="{{ URL::route('home.story.index', $story->slug) }}"> <img
                                        src="{{ url('storage/images/' . $story->image) }}" alt=""></a>
                                <div class="book-details">
                                    <a href="{{ URL::route('home.story.index', $story->slug) }}">
                                        <h4 class="book-title">{{ $story->name }}</h4>
                                    </a>
                                    <a href="">
                                        <p class="book-info" name="TacGia"><i class="fas fa-user"></i>
                                            {{ /* dd($story->users[0]->fullname) */ $story->users[0]->fullname }}
                                        </p>
                                    </a>
                                    <p class="book-info" name="Chapter"><i class="fas fa-th-list"></i>
                                        @foreach ($story->categories as $category)
                                            <a href=""><span>{{ $category->name }},</span></a>
                                        @endforeach
                                    </p>
                                    <p class="book-info"><i class="fas fa-book"></i> <span>{{ $story->sum_chapter }}
                                            chương</span>
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
