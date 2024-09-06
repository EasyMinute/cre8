const buttonOpeners = document.querySelectorAll('.button-opener')
if (buttonOpeners) {
    buttonOpeners.forEach(opener => {
        opener.addEventListener('click', function(e) {
            e.preventDefault();
            let target = this.dataset.target
            let action = this.dataset.action
            let self   = this.dataset.self
            const targetElem = document.getElementById(target)

            if (action === 'toggle') {
                targetElem.classList.toggle('opened')
            } else if (action === 'remove') {
                targetElem.classList.remove('opened')
            } else {
                targetElem.classList.add('opened')
            }

            if (self === 'true') {
                if (action === 'toggle') {
                    this.classList.toggle('opened')
                } else if (action === 'remove') {
                    this.classList.remove('opened')
                } else {
                    this.classList.add('opened')
                }
            }
        })
    })
}

const tabbers = document.querySelectorAll('.tabber')
if (tabbers) {
    tabbers.forEach(tabber => {
        tabber.addEventListener('click', function(e) {
            e.preventDefault();

            let on = this.dataset.on
            let all = this.dataset.all

            const allElems = document.querySelectorAll('.' + all)
            const onElem = document.getElementById(on)

            if (allElems) {
                allElems.forEach(elem => {
                    elem.classList.remove('active')
                })
            }

            if (onElem) {
                onElem.classList.add('active')
            }

            tabbers.forEach(tabber => {
                tabber.classList.remove('active')
            })

            this.classList.add('active')
        })
    })
}
