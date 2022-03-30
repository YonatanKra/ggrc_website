<?php

/**
 * User Profile
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( bbp_is_single_user_profile() ) { ?>

<style>

	#bbp-single-user-details{
		background: #fff;
		box-shadow: 2px 4px 17px 1px rgb(0 0 0 / 13%);
		border-radius: 3px;
		height: 100%;
		padding:10px;
	}

	#bbp-user-avatar{
		width: 100% !important;
		padding-top :70px;
	}

	.avatar-150{
		border-radius : 50%;
		display: block !important;
		margin: 50px 25% !important;
		position: absolute;
		box-shadow: 5px 5px 19px 2px rgba(0, 0, 0, 0.18) !important;
		top:-97px;
		z-index: 1000;
	}

	#bbpress-forums #bbp-single-user-details #bbp-user-navigation{
		margin-left:0px
	}

	#bbpress-forums #bbp-single-user-details #bbp-user-navigation li{
		width:100%;
		font-size:16px
	}

	#bbp-profile-body{
		background: #F9F9FA;
		box-shadow: 0px 4px 18px rgba(253, 186, 26, 0.1);
		border-radius: 3px;
		margin-top:100px;
		padding:20px
	}

	#bbp-profile-bio{
		margin: 30px auto;
		padding:10px;
	}

	#bbp-user-profile #text{
		display:none;
	}
	
</style>

	<div id="bbpress-forums" class="bbpress-wrapper">

	<?php do_action( 'bbp_template_notices' ); ?>

	<?php do_action( 'bbp_template_before_user_wrapper' ); ?>

	<div id="bbp-user-wrapper">

		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12" id="bbp-profile-bio">
			<?php do_action( 'bbp_template_before_user_details' ); ?>
				<div id="bbp-single-user-details">
					<div id="bbp-user-avatar">
						<span class='vcard'>
							<a class="url fn n" href="<?php bbp_user_profile_url(); ?>" title="<?php bbp_displayed_user_field( 'display_name' ); ?>" rel="me">
								<?php echo get_avatar( bbp_get_displayed_user_field( 'user_email', 'raw' ), apply_filters( 'bbp_single_user_details_avatar_size', 150 ) ); ?>
							</a>
						</span>
					</div>
					<div class="align-center">
						<h4 class="no-margin-bottom"><?php bbp_displayed_user_field( 'display_name' ); ?></h4>
						<p class="no-margin-bottom">Title</p>
						<p>Country</p>
						<a class="ggrc-btn-blue-sm"><i class="ggrc-icon ggrc-send"></i> send message</a>
					</div>
					<p class="mt-20"><b>Bio</b></p>
					<p><?php bbp_displayed_user_field( 'description' ); ?></p>
				</div>

			<?php do_action( 'bbp_template_after_user_details' ); ?>
			</div>
			<div class="col-lg-9 col-md-8 col-sm-12" id="bbp-profile-body">

			<?php do_action( 'bbp_template_before_user_profile' ); ?>

			<div id="bbp-user-profile" class="bbp-user-profile">
			<h4 class="no-margin-bottom">Content by <?php bbp_displayed_user_field( 'display_name' ); ?></h4>
        	<hr/>

			<?php

				$author_id= get_current_user_id();

				$args = array (
					'post_type'=> 'initiative',
					'posts_per_page' => 3,
					'author' => $author_id
				);

				$the_query = new WP_Query($args);

			?>

			<p><b>Initiatives</b></p>
			<div class="row">
				
				<?php if($the_query->have_posts()){
					while($the_query->have_posts()) {
						$the_query->the_post(); ?>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="initiative-list">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="initiative-cover"/>
								
							<div class="initiative-list-detail">
							<?php 
								
								$the_post_id = get_the_ID();
								$action = wp_get_post_terms($the_post_id, 'initiative_type', ['']);
								
								if(empty($action) || ! is_array($action)){
									echo "";
								}else{
									
									foreach($action as $key => $take_action){
										
										?>
										<p class="action-type"> 
										<i class="ggrc-icon exclamation-mark"></i> <?php echo esc_html($take_action->name); ?></p>
									<?php 
										
									}
								}?>
									<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
									<?php the_excerpt(); ?>
									<hr/>
									<p class="no-margin"><i class="ggrc-icon map margin-right"></i> <?php the_field('venue') ?></p>
									<p class="no-margin"><i class="ggrc-icon users margin-right"></i> <?php the_field('region') ?></p>
									
							</div>
							</div>
						</div>
				<?php } ?>
				<?php } ?>

			</div>

			<?php

				$args = array (
					'post_type'=> 'blog_post',
					'posts_per_page' => 3,
					'author' => $author_id,
					'tax_query' => array(
						array(
						'taxonomy' => 'blog-category',
						'field' => 'slug',
						'terms' => array( 'blog' ),
						))
				);

				$the_query1 = new WP_Query($args);

			?>

			<p><b>Blog posts</b></p>
			<div class="row">
				
				<?php if($the_query1->have_posts()){
					while($the_query1->have_posts()) {
						$the_query1->the_post(); ?>
						<div class="col-lg-4 col-md-6 col-sm-12">
							
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="blog-cover"/>
								
							<div class="initiative-list-detail">
							<?php 
								
								$the_post_id = get_the_ID();
								$blog = wp_get_post_terms($the_post_id, 'blog-category', ['blog']);
								
								if(empty($blog) || ! is_array($blog)){
									echo "";
								}else{
									
									foreach($blog as $key => $blog_cat){
										
										?>
										<p class="blog-category links"><?php echo esc_html($blog_cat->name); ?></p>
									<?php 
										
									}
								}?>
									<a href="<?php the_permalink(); ?>"><p class="blog-title-profile"><?php the_title(); ?></p></a>
			
									
							</div>
						</div>
				<?php } ?>
				<?php } ?>

			</div>

			<?php

				$args = array (
					'post_type'=> 'topic',
					'posts_per_page' => 3,
					'author' => $author_id
				);

				$the_query2 = new WP_Query($args);

			?>

			<p><b>Discussion Boards</b></p>
			<div class="row">
				
				<?php if($the_query2->have_posts()){
					while($the_query2->have_posts()) {
						$the_query2->the_post(); ?>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="discussion">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="discussion-cover"/>
								
							<div class="initiative-list-detail">
							<?php 
								
								$the_post_id = get_the_ID();
								$action = wp_get_post_terms($the_post_id, 'initiative_type', ['']);
								
								if(empty($action) || ! is_array($action)){
									echo "";
								}else{
									
									foreach($action as $key => $take_action){
										
										?>
										<p class="action-type"> 
										<i class="ggrc-icon exclamation-mark"></i> <?php echo esc_html($take_action->name); ?></p>
									<?php 
										
									}
								}?>
									<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
									<?php the_excerpt(); ?>
									
									
							</div>
							</div>
						</div>
				<?php } ?>
				<?php } ?>

			</div>




				<!-- <h2 class="entry-title">@<?php bbp_displayed_user_field( 'user_nicename' ); ?></h2>
				<div class="bbp-user-section">
					<h3><?php esc_html_e( 'Profile', 'bbpress' ); ?></h3>
					<p class="bbp-user-forum-role"><?php  printf( esc_html__( 'Registered: %s', 'bbpress' ), bbp_get_time_since( bbp_get_displayed_user_field( 'user_registered' ) ) ); ?></p>

					<?php if ( bbp_get_displayed_user_field( 'description' ) ) : ?>

						<p class="bbp-user-description"><?php echo bbp_rel_nofollow( bbp_get_displayed_user_field( 'description' ) ); ?></p>

					<?php endif; ?>

					<?php if ( bbp_get_displayed_user_field( 'user_url' ) ) : ?>

						<p class="bbp-user-website"><?php  printf( esc_html__( 'Website: %s', 'bbpress' ), bbp_rel_nofollow( bbp_make_clickable( bbp_get_displayed_user_field( 'user_url' ) ) ) ); ?></p>

					<?php endif; ?>

					<hr>
					<h3><?php esc_html_e( 'Forums', 'bbpress' ); ?></h3>

					<?php if ( bbp_get_user_last_posted() ) : ?>

						<p class="bbp-user-last-activity"><?php printf( esc_html__( 'Last Activity: %s',  'bbpress' ), bbp_get_time_since( bbp_get_user_last_posted(), false, true ) ); ?></p>

					<?php endif; ?>

					<p class="bbp-user-topic-count"><?php printf( esc_html__( 'Topics Started: %s',  'bbpress' ), bbp_get_user_topic_count() ); ?></p>
					<p class="bbp-user-reply-count"><?php printf( esc_html__( 'Replies Created: %s', 'bbpress' ), bbp_get_user_reply_count() ); ?></p>
					<p class="bbp-user-forum-role"><?php  printf( esc_html__( 'Forum Role: %s',      'bbpress' ), bbp_get_user_display_role() ); ?></p>
				</div> -->
			</div><!-- #bbp-author-topics-started -->

			<?php do_action( 'bbp_template_after_user_profile' ); ?>

			</div>
		</div>
	</div>

	<?php do_action( 'bbp_template_after_user_wrapper' ); ?>

</div>

<?php } ?>
