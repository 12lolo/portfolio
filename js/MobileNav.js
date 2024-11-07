document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.querySelector('.hamburger');
    const navHeader = document.querySelector('.nav-header');
    const navMenu = document.querySelector('nav');
    const navLinks = document.querySelectorAll('nav ul li a');
    const logo = document.querySelector('.logo');

    function openMenu() {
        hamburger.classList.add('is-active');
        navHeader.classList.add('menu-open');
    }

    function closeMenu() {
        hamburger.classList.remove('is-active');
        navHeader.classList.remove('menu-open');
    }

    hamburger.addEventListener('click', function (event) {
        event.stopPropagation();
        if (navHeader.classList.contains('menu-open')) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    navLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // Close menu when clicking outside
    document.addEventListener('click', function (event) {
        const isClickInsideNav = navMenu.contains(event.target);
        const isClickOnHamburger = hamburger.contains(event.target);

        if (!isClickInsideNav && !isClickOnHamburger && navHeader.classList.contains('menu-open')) {
            closeMenu();
        }
    });

    // Prevent clicks inside the nav from closing the menu
    navMenu.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    // Scroll Spy Functionality
    function updateNavStyles() {
        const scrollPosition = window.scrollY;
        const viewportHeight = window.innerHeight;
        const scrollThreshold = viewportHeight * 0.95; // 95% of viewport height

        if (scrollPosition > scrollThreshold) {
            navHeader.classList.add('scrolled');
            logo.classList.add('scrolled');
            navLinks.forEach(link => link.classList.add('scrolled'));
        } else {
            navHeader.classList.remove('scrolled');
            logo.classList.remove('scrolled');
            navLinks.forEach(link => link.classList.remove('scrolled'));
        }
    }

    // Add scroll event listener
    window.addEventListener('scroll', updateNavStyles);

    // Initial call to set styles correctly on page load
    updateNavStyles();
});