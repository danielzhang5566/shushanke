		<footer class="site-footer">
			<div class="site-info" style="line-height: 10px;">
				Copyright © 2015-2016 <a href="<?php echo home_url();?>"  id="copyright"><?php echo get_bloginfo('name');?></a>
				 | Theme by <a href="http://zhangshiyu.name" target="_blank">Erl</a>
				<p style="font-size: 13px"><a target="_blank" href="http://www.beian.gov.cn">粤公网安备 44011302000438号</a></p>
		</div> <!-- .site-info -->
        </footer>
        <script src="http://cdn.bootcss.com/jquery/2.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
		<script src="http://cdn.bootcss.com/tooltipster/3.2.6/js/jquery.tooltipster.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>


		<?php
		/* 如果是网站首页、分类页面、独立页面时（蜀山客的这三类页面都设置为【有背景图】）*/
        /* 也就是有【有背景图】的情况下 */
		if (is_home() || is_category() || is_page()):?>
			<script src="<?php bloginfo('template_directory'); ?>/js/jquery.backstretch.min.js"></script>
			<script type="text/javascript">
            		    //向下滚动时显示顶部导航栏
                        $(window).scroll(function(){
                        	if($(window).scrollTop() > 10){
                        		$('.nav-bar').fadeIn();
                        	}else{
                        		$('.nav-bar').fadeOut();
                        	};
                        });
                        //鼠标滚动滑动到最顶部时
                        if($(window).scrollTop()==0){
                        	$(window).one('scroll',function(){
                        		h=$('header.site-header').height();
                        		$('html,body').animate({
                        			scrollTop: h
                        		}, 800);
                        	})
                        }
            		    </script>
			<?php include('includes/bgbanner.php'); ?>
		<?php endif;?>


		<?php
		/* 如果是非文章、非独立页面时（例如首页，分类页面、搜索页面、标签页面等） */
		if (!(is_single()) && !(is_page())):?>
            <script type="text/javascript">
                $(".text").css("max-width","600px");
                $("article h1").css("color","#4093b4");
                $("article h1").hover(function(){
                    $(this).css("color","#45b5e1");
                },function(){
                    $(this).css("color","#4093b4");
                });
                $(".post").css({"margin":"2rem auto;","padding-bottom":"2rem","border-bottom":"#e0e5e8 .05rem solid"});
                $(".post").append("<style>.post:after{display:block;content:'';width:7px;height:7px;border:.05rem solid #b0aeae;position:relative;bottom:-2.25rem;left:50%;margin-left:-5px;background:#fff;-webkit-border-radius:100%;-moz-border-radius:100%;border-radius:100%;box-shadow:#fff 0 0 0 5px}</style>");
            </script>
        <?php endif;?>

		<?php wp_footer();?>
	</body>
</html>