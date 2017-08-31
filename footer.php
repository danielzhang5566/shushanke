        <?php
        /* 如果是【关于】页面，则在底部添加乌龟部件 */
        if (is_page(146) && !wp_is_mobile()):?>
            <object type="application/x-shockwave-flash" style="margin: 5px auto;outline:none;display: block;" data="http://www.zeakhold.com/data/turtle.swf?up_turtle5HeadColor=828250&amp;up_turtle5ShellColor=828250&amp;up_waterColor=FFFFFF&amp;up_turtle3LegColor=66663f&amp;up_turtle4ShellColor=828250&amp;up_turtle2HeadColor=828250&amp;up_percentWater=1&amp;up_turtle3HeadColor=828250&amp;up_turtle1ShellColor=828250&amp;up_foodColor=D1BB19&amp;up_turtle4HeadColor=828250&amp;up_turtle3ShellColor=828250&amp;up_turtle1HeadColor=828250&amp;up_turtle4LegColor=66663f&amp;up_turtle1LegColor=66663f&amp;up_numTurtles=2&amp;up_turtleName=Turtle&amp;up_groundColor=EEEEEE&amp;up_turtle2ShellColor=828250&amp;up_turtle2LegColor=66663f&amp;up_turtle5LegColor=66663f&amp;" width="700" height="300"><param name="movie" value="http://www.zeakhold.com/data/turtle.swf?up_turtle5HeadColor=828250&amp;up_turtle5ShellColor=828250&amp;up_waterColor=FFFFFF&amp;up_turtle3LegColor=66663f&amp;up_turtle4ShellColor=828250&amp;up_turtle2HeadColor=828250&amp;up_percentWater=1&amp;up_turtle3HeadColor=828250&amp;up_turtle1ShellColor=828250&amp;up_foodColor=D1BB19&amp;up_turtle4HeadColor=828250&amp;up_turtle3ShellColor=828250&amp;up_turtle1HeadColor=828250&amp;up_turtle4LegColor=66663f&amp;up_turtle1LegColor=66663f&amp;up_numTurtles=2&amp;up_turtleName=Turtle&amp;up_groundColor=EEEEEE&amp;up_turtle2ShellColor=828250&amp;up_turtle2LegColor=66663f&amp;up_turtle5LegColor=66663f&amp;"><param name="AllowScriptAccess" value="always"><param name="wmode" value="opaque"><param name="scale" value="noscale"><param name="salign" value="tl"></object>
        <?php endif;?>

		<footer class="site-footer">
			<div class="site-info" style="line-height: 10px;">
				Copyright © 2015-2017 <a href="<?php echo home_url();?>"  id="copyright"><?php echo get_bloginfo('name');?></a>
				 | Thank <a href="http://zhangshiyu.name" target="_blank">Erl : )</a>
				<p style="font-size: 13px"><a target="_blank" href="http://www.beian.gov.cn">粤公网安备 44011302000438号</a></p>
		</div> <!-- .site-info -->
        </footer>
        <script src="https://cdn.bootcss.com/jquery/2.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
		<script src="https://cdn.bootcss.com/tooltipster/3.2.6/js/jquery.tooltipster.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>
        <script type="text/javascript">var _hmt=_hmt||[];(function(){var hm=document.createElement("script");hm.src="https://hm.baidu.com/hm.js?dadddb77ce27fea5a5096368b7397ce3";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(hm,s)})();</script>

		<?php
		/* 如果是网站首页、分类页面、独立页面时（蜀山客的这三类页面都设置为【有背景图】）*/
        /* 也就是有【有背景图】的情况下 */
		if (is_home() || is_category() || is_page()):?>
			<script src="<?php bloginfo('template_directory'); ?>/js/jquery.backstretch.min.js"></script>
			<script type="text/javascript">
                $(window).scroll(function(){
                	if($(window).scrollTop() > 10){
                		$('.nav-bar').fadeIn();
                	}else{
                		$('.nav-bar').fadeOut();
                	};
                });
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