// Lấy phần tử Dropdown
var dropdown_a = document.querySelector('.nav-item.dropdown.a');

// Khi di chuột vào Dropdown
dropdown_a.addEventListener('mouseenter', function() {
  // Hiển thị Dropdown menu
  dropdown_a.querySelector('.dropdown-menu.a').style.display = 'block';
});

// Khi di chuột ra khỏi Dropdown
dropdown_a.addEventListener('mouseleave', function() {
  // Ẩn Dropdown menu
  dropdown_a.querySelector('.dropdown-menu.a').style.display = 'none';
});

var dropdown_b = document.querySelector('.nav-item.dropdown.b');

dropdown_b.addEventListener('mouseenter', function() {
  dropdown_b.querySelector('.dropdown-menu.b').style.display = 'block';
});

dropdown_b.addEventListener('mouseleave', function() {
  dropdown_b.querySelector('.dropdown-menu.b').style.display = 'none';
});


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
