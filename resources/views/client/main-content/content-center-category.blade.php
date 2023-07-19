<div class="col-lg-8 col-md-8 col-sm-9">
    <div class="book-list">
        @foreach ($stories_category as $story_category)
            <div class="book-item">
                <a href="{{ URL::route('home.story.index', $story_category->slug) }}">
                    <img src="{{ url('storage/images/' . $story_category->image) }}" alt="Cùng Trời Với Thú"></a>
                <div class="book-details">
                    <a href="{{ URL::route('home.story.index', $story_category->slug) }}">
                        <h4 class="book-title">{{ $story_category->name }}</h4>
                    </a>
                    <p class="book-info"><i class="fas fa-user"></i>
                        {{ /* dd($story->users->first()->fullname) */ $story_category->users->first()->fullname }}</p>
                    <p class="book-info"><i class="fas fa-th-list"></i>
                        @foreach ($story_category->categories as $category)
                            <span>{{ $category->name }},</span>
                        @endforeach
                    </p>
                    <p class="book-info"><i class="fas fa-book"></i> <span>{{ $story_category->sum_chapter }}
                            chương</span></p>
                    <p class="book-info view"><i class="fas fa-book-reader"></i> <span>{{ $story_category->view }} lượt
                            đọc</span></p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center pagination">
        {!! $stories_category->links() !!}
    </div>
</div>
