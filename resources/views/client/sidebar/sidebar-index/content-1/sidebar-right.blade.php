<?php use Carbon\Carbon; ?>

<div class="col-lg-2 col-md-2 col-sm-2">
    <div class="notice-wrap fr">
        <div class="notice" id="notice" data-l1="7">
            <h3>
                <a href="" target="_blank" data-eid="qd_A93">Cuốn truyện mới ra</a>
            </h3>
            <div class="notice-list">
                <ul>
                    <?php $num = 0; ?>

                    @foreach ($stories_new as $story_new[0])
                        @if ($num < 4)
                            <li class="d-flex flex-row justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a class="channel" href="{{ URL::route('home.story.index', $story_new[0]->slug) }}"
                                        target="_blank" data-eid="qd_A102">
                                        <img src="{{ url('storage/images/' . $story_new[0]->image) }}" alt=""
                                            style="width: 40px; height: 40px;">
                                    </a>
                                    <strong>
                                        <a class="name ms-1"
                                            href="{{ URL::route('home.story.index', $story_new[0]->slug) }}"
                                            target="_blank" data-eid="qd_A103" data-bid="1037135031"
                                            title="Mã Đường Hoài">{{ $story_new[0]->name }}</a>
                                        <cite class="hot"></cite>
                                    </strong>
                                </div>

                                <div class="">
                                    @if (Carbon::now()->diffInDays(Carbon::parse($story_new[0]->created_at)) >= 1)
                                        <p class="author" href="" data-eid="qd_A104" target="_blank">
                                            {{ Carbon::now()->diffInDays(Carbon::parse($story_new[0]->created_at)) }}
                                            Ngày
                                        </p>
                                    @else
                                        <p class="author" href="" data-eid="qd_A104" target="_blank">
                                            {{ Carbon::now()->diffInMonths(Carbon::parse($story_new[0]->created_at)) }}
                                            Tháng
                                        </p>
                                    @endif
                                </div>
                            </li>
                            <?php $num++; ?>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="attention">
                <i class="fas fa-volume-up" id="icon-volume"></i>
                <marquee class="marquee-container" direction="left" behavior="scroll" scrollamount="4" loop="0"
                    onmouseover="this.stop()" onmouseout="this.start()">
                    <span>
                        封ぃ雪支持<a href="" target="_blank">说好制作烂游戏，泰坦陨落什么鬼</a>
                        100W点，【成为该书白银大盟】
                    </span>
                </marquee>
            </div>
        </div>
        <div class="notice-banner" id="tr-banner" data-l1="30">
            <div class="op-tag"></div>
            <a href="" target="_blank" data-eid="qd_A101" data-qd_dd_p1="1" style="display:block">
                <img src="https://img2.qidian.com/upload/gamesy/2023/06/20/202306201915296mqxlsuyse.jpg">
            </a>
        </div>
    </div>

</div>
