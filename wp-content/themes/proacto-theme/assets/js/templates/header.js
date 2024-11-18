const header = document.querySelector('#header')
if (header) {
    const headerParents = header.querySelectorAll('.menu-item-has-children > a');
    headerParents.forEach(elem => {
       elem.addEventListener('click', function(e) {
           console.log('elem', elem)
           e.preventDefault();
           this.parentElement.classList.toggle('opened');
       })
    });
}


