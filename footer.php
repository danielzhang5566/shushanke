		<div class="clear"></div>
		<a href="#" id="top" tilte="返回顶部"> <i class="fa fa-chevron-up fa-2x"> </i></a>
		<footer class="site-footer">
			<div class="site-info" style="line-height: 10px;">
				Copyright © 2015-2016 <a href="<?php echo home_url();?>"  id="copyright"><?php echo get_bloginfo('name');?></a>
				 | Theme by <a href="http://zhangshiyu.name" target="_blank">Erl</a>
				<p style="font-size: 13px"><a target="_blank" href="http://www.beian.gov.cn">粤公网安备 44011302000438号</a></p>
		</div> <!-- .site-info -->
        </footer>
        <script src="http://cdn.bootcss.com/jquery/2.1.0/jquery.min.js"></script>
        <!-- /* <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script> */ -->

		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>

		<script src="http://cdn.bootcss.com/tooltipster/3.2.6/js/jquery.tooltipster.min.js"></script>
        <!-- /* <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.tooltipster.min.js"></script> */ -->

		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>
		<?php if (is_home() || is_category() ||is_page()):?>
			<script src="<?php bloginfo('template_directory'); ?>/js/jquery.backstretch.min.js"></script>
			<?php include('includes/bgbanner.php'); ?>
		<?php endif;?>
		<?php 
		$option=get_option('erlsimple_theme_options');
		if ((is_home() && ($option['if_bg_on']==1)) || is_category()&&($option['if_catbg'])):?>
		<script type="text/javascript">
		//滚动显示顶部导航栏
        $(window).scroll(function(){
        	if($(window).scrollTop() > 10){
        		$('.nav-bar').fadeIn();
        	}else{
        		$('.nav-bar').fadeOut();
        	};
        });
        //鼠标滚动滑动到内容区域
        if($(window).scrollTop()==0){
        	$(window).one('scroll',function(){
        		h=$('header.site-header').height();
        		$('html,body').animate({
        			scrollTop: h
        		}, 800);
        	})
        }
		</script>
		<?php endif;?>
		<?php wp_footer();?>
	</body>
</html>