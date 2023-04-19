$(function () {
    "use strict";
    let render_bg_themes = true;
    const asset_admin = "{{asset_admin('')}}";
    $(".mobile-search-icon").on("click", function () {
        $(".search-bar").addClass("full-search-bar");
    });

    $(".search-close").on("click", function () {
        $(".search-bar").removeClass("full-search-bar");
    });

    $(".mobile-toggle-menu").on("click", function () {
        $(".wrapper").addClass("toggled");
    });

    $(".toggle-icon").click(function () {
        $(".wrapper").hasClass("toggled") ? ($(".wrapper").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($(".wrapper").addClass("toggled"), $(".sidebar-wrapper").hover(function () {
            $(".wrapper").addClass("sidebar-hovered")
        }, function () {
            $(".wrapper").removeClass("sidebar-hovered")
        }));
    });
    $(document).ready(function () {
        $(window).on("scroll", function () {
            $(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
        });
        $(".back-to-top").on("click", function () {
            return $("html, body").animate({
                scrollTop: 0
            }, 600), !1
        })
    });

    // set menu active
    $(function () {
        for (var e = window.location, o = $(".metismenu li a").filter(function () {
            return this.href == e
        }).addClass("").parent().addClass("mm-active"); o.is("li");) {
            o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
        }
    });


    $(function () {
        $("#menu").metisMenu()
    });

    $(".chat-toggle-btn").on("click", function () {
        $(".chat-wrapper").toggleClass("chat-toggled")
    });
    $(".chat-toggle-btn-mobile").on("click", function () {
        $(".chat-wrapper").removeClass("chat-toggled")
    });


    $(".email-toggle-btn").on("click", function () {
        $(".email-wrapper").toggleClass("email-toggled")
    });
    $(".email-toggle-btn-mobile").on("click", function () {
        $(".email-wrapper").removeClass("email-toggled")
    });
    $(".compose-mail-btn").on("click", function () {
        $(".compose-mail-popup").show()
    });
    $(".compose-mail-close").on("click", function () {
        $(".compose-mail-popup").hide()
    });


    $(".switcher-btn").on("click", function () {
        $(".switcher-wrapper").toggleClass("switcher-toggled")
    });
    $(".close-switcher").on("click", function () {
        $(".switcher-wrapper").removeClass("switcher-toggled")
    });

    $("#lightmode").on("click", function () {
        setTheme('light-theme');
    });
    $("#darkmode").on("click", function () {
        setTheme('dark-theme');
    });
    $("#semidark").on("click", function () {
        setTheme('semi-dark');
    });
    $("#minimaltheme").on("click", function () {
        setTheme('minimal-theme');
    });

    // header color
    $('.headercolorbtn').click(function () {
        const number = this.dataset.number;
        setHeaderColor(number);
    });

    // sidebar colors
    $('.sidebarcolorbtn').click(function () {
        const number = this.dataset.number;
        setSideBarColor(number);
    });


    // dark mode
    $(".dark-mode").on("click", function () {
        const theme = $(".dark-mode-icon i").attr("class") == 'bx bx-moon' ? 'dark-theme' : 'light-theme';
        setTheme(theme);
        setSideBarColor(0);
        setHeaderColor(0);
    });

    $('.switcher-btn').click(function () {
        if (!render_bg_themes) {
            return;
        }
        const totalSidebar = 8;
        for (let i = 1; i <= totalSidebar; i++) {
            $(`.switcher-wrapper .sidebarcolor${i}`).css('background-image', `url(${asset_admin}images/bg-themes/${i}.png)`);
        }
        render_bg_themes = false;
    });
});

function setDarkMode(darkMode) {
    if (darkMode) {
        $(".dark-mode-icon i").attr("class", "bx bx-sun");
        $("html").attr("class", "dark-theme");
    } else {
        $(".dark-mode-icon i").attr("class", "bx bx-moon");
        $("html").attr("class", "light-theme");
    }
    localStorage.setItem('dark-mode', darkMode);
}

function setTheme(theme) {
    // remove theme
    const themes = ['dark-theme', 'light-theme', 'semi-dark', 'minimal-theme'];
    themes.forEach(t => {
        $('html').removeClass(t);
        const radiobtn = $(`[name=flexRadioDefault][theme=${t}]`);
        if (t == theme) {
            radiobtn.attr('checked', true);
        } else {
            radiobtn.removeAttr('checked');
        }
    });

    if (theme == themes[0] || theme == themes[1]) {
        setDarkMode(theme == themes[0]);
    } else {
        // set icon
        $(".dark-mode-icon i").attr("class", "bx bx-moon");
        // apply theme
        $('html').addClass(theme);

        localStorage.setItem('dark-mode', false);
    }
    localStorage.setItem('theme', theme);
}

function setSideBarColor(number) {
    const totalSidebar = 8;
    const html = $('html');
    html.removeClass('color-sidebar');
    $(`.sidebar-wrapper`).removeAttr('style');
    for (let i = 1; i <= totalSidebar; i++) {
        if (number == i) {
            html.addClass(`sidebarcolor${i}`);
            html.addClass('color-sidebar');
        } else {
            html.removeClass(`sidebarcolor${i}`);
        }
    }

    if (number != 0) {
        $(`.sidebar-wrapper`).css('background-image', `url(${asset_admin}images/bg-themes/${number}.png)`)
    }

    localStorage.setItem('sidebarcolor', number);
}

function setHeaderColor(number) {
    const totalHeader = 8;
    $('html').removeClass('color-header');
    for (let i = 1; i <= totalHeader; i++) {
        if (number == i) {
            $('html').addClass(`headercolor${i}`);
            $('html').addClass('color-header');
        } else {
            $('html').removeClass(`headercolor${i}`);
        }
    }
    localStorage.setItem('headercolor', number);
}
const asset_admin = "{{ asset_admin('') }}";
// set theme
if (templateTheme) {
    setTheme(templateTheme);
}

const templateSidebarColor = localStorage.getItem('sidebarcolor');
if (templateSidebarColor) {
    setSideBarColor(templateSidebarColor);
}
const templateHeaderColor = localStorage.getItem('headercolor');
if (templateHeaderColor) {
    setHeaderColor(templateHeaderColor);
}

