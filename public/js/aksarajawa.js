function changeText(icon) {
    // Replace the text based on the clicked icon
    var text = "";
    switch (icon) {
        case 'mountain':
            text = "Pesona Alam yang Memukau";
            break;
        case 'shoe':
            text = "Kehidupan Budaya Autentik";
            break;
        case 'wheat':
            text = "Pengalaman Pertanian yang Menyenangkan";
            break;
        case 'paintbrush':
            text = "Kreativitas dan Seni Tradisional";
            break;
        case 'hiking':
            text = "Petualangan Alam yang Saru";
            break;
        case 'utensils':
            text = "Kuliner Tradisional yang Menggugah Selera";
            break;
        default:
            text = "Apa yang membuat kita berbeda?";
    }
    document.getElementById("middleText").innerHTML = "<h4>" + text + "</h4>";
}

const multipleItemCarousel = document.querySelector("#testimonialCarousel");

if (window.matchMedia("(min-width:576px)").matches) {
    const carousel = new bootstrap.Carousel(multipleItemCarousel, {
        interval: false,
    });

    const carouselInner = document.querySelector("#testimonialCarousel .carousel-inner");
    const carouselWidth = carouselInner.scrollWidth;
    const cardWidth = document.querySelector("#testimonialCarousel .carousel-item").offsetWidth;

    let scrollPosition = 0;

    document.querySelector("#testimonialCarousel .carousel-control-next").addEventListener("click", function () {
        if (scrollPosition < carouselWidth - cardWidth * 3) {
            console.log("next");
            scrollPosition = scrollPosition + cardWidth;
            carouselInner.scrollTo({
                left: scrollPosition,
                behavior: "smooth"
            });
        }
    });

    document.querySelector("#testimonialCarousel .carousel-control-prev").addEventListener("click", function () {
        if (scrollPosition > 0) {
            scrollPosition = scrollPosition - cardWidth;
            carouselInner.scrollTo({
                left: scrollPosition,
                behavior: "smooth"
            });
        }
    });
} else {
    multipleItemCarousel.classList.add("slide");
}

 //event listener for button
 document.addEventListener('DOMContentLoaded', function() {
    var pageTitle = document.title; // Get the title of the webpage

    var buttons = document.querySelectorAll('.btn.nav');

    buttons.forEach(function(button) {
        // Extract button text content and remove leading/trailing whitespace
        var buttonText = button.textContent.trim();

        // Compare page title with button text content
        if (buttonText === pageTitle) {
            button.classList.add('active'); // Add active class to button whose text matches page title
        }

    });
});

//fixed-navbar check
document.addEventListener('DOMContentLoaded', function() {
    const slideshow = document.querySelector('.slide-show');  //(.slide show) sesuaikan dengan elemen yang kamu ingin jadikan patokan , in this case div class="slide-show"
    const navbar = document.querySelector('.nav-bar');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {             // jika viewport gk intersect dengan  elemen yang di tuju maka nav-bar jadi fixed, jika viewport intersect maka navbar balik normal
                navbar.classList.remove('active');
            } else {
                navbar.classList.add('active');
            }
        });
    });

    observer.observe(slideshow);
});

// <!-- Script to handle scrolling -->
    function scrollToAnchor() {
        // Get the viewport dimensions
        const viewportWidth = window.innerWidth;

        // Check if viewport width is under 789 pixels
        if (viewportWidth < 768) {
            // Get the target element by its ID
            const targetElement = document.getElementById('target');

            // Scroll to the target element
            targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else {
            console.log('Viewport width is greater than or equal to 789 pixels. Scroll not triggered.');
        }
    }

