<div>
    <div class="container-fluid">
        <div class="row title-bar-1">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="img" href="" alt="起点中文小说网" data-eid="qd_A11"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ URL::route('home.index') }}"><i
                                        class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="nav-item dropdown a">
                                <a class="nav-link dropdown-toggle list" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-th-list"></i> Danh Sách
                                </a>
                                <ul class="dropdown-menu a">
                                    <li class="dropdown-item">Truyện Mới</li>
                                    <li class="dropdown-item">Truyện Hot</li>
                                    <li class="dropdown-item">Truyện Full - Hoàn Thành</li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown b">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
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
                        <form class="d-flex">
                            @include('client.search.search')
                        </form>
                        <div class="col-lg-2">
                            <div class="sign-out">
                                @if (auth()->check())
                                    {{ auth()->user()->fullname }} <a href="{{ route('logout.perform') }}"
                                        class="dropdown-item"><i class="fas fa-sign-out-alt"></i>
                                        Log Out</a>
                                @else
                                    <a id="login-btn" href="{{ URL::route('client.login.show') }}" class="black"
                                        href="javascript:" data-eid="qd_A06">Đăng nhập <em> | </em> Đăng ký</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
