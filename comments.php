<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('请勿直接加载此页。谢谢！');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('必须输入密码，才能查看评论！'); ?></p>
	<?php
		return;
	}
?>
<!-- You can start editing here. -->
	<?php if ('open' == $post->comment_status) : ?>
<div id="postcomments">
<div id="comments">
	<?php if ('open' == $post->comment_status) : ?>
<div id="respond_box">
	<div id="respond">
		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link('点击这里取消回复.'); ?></small>
		</div>
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php print '您必须'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！</p>
    <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
      <?php if ( $user_ID ) : ?>
      <p><?php print '登录者：'; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出"><?php print '[ 退出 ]'; ?></a></p>
	<?php elseif ( '' != $comment_author ): ?>
	<div class="author"><?php printf(__('欢迎回来 <strong>%s</strong>'), $comment_author); ?>
			<a href="javascript:toggleCommentAuthorInfo();" id="toggle-comment-author-info">[ 更改 ]</a></div>
			<script type="text/javascript" charset="utf-8">
				//<![CDATA[
				var changeMsg = "[ 更改 ]";
				var closeMsg = "[ 隐藏 ]";
				function toggleCommentAuthorInfo() {
					jQuery('#comment-author-info').slideToggle('slow', function(){
						if ( jQuery('#comment-author-info').css('display') == 'none' ) {
						jQuery('#toggle-comment-author-info').text(changeMsg);
						} else {
						jQuery('#toggle-comment-author-info').text(closeMsg);
				}
			});
		}
				jQuery(document).ready(function(){
					jQuery('#comment-author-info').hide();
				});
				//]]>
			</script>
	<?php endif; ?>
	<?php if ( ! $user_ID ): ?>
	<div id="comment-author-info">
		<p>
			<input type="text" name="author" id="author" class="commenttext" placeholder="Name"  value="<?php echo $comment_author; ?>" size="22" tabindex="1" placeholder="Name" />
			<label for="author"><small><i class="fa fa-user"></i></small></label>
		</p>
		<p>
			<input type="text" name="email" id="email" class="commenttext" value="<?php echo $comment_author_email; ?>" size="22" placeholder="Email" tabindex="2" />
			<label for="email"><small><i class="fa fa-envelope"></i></small></label>
		</p>
		<p>
			<input type="text" name="url" id="url" class="commenttext" value="<?php echo $comment_author_url; ?>" size="22"placeholder="http://"  tabindex="3" />
			<label for="url"><small><i class="fa fa-globe"></i></small></label>
		</p>
	</div>
      <?php endif; ?>
		<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
      <div class="clear"></div>
      <span class="smiles-icons tooltip" title="表情"><i class="fa fa-smile-o fa-2x"></i></span>
            <div class="clear"></div>
      <div class="smileys"><?php include(TEMPLATEPATH . '/includes/smiley.php'); ?></div>
		<p><textarea name="comment" id="comment" tabindex="4" cols="50" rows="5"></textarea></p>
		<p>
			<input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="发表评论" />
			<?php comment_id_fields(); ?>
		</p>
		<?php do_action('comment_form', $post->ID); ?>
    </form>
	<div class="clear"></div>
    <?php endif; // If registration required and not logged in ?>
  </div>
  </div>
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">报歉!评论已关闭.</p>
	<?php endif; ?>
  <?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('', '1 COMMENT', '% COMMENTS' );?></h3>
	<ol class="comment-list">
	<?php wp_list_comments('type=comment&callback=mytheme_comment&end-callback=mytheme_end_comment&max_depth=23'); ?>
	</ol>
	<div class="navigation">
		<div class="pagination"><?php paginate_comments_links(array(
        'prev_text' => '&lt;',
		'next_text' => '&gt;'
    )); ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>
		<!-- If comments are open, but there are no comments. -->
	<?php endif; ?>
	
    </div>
  </div>
  <?php endif; // if you delete this the sky will fall on your head ?>
