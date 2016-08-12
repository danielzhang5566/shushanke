<?php 
 $option=get_option('erlsimple_theme_options');
if (is_home() && ($option['if_bg_on']==1)):?>
<script>
    $.backstretch([
	<?php 
	if($option['if_bg']){
		$bg=$option['bg'];
		foreach($bg as $k => $v){?>
		"<?php echo $v;?>",	
		<?php  }
	}else{?>
	"<?php header_image();?>"
	<?php }?>
      ], {
        fade: 750,
        duration: 4000
    });
    //首页的文章样式
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
<?php endif; ?>
<?php if (is_category() && ($option['if_catbg']==1)):?>
<script>
    $(".site-header").backstretch([
      "<?php bloginfo('template_url') ?>/images/<?php $cat = get_query_var('cat');
    $yourcat = get_category($cat);
    echo $yourcat->slug;?>.jpg"
      ], {
        fade: 750,
        duration: 4000
    });
</script>
<?php endif;?>
<?php if (is_page()):?>
<script>
    $(".site-header").backstretch([
      "<?php 
  $medium_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
echo $medium_image_url[0];?>"
      ], {
        fade: 750,
        duration: 4000
    });
</script>

<?php endif;?>
