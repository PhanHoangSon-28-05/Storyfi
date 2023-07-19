window.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('switchable-slides');
    const slideList = slider.querySelector('ul');
    const slides = slider.querySelectorAll('li');
    const slideWidth = slides[0].offsetWidth;
    const slideCount = slides.length;
    let currentIndex = 0;
    let timer;
  
    function moveToSlide(index) {
      slideList.style.transform = `translateX(-${slideWidth * index}px)`;
      currentIndex = index;
    }
  
    function updateActiveButton() {
      const buttons = document.querySelectorAll('#thumb .lbf-button');
      buttons.forEach((button) => button.classList.remove('active'));
      buttons[currentIndex].classList.add('active');
    }
  
    function startAutoSlide() {
      timer = setInterval(() => {
        const nextIndex = (currentIndex + 1) % slideCount;
        moveToSlide(nextIndex);
        updateActiveButton();
      }, 1500);
    }
  
    function stopAutoSlide() {
      clearInterval(timer);
    }
  
    function handleButtonClick(e) {
      e.preventDefault();
      const target = e.target.getAttribute('href');
      const index = Array.from(slides).findIndex((slide) => slide.id === target.slice(1));
      if (index >= 0) {
        moveToSlide(index);
        updateActiveButton();
        stopAutoSlide();
      }
    }
  
    slider.addEventListener('mouseover', stopAutoSlide);
    slider.addEventListener('mouseout', startAutoSlide);
  
    const buttons = document.querySelectorAll('#thumb .lbf-button');
    buttons.forEach((button) => button.addEventListener('click', handleButtonClick));
  
    updateActiveButton();
    startAutoSlide();
  });
  