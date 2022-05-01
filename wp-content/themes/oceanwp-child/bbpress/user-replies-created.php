<?php

/**
 * User Replies Created
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_user_replies' ); ?>

<style>
	#bbpress-forums ul.bbp-replies{
		overflow :visible;
		border:none;
		margin-top :0px
	}

	.avatar-80{
		position: static;
		width: 24px;
		height: 24px;
		left: 0px;
		top: 0px;
		flex: none;
		order: 0;
		flex-grow: 0;
		margin: 0px 8px;
		border-radius:50%;
		float:left;
	}

	.bbp-reply-author{
		display: block;
    	width: 100% !important;
	}

	.bbp-author-link, .bbp-author-link a {
		display:inline !important;
		float:left;
		font-weight:bold;
		font-size:16px;
	}

	.bbp-reply-content{
		display: block;
		float: left;
		margin-left: 0px !important;
		width: 100%;
		padding: 12px 24px !important;
		background : #ECEEF0;		
		border-radius: 10px;
		margin: 10px auto;
	}

	.loop-item-0 .bbp-reply-content, .loop-item-1 .bbp-reply-content{
		background: #FFF3D7 !important;
		margin-bottom:20px
	}

	.bbp-author-name{
		display: inline !important;
	}

	.loop-item-1::after{
		border-bottom: 1px #BEC5CC solid;
		content: "old messages";
		font-size:16px;
		font-weight:lighter;
		display:block;
		width:100%;
		text-align:center;
		padding-bottom:10px;
	}

	.ellipse{
		position: static;
		width: 4px;
		height: 4px;
		left: 114px;
		top: 10px;
		background: #0B4F6D;
	}

	.bbp-reply-post-date{
		padding: 0px !important;
    	border-top: none !important;
    	border-bottom: none !important; 
     	margin-bottom: 0px !important;
		float :right;
	}

	.bbp-header a{
		float: left;
		font-size: 16px !important;
		color: #0B4F6D;
		margin-left :10px
	}

	.bbp-reply-header{
		display: none;
	}

</style>

<div class="row">
    <div class="col-lg-9 col-md-12 col-sm-12" id="bbp-user-body">
		<div id="bbp-user-replies-created" class="bbp-user-replies-created">
		<p class="mb-0"><b>Discussion Board</b></p>
        <hr/>

			<div class="bbp-user-section">

				<?php if ( bbp_get_user_replies_created() ) :

					do_action( 'bbp_template_before_replies_loop' ); ?>

					<ul id="topic-<?php bbp_topic_id(); ?>-replies" class="forums bbp-replies">

						<li class="bbp-body">

							<?php if ( bbp_thread_replies() ) : ?>

								<?php bbp_list_replies(); ?>

							<?php else : ?>

								<?php while ( bbp_replies() ) : bbp_the_reply(); ?>

								<div <?php bbp_reply_class(); ?>>
									<div class="bbp-reply-author">

										<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>

										<?php bbp_reply_author_link(); ?><i class="ggrc-icon ggrc-ellipse"> </i>
										<span class="bbp-header">
											<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
										</span>
										
										<span class="bbp-reply-post-date"><?php bbp_reply_post_date('d.m.yy'); ?></span>

										<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>

									</div>
									<!-- .bbp-reply-author -->

									<div class="bbp-reply-content">

										<?php do_action( 'bbp_theme_before_reply_content' ); ?>

										<?php bbp_reply_content(); ?>

										<?php do_action( 'bbp_theme_after_reply_content' ); ?>

									</div><!-- .bbp-reply-content -->
								</div><!-- .reply -->

								<div id="post-<?php bbp_reply_id(); ?>" class="bbp-reply-header">
									<div class="bbp-meta">

										<?php if ( bbp_is_single_user_replies() ) : ?>

											<span class="bbp-header">
												<?php esc_html_e( 'in reply to: ', 'bbpress' ); ?>
												<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
											</span>

										<?php endif; ?>

										<!-- <a href="<?php //bbp_reply_url(); ?>" class="bbp-reply-permalink">#<?php //bbp_reply_id(); ?></a> -->

										<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

										<?php bbp_reply_admin_links(); ?>

										<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>

									</div>
									<!-- .bbp-meta -->
								</div><!-- #post-<?php bbp_reply_id(); ?> -->

								<?php endwhile; ?>

							<?php endif; ?>

						</li><!-- .bbp-body -->
					</ul><!-- #topic-<?php bbp_topic_id(); ?>-replies -->

					<?php do_action( 'bbp_template_after_replies_loop' ); ?>

				<?php else : ?>

					<?php bbp_get_template_part( 'feedback', 'no-replies' ); ?>

				<?php endif; ?>

			</div>
		</div><!-- #bbp-user-replies-created -->
	</div>
	<div class="col-lg-3 col-md-12 col-sm-12">
		<?php

		$args = array (
			'post_type'=> 'topic'
		);

		$the_query2 = new WP_Query($args);

		?>
        <div class="row ms-0" id="discussion-topics">
            <p><b>Might interest you</b></p>
            <hr/>

			<?php if($the_query2->have_posts()){
				while($the_query2->have_posts()) {
					$the_query2->the_post(); ?>
					<div class="col-lg-12 col-md-12 col-sm-12 no-padding-left no-padding-right mb-10">
						<div class="discussion">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="discussion-cover"/>
							
						<div class="initiative-list-detail">
						
							<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
							<?php the_excerpt(); ?>									
								
						</div>
						</div>
					</div>
			<?php } ?>
			<?php } ?>
       
        </div>
        
    </div>

</div>

<?php do_action( 'bbp_template_after_user_replies' );
