@extends('client.layouts.index')

@section('scripts')
    <link rel="stylesheet" href="{{ URL::asset('client/css/view_category.css') }}">
@endsection

@section('content')
    <page-body>
        @include('client.navagation.nav-index')

        <div class="cur" itemscope itemtype="https://schema.org/BreadcrumbList">
            <div class="container">
                <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="{{ URL::route('home.index') }}" class="Đọc truyện Online"
                        title="Đọc truyện Online">
                        <span class="glyphicon glyphicon-home"></span>
                        <span itemprop="name"><i class="fas fa-home"></i> Truyện</span>
                    </a>
                    <meta itemprop="position" content="1">
                </span>
                <i> > </i>
                <span>
                    <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="" title="Nữ Cường" class="active">
                            <span itemprop="name"><i class="fas fa-th-list"></i>
                                {{ /*dd($slug_categories->first()->name)*/ $slug_categories->first()->name }}</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </span>
                </span>
            </div>
        </div>
        <div class="categori">
            <h2 class="text-center"><i class="fas fa-th-list"></i>
                {{ /*dd($slug_categories->first()->name)*/ $slug_categories->first()->name }}</h2>
        </div>


        <div class="content">
            <div class="container">
                <div class="row">
                    @include('client.sidebar.sidebar-category.sidebar-left')

                    @include('client.main-content.content-center-category')

                    @include('client.sidebar.sidebar-category.sidebar-right')
                </div>
            </div>
        </div>
    </page-body>
@endsection
