<?php use Carbon\Carbon; ?>

<div class="col-lg-2 col-md-2 col-sm-2">
    <div class="book-list-wrap fr" data-l1="10">
        <h3 class="wrap-title lang">
            Truyện ngôn tình
        </h3>
        <div class="book-list">
            <ul class="">
                @foreach ($stories_ngontinh as $story_ngontinh)
                    <li class="d-flex flex-row justify-content-between">
                        <div class="d-flex align-items-center">
                            <a class="channel" href="{{ URL::route('home.story.index', $story_ngontinh->slug) }}" target="_blank" data-eid="qd_A102">
                                <img src="{{ url('storage/images/' . $story_ngontinh->image) }}" alt=""
                                    style="width: 40px; height: 40px;">
                            </a>
                            <strong>
                                <a class="name ms-1" href="{{ URL::route('home.story.index', $story_ngontinh->slug) }}" target="_blank" data-eid="qd_A103"
                                    data-bid="1037135031" title="Mã Đường Hoài">{{ $story_ngontinh->name }}</a>
                                <cite class="hot"></cite>
                            </strong>
                        </div>

                        <div class="">
                            @if (Carbon::now()->diffInDays(Carbon::parse($story_ngontinh->created_at)) >= 1)
                                <p class="author" href="" data-eid="qd_A104" target="_blank">
                                    {{ Carbon::now()->diffInDays(Carbon::parse($story_ngontinh->created_at)) }} Ngày</p>
                            @else
                                <p class="author" href="" data-eid="qd_A104" target="_blank">
                                    {{ Carbon::now()->diffInMonths(Carbon::parse($story_ngontinh->created_at)) }} Tháng
                                </p>
                            @endif
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
