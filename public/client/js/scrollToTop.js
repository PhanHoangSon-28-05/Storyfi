$(document).ready(function() {
    // Thêm hành động cuộn lên đầu trang khi nhấp vào nút
    $("#scrollToTop").click(function() {
      $("html, body").animate({ scrollTop: 0 }, 1000); // Thay đổi tốc độ cuộn thành 1000 (1 giây)
      return false;
    });
  
    // Ẩn hiện nút cuộn lên đầu trang khi cuộn trang
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $("#scrollToTop").fadeIn(500); // Hiển thị nút trong 0.5 giây
      } else {
        $("#scrollToTop").fadeOut(500); // Ẩn nút trong 0.5 giây
      }
    });
  });
  