<?php get_header(); ?>
     <?php if (have_posts()) : ?> 
   <?php while (have_posts()) : the_post(); ?>
   <?php 
if ( has_post_thumbnail() ) : 
	?> 
<style>
.nav-bar{ display:none;}
</style>
        <header class="site-header" style=" height:30%;">
        <div class="site-header-inner" style="  
animation: bgcolor 5s;
-moz-animation: bgcolor 5s;
-webkit-animation: bgcolor 5s;	
-o-animation: bgcolor 5s;	
background-color: rgba(0,0,0,0.3);">
<h1 style=" color:#fff;" class="animated fadeInDown"><?php the_title(); ?></h1>
        </div><!-- /.site-header-inner -->
    </header>
	<?php endif;?>
  <div class="main">
 <div class="content-widescreen">
             <div class="crumbs_patch" 
			 <?php if(has_post_thumbnail()):?>
			 style="margin-top:1.5rem;"
			 <?php endif;?>
			 >
           <?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?></div>
    <section class="posts">
        <div class="posts-inner">
            <article class="post text">
			 <?php if(!has_post_thumbnail()):?><h1 itemprop="name"><?php the_title(); ?></h1>
			 <?php endif;?>
<?php the_content(); ?>                
            </article>
        </div><!-- /.posts-inner -->
    </section><!-- /.posts -->
<div class="post-comment">
<?php comments_template(); ?>
</div>
    </section><!-- /.posts -->
            <?php endwhile; ?>
<?php endif; ?> 
</div>
 </div>
<?php get_footer(); ?>
