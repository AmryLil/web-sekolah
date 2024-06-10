document.addEventListener("DOMContentLoaded", () => {
  const images = ["../image/bg1.jpg", "../image/bg2.jpg", "../image/bg3.jpg"];
  let currentIndex = 0;
  const imageContent = document.querySelector(".image-content");
  const prevButton = document.querySelector(".prev-button");
  const nextButton = document.querySelector(".next-button");
  function updateBackground() {
    imageContent.style.backgroundImage = `url('${images[currentIndex]}')`;
  }
  function showNextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    updateBackground();
  }
  function showPrevImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateBackground();
  }
  prevButton.addEventListener("click", showPrevImage);
  nextButton.addEventListener("click", showNextImage);
  function autoChangeImage() {
    setInterval(() => {
      showNextImage();
    }, 3000);
  }
  autoChangeImage();
  updateBackground();
});
