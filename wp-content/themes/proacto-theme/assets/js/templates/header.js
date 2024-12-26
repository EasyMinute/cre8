const header = document.querySelector('#header');
if (header) {
    const headerParents = header.querySelectorAll('.menu-item-has-children');
    headerParents.forEach(elem => {
        if (window.innerWidth > 980) {
            elem.addEventListener('mouseover', function (e) {
                e.preventDefault();
                this.classList.add('opened');
            });
            elem.addEventListener('mouseout', function (e) {
                e.preventDefault();
                this.classList.remove('opened');
            });
        } else {
            elem.addEventListener('click', function (e) {
                const link = this.querySelector('a');

                // Prevent default only if there's no immediate navigation
                if (!this.classList.contains('opened')) {
                    e.preventDefault();
                    this.classList.toggle('opened');
                }
            });
        }
    });
}


// Function to update the --vh custom property
function setVh() {
    // Calculate the actual height of the viewport
    const vh = window.innerHeight * 0.01;
    // Set the custom property --vh for usage in CSS
    document.documentElement.style.setProperty('--vh', `${vh}vh`);
}

// Update on initial load
setVh();

// Update on resize
window.addEventListener('resize', setVh);

