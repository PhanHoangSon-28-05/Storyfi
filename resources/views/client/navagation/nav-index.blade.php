<nav class="navbar navbar-expand-lg mt-3 mb-1 text-black">
    <div class="container" style="padding: -8px">
        <div class="navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav other-categories">
                <li class="nav-item dropdown a">
                    <a class="nav-link dropdown-toggle list" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-th-list"></i> Danh Sách
                    </a>
                    <ul class="dropdown-menu a">
                        <li class="dropdown-item">Truyện Mới</li>
                        <li class="dropdown-item">Truyện Hot</li>
                        <li class="dropdown-item">Truyện Full - Hoàn Thành</li>
                    </ul>
                </li>
                <li class="nav-item dropdown b">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-th-list"></i> Thể loại
                    </a>
                    <ul class="dropdown-menu b">
                        @foreach ($categories as $category)
                            <li class="d-inline-flex p-1"><a
                                    href="{{ URL::route('home.category', Str::slug($category->name)) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
