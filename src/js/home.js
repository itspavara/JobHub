const carouselSlide = document.querySelector('.carousel-slide');
const items = carouselSlide.querySelectorAll('.carousel-item');
const prevButton = document.querySelector('.carousel-prev');
const nextButton = document.querySelector('.carousel-next');

let counter = 0;
const itemWidth = items[0].clientWidth;

function showItems(startIndex) {
  items.forEach(item => item.classList.remove('active'));
  for (let i = startIndex; i < startIndex + 3; i++) {
    items[i].classList.add('active');
  }
  carouselSlide.style.transform = `translateX(${-itemWidth * startIndex}px)`;
}

prevButton.addEventListener('click', () => {
  counter = (counter - 1 + items.length) % items.length;
  showItems(counter);
});

nextButton.addEventListener('click', () => {
  counter = (counter + 1) % items.length;
  showItems(counter);
});

showItems(counter);
