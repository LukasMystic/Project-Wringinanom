//event listener for button
document.addEventListener('DOMContentLoaded', function() {
    var pageTitle = document.title; // Get the title of the webpage
    
    var buttons = document.querySelectorAll('#bambang');
    
    buttons.forEach(function(button) {
        // Extract button text content and remove leading/trailing whitespace
        var buttonText = button.textContent.trim();
        
        // Compare page title with button text content
        if (buttonText === pageTitle) {
            button.classList.add('active'); // Add active class to button whose text matches page title
        }

    });
});


//event listener for footer
document.addEventListener('DOMContentLoaded', function() {
    const submenuItems = document.querySelectorAll('.submenu-sitemap li');

    submenuItems.forEach(function(item) {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            const targetPage = this.textContent.toLowerCase().replace(/\s+/g, ''); // Get the target page name without spaces

            if (window.location.pathname === `/${targetPage}.html`) {
                // If already on the correct page, scroll to the top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                // If not on the correct page, navigate to the specified page
                window.location.href = `${targetPage}.html`;
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const goUpBtn = document.getElementById('goUpBtn');

    // Function to toggle the visibility of the "go up" button
    function toggleGoUpButton() {
        if (window.scrollY > window.innerHeight / 2) {
            goUpBtn.style.display = 'block';
        } else {
            goUpBtn.style.display = 'none';
        }
    }

    // Listen for scroll events and toggle the button visibility
    window.addEventListener('scroll', toggleGoUpButton);

    // Smooth scroll to the top when the button is clicked
    goUpBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

