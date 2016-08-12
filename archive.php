<?php get_header(); 
 ?>
  <div class="main">
 <div class="content">
 <?php if (have_posts()) : ?> 
       <div class="crumbs_patch">
       <?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
</div>
 <section class="posts">
        <div class="posts-inner">
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', get_post_format() );?>
    <?php endwhile; ?>
        <?php paging_nav(); ?>
                </div></section>
<?php endif; ?> 
                                                </div>
 <?php get_sidebar(); ?>
<div class="clear"></div>
<a href="#" id="top" tilte="返回顶部"> <i class="fa fa-chevron-up fa-2x"> </i></a>
</div>

<?php get_footer(); ?>