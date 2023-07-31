<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://skywalkapps.github.io/bootstrap-notifications/stylesheets/bootstrap-notifications.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Damion&family=Roboto:wght@300&display=swap" rel="stylesheet">
    @yield('CSS')
    <link rel="stylesheet" href="{{ URL::asset('client/css/scrollToTop.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('client/css/search.css') }}">
</head>

<body>
    <header>
        @include('client.header.header-index')
    </header>

    @yield('content')

    <div class="footer" style="text-align: center; margin-top: 15px;">
        <div class="wp">
            <div class="ll">
                <a href="https://truyentumlum.com" title="Truyện Tùm Lum">TruyenTumLum.Com</a>
                <br>Đọc truyện hay &amp;Đọc truyện online miễn phí
            </div>
            <div class="rr">
                <a href="/lien-he/" title="Liên hệ">Liên hệ</a>
                - <a href="/sitemap.xml" title="Sitemap" target="_blank">Sitemap</a>
                <br>
                <a href="/trang/tos/" title="Điều khoản sử dụng">Điều khoản sử dụng</a>
            </div>
        </div>
    </div>
    <a href="#" id="scrollToTop" class="btn btn-primary rounded-circle">
        <i class="fas fa-arrow-up"></i>
    </a>
</body>

@yield('scripts')
<script src="{{ URL::asset('client/js/scrollToTop.js') }}"></script>
<script src="{{ URL::asset('client/js/view_story.js') }}"></script>

</html>
