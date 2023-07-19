<div class="col-lg-8 col-md-8 col-sm-8">
    <div class="edit-rec-wrap fl">
        <h3 class="name-categori-list-book">Truyện sủng đang hot <span><i class="fab fa-hotjar"></i> hot</span></h3>
    </div>
    <div class="book-list">
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
                            {{ optional($story->users->first())->fullname }}
                        </p>
                    </a>
                    <p class="book-info" name="Chapter"><i class="fas fa-th-list"></i>
                        @foreach ($story->categories as $category)
                            <a href=""><span>{{ $category->name }},</span></a>
                        @endforeach
                    </p>
                    <p class="book-info"><i class="fas fa-book"></i> <span>{{ $story->sum_chapter }} chương</span>
                    </p>
                    <p class="book-info view"><i class="fas fa-book-reader"></i> <span>{{ $story->view }} lượt đọc
                        </span></p>
                </div>
            </div>
        @endforeach
    </div>
</div>
