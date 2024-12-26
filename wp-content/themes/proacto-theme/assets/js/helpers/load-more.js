document.addEventListener("DOMContentLoaded", function() {
    // The URL to send the AJAX request to (from localized script)
    var ajaxUrl = proacto_ajax.ajax_url;
    var page = 2; // Start with page 2 (the first page is already loaded)

    // Get the "Load More" button and the container where the projects are appended
    var loadMoreButton = document.getElementById("projects-section-more");
    var projectsContainer = document.getElementById("projects-section-container");

    if (loadMoreButton) {
        var perPage = loadMoreButton.dataset.per_page;
        // Event listener for the "Load More" button click
        loadMoreButton.addEventListener("click", function (e) {
            e.preventDefault();

            // Create a new AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open("POST", ajaxUrl, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Define what happens when the response is ready
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Check if there is any response (posts to append)
                    if (xhr.responseText.trim() !== "") {
                        console.log(xhr.responseText)
                        projectsContainer.insertAdjacentHTML('beforeend', xhr.responseText); // Append the new posts
                        page++; // Increment the page count for the next request
                    } else {
                        // If no more posts, hide the "Load More" button
                        loadMoreButton.style.display = "none";
                    }
                } else {
                    console.error("An error occurred while loading more projects.");
                }
            };

            // Define the data to be sent in the request
            var params = "action=load_more_projects&page=" + page + "&posts_per_page=" + perPage ;

            // Send the AJAX request
            xhr.send(params);
        });
    }

    let loadMoreMasonryButton = document.getElementById('load-more-masonry');

    if (loadMoreMasonryButton) {
        loadMoreMasonryButton.addEventListener('click', function () {

            let paged = parseInt(loadMoreMasonryButton.getAttribute('data-current-page')) + 1;
            console.log('paged', paged)
            let term = loadMoreMasonryButton.getAttribute('data-term');

            // Create a new AJAX request
            const xhr = new XMLHttpRequest();

            xhr.open('POST', proacto_ajax.ajax_url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 400) {
                    let response = xhr.responseText;
                    console.log('response', response)
                    // let response = JSON.parse(xhr.responseText);
                    let jsonStartIndex = response.lastIndexOf('{');
                    let front = response.substring(0, jsonStartIndex).trim(); // The HTML part
                    let jsonString = response.substring(jsonStartIndex).trim(); // The JSON part

                    // Parse the JSON part
                    let resp = JSON.parse(jsonString);

                    const event = new CustomEvent('projectsLoaded');
                    document.dispatchEvent(event);

                    // Append the new projects to the grid
                    document.querySelector('.projects_masonry__grid').insertAdjacentHTML('beforeend', front);

                    // Update the current page number
                    loadMoreMasonryButton.setAttribute('data-current-page', paged);

                    // Check if no more projects are returned
                    if (resp.status === 'no_more') {
                        loadMoreMasonryButton.style.display = 'none'; // Hide button if no more posts
                    }
                }
            };

            // Send the AJAX request with the current page and term filter
            xhr.send('action=load_more_projects_masonry&paged=' + paged + '&term_slug=' + term);
        });
    }

});


