import lightGallery from 'lightgallery';
import lgThumbnail from 'lightgallery/plugins/thumbnail'
import lgZoom from 'lightgallery/plugins/zoom'
import 'lightgallery/css/lightgallery-bundle.css'; // Core lightGallery styles
import 'lightgallery/css/lg-thumbnail.css'; // Thumbnail plugin styles
import 'lightgallery/css/lg-zoom.css'; // Zoom plugin styles
lightGallery(document.getElementById('projects_masonry__grid'), {
    plugins: [lgZoom, lgThumbnail],
    speed: 500,
    licenseKey: '000'
});

document.addEventListener('projectsLoaded', function (e) {
    lightGallery(document.getElementById('projects_masonry__grid'), {
        plugins: [lgZoom, lgThumbnail],
        speed: 500,
        licenseKey: '000'
    });
});