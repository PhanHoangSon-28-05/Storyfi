<div class="col-lg-2 col-md-2 col-sm-1">
    <div class="row physical-condition">
        <div class="col">
            <div class="btn-container">
                <button id="btn1" class="btn active" onclick="showContent(1)">Hot</button>
                <button id="btn2" class="btn" onclick="showContent(2)">View</button>
                <button id="btn3" class="btn" onclick="showContent(3)">New</button>
            </div>
        </div>
    </div>

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
                                <p class="book-info view"><i class="fas fa-book-reader"></i> <span>{{ $story->view }}
                                        lượt đọc
                                    </span></p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div id="content2" class="content-physical-view" style="display: none;">
        <div class="list-group ">
            <ul class="">
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div id="content3" class="content-physical-new" style="display: none;">
        <div class="list-group">
            <ul class="">
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
                <li class="d-inline-flex p-1">
                    <img src="https://bookcover.yuewen.com/qdbimg/349573/1036370336/90.webp" alt="Cùng Trời Với Thú">
                    <div class="book-details">
                        <h4 class="book-title">Cùng Trời Với Thú</h4>
                        <p class="book-info">Reads: 1000</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

@section('scripts')
    <script src="{{ URL::asset('client/js/view_category.js') }}"></script>
@endsection
