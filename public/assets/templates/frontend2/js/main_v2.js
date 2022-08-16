(function () {
    "use strict";

    /*------------------------------------------------------------------

      01. Custom easings

    -------------------------------------------------------------------*/

    // GSAP: turn off console warnings
    gsap.config({
        nullTargetWarn: false
    });

    window.App = {};

    App.config = {
        headroom: {
            enabled: true,
            options: {
                classes: {
                    initial: "headroom",
                    pinned: "is-pinned",
                    unpinned: "is-unpinned",
                    top: "is-top",
                    notTop: "is-not-top",
                    bottom: "is-bottom",
                    notBottom: "is-not-bottom",
                    frozen: "is-frozen",
                },
            }
        },
        ajax: {
            enabled: true,
        },
        cursorFollower: {
            enabled: false,
            disableBreakpoint: '992', // cursor will be disabled on this device width
        },
    }

    App.html = document.querySelector('html');
    App.body = document.querySelector('body');
    App.SMcontroller = new ScrollMagic.Controller();

    window.onload = function () {
        customEasingsInit();
        // Preloader.init();

        document.fonts.ready.then(function () {
            initComponents()
            initialReveal()
        });
    }


    // Reloads all scripts when navigating through pages
    function initComponents() {
        lazyLoading()
        Header.init()
        Accordion.init()
        ShowMore.init()
        Tabs.init()

        SectionSlider()
        feather.replace()
        // PJAX.init()

        countDown()
        headerSticky()
        dropDown()
        shopSlider()
        inputCounter()
        mapInit()
        lineChart()
        pieChart()
        clickElToggle()
        fullScreenModeToggle()
        parallaxIt()
        mainSlider1()
        parallaxInit()
        testimonialsSlider()
        testimonialsSlider2()
        home1MastheadParticles()
        pinOnScroll()
        scrollToIdInit()
        customSelect()
        hideSidebar()
        darkModeSwitch()
        calendarDate()
        dashboardSidebarSwitch()
        detectWidthForSidebar()
        galleryInit()

        //
        // your custom plugins init here
        //
    }

    function detectWidthForSidebar() {
        if (!document.querySelector('.js-dashboard-home-9')) return

        const check = () => {
            let width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

            if (width < 992)
                document.querySelector('.js-dashboard-home-9').classList.add('-is-sidebar-hidden')
            else
                document.querySelector('.js-dashboard-home-9').classList.remove('-is-sidebar-hidden')
        }

        check()
        window.addEventListener('resize', () => check())
    }

    function dashboardSidebarSwitch() {
        const target = document.querySelector('.js-dsbh-sidebar-menu')
        if (!target) return

        const buttons = target.querySelectorAll('[data-sidebar-menu-target]')

        buttons.forEach(el => {
            el.addEventListener('click', () => {
                const attr = el.getAttribute('data-sidebar-menu-target')
                const openMenu = target.querySelector(`[data-sidebar-menu-open="${attr}"]`)
                const openedMenu = target.querySelector('.-sidebar-menu-opened')
                openedMenu.classList.remove('-sidebar-menu-opened')
                openMenu.classList.add('-sidebar-menu-opened')

                const openButton = target.querySelector(`[data-sidebar-menu-button="${attr}"]`)
                const openedButton = target.querySelector('.-is-button-active')
                openedButton.classList.remove('-is-button-active')
                openButton.classList.add('-is-button-active')
            })
        })
    }

    function calendarDate() {
        const target = document.querySelector('.js-sidebar-calendar')
        if (!target) return;

        const buttons = target.querySelectorAll('.js-button')

        buttons.forEach(el => {
            el.addEventListener('click', () => {
                const activeButton = target.querySelector('.-is-active')
                activeButton.classList.remove('-is-active')
                el.classList.add('-is-active')
            })
        })
    }

    function darkModeSwitch() {
        const button = document.querySelector('.js-darkmode-toggle')
        if (!button) return;
        button.addEventListener('click', () => App.html.classList.toggle('-dark-mode'))
    }

    function hideSidebar() {
        const target = document.querySelector('.js-dashboard-home-9-sidebar-toggle')
        if (!target) return

        const content = document.querySelector('.js-dashboard-home-9')

        target.addEventListener('click', () => {
            content.classList.toggle('-is-sidebar-hidden')
        })
    }

    function pinOnScroll() {
        const target = document.querySelectorAll('.js-pin-container');
        if (!target) return;

        target.forEach(el => {
            const sceneDuration = el.offsetHeight;
            const sceneOffset = el.querySelector('.js-pin-content').offsetHeight + 70;

            const scene = new ScrollMagic.Scene({
                duration: sceneDuration - sceneOffset,
                offset: sceneOffset,
                triggerElement: el,
                triggerHook: "onEnter",
            })
                .setPin(".js-pin-content")
                .addTo(App.SMcontroller)

            let width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

            if (width < 992) {
                scene.duration('1px')
                scene.refresh()
            } else {
                scene.duration(sceneDuration - sceneOffset)
                scene.refresh()
            }

            window.addEventListener('resize', () => {
                let width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

                if (width < 992) {
                    scene.duration('1px');
                    scene.refresh();
                } else {
                    scene.duration(sceneDuration - sceneOffset);
                    scene.refresh();
                }
            })
        });
    }

    function home1MastheadParticles() {
        const target = document.querySelector('#js-masthead-1-particles');
        if (!target) return;

        particlesJS("js-masthead-1-particles", {
            "particles": {
                "number": {
                    "value": 20,
                    "density": {
                        "enable": false,
                        "value_area": 200
                    }
                },
                "color": {
                    "value": ["#00ff96", "#0044EB", "#1A3454"]
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 6,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 20,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": false,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "bounce",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": false,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": false,
                        "mode": "push"
                    },
                    "resize": false
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    }


    function mainSlider1() {
        new Swiper('.js-mainSlider', {
            speed: 800,
            parallax: true,
            lazy: {
                loadPrevNext: true,
            },
            navigation: {
                prevEl: '.js-prev',
                nextEl: '.js-next',
            },
        });
    }

    function testimonialsSlider2() {
        new Swiper('.js-testimonials-slider-2', {
            speed: 800,
            effect: "cards",
            cardsEffect: {
                slideShadows: true,
            },
            grabCursor: true,
            lazy: {
                loadPrevNext: true,
            },
            navigation: {
                prevEl: '.js-prev',
                nextEl: '.js-next',
            },
            pagination: {
                el: '.js-pagination',
                bulletClass: 'pagination__item',
                bulletActiveClass: 'is-active',
                bulletElement: 'div',
                clickable: true
            }
        });
    }


    function testimonialsSlider() {
        const slider = new Swiper('.js-testimonials-slider', {
            speed: 700,
            loop: true,
            lazy: {
                loadPrevNext: true,
            },
        })

        const paginationItems = document.querySelectorAll('.js-testimonials-slider .js-testimonials-pagination > * > *')

        paginationItems.forEach((el, i) => {
            el.addEventListener('click', () => {
                document
                    .querySelector('.js-testimonials-slider .js-testimonials-pagination .is-active')
                    .classList.remove('is-active')
                el.classList.add('is-active')
                slider.slideTo(i + 1)
            })
        })

        slider.on('slideChangeTransitionEnd', () => {
            document
                .querySelector('.js-testimonials-slider .js-testimonials-pagination .is-active')
                .classList.remove('is-active')
            paginationItems[slider.realIndex].classList.add('is-active')
        })
    }


    function parallaxIt() {
        const target = document.querySelectorAll('.js-mouse-move-container')

        target.forEach(container => {
            const $this = container
            const targets = container.querySelectorAll('.js-mouse-move')

            targets.forEach(el => {
                const movement = el.getAttribute('data-move')

                document.addEventListener('mousemove', (e) => {
                    const relX = e.pageX - $this.offsetLeft
                    const relY = e.pageY - $this.offsetTop

                    gsap.to(el, {
                        x: (relX - $this.offsetWidth / 2) / $this.offsetWidth * movement,
                        y: (relY - $this.offsetHeight / 2) / $this.offsetHeight * movement,
                        duration: 0.2,
                    })
                })
            })
        })
    }


    function lineChart() {
        const ctx = document.getElementById('lineChart');
        if (!ctx) return;

        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Jan', 'Feb', 'Marc', 'April', 'May', 'Jun', 'July', 'Agust', 'Sept', 'Oct', 'Now', 'Dec',
                ],
                datasets: [{
                    label: '#',
                    data: [148, 100, 205, 110, 165, 145, 180, 156, 148, 220, 180, 245],
                    tension: 0.4,
                    backgroundColor: '#336CFB',
                    borderColor: '#336CFB',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        min: 0,
                        max: 300,
                        ticks: {
                            stepSize: 50
                        }
                    }
                },
            },
        });
    }

    function fullScreenModeToggle() {
        const documentElement = document.documentElement;
        const buttons = document.querySelectorAll('[data-maximize]')
        if (!buttons) return

        let state = false

        const closeFullscreen = () => {
            state = false
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) { /* Safari */
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) { /* IE11 */
                document.msExitFullscreen();
            }
        }

        const openFullscreen = () => {
            state = true
            if (documentElement.requestFullscreen) {
                documentElement.requestFullscreen();
            } else if (documentElement.webkitRequestFullscreen) { /* Safari */
                documentElement.webkitRequestFullscreen();
            } else if (documentElement.msRequestFullscreen) { /* IE11 */
                documentElement.msRequestFullscreen();
            }
        }

        buttons.forEach(el => {
            el.addEventListener('click', () => {
                if (!state) {
                    openFullscreen()
                } else {
                    closeFullscreen()
                }
            })
        })
    }

    function pieChart() {
        const ctx = document.getElementById('pieChart');
        if (!ctx) return;

        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Direct', 'Referal', 'Organic',],
                datasets: [{
                    label: '#',
                    data: [40, 28, 32],
                }]
            },
            options: {
                cutout: '75%',
                plugins: {
                    legend: {
                        position: 'left',
                    }
                },
                elements: {
                    arc: {
                        backgroundColor: '#336CFB',
                        hoverBackgroundColor: '#556CFB'
                    }
                }
            },
        })


        const getOrCreateLegendList = (chart, id) => {
            const legendContainer = document.getElementById(id);
            let listContainer = legendContainer.querySelector('ul');

            if (!listContainer) {
                listContainer = document.createElement('ul');
                listContainer.style.display = 'flex';
                listContainer.style.flexDirection = 'row';
                listContainer.style.margin = 0;
                listContainer.style.padding = 0;

                legendContainer.appendChild(listContainer);
            }

            return listContainer;
        };

        const htmlLegendPlugin = {
            id: 'htmlLegend',
            afterUpdate(chart, args, options) {
                const ul = getOrCreateLegendList(chart, options.containerID);

                // Remove old legend items
                while (ul.firstChild) {
                    ul.firstChild.remove();
                }

                // Reuse the built-in legendItems generator
                const items = chart.options.plugins.legend.labels.generateLabels(chart);

                items.forEach(item => {
                    const li = document.createElement('li');
                    li.style.alignItems = 'center';
                    li.style.cursor = 'pointer';
                    li.style.display = 'flex';
                    li.style.flexDirection = 'row';
                    li.style.marginLeft = '10px';

                    li.onclick = () => {
                        const { type } = chart.config;
                        if (type === 'pie' || type === 'doughnut') {
                            // Pie and doughnut charts only have a single dataset and visibility is per item
                            chart.toggleDataVisibility(item.index);
                        } else {
                            chart.setDatasetVisibility(item.datasetIndex, !chart.isDatasetVisible(item.datasetIndex));
                        }
                        chart.update();
                    };

                    // Color box
                    const boxSpan = document.createElement('span');
                    boxSpan.style.background = item.fillStyle;
                    boxSpan.style.borderColor = item.strokeStyle;
                    boxSpan.style.borderWidth = item.lineWidth + 'px';
                    boxSpan.style.display = 'inline-block';
                    boxSpan.style.height = '20px';
                    boxSpan.style.marginRight = '10px';
                    boxSpan.style.width = '20px';

                    // Text
                    const textContainer = document.createElement('p');
                    textContainer.style.color = item.fontColor;
                    textContainer.style.margin = 0;
                    textContainer.style.padding = 0;
                    textContainer.style.textDecoration = item.hidden ? 'line-through' : '';

                    const text = document.createTextNode(item.text);
                    textContainer.appendChild(text);

                    li.appendChild(boxSpan);
                    li.appendChild(textContainer);
                    ul.appendChild(li);
                });
            }
        };
    }

    function countDown() {
        const target = document.querySelector('.js-countdown')
        if (!target) return

        const countDownDate = new Date("Jan 5, 2023 15:37:25").getTime()

        setInterval(function () {
            const now = new Date().getTime();
            const distance = countDownDate - now

            const days = Math.floor(distance / (1000 * 60 * 60 * 24))
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
            const seconds = Math.floor((distance % (1000 * 60)) / 1000)

            target.querySelector('.js-countdown-days').innerHTML = days
            target.querySelector('.js-countdown-hours').innerHTML = hours
            target.querySelector('.js-countdown-minutes').innerHTML = minutes
            target.querySelector('.js-countdown-seconds').innerHTML = seconds
        }, 1000);
    }

    function headerSticky() {
        const header = document.querySelector('.js-header');
        if (!header) return;

        let classList = []

        if (header.getAttribute('data-add-bg')) {
            classList = header.getAttribute('data-add-bg')
        }

        const scene = new ScrollMagic.Scene({
            offset: '6px',
        })

        scene.setClassToggle(header, classList)

        scene.addTo(App.SMcontroller);
    }

    function clickElToggle() {
        const target = document.querySelectorAll('[data-el-toggle]')
        if (!target) return

        target.forEach(el => {
            const attr = el.getAttribute('data-el-toggle')
            const openElement = document.querySelector(attr)

            const attrActive = el.getAttribute('data-el-toggle-active')
            const activeElement = document.querySelector(attrActive)

            el.addEventListener('click', () => {
                const allDD = document.querySelectorAll('.js-click-dropdown.-is-el-visible')
                if (allDD) {
                    allDD.forEach((el) => el.classList.remove('-is-el-visible'))
                }

                const allActiveDD = document.querySelectorAll('.-is-dd-active')
                if (allActiveDD) {
                    allActiveDD.forEach((el) => el.classList.remove('-is-dd-active'))
                }

                openElement.classList.toggle('-is-el-visible')
                if (activeElement)
                    activeElement.classList.toggle('-is-dd-active')
            })
        });
    }

    function dropDown() {
        const target = document.querySelectorAll('.js-dropdown')
        if (!target) return;

        target.forEach(el => {
            const items = el.querySelectorAll('.js-dropdown-list .js-dropdown-link')
            const title = el.querySelector('.js-dropdown-title')

            items.forEach(el => {
                el.addEventListener('click', (e) => {
                    e.preventDefault()
                    title.innerHTML = el.innerHTML

                    const allDD = document.querySelectorAll('.js-click-dropdown.-is-el-visible')
                    if (allDD) {
                        allDD.forEach((el) => { el.classList.remove('-is-el-visible') })
                    }

                    const allActiveDD = document.querySelectorAll('.-is-dd-active')
                    if (allActiveDD) {
                        allActiveDD.forEach((el) => el.classList.remove('-is-dd-active'))
                    }
                })
            })
        })
    }

    window.onclick = function (event) {
        if (
            !event.target.classList.contains('dropdown__button') &&
            !event.target.classList.contains('js-dropdown-title')
        ) {
            const allDD = document.querySelectorAll('.js-click-dropdown.-is-el-visible')
            if (allDD) {
                allDD.forEach((el) => { el.classList.remove('-is-el-visible') })
            }

            const allActiveDD = document.querySelectorAll('.-is-dd-active')
            if (allActiveDD) {
                allActiveDD.forEach((el) => el.classList.remove('-is-dd-active'))
            }
        }
    }

    function shopSlider() {
        const slider = document.querySelector('.js-shop-slider .js-slider-slider');

        const sliderInstance = new Swiper(slider, {
            spaceBetween: 0,
            speed: 1000,
            parallax: true,
            lazy: {
                loadPrevNext: true,
            },
            breakpoints: {
                575: {
                    parallax: false,
                },
            },
        });

        const sliderPaginationItems = document.querySelectorAll('.js-shop-slider .js-slider-pagination > *');

        sliderInstance.on('slideChangeTransitionStart', function () {
            sliderPaginationItems[sliderInstance.activeIndex].classList.add('is-active');
        });

        for (let i = 0; i < sliderPaginationItems.length; i++) {
            const el = sliderPaginationItems[i];

            el.addEventListener('click', (e) => {
                sliderInstance.slideTo(i)
            })
        }
    }

    function inputCounter() {
        const target = document.querySelectorAll('.js-input-counter');
        if (!target) return;

        target.forEach(el => {
            const input = el.querySelector('input')
            var value = input.value;

            el.querySelector('.js-up').addEventListener('click', () => {
                input.focus();
                value = parseInt(value) + 1;
                input.value = value;
            })

            el.querySelector('.js-down').addEventListener('click', () => {
                input.focus();
                value = parseInt(value) - 1;
                value = value < 0 ? 0 : value;
                input.value = value;
            })
        });
    }

    function mapInit() {
        const target = document.querySelector("#map");
        if (!target) return;

        const map = L.map(target).setView([51.505, -0.09], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([51.5, -0.09]).addTo(map)
            .openPopup();
    }

    function customSelect() {
        const target = document.querySelectorAll(".js-selectize");
        if (!target) return;
        target.forEach(function (select) {
            NiceSelect.bind(select);
        });

        const target2 = document.querySelectorAll(".js-selectize-seachable");
        if (!target2) return;
        target2.forEach(function (select) {
            NiceSelect.bind(select, { searchable: true });
        });
    }

    function galleryInit() {
        GLightbox({
            selector: '.js-gallery',
            touchNavigation: true,
            loop: false,
            autoplayVideos: true,
        });
    }

    const Accordion = (function () {
        function init() {
            const targets = document.querySelectorAll(".js-accordion");
            if (!targets) return;

            for (let i = 0; i < targets.length; i++) {
                const items = targets[i].querySelectorAll('.accordion__item');

                for (let l = 0; l < items.length; l++) {
                    const button = items[l].querySelector('.accordion__button')
                    const content = items[l].querySelector('.accordion__content');

                    if (items[l].classList.contains('js-accordion-item-active')) {
                        items[l].classList.toggle('is-active')
                        content.style.maxHeight = content.scrollHeight + "px"
                    }

                    button.addEventListener("click", (e) => {
                        items[l].classList.toggle('is-active');

                        if (content.style.maxHeight) {
                            content.style.maxHeight = null
                        } else {
                            content.style.maxHeight = content.scrollHeight + "px"
                        }
                    })
                }
            }
        }

        return {
            init: init,
        }
    })();

    const ShowMore = (function () {
        function init() {
            const targets = document.querySelectorAll(".js-show-more");
            if (!targets) return;

            targets.forEach((el, i) => {
                const button = el.querySelector('.show-more__button')
                const content = el.querySelector('.show-more__content')

                button.addEventListener("click", (e) => {
                    el.classList.toggle('is-active')

                    if (content.style.maxHeight) {
                        content.style.maxHeight = null
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px"
                    }
                })
            })
        }

        return {
            init: init,
        }
    })();

    const Tabs = (function () {
        function init() {
            const targets = document.querySelectorAll(".js-tabs");
            if (!targets) return;

            targets.forEach(el => {
                singleTab(el)
            })
        }

        function singleTab(target) {
            const controls = target.querySelector('.js-tabs-controls');
            const controlsItems = target.querySelectorAll('.js-tabs-controls .js-tabs-button');
            const content = target.querySelector('.js-tabs-content');

            for (let l = 0; l < controlsItems.length; l++) {
                const el = controlsItems[l];

                el.addEventListener("click", (e) => {
                    const selector = el.getAttribute('data-tab-target');

                    controls.querySelector('.is-active').classList.remove('is-active')
                    content.querySelector('.is-active').classList.remove('is-active')

                    el.classList.add('is-active')
                    content.querySelector(selector).classList.add('is-active')
                });
            }
        }

        return {
            init: init,
        }
    })();
    /*--------------------------------------------------
      11. Lazy loading
    ---------------------------------------------------*/

    function lazyLoading() {
        if (!document.querySelector('.js-lazy')) {
            return;
        }

        new LazyLoad({
            elements_selector: ".js-lazy",
        });
    }

    /*--------------------------------------------------
      08. Section sliders
    ---------------------------------------------------*/

    function SectionSlider() {
        const sectionSlider = document.querySelectorAll('.js-section-slider');
        if (!sectionSlider.length) return;

        for (let i = 0; i < sectionSlider.length; i++) {
            const el = sectionSlider[i];

            let prevNavElement = el.querySelector('.js-prev')
            let nextNavElement = el.querySelector('.js-next')

            if (el.getAttribute('data-nav-prev'))
                prevNavElement = document.querySelector(`.${el.getAttribute('data-nav-prev')}`)
            if (el.getAttribute('data-nav-next'))
                nextNavElement = document.querySelector(`.${el.getAttribute('data-nav-next')}`)

            let gap = 0;
            let loop = false;
            let centered = false;
            let pagination = false;
            let scrollbar = false;

            if (el.getAttribute('data-gap')) gap = el.getAttribute('data-gap');
            if (el.hasAttribute('data-loop')) loop = true;
            if (el.hasAttribute('data-center')) centered = true;

            if (el.hasAttribute('data-pagination')) {
                let paginationElement = el.querySelector('.js-pagination')

                if (el.getAttribute('data-pagination'))
                    paginationElement = document.querySelector(`.${el.getAttribute('data-pagination')}`)

                pagination = {
                    el: paginationElement,
                    bulletClass: 'pagination__item',
                    bulletActiveClass: 'is-active',
                    bulletElement: 'div',
                    clickable: true
                }
            }

            if (el.hasAttribute('data-scrollbar')) {
                scrollbar = {
                    el: '.js-scrollbar',
                    draggable: false,
                }
            }

            const colsArray = el.getAttribute('data-slider-cols').split(' ');

            let cols_base = 1;
            let cols_xl = 1;
            let cols_lg = 1;
            let cols_md = 1;
            let cols_sm = 1;

            colsArray.forEach(el => {
                if (el.includes('base')) cols_base = el.slice(-1);
                if (el.includes('xl')) cols_xl = el.slice(-1);
                if (el.includes('lg')) cols_lg = el.slice(-1);
                if (el.includes('md')) cols_md = el.slice(-1);
                if (el.includes('sm')) cols_sm = el.slice(-1);
            });

            new Swiper(el, {
                speed: 600,
                autoHeight: true,
                spaceBetween: parseInt(gap),
                centeredSlides: centered,
                parallax: true,
                watchSlidesVisibility: true,
                loop: loop,
                loopAdditionalSlides: 1,
                preloadImages: false,
                lazy: true,

                scrollbar: scrollbar,
                pagination: pagination,

                slidesPerView: parseInt(cols_base),
                breakpoints: {
                    1199: { slidesPerView: parseInt(cols_xl) },
                    991: { slidesPerView: parseInt(cols_lg) },
                    767: { slidesPerView: parseInt(cols_md) },
                    574: { slidesPerView: parseInt(cols_sm) },
                },

                lazy: {
                    loadPrevNext: true,
                },
                navigation: {
                    prevEl: prevNavElement,
                    nextEl: nextNavElement,
                },
            });
        }
    }

    /*--------------------------------------------------
      01. Custom easings
    ---------------------------------------------------*/

    function customEasingsInit() {
        CustomEase.create("quart.out", "0.25, 1, 0.5, 1");
        CustomEase.create("quart.inOut", "0.76, 0, 0.24, 1");
    }

    /*--------------------------------------------------
      03. Header
    ---------------------------------------------------*/

    const Header = (function () {

        let menu;
        let mobileBg;
        let navList;
        let mobileFooter;
        let navListLinks;

        let navBtnOpen;
        let navBtnClose;
        let navBtnListBack;

        let menuDeepLevel;
        let timeline = gsap.timeline();

        function updateVars() {
            // menu = document.querySelector('.js-menu');
            // mobileBg = menu.querySelector('.js-mobile-bg');
            // mobileFooter = menu.querySelector('.js-mobile-footer');
            navList = document.querySelector('.js-navList');
            navListLinks = document.querySelectorAll('.js-navList > li > a');

            // navBtnOpen = document.querySelector('.js-nav-open');
            // navBtnClose = document.querySelector('.js-nav-close');
            navBtnListBack = document.querySelectorAll('.js-nav-list-back');
            menuDeepLevel = 0;
        }

        function init() {
            // if (!document.querySelector('.js-menu')) return
            updateVars()
            menuListBindEvents()
            // menuAnimBindEvents()
        }

        function deepLevelCheck(level) {
            return level;
        }

        function menuListBindEvents() {
            const listItems = document.querySelectorAll('.js-navList .menu-item-has-children');
            if (!listItems.length) return;

            navBtnListBack.forEach(el => {
                el.addEventListener('click', () => {
                    const visibleList = navList.querySelector('ul.-is-active');
                    const parentList = visibleList.parentElement.parentElement;

                    menuDeepLevel--;
                    menuListStepAnimate(visibleList, parentList, menuDeepLevel, parentList.parentElement.querySelector('li > a').innerHTML);
                })
            })

            listItems.forEach(el => {
                const parentLink = el.querySelector('li > a');
                parentLink.removeAttribute('href');

                parentLink.addEventListener('click', () => {
                    const parent = el.parentElement;
                    const subnavList = el.lastElementChild;
                    console.log(subnavList)

                    menuDeepLevel++;
                    menuListStepAnimate(parent, subnavList, menuDeepLevel, parentLink.innerHTML);
                });
            });
        }

        function menuListStepAnimate(hideList, showList, level) {

            let hideListItems = hideList.children;
            hideListItems = Array.from(hideListItems);
            const hideListLinks = hideListItems.map(item => item.querySelector('li > a'));

            let showListItems = showList.children;
            showListItems = Array.from(showListItems);
            const showListLinks = showListItems.map(item => item.querySelector('li > a'));

            let width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

            if (width < 1199) {
                timeline
                    .clear()

                if (!deepLevelCheck(level)) {
                    gsap.to(navBtnListBack, {
                        ease: "quart.inOut",
                        duration: 0.6,
                        opacity: 0,
                    })
                }

                timeline.to(hideListLinks, {
                    ease: 'quart.out',
                    stagger: -0.04,
                    duration: 0.8,
                    y: '100%',
                    onStart: () => {
                        showList.classList.add('-is-active');
                    },
                    onComplete: () => {
                        hideList.classList.remove('-is-active');
                    },
                })

                if (deepLevelCheck(level)) {
                    timeline.to(navBtnListBack, {
                        ease: "quart.inOut",
                        duration: 0.6,
                        y: '0px',
                        opacity: 1,
                    }, '>-0.5')
                }

                timeline.to(showListLinks, {
                    ease: 'quart.out',
                    stagger: 0.08,
                    duration: 0.9,
                    y: '0%',
                }, '>-0.6')
            }
        }

        function headerSticky() {
            const header = document.querySelector('.js-header');
            if (!header) return;

            let classList = 'is-sticky'

            if (header.getAttribute('data-add-bg')) {
                classList = header.getAttribute('data-add-bg')
                classList = `${classList} is-sticky`
            }

            new ScrollMagic.Scene({
                offset: '6px',
            })
                .setClassToggle(header, classList)
                .addTo(App.SMcontroller);
        }

        return {
            headerSticky: headerSticky,
            init: init,
        }

    })();

    /*--------------------------------------------------
      04. Page reveals
    ---------------------------------------------------*/

    const PageReveal = (function () {
        function base(tl) {
            tl.add(() => {
                RevealAnim.init()
            })
        }

        function init(tl) {
            base(tl)
            return tl
        }

        return {
            init: init,
        }
    })();


    function initialReveal(callback) {
        let tl = gsap.timeline()
        // tl.preloaderInitial()
        tl = PageReveal.init(tl)
    }

    /*--------------------------------------------------
      06. Elements reveal
    ---------------------------------------------------*/

    const RevealAnim = (function () {
        function single() {
            const animationTarget = document.querySelectorAll('[data-anim]');
            if (!animationTarget.length) return;

            for (let i = 0; i < animationTarget.length; i++) {
                const el = animationTarget[i];

                new ScrollMagic.Scene({
                    offset: '10px',
                    triggerElement: el,
                    triggerHook: "onEnter",
                    reverse: false,
                })
                    .on('enter', function (event) {
                        animateElement(el);
                    })
                    .addTo(App.SMcontroller)
            }
        }

        function container() {

            const animationContainer = document.querySelectorAll('[data-anim-wrap]');

            if (!animationContainer.length) {
                return;
            }

            for (let i = 0; i < animationContainer.length; i++) {
                const el = animationContainer[i];

                new ScrollMagic.Scene({
                    offset: '10px',
                    triggerElement: el,
                    triggerHook: "onEnter",
                    reverse: false,
                })
                    .on('enter', function (event) {

                        const animChilds = el.querySelectorAll('[data-anim-child]');
                        el.classList.add('animated');
                        animChilds.forEach(el => animateElement(el));

                    })
                    .addTo(App.SMcontroller)
            }

        }


        function animateElement(target) {

            let attrVal;
            let animDelay;
            let attrDelayPart;

            if (target.getAttribute('data-anim')) {
                attrVal = target.getAttribute('data-anim');
            } else {
                attrVal = target.getAttribute('data-anim-child');
            }

            if (attrVal.includes('delay-')) {
                attrDelayPart = attrVal.split(' ').pop();
                animDelay = attrDelayPart.substr(attrDelayPart.indexOf('-') + 1) / 10;
            }

            if (attrVal.includes('counter')) {
                counter(target, animDelay);
            }
            else if (attrVal.includes('line-chart')) {
                lineChart(target, animDelay);
            }
            else if (attrVal.includes('pie-chart')) {
                pieChart(target, animDelay);
            }
            else if (attrVal.includes('split-lines')) {
                splitLines(target, animDelay);
            }
            else {
                target.classList.add('is-in-view');
            }

        }

        function pieChart(target, animDelay = 0) {

            const counterVal = target.getAttribute('data-percent');
            const chartBar = target.querySelector('.js-chart-bar');

            if (counterVal < 0) { counterVal = 0; }
            if (counterVal > 100) { counterVal = 100; }

            gsap.fromTo(chartBar, {
                drawSVG: `0%`,
            }, {
                delay: 0.3 + animDelay,
                duration: 1.4,
                ease: 'power3.inOut',
                drawSVG: `${counterVal}%`,

                onStart: () => {
                    chartBar.classList.remove('bar-stroke-hidden');
                }
            });


            let object = { count: 0 };
            const barPercent = target.querySelector('.js-chart-percent');

            gsap.to(object, {
                count: counterVal,
                delay: 0.45 + animDelay,
                duration: 1,
                ease: 'power3.inOut',

                onUpdate: function () {
                    barPercent.innerHTML = Math.round(object.count) + '%';
                },
            });

        }

        function lineChart(target, animDelay = 0) {

            const counterVal = target.getAttribute('data-percent');

            gsap.fromTo(target.querySelector('.js-bar'), {
                scaleX: 0,
            }, {
                delay: 0.45 + animDelay,
                duration: 1,
                ease: 'power3.inOut',
                scaleX: counterVal / 100,
            })


            let object = { count: 0 };
            const barPercent = target.querySelector('.js-number');

            gsap.to(object, {
                count: counterVal,
                delay: 0.45 + animDelay,
                duration: 1,
                ease: 'power3.inOut',

                onUpdate: function () {
                    barPercent.innerHTML = Math.round(object.count);
                },
            });

        }

        function counter(target, animDelay = 0) {

            const counterVal = target.getAttribute('data-counter');
            const counterAdd = target.getAttribute('data-counter-add');
            const totalDelay = animDelay;
            let symbols = '';

            let object = { count: 0 };
            const counterNum = target.querySelector('.js-counter-num');

            if (counterAdd) {
                symbols = counterAdd;
            }

            gsap.to(object, {
                count: counterVal,
                delay: totalDelay,
                duration: 1.8,
                ease: 'power3.inOut',

                onUpdate: function () {
                    counterNum.innerHTML = Math.round(object.count) + symbols;
                },
            });

        }

        function splitLines(target, animDelay = 0) {

            const lines = target.querySelectorAll('.split__line');

            gsap.to(lines, {
                delay: animDelay,
                stagger: 0.05,
                duration: 1.2,
                ease: 'power2.out',
                y: '0%',
            });

        }


        function init() {

            single();
            container();

        }


        return {
            init: init,
        }
    })();


    function splitTextIntoLines() {

        let target;

        if (App.body.classList.contains('page-reveal-off')) {
            target = document.querySelectorAll("[data-split='lines']:not([data-split-page-reveal])");
        } else {
            target = document.querySelectorAll("[data-split='lines']");
        }

        if (!target.length) return;

        target.forEach(el => {
            let content;
            let test = el.querySelectorAll('* > *:not(br):not(span)');

            if (test.length > 0) {
                content = el.querySelectorAll('* > *:not(br):not(span)');
            }

            new SplitText(content, {
                type: 'lines',
                linesClass: 'overflow-hidden',
            });

            content.forEach(el => {
                const lines = el.querySelectorAll('.overflow-hidden');

                new SplitText(lines, {
                    type: 'lines',
                    linesClass: 'split__line',
                });
            });

            gsap.set(el.querySelectorAll('.split__line'), {
                y: '100%',
            })
        });

    }


    function splitIntoLines(target) {
        if (!target) return;

        let content;
        let test = target.querySelectorAll('* > *:not(br):not(span)');

        if (test.length > 0) {
            content = target.querySelectorAll('* > *:not(br):not(span)');
        }

        new SplitText(content, {
            type: 'lines',
            linesClass: 'overflow-hidden',
        });

        content.forEach(el => {
            const lines = el.querySelectorAll('.overflow-hidden');

            new SplitText(lines, {
                type: 'lines',
                linesClass: 'split__line',
            });
        });

        gsap.set(target.querySelectorAll('.split__line'), {
            y: '100%',
        })
    }

    /*--------------------------------------------------
      11. Lazy loading
    ---------------------------------------------------*/

    function lazyLoading() {
        if (!document.querySelector('.js-lazy')) {
            return;
        }

        new LazyLoad({
            elements_selector: ".js-lazy",
        });
    }

    /*--------------------------------------------------
      12. Parallax
    ---------------------------------------------------*/

    function parallaxInit() {
        if (!document.querySelector('[data-parallax]')) return;
        const target = document.querySelectorAll('[data-parallax]')

        target.forEach(el => {
            jarallax(el, {
                speed: el.getAttribute('data-parallax'),
                imgElement: '[data-parallax-target]',
            })
        })
    }

    /*--------------------------------------------------
      15. Video
    ---------------------------------------------------*/

    function videoBtn() {

        GLightbox({
            autoplayVideos: false,
            touchNavigation: false,
        });

    }

    /*--------------------------------------------------
      16. Scroll to id
    ---------------------------------------------------*/

    function scrollToIdInit() {
        const targets = document.querySelectorAll('.js-scroll-to-id');
        if (!targets.length) return;

        targets.forEach(el => {
            el.addEventListener('click', (e) => {
                e.preventDefault();
                const id = el.getAttribute('href');
                const destination = document.querySelector(`#${id.slice(1)}`);

                if (document.querySelector('.is-pin-active'))
                    document.querySelector('.is-pin-active').classList.remove('is-pin-active')
                el.classList.add('is-pin-active')

                gsap.to(window.document.documentElement, {
                    duration: 0.6,
                    ease: 'linear',
                    scrollTo: destination.offsetTop - 60,
                });
            })
        });
    }

    /*--------------------------------------------------
      02. Preloader
    ---------------------------------------------------*/

    // const Preloader = (function () {
    //     const preloader = document.querySelector('.js-preloader');
    //     const bg = preloader.querySelector('.preloader__bg');

    //     function initial() {
    //         gsap.registerEffect({
    //             name: 'preloaderInitial',
    //             effect: (target, config) => {
    //                 document.documentElement.classList.add('html-overflow-hidden');
    //                 const tl = gsap.timeline();

    //                 if (!document.body.classList.contains('preloader-visible')) {
    //                     document.documentElement.classList.remove('html-overflow-hidden');
    //                     return tl;
    //                 }

    //                 return tl
    //                     .to(bg, {
    //                         ease: 'quart.inOut',
    //                         duration: 0.6,
    //                         scaleY: 0,
    //                         onComplete: () => {
    //                             document.documentElement.classList.remove('html-overflow-hidden');
    //                         },
    //                     })
    //             },
    //             extendTimeline: true,
    //         })
    //     }

    //     function show() {
    //         gsap.registerEffect({
    //             name: 'preloaderShow',
    //             effect: (target, config) => {
    //                 const tl = gsap.timeline();
    //                 if (!preloader) return tl

    //                 return tl
    //                     .to(bg, {
    //                         ease: 'quart.inOut',
    //                         duration: 0.6,
    //                         scaleY: 1,
    //                         onStart: () => {
    //                             bg.classList.remove('origin-bottom');
    //                             document.documentElement.classList.add('html-overflow-hidden');
    //                         },
    //                     })
    //             },
    //             extendTimeline: true,
    //         })
    //     }

    //     function hide() {
    //         gsap.registerEffect({
    //             name: 'preloaderHide',
    //             effect: (target, config) => {
    //                 const tl = gsap.timeline()

    //                 return tl
    //                     .to(bg, {
    //                         ease: 'quart.inOut',
    //                         duration: 0.6,
    //                         delay: 0.1,
    //                         scaleY: 0,
    //                         onStart: () => {
    //                             bg.classList.add('origin-bottom');
    //                         },
    //                         onComplete: () => {
    //                             document.documentElement.classList.remove('html-overflow-hidden');
    //                             document.documentElement.classList.remove('overflow-hidden');
    //                             document.body.classList.remove('overflow-hidden');
    //                         },
    //                     })

    //             },
    //             extendTimeline: true,
    //         })
    //     }

    //     function init() {
    //         if (!preloader) return

    //         initial()
    //         show()
    //         hide()
    //     }

    //     return {
    //         init: init,
    //     }
    // })();


})();
