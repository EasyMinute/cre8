document.addEventListener('DOMContentLoaded', function () {
    const numberElements = document.querySelectorAll('.infonumber_card .title');

    function animateCount(element, start, end, duration, suffix, decimalPart) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            // Animate only the whole number part
            element.textContent = Math.floor(progress * (end - start) + start);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            } else {
                // After the animation ends, attach the decimals and suffix
                element.textContent += decimalPart.trim() + suffix.trim();
            }
        };
        window.requestAnimationFrame(step);
    }

    function getNumberAndSuffix(value) {
        const numberPart = parseFloat(value); // Extract the numeric part
        const decimalPart = value.includes('.') ? value.split('.')[1] : ''; // Get the decimal part
        let suffix = '';
        if (decimalPart) {
            suffix = ''
        } else {
            suffix = value.replace(/[0-9.]/g, ''); // Extract the suffix part (K, M, etc.)
        }
        return {
            number: Math.floor(numberPart), // Use only the whole number for counting
            suffix: suffix,
            decimalPart: decimalPart ? '.' + decimalPart : '' // Add the decimal point back if necessary
        };
    }

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const numberElement = entry.target;
                const { number, suffix, decimalPart } = getNumberAndSuffix(numberElement.textContent);
                animateCount(numberElement, 0, number, 2000, suffix, decimalPart);
                observer.unobserve(numberElement); // Stop observing after animation
            }
        });
    }, {
        threshold: 0.5 // Trigger when 50% of the element is visible
    });

    numberElements.forEach((el) => {
        observer.observe(el);
    });
});
