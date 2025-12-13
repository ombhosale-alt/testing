window.addEventListener('DOMContentLoaded', function () {
    const navbar = document.querySelector('.navbar');
    const logoWhite = document.getElementById('logo-white');
    const logoColor = document.getElementById('logo-color');
    const isScrolledPage = document.body.classList.contains('scrolled-page');

    if (isScrolledPage || window.scrollY > 0) {
        navbar.classList.add('scrolled');
        logoWhite.classList.add('hide-logo');
        logoWhite.classList.remove('show-logo');
        logoColor.classList.remove('hide-logo');
        logoColor.classList.add('show-logo');
    }

    window.addEventListener('scroll', function () {
        if (window.scrollY > 0) {
            navbar.classList.add('scrolled');
            logoWhite.classList.add('hide-logo');
            logoWhite.classList.remove('show-logo');
            logoColor.classList.remove('hide-logo');
            logoColor.classList.add('show-logo');
        } else if (!isScrolledPage) {
            navbar.classList.remove('scrolled');
            logoWhite.classList.remove('hide-logo');
            logoWhite.classList.add('show-logo');
            logoColor.classList.add('hide-logo');
            logoColor.classList.remove('show-logo');
        }
    });
});



const counters = document.querySelectorAll('.count');
counters.forEach(counter => {
    counter.innerText = '0';
    const updateCounter = () => {
        const target = +counter.getAttribute('data-target');
        const current = +counter.innerText;
        const increment = target / 100;

        if (current < target) {
            counter.innerText = `${Math.ceil(current + increment)}`;
            setTimeout(updateCounter, 20);
        } else {
            counter.innerText = target;
        }
    };
    updateCounter();
});

$(document).ready(function () {
    $(".meet-our-team-carousel").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        margin: 20,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });
});
