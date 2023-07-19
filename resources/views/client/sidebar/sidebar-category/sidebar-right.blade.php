<div class="col-lg-2 col-md-2 col-sm-2">
    <div class="content-physical-condition">
        <div class="list-group">
            <h5 class=""><i class="fas fa-th-list"></i> Thể loại</h5>
            <ul class="">
                <?php $num = 0; ?>
                @foreach ($categories as $category)
                    @if ($num < 20)
                        <li class="d-inline-flex p-1"><a
                                href="{{ URL::route('home.category', Str::slug($category->name)) }}">{{ $category->name }}</a>
                        </li>
                    @endif
                    <?php $num++; ?>
                @endforeach
            </ul>
        </div>
        <div class="list-group mt-4">
            <h5 class="name-categori-list-book">Truyện sủng <span><i class="fab fa-hotjar"></i> hot</span>
            </h5>
            <div class="content-physical-categori-hot">
                <div class="list-group">
                    <ul class="">
                        @foreach ($stories_sung_hot as $story)
                            <div class="d-inline-flex p-1">
                                <a href="{{ URL::route('home.story.index', $story->slug) }}"> <img
                                        src="{{ url('storage/images/' . $story->image) }}" alt=""></a>
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
