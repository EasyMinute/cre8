const header = document.querySelector('#header')
if (header) {
    const headerParents = header.querySelectorAll('.menu-item-has-children');
    headerParents.forEach(elem => {
        if(window.innerWidth > 980) {
            elem.addEventListener('mouseover', function (e) {
                e.preventDefault();
                this.classList.add('opened');
            })
            elem.addEventListener('mouseout', function (e) {
                e.preventDefault();
                this.classList.remove('opened');
            })
        } else {
            elem.addEventListener('click', function (e) {
                e.preventDefault();
                this.classList.toggle('opened');
            })
        }
    });
}


