//此文件已弃用，代码集成在foot.php
$(window).scroll(function () {
    if ($(window).scrollTop() > 10) {
        $('.nav-bar').fadeIn();
    } else {
        $('.nav-bar').fadeOut();
    }
    ;
});
if ($(window).scrollTop() == 0) {
    $(window).one('scroll', function () {
        h = $('header.site-header').height();
        $('html,body').animate({
            scrollTop: h
        }, 800);
    })
}