<?php

/**
 * Single Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<?php 
$backgroundimg = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
$post_id = get_the_ID();
?>

<style>
	.page-header, #qt_bbp_reply_content_toolbar, .loop-item-0, .bbp-admin-links a:not(:last-child), #post-<?php echo $post_id; ?> {
		display:none;
	}

	.content-area{
		padding-right: 0px;
    	border-right-width: 0px;
	}

	#main #content-wrap{
		padding-top:0px;
	}

	.container, .container-sm, .container-md, .container-lg{
		max-width:100%;
		padding-right : 0px;
		padding-left:0px
	}

	#bbpress-forums, #site-header-inner, #single-forum{
		padding-right:100px;
		padding-left:100px;
	}

	.wp-editor-container{
		background: #EFF3F5;
		border: 1px solid #AFC5CF !important;
		box-sizing: border-box;
		border-radius: 5px;
	}

	#bbp_reply_content {
		font-size: 16px !important;
		height: 77px;
		min-height: 77px;
	}

	.bbp-topic-subheader{
		background: linear-gradient(0deg, rgba(255 255 255 / 80%), rgba(255 255 255 / 80%)), url(<?php echo $backgroundimg; ?>); 
		height:auto;
		padding-top:100px;
		padding-bottom:30px;
		background-size:cover;
	}

	.bbp-author-avatar img{
		border-radius :50%;
		float : left !important;
	}

	.bbp-author-name{
		display:inline !important;
		font-weight:bold;
		font-size: 16px;
	}

	.bbp-reply-author{
		width:100% !important;
		text-align :left !important;
	}

	.bbp-reply-post-date{
		text-align :left !important;
		display: block;
		border-top :none !important;
		border-bottom :none !important;
		margin-left:92px
	}

	.avatar-14{
		display:none;
	}

	button[type="submit"], .button{
		background-color: #0b4f6d;
		border-radius: 30px;
	}
</style>

<div id="single-forum" class="bbp-topic-subheader">
	<p class="links m-0 mt-20"><a href="../../../discuss">back to discussions</a></p>
	<hr class="no-margin-top" width="50%"/>
	<p class="m-0 mt-20">last active: <?php bbp_topic_freshness_link(); ?></p>
	<h2 class="m-0"><?php bbp_topic_title(); ?></h2>

	<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>

	<span class="bbp-topic-started-by">Community manager: <?php printf( bbp_get_topic_author_link( array( 'size' => '14' ) ) ); ?></span>

	<?php do_action( 'bbp_theme_after_topic_started_by' ); ?>

	<div class="bbp-topic-content mt-30">

		<?php do_action( 'bbp_theme_before_topic_content' ); ?>

		<?php bbp_topic_content(); ?>

		<?php do_action( 'bbp_theme_after_topic_content' ); ?>

	</div>
</div>

<div id="bbpress-forums" class="bbpress-wrapper">

	<?php //bbp_breadcrumb(); ?>

	<?php //bbp_topic_subscription_link(); ?>

	<?php //bbp_topic_favorite_link(); ?>	

	<?php do_action( 'bbp_template_before_single_topic' ); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>

		<?php //bbp_topic_tag_list(); ?>

		<?php //bbp_single_topic_description(); ?>

		<?php if ( bbp_show_lead_topic() ) : ?>

			<?php bbp_get_template_part( 'content', 'single-topic-lead' ); ?>

		<?php endif; ?>

		<?php bbp_get_template_part( 'form', 'reply' ); ?>

		<?php if ( bbp_has_replies() ) : ?>

			<?php //bbp_get_template_part( 'pagination', 'replies' ); ?>

			<?php bbp_get_template_part( 'loop',       'replies' ); ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

		<?php endif; ?>

	<?php endif; ?>

	<?php bbp_get_template_part( 'alert', 'topic-lock' ); ?>

	<?php do_action( 'bbp_template_after_single_topic' ); ?>

</div>

<script>
	jQuery(document).ready(function($) {
		$("#bbp_reply_submit").html("comment");	
		// $("#reply-title").html("Comments");		
		$('#bbp_reply_content').attr('placeholder', 'Write your comment...');

	});
</script>
