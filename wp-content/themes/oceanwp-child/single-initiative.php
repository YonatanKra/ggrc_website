
<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */

//include 'features/related_posts.php';
//include 'features/follow_posts.php';

?>
<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
]
</head>

<body <?php body_class(); ?> <?php oceanwp_schema_markup( 'html' ); ?>>

	<?php wp_body_open(); ?>

	<?php do_action( 'ocean_before_outer_wrap' ); ?>

	<div id="outer-wrap" class="site clr">

		<a class="skip-link screen-reader-text" href="#main"><?php oceanwp_theme_strings( 'owp-string-header-skip-link', 'oceanwp' ); ?></a>

		<?php do_action( 'ocean_before_wrap' ); ?>

		<div id="wrap" class="clr">

			<?php do_action( 'ocean_top_bar' ); ?>

			<?php do_action( 'ocean_header' ); ?>

			<?php do_action( 'ocean_before_main' ); ?>

			<main id="main" class="site-main clr"<?php oceanwp_schema_markup( 'main' ); ?> role="main">

				<?php //do_action( 'ocean_page_header' ); ?>

				

				<?php do_action( 'ocean_before_content_wrap' ); ?>
				<?php while ( have_posts() ) :
							the_post(); 

							$the_post_id = get_the_ID();
							$type = wp_get_post_terms($the_post_id, 'initiative_type', ['']);
							
							if(!empty($type) && is_array($type)){
								//echo "No type";
								if($type[0]->name == "Take Action"){								

								?>
					
								<div class="action-subheader">
								<a href="../../initiative">back to explore initiatives</a>
									<div class="row" style="margin-top:3rem">
										
										<div class="col-md-2 col-lg-2 col-sm-4">
											<p><i class="fa fa-users"></i> <?php the_field('venue') ?></p>
										</div>
										<div class="col-md-2 col-lg-2 col-sm-4">
											<p><i class="fa fa-map-marker-alt"></i> <?php the_field('region') ?></p>
										</div>
										<div class="col-md-2 col-lg-2 col-sm-4">
											<p><i class="fa fa-clock"></i> last updated <?php the_modified_time('F jS, Y') ?></p>
										</div>
										<div class="col-md-1 col-lg-1 col-sm-1">
										</div>
										<div class="col-md-5 col-lg-5 col-sm-6" style="text-align:right;margin-bottom:30px">
											<a href="<?php the_field('website') ?>" target="_blank" class="initiative-website">View site</a>
											<button class="share-initiative"><i class="fa-solid fa-share-alt"></i> share initiative
											</button>
											<button id="follow" class="template-btn"> follow initiative
											</button>
										</div>
										
									</div>
									<div class="row">
										<div class="col-md-6 col-lg-6 col-sm-12">
									
										<h2><?php the_title(); ?></h2>
										<span style="line-height:150%"><?php the_content(); ?></span>
										<?php 
										$the_post_id = get_the_ID();
										$tags = wp_get_post_terms($the_post_id, 'initiative_tags', ['']);
										
										if(empty($tags) || ! is_array($tags)){
											echo "No Tags";
										}else{

											foreach($tags as $key => $posttags){
												?>
												<p style="display:inline"><a href="<?php echo get_term_link($posttags->term_id, 'initiative_tags'); ?>" target="_blank" class="initiative-tags"><?php echo esc_html($posttags->name); ?></a></p>
												
											<?php 
												
											}
										} ?>
										<br><br>
										<hr/>
										<p class="ggrc-priorities"><span><b>GGRC priorities: </b></span> <?php the_field('ggrc-priorities'); ?></p>
										<hr/>
										<br><br>
										</div>
										<div class="col-md-6 col-lg-6 col-sm-12">
											<img src="<?php echo get_the_post_thumbnail_url(); ?>" />
										</div>
									</div>

								</div>

								<?php } 
							} else { ?>

								<div class="learn-subheader">					
								
								</div>
								

							<?php } ?>
	
					
					<?php endwhile; ?>
	<div id="content-wrap" class="container clr" style="padding-top:100px">

		<?php do_action( 'ocean_before_primary' ); ?>

		
		<div id="primary" class="content-area clr no-border">

			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="site-content clr">

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php
				// Elementor `single` location.
				if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

					// Start loop.
					while ( have_posts() ) :
						the_post(); 

							$the_post_id = get_the_ID();
							$type = wp_get_post_terms($the_post_id, 'initiative_type', ['']);
							
							if(!empty($type) && is_array($type)){
								//echo "No type";
								if($type[0]->name == "Take Action"){								

								?>
						<div class="how-to-take-action">
							<div class="row">
								<div class="col-md-4 col-lg-4 col-sm-12">
									<div class="row">
										<div class="col-md-12 col-lg-12 col-sm-12" style="text-align:center">
											<h2>How to Take Action:</h2>
										</div>
									</div>
								</div>
								<div class="col-md-8 col-lg-8 col-sm-12">
									<div class="row">
						<?php 
							$the_post_id = get_the_ID();
							$actions = wp_get_post_terms($the_post_id, 'actiontype', ['']);
							
							if(empty($actions) || ! is_array($actions)){
								echo "No Actions";
							}else{
								
								foreach($actions as $key => $postaction){									
									
									?>
									<div class="col-md-6 col-lg-4 col-sm-6" style="text-align:center">
										<p><a href="<?php echo get_term_link($postaction->term_id, 'actiontype'); ?>" target="_blank" class="action-btn">
										<?php echo esc_html($postaction->name); ?></a></p>
									</div>
								<?php 
									
								}
							} ?>
									</div>
								</div>
							</div>
						</div>

						<?php } 
							} else { ?>

								<a href="../../initiative" >back to explore initiatives</a>
								
								<div class="row" style="margin-top:3rem">
									<div class="col-md-7 col-lg-7 col-sm-12">
								
									<h2><?php the_title(); ?></h2>
									<span style="line-height:150%"><b>Description:</b> <br><?php the_content(); ?></span>
									
									<p class="initiative-goal"><span><b>Goal: </b></span><br> <?php the_field('initiative-goal'); ?></p>
									
									<?php 
									$the_post_id = get_the_ID();
									$tags = wp_get_post_terms($the_post_id, 'initiative_tags', ['']);
									
									if(empty($tags) || ! is_array($tags)){
										echo "No Tags";
									}else{

										foreach($tags as $key => $posttags){
											?>
											<p style="display:inline"><a href="<?php echo get_term_link($posttags->term_id, 'initiative_tags'); ?>" target="_blank" class="initiative-tags"><?php echo esc_html($posttags->name); ?></a></p>
											
										<?php 
											
										}
									} ?>
									
									<br><br>
									</div>
									<div class="col-md-1 col-lg-1 col-sm-12">

									</div>
									<div class="col-md-4 col-lg-4 col-sm-12 learn-rightside">
										<p><i class="fa fa-users"></i> <?php the_field('venue') ?></p>
										<p><i class="fa fa-map-marker-alt"></i> <?php the_field('region') ?></p>
										<p><i class="fa fa-clock"></i> <?php the_field('initiative-duration') ?></p>
										<p><i class="fa fa-globe"></i> <a href="<?php the_field('website') ?>" target="_blank" class="initiative-website"><?php the_field('website') ?></a></p>
										<p style="line-height:20px;margin-bottom:0"><span><b>GGRC priorities: </b></span> <?php the_field('ggrc-priorities'); ?></p>
									</div>
								</div>
								<div class="row" style="margin-top:3rem">
									<div class="col-md-12 col-lg-12 col-sm-12">
										<h4><b>Additional Resources</b></h4>
										<div class="row">
											<div class="col-md-3 col-lg-3 col-sm-12 add-res">
												<p><i class="fa fa-file"></i></p>
											</div>
											
										</div>
									</div>
								</div>

																
						<?php } ?>

						<div class="row" style="margin-top:60px">	
												
							<div class="col-md-3 col-lg-3 col-sm-12" id="initiative-contact">
								<h3>People for Initiative</h3>
								<p><b>Contacts for initiative</b></p>
								<?php $post_id = get_the_ID();
										$author_id = get_post_field( 'post_author', $post_id );
										$author_name = get_the_author_meta( 'display_name', $author_id );
											
										echo get_avatar( get_the_author_meta('ID'), 60);										
								?>
								<div style="float:left;margin-left:8px;line-height:18px">
									<h4 class="no-margin"><b><?php echo $author_name ?></b></h4>
									<p class="no-margin">title</p>
									<p class="no-margin">organisation</p>
								</div>
								<div style="float:left;margin-top:20px">									
									<a href="#" target="_blank" class="profile">view profile</a>
									<a href="#" target="_blank" class="template-btn"> send message</a>
								</div>
							</div>
							<div class="col-md-9 col-lg-9 col-sm-12" style="margin-top:42px;border-left:1px solid #BEC5CC;">
								<div class="row" style="padding-left:20px">									
									<p><b>Following this initiative</b></p>
									<div class="col-md-3 col-lg-3 col-sm-12">
									</div>
									<div class="col-md-3 col-lg-3 col-sm-12">
									</div>
									<div class="col-md-3 col-lg-3 col-sm-12">
									</div>
								</div>
							</div>
						</div>
											
						<?php
						//get_template_part( 'partials/single/related-posts' );
						comments_template();

						
						//add_posts_to_initiative_pages();
						do_action('get_related_news');
						//follow_initiative();

						//add_action( 'plugin/related_posts', 'add_posts_to_initiative_pages' );

					endwhile;

				}
				?>

				<?php do_action( 'ocean_after_content_inner' ); ?>

			</div><!-- #content -->

			<?php do_action( 'ocean_after_content' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'ocean_after_primary' ); ?>

	</div><!-- #content-wrap -->

	<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php get_footer(); ?>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
	
	$(function(){
		$('#follow').click(function(){
			$.ajax({
				url:'../../wp-content/themes/oceanwp/features/follow_posts.php',
				success:function(response){ alert(response); }
			}); // this will alert the code generated in example.php
		});
	});
		
	
		
</script> -->
