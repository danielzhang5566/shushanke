
<aside class="widget">
	<h3 style="line-height:50px;">
	<?php 
	$my_email = get_bloginfo ('admin_email');
	echo get_avatar($my_email,50);
	$user=get_user_by( 'email', $my_email );
	$userID=$user->ID;
	$url=get_the_author_meta( 'user_url', $userID );
	$qq=get_the_author_meta('qq',$userID);
	$sina=get_the_author_meta( 'sina_weibo', $userID );
	$twitter=get_the_author_meta( 'twitter', $userID );
	$google=get_the_author_meta( 'google_plus', $userID );	
	$github=get_the_author_meta( 'github', $userID );	
	?>
	<?php echo $user->display_name;?></h3>
	<i class="fa fa-map-marker  fa-fw"></i>广州
	<div class="author_icon">
		<a href="mailto:<?php echo $my_email;?>" target="_blank" title="邮箱" class="tooltip"><i class="fa fa-envelope fa-fw"></i></a>
		<?php if($url!=''):?>
		<a target="_blank" href="<?php echo $url?>" class="tooltip" title="个人主页"><i class="fa fa-globe fa-fw"></i></a>
		<?php endif;?>
		<?php if($qq!=''):?>
		<a href="javascript:" target="_blank" title="QQ：<?php echo $qq?>" class="qq"><i class="fa fa-qq fa-fw"></i></a>
		<?php endif;?>
		<?php if($sina!=''):?>
		<a target="_blank" href="<?php echo $sina?>" title="新浪微博" class="tooltip"><i class="fa fa-weibo fa-fw"></i></a>
		<?php endif;?>
		<?php if($twitter!=''):?>
		<a target="_blank" href="<?php echo $twitter?>" title="Facebook" class="tooltip"><i class="fa fa-facebook-square fa-fw"></i></a>
		<?php endif;?>
		<?php if($google!=''):?>
		<a target="_blank" href="<?php echo $google?>" title="G+" class="tooltip"><i class="fa fa-google-plus fa-fw"></i></a>
		<?php endif;?>
		<?php if($github!=''):?>
		<a target="_blank" href="<?php echo $github?>" title="Github" class="tooltip"><i class="fa fa-github fa-fw"></i></a>
		<?php endif;?>

		<?php if(true):?>
        <a target="_blank" href="http://www.susamko.com/feed" title="订阅" class="tooltip"><i class="fa fa-rss fa-fw"></i></a>
        <?php endif;?>

	</div>
	<?php echo get_the_author_meta( 'description', $userID );	?>
	<?php if($option['if_status']==1):?>
	<div class="author_status">
		<div class="author_status_inner">
		<?php query_posts(array( 'post_type' => 'status','showposts' => '5'));?>
				<?php  while (have_posts()) : the_post();?>
				<li><i class="fa fa-quote-left"></i>&nbsp;&nbsp;<?php the_excerpt();?>...&nbsp;&nbsp;<i class="fa fa-quote-right"></i></li>
				<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>
	</div>
	<?php endif;?>
</aside>