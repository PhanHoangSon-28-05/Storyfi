<div class="col-lg-2 col-md-2 col-sm-2">
    <dl class="cf">
        @foreach ($category_story_counts as $item)
            <dd>
                <a href="{{ URL::route('home.category', Str::slug($item->name)) }}" title="" target="_blank"
                    data-eid="qd_A71">
                    <cite>
                        <em class="iconfont"><i>{{ $item->icon }}</i> {{ $item->name }}</em>
                        <span class="info">
                            <b><i class="fas fa-book"></i> {{ $item->stories_count }} cuốn</b>
                        </span>
                    </cite>
                </a>
            </dd>
        @endforeach
    </dl>
</div>
