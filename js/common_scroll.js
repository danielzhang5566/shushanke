//此文件已弃用，代码集成在foot.php
//滚动显示顶部导航栏
$(window).scroll(function () {
    if ($(window).scrollTop() > 10) {
        $('.nav-bar').fadeIn();
    } else {
        $('.nav-bar').fadeOut();
    }
    ;
});
//鼠标滚动滑动到内容区域
if ($(window).scrollTop() == 0) {
    $(window).one('scroll', function () {
        h = $('header.site-header').height();
        $('html,body').animate({
            scrollTop: h
        }, 800);
    })
}