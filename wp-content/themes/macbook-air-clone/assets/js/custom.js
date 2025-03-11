document.addEventListener("DOMContentLoaded", function() {
    AOS.init({
        duration: 1200,
        once: true,
    });

    // Change header background on scroll
    const header = document.querySelector(".sticky-navbar");

    if (header) {
        window.addEventListener("scroll", function () {
            if (window.scrollY > 100) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
    }
});



// Slider
let slideIndex = 0;

function moveSlide(step) {
    const slides = document.querySelectorAll('.slider-images img');
    const totalSlides = slides.length;

    // Remove 'active' current image
    slides[slideIndex].classList.remove('active');

    // Update slide index
    slideIndex = (slideIndex + step + totalSlides) % totalSlides;

    // Add 'active' to new image
    slides[slideIndex].classList.add('active');
}

// Add event to buttons
document.querySelector('.next').addEventListener('click', () => moveSlide(1));
document.querySelector('.prev').addEventListener('click', () => moveSlide(-1));

// Init first image as active
document.querySelectorAll('.slider-images img')[0].classList.add('active');

