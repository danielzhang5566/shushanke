<?php

//主题配置文件
include_once('includes/theme-options.php');

//特色图片
add_theme_support( 'post-thumbnails' );

add_filter( 'show_admin_bar', '__return_false' );

// 菜单注册
if ( function_exists('register_nav_menus') ) {
    register_nav_menus(array(
        'primary' => '导航菜单',
    ));
    register_nav_menus(array(
        'secondery' => '移动端导航菜单',
    ));
}
//注册小工具
if (function_exists('register_sidebar'))
{
    register_sidebar(array(
		'name'			=> 'sidebar-1',
		'id'			=> 'sidebar-1',
        'before_widget'	=> '<aside class="widget">',
        'after_widget'	=> '</aside>',
        'before_title'	=> '<h3 class="widget-title">',
        'after_title'	=> '</h3>',
    ));
}

//丰富个人简介页面
add_filter( 'user_contactmethods', '_add_contact_fields' );
function _add_contact_fields( $contactmethods ) {
	$contactmethods['qq'] = 'QQ';
	$contactmethods['sina_weibo'] = '新浪微博';
	$contactmethods['twitter'] = 'Twitter';
	$contactmethods['google_plus'] = 'Google+';
	$contactmethods['github'] = 'Github';
	return $contactmethods;
}

//自定义头部功能
$default_header = array(   
    'width'=> 2560,   
    'height'=> 1920,
	'uploads'=> true,   
);   
add_theme_support( 'custom-header',$default_header); 
 
// 评论表情
function classic_smilies_src( $old, $img ) {
	return get_bloginfo('template_directory').'/smiley/'.$img;
}

add_action( 'init', 'classic_smilies_init', 1 );
	
function classic_smilies_init() {

	// put the classic smilies images back
	global $wpsmiliestrans;
	$wpsmiliestrans = array(
	':mrgreen:' => 'icon_mrgreen.gif',
	':neutral:' => 'icon_neutral.gif',
	':twisted:' => 'icon_twisted.gif',
	  ':arrow:' => 'icon_arrow.gif',
	  ':shock:' => 'icon_eek.gif',
	  ':smile:' => 'icon_smile.gif',
	    ':???:' => 'icon_confused.gif',
	   ':cool:' => 'icon_cool.gif',
	   ':evil:' => 'icon_evil.gif',
	   ':grin:' => 'icon_biggrin.gif',
	   ':idea:' => 'icon_idea.gif',
	   ':oops:' => 'icon_redface.gif',
	   ':razz:' => 'icon_razz.gif',
	   ':roll:' => 'icon_rolleyes.gif',
	   ':wink:' => 'icon_wink.gif',
	    ':cry:' => 'icon_cry.gif',
	    ':eek:' => 'icon_surprised.gif',
	    ':lol:' => 'icon_lol.gif',
	    ':mad:' => 'icon_mad.gif',
	    ':sad:' => 'icon_sad.gif',
	      '8-)' => 'icon_cool.gif',
	      '8-O' => 'icon_eek.gif',
	      ':-(' => 'icon_sad.gif',
	      ':-)' => 'icon_smile.gif',
	      ':-?' => 'icon_confused.gif',
	      ':-D' => 'icon_biggrin.gif',
	      ':-P' => 'icon_razz.gif',
	      ':-o' => 'icon_surprised.gif',
	      ':-x' => 'icon_mad.gif',
	      ':-|' => 'icon_neutral.gif',
	      ';-)' => 'icon_wink.gif',
	// This one transformation breaks regular text with frequency.
	//     '8)' => 'icon_cool.gif',
	       '8O' => 'icon_eek.gif',
	       ':(' => 'icon_sad.gif',
	       ':)' => 'icon_smile.gif',
	       ':?' => 'icon_confused.gif',
	       ':D' => 'icon_biggrin.gif',
	       ':P' => 'icon_razz.gif',
	       ':o' => 'icon_surprised.gif',
	       ':x' => 'icon_mad.gif',
	       ':|' => 'icon_neutral.gif',
	       ';)' => 'icon_wink.gif',
	      ':!:' => 'icon_exclaim.gif',
	      ':?:' => 'icon_question.gif',
	);

	add_filter( 'smilies_src', 'classic_smilies_src', 10, 2 );
	
	// disable any and all mention of emoji's
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'classic_smilies_rm_tinymce_emoji' );
	add_filter( 'the_content', 'classic_smilies_rm_additional_styles', 11 );
	add_filter( 'the_excerpt', 'classic_smilies_rm_additional_styles', 11 );
	add_filter( 'comment_text', 'classic_smilies_rm_additional_styles', 21 );
}

// filter function used to remove the tinymce emoji plugin
function classic_smilies_rm_tinymce_emoji( $plugins ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
}

function classic_smilies_rm_additional_styles( $content ) {
	return str_replace( 'class="wp-smiley" style="height: 1em; max-height: 1em;"', 'class="wp-smiley"', $content );
}
 // 移除谷歌字体
function coolwp_remove_open_sans_from_wp_core() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
        wp_enqueue_style('open-sans','');
}
add_action( 'init', 'coolwp_remove_open_sans_from_wp_core' );

//gravatar被墙恢复
function get_ssl_avatar($avatar) {
   $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=50" class="avatar" height="50" width="50">',$avatar);
   return $avatar;
}
add_filter('get_avatar', 'get_ssl_avatar');

// 评论回复
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID() ?>" class="comment-body">
   <div id="div-comment-<?php comment_ID() ?>" class="comment-main">
      <?php $add_below = 'div-comment'; ?>
		<div class="comment-author vcard">
<?php 
echo get_avatar( $comment, 50 );?>
<cite class="fn"><?php comment_author_link() ?></cite><span class="datetime"><?php comment_date('Y-m-d') ?>  <?php comment_time() ?></span><?php edit_comment_link('[编辑]','&nbsp;&nbsp;',''); ?></div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<span style="color:#C00; font-style:inherit">您的评论正在等待审核中...</span>
			<br />			
		<?php endif; ?>
    		<?php comment_text() ?>
 <div class="comment-reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => '[ 回复 ]', 'add_below' =>$add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></div>
  </div>
<?php
}
function mytheme_end_comment() {
		echo '</li>';
}

//评论邮件回复
function comment_mail_notify($comment_id){
    $comment = get_comment($comment_id);
    $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
    $spam_confirmed = $comment->comment_approved;
    if(($parent_id != '') && ($spam_confirmed != 'spam')){
        $wp_email = 'webmaster@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
        $to = trim(get_comment($parent_id)->comment_author_email);
        $subject = '您在 [' . get_option("blogname") . '] 的留言有了回应';

        $message = '<div style="border-right:#666666 1px solid;border-radius:8px;color:#111;font-size:14px;width:600px;border-bottom:#666666 1px solid;font-family:微软雅黑,arial;margin:10px auto 0px;border-top:#666666 1px solid;border-left:#666666 1px solid">
            <div style="width:100%;background:#666666;min-height:60px;color:white;border-radius:6px 6px 0 0" align="center" valign="center">
                <span style="line-height:60px;min-height:60px;font-size:16px">您在
                <a style="color:#6ec3c8;font-weight:600;text-decoration:none" href="' . get_option('home') . '" target="_blank">' . get_option('blogname') . '</a> 的留言有了回应</span>
            </div>
            <div style="margin:0px auto;width:90%">
                <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
                <p>您于' . trim(get_comment($parent_id)->comment_date) . ' 在文章《' . get_the_title($comment->comment_post_ID) . '》上发表评论: </p>
                <p style="border-bottom:#ddd 1px solid;border-left:#ddd 1px solid;padding-bottom:10px;background-color:#eee;margin:15px 0px;padding-left:20px;padding-right:20px;border-top:#ddd 1px solid;border-right:#ddd 1px solid;padding-top:10px">' . nl2br(get_comment($parent_id)->comment_content) . '</p>
                <p>' . trim($comment->comment_author) . ' 于' . trim($comment->comment_date) . ' 给您的回复如下: </p>
                <p style="border-bottom:#ddd 1px solid;border-left:#ddd 1px solid;padding-bottom:10px;background-color:#eee;margin:15px 0px;padding-left:20px;padding-right:20px;border-top:#ddd 1px solid;border-right:#ddd 1px solid;padding-top:10px">' . nl2br($comment->comment_content) . '</p>
                <center ><a href="' . htmlspecialchars(get_comment_link($parent_id)) . '" target="_blank" style="background-color:#6ec3c8; border-radius:10px; display:inline-block; color:#fff; padding: 10px 15px 10px 15px; text-decoration:none;margin-top:15px; margin-bottom:15px; font-size: 16px;">点击查看完整内容</a></center>
                <p style="border-top:1px dashed #dbd1ce; margin-bottom: 0px;"></p>
                <p style=" color: #b2b0b0; margin-bottom: 20px; margin-top: 5px;">此邮件由系统自动发出, 请勿回复</p>
            </div>
            <div style="width:100%;background: #f6f8fa;min-height: 45px;color: #9f9d9d;border-radius: 0 0 6px 6px;"  align="center" valign="center">
                <span style="line-height: 45px;min-height: 45px;margin-left:30px;font-size: 13px;">Copyright © 2015-2017 '.get_option("blogname").' All Right Reserved</span>
            </div>
        </div>';

        $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
        $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
        wp_mail( $to, $subject, $message, $headers );
    }
}
add_action('comment_post', 'comment_mail_notify');

//面包屑导航
function cmp_breadcrumbs() {
	$delimiter = '&gt;'; // 分隔符
	$before = '<span class="current">'; // 在当前链接前插入
	$after = '</span>'; // 在当前链接后插入
	if ( !is_home() && !is_front_page() || is_paged() ) {
		echo '<div itemscope itemtype="http://schema.org/WebPage" id="crumbs">'.__( '<i class="fa fa-home"></i>' , 'cmp' );
		global $post;
		$homeLink = home_url();
		echo ' <a itemprop="breadcrumb" href="' . $homeLink . '"  title="返回首页">' . __( '首页' , 'cmp' ) . '</a> ' . $delimiter . ' ';
		if ( is_category() ) { // 分类 存档
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0){
				$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb" ', $cat_code );
			}
			echo $before . '' . single_cat_title('', false) . '' . $after;
		} elseif ( is_day() ) { // 天 存档
			echo '<a itemprop="breadcrumb"  href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) { // 月 存档
			echo '<a itemprop="breadcrumb"  href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) { // 年 存档
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) { // 文章
			if ( get_post_type() != 'post' ) { // 自定义文章类型
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a itemprop="breadcrumb"  href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->name . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else { // 文章 post
				$cat = get_the_category(); $cat = $cat[0];
				$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb" ', $cat_code );
				echo $before . get_the_title() . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) { // 附件
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo '<a itemprop="breadcrumb"  href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) { // 页面
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) { // 父级页面
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a itemprop="breadcrumb"  href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) { // 搜索结果
			echo $before ;
			printf( __( '“ %s ” 的搜索结果', 'cmp' ),  get_search_query() );
			echo  $after;
		} elseif ( is_tag() ) { //标签 存档
			echo $before ;
			printf( __( '%s', 'cmp' ), single_tag_title( '', false ) );
			echo  $after;
		} elseif ( is_author() ) { // 作者存档
			global $author;
			$userdata = get_userdata($author);
			echo $before ;
			printf( __( 'Author Archives: %s', 'cmp' ),  $userdata->display_name );
			echo  $after;
		} elseif ( is_404() ) { // 404 页面
			echo $before;
			_e( 'Not Found', 'cmp' );
			echo  $after;
		}
		if ( get_query_var('paged') ) { // 分页
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
				echo sprintf( __( ' ( 第 %s 页)', 'cmp' ), get_query_var('paged') );
		}
		echo '</div>';
	}
}
//翻页
function paging_nav() {
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( ' <i class="fa fa-chevron-left"> </i>'),
		'next_text' => __( ' <i class="fa fa-chevron-right"> </i>'),
	) );

	if ( $links ) :

	?>
	<nav class="page_navi" role="navigation">
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}

//增强默认编辑器
function add_editor_buttons($buttons) {
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';
	$buttons[] = 'hr';
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'copy';
	$buttons[] = 'paste';
	$buttons[] = 'cut';
	$buttons[] = 'undo';
	$buttons[] = 'image';
	$buttons[] = 'anchor';
	$buttons[] = 'backcolor';
	$buttons[] = 'wp_page';
	$buttons[] = 'charmap';
	return $buttons;
}
add_filter("mce_buttons_3", "add_editor_buttons");

//图片自适应
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
function remove_width_height_attribute($content){ 
	preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png\.bmp]))[\'|\"].*?[\/]?>/", $content, $images); 
	if(!empty($images)) { 
		foreach($images[0] as $index => $value){ 
			$new_img = preg_replace('/(width|height)="\d*"\s/', "", $images[0][$index]); 
			$content = str_replace($images[0][$index], $new_img, $content); 
		} 
	} 
	return $content; 
} 
add_filter('the_content', 'remove_width_height_attribute', 99); 

/*
//评论过滤
function comment_post( $incoming_comment ) {

    //禁止全英文评论
	$pattern = '/[一-龥]/u';
	if(!preg_match($pattern, $incoming_comment['comment_content'])) {
		err(__('您的评论中必须包含汉字！'));
	}

    // 禁止日文评论
	$pattern = '/[あ-んア-ン]/u';
	if(preg_match($pattern, $incoming_comment['comment_content'])) {
		err(__('禁止评论日文！'));
	}

	return( $incoming_comment );
}
add_filter('preprocess_comment', 'comment_post');
*/

 /* Archives list by zwwooooo | http://zww.me */
 function archives_list() {
     if( !$output = get_option('archives_list') ){
         $output = '<div id="archives">';
         $the_query = new WP_Query( 'posts_per_page=-1&ignore_sticky_posts=1' ); //update: 加上忽略置顶文章
         $year=0; $mon=0; $i=0; $j=0;
         while ( $the_query->have_posts() ) : $the_query->the_post();
             $year_tmp = get_the_time('Y');
             $mon_tmp = get_the_time('m');
             $y=$year; $m=$mon;
             if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
             if ($year != $year_tmp && $year > 0) $output .= '</ul>';
             if ($year != $year_tmp) {
                 $year = $year_tmp;
                 $output .= '<h3 class="al_year" id="'.$year.'" style="margin-bottom: .5rem">'. $year .' 年</h3><ul class="al_mon_list" style="margin: 0;padding: 0">'; //输出年份
             }
             if ($mon != $mon_tmp) {
                 $mon = $mon_tmp;
                 $output .= '<h4 class="al_mon" style="padding-bottom: .5rem;padding-top: 0rem">'. $mon .' 月</h4><ul class="al_post_list time_base" style="margin: 0;padding: 0">'; //输出月份
             }
             $output .= '<li class="time_base-l" style="list-style-type:none"><span class="time_bm">'. get_the_time('m-d  ') .'</span><span class="time-b-content"><a href="'. get_permalink() .'">'. get_the_title() .'</a> <em>('. get_comments_number('0', '1', '%') .')</em></span></li>'; //输出文章日期和标题
         endwhile;
         wp_reset_postdata();
         $output .= '</ul></li></ul></div>';
         update_option('archives_list', $output);
     }
     echo $output;
 }
 function clear_zal_cache() {
     update_option('archives_list', ''); // 清空 zww_archives_list
 }
 add_action('save_post', 'clear_zal_cache'); // 新发表文章/修改文章时章 
if($option['friendlink']==1){
	//恢复链接功能
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );
}
if($option['if_status']==1){
	//文章摘要去掉P标签包裹
	remove_filter( 'the_excerpt', 'wpautop' );
	require_once('includes/post_type_status.php');
}

/*** 二次开发 ***/

//关闭提示&禁止更新
add_filter('pre_site_transient_update_core', create_function('$a', "return null;")); // 关闭核心提示
add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;")); // 关闭插件提示
add_filter('pre_site_transient_update_themes', create_function('$a', "return null;")); // 关闭主题提示
remove_action('admin_init', '_maybe_update_core'); // 禁止 WordPress 检查更新
remove_action('admin_init', '_maybe_update_plugins'); // 禁止 WordPress 更新插件
remove_action('admin_init', '_maybe_update_themes'); // 禁止 WordPress 更新主题

//七牛镜像存储
if ( !is_admin() ) {
    add_action('wp_loaded','qiniu_ob_start');
    function qiniu_ob_start() {
        ob_start('qiniu_cdn_replace');
    }
    function qiniu_cdn_replace($html){
        $local_host = 'http://www.zeakhold.com'; //博客域名
        $qiniu_host = 'http://source.zeakhold.com'; //七牛域名
        $cdn_exts   = 'js|png|jpg|jpeg|gif|ico'; //扩展名（使用|分隔）
        $cdn_dirs   = 'wp-content|wp-includes'; //目录（使用|分隔）
        $cdn_dirs   = str_replace('-', '\-', $cdn_dirs);
        if ($cdn_dirs) {
            $regex  =  '/' . str_replace('/', '\/', $local_host) . '\/((' . $cdn_dirs . ')\/[^\s\?\\\'\"\;\>\<]{1,}.(' . $cdn_exts . '))([\"\\\'\s\?]{1})/';
            $html =  preg_replace($regex, $qiniu_host . '/$1$4', $html);
        } else {
            $regex  = '/' . str_replace('/', '\/', $local_host) . '\/([^\s\?\\\'\"\;\>\<]{1,}.(' . $cdn_exts . '))([\"\\\'\s\?]{1})/';
            $html =  preg_replace($regex, $qiniu_host . '/$1$3', $html);
        }
        return $html;
    }
}

?>