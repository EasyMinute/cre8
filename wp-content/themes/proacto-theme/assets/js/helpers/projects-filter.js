document.addEventListener('DOMContentLoaded', function () {
    // Listen for clicks on the filter buttons
    const filterButtons = document.querySelectorAll('.projects_masonry__filter__wrap .filter-button');

    if (window.location.hash) {
        let hash = window.location.hash.substring(1); // Remove the "#" from the hash
        filterButtons.forEach(button => {
            // Get the href attribute of the button, removing the '#' from it
            const buttonHash = button.getAttribute('href').substring(1);

            // Compare the button's href hash with the current URL hash
            if (buttonHash === hash) {
                button.classList.add('active'); // Add the 'active' class if it matches
            } else {
                button.classList.remove('active'); // Remove the 'active' class if it doesn't match
            }
        });
        filterProjectsByTechnology(hash); // Trigger AJAX filtering based on the hash
        const scrollToSection = document.querySelector('.projects_masonry');

        if (scrollToSection) {
            // Smooth scroll to the section
            scrollToSection.scrollIntoView({
                behavior: 'smooth', // Smooth scrolling
                block: 'start',     // Align the top of the section to the top of the screen
            });
        }
    }

    filterButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            filterButtons.forEach(elem => {
                if (elem === button) {
                    elem.classList.add('active')
                } else {
                    elem.classList.remove('active')
                }
            })
            e.preventDefault();
            let selectedTechnology = this.getAttribute('href').replace('#', '');

            // Update URL hash
            window.location.hash = selectedTechnology;

            filterProjectsByTechnology(selectedTechnology)

        });
    });

    const filterTriggers = document.querySelectorAll('.filter-trigger')
    filterTriggers.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            let selectedTechnology = this.getAttribute('href').replace('#', '');

            filterButtons.forEach(butt => {
                if (butt.getAttribute('href') === button.getAttribute('href')){
                    butt.classList.add('active')
                } else {
                    butt.classList.remove('active')
                }
            })

            // Update URL hash
            window.location.hash = selectedTechnology;

            filterProjectsByTechnology(selectedTechnology)
            const scrollToSection = document.querySelector('.projects_masonry');

            if (scrollToSection) {
                // Smooth scroll to the section
                scrollToSection.scrollIntoView({
                    behavior: 'smooth', // Smooth scrolling
                    block: 'start',     // Align the top of the section to the top of the screen
                });
            }

        });
    });

});


function filterProjectsByTechnology(selectedTechnology) {
    // Create a new XMLHttpRequest
    let xhr = new XMLHttpRequest();
    var ajaxUrl = proacto_ajax.ajax_url;
    let url = ajaxUrl + '?action=filter_projects&technology=' + encodeURIComponent(selectedTechnology);

    // Open a GET request
    xhr.open('GET', url, true);

    // Optional: Set up a loading indicator
    const grid = document.getElementById('projects_masonry__grid');
    grid.innerHTML = '<p>Loading...</p>';

    // When the request is complete
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {

            let response = xhr.responseText;
            let jsonStartIndex = response.lastIndexOf('{');
            let front = response.substring(0, jsonStartIndex).trim(); // The HTML part
            let jsonString = response.substring(jsonStartIndex).trim(); // The JSON part

            // Parse the JSON part
            let resp = JSON.parse(jsonString);
            grid.innerHTML = front;

            const event = new CustomEvent('projectsLoaded');
            document.dispatchEvent(event);

            // Update the "Show more" button state if needed
            const loadMoreButton = document.getElementById('load-more-masonry');
            if (loadMoreButton) {
                loadMoreButton.setAttribute('data-current-page', 1); // Reset page count
                loadMoreButton.setAttribute('data-term', selectedTechnology);

                if (resp.status === 'no_more') {
                    loadMoreButton.style.display = 'none'; // Hide button if no more posts
                } else {
                    loadMoreButton.style.display = 'block'; // Show button if more posts
                }
            }
        } else {
            grid.innerHTML = '<p>Error loading projects.</p>';
        }
    };

    // Handle request errors
    xhr.onerror = function () {
        grid.innerHTML = '<p>Error loading projects.</p>';
    };

    // Send the request
    xhr.send();
}