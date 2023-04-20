
const preload_container = $("#preloader");
$(window).on('load', function () {
    "use strict";
    preload_container.delay(750).fadeOut('slow');
    refresh_margin_top();
    $('.lazy').Lazy({
        scrollDirection: 'vertical',
    });
});

setTimeout(() => {
    preload_container.delay(750).fadeOut('slow');
}, 1500);

(function pulse(back) {
    const img_el = preload_container.find('img');
    img_el.animate({
        'font-size': (back) ? '100px' : '140px',
        opacity: (back) ? 1 : 0.5
    }, 700, function () {
        pulse(!back)
    });
})(false);

const btn_scroll = $('#back-to-top');

$(window).scroll(function () {
    // position
    const p = $(window).scrollTop();

    if (p >= 100) btn_scroll.parent().fadeIn();
    else btn_scroll.parent().fadeOut();

    // document height
    const d_height = $(document).height() - $(window).height();
    refresh_margin_top();
});

btn_scroll.click(() => {
    $("html, body").animate({
        scrollTop: 0
    }, "slow");
})

function refresh_margin_top() {
    $('.content-wrapper').css('margin-top', $('header').height() + 'px');
}
