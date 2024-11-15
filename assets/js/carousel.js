let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-slide');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

$("#prevSlice").click(function (e) { 
    e.preventDefault();
    prevSlide();
});

$('#nextSlide').click(function(e) {
    nextSlide();
})

setInterval(nextSlide, 5000); // Slide changes every 5 seconds
