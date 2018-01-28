<?php
$option=get_option('erlsimple_theme_options');
/* 如果是首页(的第一页)并且开启了背景图 */
/* 显示第二页以及之后页面时，is_paged()返回TRUE */
if (is_home() && !is_paged() && ($option['if_bg_on']==1)):?>
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
</script>
<?php endif; ?>


<?php
/* 如果是分类(的第一页)并且开启了背景图 */
if (is_category() && !is_paged() && ($option['if_catbg']==1)):?>
<script>
    $(".site-header").backstretch([
      "<?php bloginfo('template_url') ?>/images/<?php $cat = get_query_var('cat');
    $yourcat = get_category($cat);
    echo $yourcat->slug;?>.jpg"
      ], {
        fade: 400,
        duration: 1500
    });
</script>
<?php endif;?>



<?php
 /* 如果是独立页面(认定为也有背景图) */
if (is_page()):?>
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
