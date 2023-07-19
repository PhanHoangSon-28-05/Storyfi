<?php use Carbon\Carbon; ?>

<div class="col-lg-2 col-md-2 col-sm-2">
    <div class="book-list-wrap fl" data-l1="8">
        <h3 class="wrap-title lang">
            Sách hot trong tuần
        </h3>
        <div class="book-list">
            <ul class="">
                @foreach ($stories_hot as $story_hot)
                    <li class="d-flex flex-row justify-content-between">
                        <div class="d-flex align-items-center">
                            <a class="channel" href="{{ URL::route('home.story.index', $story_hot->slug) }}" target="_blank" data-eid="qd_A102">
                                <img src="{{ url('storage/images/' . $story_hot->image) }}" alt=""
                                    style="width: 40px; height: 40px;">
                            </a>
                            <strong>
                                <a class="name ms-1" href="{{ URL::route('home.story.index', $story_hot->slug) }}" target="_blank" data-eid="qd_A103"
                                    data-bid="1037135031" title="Mã Đường Hoài">{{ $story_hot->name }}</a>
                                <cite class="hot"></cite>
                            </strong>
                        </div>

                        <div class="">
                            @if (Carbon::now()->diffInDays(Carbon::parse($story_hot->created_at)) >= 1)
                                <p class="author" href="" data-eid="qd_A104" target="_blank">
                                    {{ Carbon::now()->diffInDays(Carbon::parse($story_hot->created_at)) }} Ngày</p>
                            @else
                                <p class="author" href="" data-eid="qd_A104" target="_blank">
                                    {{ Carbon::now()->diffInMonths(Carbon::parse($story_hot->created_at)) }} Tháng</p>
                            @endif
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
