function showContent(index) {
    // Ẩn tất cả các nội dung
    document.querySelectorAll('[id^="content"]').forEach(function(element) {
      element.style.display = 'none';
    });
    
    // Hiển thị nội dung tương ứng với nút được nhấp vào
    var contentId = 'content' + index;
    document.getElementById(contentId).style.display = 'block';
    
    // Xử lý trạng thái active của các nút
    document.querySelectorAll('.btn').forEach(function(button) {
      button.classList.remove('active');
    });
    var activeButton = document.getElementById('btn' + index);
    activeButton.classList.add('active');
} 

function toggleElements() {
  var selectMenu = document.getElementById("select-menu");
  var listLink = document.getElementById("list-link");

  selectMenu.classList.remove("hidden");
  listLink.classList.add("hidden");

  selectMenu.addEventListener("change", function() {
    selectMenu.classList.add("hidden");
    listLink.classList.remove("hidden");
  });
}