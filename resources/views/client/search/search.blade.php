<div class="search-container d-flex flex-column">
    <div class="search-box">
        <input type="text" class="form-control" id="searchInput" placeholder="Search...">
        <button type="submit"><i class="fa fa-search"></i></button>
    </div>
    <ul id="searchResults" class="list-group list-group-flush position-fixed d-print-block">
        @foreach ($stories_all as $item)
            <li class="list-group-item"><a href="{{ URL::route('home.story.index', $item->slug) }}">
                    {{ $item->name }}
                </a></li>
        @endforeach
    </ul>
</div>

<script>
    // Ẩn danh sách từ liên quan
    $('#searchResults').hide();

    // Hàm tìm kiếm từ liên quan
    function searchRelatedWords() {
        var searchValue = $('#searchInput').val().toLowerCase();

        // Kiểm tra nếu không có chữ nào trong ô tìm kiếm
        if (searchValue === '' || searchValue.trim() === '') {
            $('#searchResults').hide(); // Ẩn danh sách
            return;
        }

        $('#searchResults li').each(function() {
            var word = $(this).text().toLowerCase();
            if (word.indexOf(searchValue) !== -1) {
                $(this).show(); // Hiển thị từ liên quan
            } else {
                $(this).hide(); // Ẩn từ không liên quan
            }
        });

        $('#searchResults').show(); // Hiển thị danh sách từ liên quan
    }

    // Sự kiện khi nhập vào ô tìm kiếm
    $('#searchInput').on('input', searchRelatedWords);

    // Sự kiện khi click vào ô tìm kiếm
    $('#searchInput').on('click', function() {
        if ($('#searchInput').val().trim() !== '') {
            searchRelatedWords(); // Gọi hàm tìm kiếm từ liên quan
            $('#searchResults').show(); // Hiển thị danh sách từ liên quan
        }
    });

    // Sự kiện khi ô tìm kiếm nhận focus
    $('#searchInput').on('focus', function() {
        $('#searchResults').hide(); // Ẩn danh sách
    });
</script>
