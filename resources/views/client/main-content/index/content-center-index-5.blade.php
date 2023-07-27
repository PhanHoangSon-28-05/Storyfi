<div class="col-sm-8 col-md-4 col-lg-6 col-xl-12 ">
    <div class="row content-5" >
        {{-- {{ dd($stories_hot) }} --}}
        @foreach ($stories_hot_header as $value)
            <div class="col-sm-2 story">
                <div class="text-center"><img class="" src="{{ url('storage/images/' . $value->image) }}"
                        width="150px" height="200px"></div>
                <div class="content-wrapper">
                    <div class="name text-center"><a class="pb-1">{{ $value->name }}</a></div>
                    <a href="">
                        <p class="book-info" name="TacGia"><i class="fas fa-user"></i>
                            {{ optional($value->users->first())->fullname }}
                        </p>
                    </a>
                    <p class="book-chapter"><i class="fas fa-th-list"></i>
                        @foreach ($value->categories as $category)
                            <span>{{ $category->name }},</span>
                        @endforeach
                    </p>
                    <p class="book-info"><i class="fas fa-book"></i> <span>{{ $value->sum_chapter }}
                            chương</span>
                    </p>
                    <p class="book-info view"><i class="fas fa-book-reader"></i> <span>{{ $value->view }}
                            lượt đọc
                        </span></p>
                    <div class="text-center">
                        <p class=""><a href="" type="button" class="btn btn-outline-secondary mb-2">Đọc
                                truyện</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div><!-- pt-4 pb-4 -->
