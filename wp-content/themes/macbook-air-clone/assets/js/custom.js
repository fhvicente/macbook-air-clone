document.addEventListener("DOMContentLoaded", function() {
    AOS.init({
        duration: 1200,
        once: true,
    });

    // Sticky navbar on scroll
    const stickyNav = document.getElementById("sticky-navbar");
    
    if (stickyNav) {
        // Inicialmente oculto com transform
        stickyNav.style.display = "flex";
        stickyNav.style.transform = "translateY(calc(var(--r-localnav-height) * -1))";
        
        window.addEventListener("scroll", function () {
            if (window.scrollY > 100) {
                stickyNav.style.transform = "translateY(0)";
            } else {
                stickyNav.style.transform = "translateY(calc(var(--r-localnav-height) * -1))";
            }
        });
    }
    
    // Tabs functionality
    const tabItems = document.querySelectorAll('.tab-item');
    
    if (tabItems.length > 0) {
        tabItems.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                tabItems.forEach(item => {
                    item.classList.remove('active');
                });
                
                // Add active class to clicked tab
                this.classList.add('active');
                
                // Hide all tab panes
                const tabPanes = document.querySelectorAll('.tab-pane');
                tabPanes.forEach(pane => {
                    pane.classList.remove('active');
                });
                
                // Show the corresponding tab pane
                const tabId = this.getAttribute('data-tab');
                const activePane = document.getElementById(tabId);
                if (activePane) {
                    activePane.classList.add('active');
                }
            });
        });
    }
    
    // // Apple menu hover effect
    // const navItems = document.querySelectorAll('.first-navbar li a');
    
    // navItems.forEach(item => {
    //     item.addEventListener('mouseenter', function() {
    //         navItems.forEach(navItem => {
    //             if (navItem !== this) {
    //                 navItem.style.opacity = '0.65';
    //             }
    //         });
    //     });
        
    //     item.addEventListener('mouseleave', function() {
    //         navItems.forEach(navItem => {
    //             navItem.style.opacity = '0.8';
    //         });
    //     });
    // });
});

// Slider
let slideIndex = 0;

function moveSlide(step) {
    const slides = document.querySelectorAll('.slider-images img');
    if (!slides || slides.length === 0) return;
    
    const totalSlides = slides.length;

    // Remove 'active' current image
    slides[slideIndex].classList.remove('active');

    // Update slide index
    slideIndex = (slideIndex + step + totalSlides) % totalSlides;

    // Add 'active' to new image
    slides[slideIndex].classList.add('active');
    
    // Update caption
    updateCaption(slides[slideIndex]);
}

function updateCaption(activeSlide) {
    const caption = document.getElementById('slide-caption');
    if (caption && activeSlide.dataset.caption) {
        caption.innerHTML = activeSlide.dataset.caption;
    }
}

// Add event to buttons
document.addEventListener("DOMContentLoaded", function() {
    const nextButton = document.querySelector('.next');
    const prevButton = document.querySelector('.prev');
    const slides = document.querySelectorAll('.slider-images img');
    
    if (nextButton && prevButton && slides.length > 0) {
        nextButton.addEventListener('click', () => moveSlide(1));
        prevButton.addEventListener('click', () => moveSlide(-1));
        
        // Init first image as active
        slides[0].classList.add('active');
        updateCaption(slides[0]);
    }
});

