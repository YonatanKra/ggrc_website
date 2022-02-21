
<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */

?>
<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<style>
		.single .entry-title{
			display:none;
		}
		.wpulike-heart .wp_ulike_general_class{
			background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%) !important;
			box-shadow: 2px 3px 9px rgba(0, 0, 0, 0.2) !important;
			border-radius: 30px !important;
		}

		.wpulike-heart .count-box{
			color: #fff !important
		}

		.ess-all-networks-button, #ess-main-wrapper .ess-total-share{
			background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%) !important;
			box-shadow: 2px 3px 9px rgba(0, 0, 0, 0.2) !important;
			border-radius: 30px !important;
		}

		#initiative-contact img{
			border-radius: 50% !important;
			float:left;
		}
	</style>
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
					
								<div style="height:auto; background: linear-gradient(0deg, rgba(255 255 255 / 80%), rgba(255 255 255 / 80%)), url(http://localhost/ggrc_website/wp-content/uploads/2022/01/Arctic-Terns-Steven-Calcote-scaled.jpg); 
								background-size:cover; border-bottom:1px solid #f1f1f1; padding:10rem 9rem 4rem 9rem">
								<a href="../../initiative">back to explore initiatives</a>
									<div class="row" style="margin-top:3rem">
										
										<div class="col-md-2 col-lg-2 col-sm-4">
											<p style="font-size:12px"><i class="fa fa-users"></i> <?php the_field('venue') ?></p>
										</div>
										<div class="col-md-2 col-lg-2 col-sm-4">
											<p style="font-size:12px"><i class="fa fa-map-marker-alt"></i> <?php the_field('region') ?></p>
										</div>
										<div class="col-md-3 col-lg-3 col-sm-4">
											<p style="font-size:12px"><i class="fa fa-clock"></i> last updated <?php the_modified_time('F jS, Y') ?></p>
										</div>
										<div class="col-md-5 col-lg-5 col-sm-6" style="text-align:right;margin-bottom:30px">
											<a href="<?php the_field('website') ?>" target="_blank" style="color:#0B4F6D !important;font-size:12px;text-decoration:underline;margin-right:10px">View site</a>
											<a href="" target="_blank" style="background: transparent;box-shadow: 2px 3px 9px rgba(11, 79, 109, 0.2);border-radius: 30px;
											color:#0B4F6D;padding:8px;margin-right:10px; border:2px solid #0B4F6D"><i class="fa-solid fa-share-alt"></i> share initiative
											</a>
											<a href="" target="_blank" style="background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%);
											box-shadow: 2px 3px 9px rgba(11, 79, 109, 0.2);border-radius: 30px;color:#fff;padding:10px;margin-right:10px"> follow initiative
											</a>
										</div>
										
									</div>
									<div class="row">
										<div class="col-md-6 col-lg-6 col-sm-12">
									
										<h1><?php the_title(); ?></h1>
										<span style="text-align:justify;font-family: Lato; font-size:14px;line-height:150%"><?php the_content(); ?></span>
										<?php 
										$the_post_id = get_the_ID();
										$tags = wp_get_post_terms($the_post_id, 'initiative_tags', ['']);
										
										if(empty($tags) || ! is_array($tags)){
											echo "No Tags";
										}else{

											foreach($tags as $key => $posttags){
												?>
												<a href="<?php echo get_term_link($posttags->term_id, 'initiative_tags'); ?>" target="_blank" 
												style="background: #EFF3F5;border: 1px solid #D8E3E8;box-sizing: border-box;border-radius: 8px; color:#0B4F6D;padding:8px"><?php echo esc_html($posttags->name); ?></a>
												
											<?php 
												
											}
										} ?>
										<br><br>
										<hr style="border: 1px solid #BEC5CC; height:0;margin-bottom:7px"/>
										<p style="line-height:20px;font-size:14px;margin-bottom:0"><span><b>GGRC priorities: </b></span> <?php the_field('ggrc-priorities'); ?></p>
										<hr style="border: 1px solid #BEC5CC; height:0;margin-top:7px"/>
										<br><br>
										</div>
										<div class="col-md-6 col-lg-6 col-sm-12">
											<img src="<?php echo get_the_post_thumbnail_url(); ?>" />
										</div>
									</div>

								</div>

								<?php } 
							} else { ?>

								<div style="height:200px; background: linear-gradient(0deg, rgba(255 255 255 / 80%), rgba(255 255 255 / 80%)), url(http://localhost/ggrc_website/wp-content/uploads/2022/01/Arctic-Terns-Steven-Calcote-scaled.jpg); 
								background-size:cover; border-bottom:1px solid #f1f1f1;">					
								
								</div>
								

							<?php } ?>
	
					
					<?php endwhile; ?>
	<div id="content-wrap" class="container clr" style="padding-top:100px">

		<?php do_action( 'ocean_before_primary' ); ?>

		
		<div id="primary" class="content-area clr" style="border-right-width: 0;padding-right:0">

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
						<div style="height:auto; background: #FFD670;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.06), 4px 4px 24px 3px rgba(0, 0, 0, 0.1);padding:35px 15px 15px 15px;border-radius:2px;margin-top:-14rem">
							<div class="row">
								<div class="col-md-3 col-lg-3 col-sm-12">
									<div class="row">
										<div class="col-md-12 col-lg-12 col-sm-12" style="text-align:center">
											<h1>How to Take Action:</h1>
										</div>
									</div>
								</div>
								<div class="col-md-9 col-lg-9 col-sm-12">
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
										<p><a href="<?php echo get_term_link($postaction->term_id, 'actiontype'); ?>" target="_blank" 
										style="background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%);
										box-shadow: 2px 3px 9px rgba(11, 79, 109, 0.2);border-radius: 30px;color:#fff;padding:12px">
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
									<div class="col-md-2 col-lg-2 col-sm-4">
										<p style="font-size:12px"><i class="fa fa-users"></i> <?php the_field('venue') ?></p>
									</div>
									<div class="col-md-2 col-lg-2 col-sm-4">
										<p style="font-size:12px"><i class="fa fa-map-marker-alt"></i> <?php the_field('region') ?></p>
									</div>
									<div class="col-md-3 col-lg-3 col-sm-4">
										<p style="font-size:12px"><i class="fa fa-clock"></i> last updated <?php the_modified_time('F jS, Y') ?></p>
									</div>
									<div class="col-md-5 col-lg-5 col-sm-6" style="text-align:right">
										<a href="<?php the_field('website') ?>" target="_blank" style="color:#0B4F6D !important;font-size:12px;text-decoration:underline;margin-right:10px">View site</a>
										<a href="" target="_blank" style="background: transparent;box-shadow: 2px 3px 9px rgba(11, 79, 109, 0.2);border-radius: 30px;
										color:#0B4F6D;padding:8px;margin-right:10px; border:2px solid #0B4F6D"><i class="fa-solid fa-share-alt"></i> share initiative
										</a>
										<a href="" target="_blank" style="background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%);
										box-shadow: 2px 3px 9px rgba(11, 79, 109, 0.2);border-radius: 30px;color:#fff;padding:10px;margin-right:10px"> follow initiative
										</a>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-6 col-lg-6 col-sm-12">
								
									<h1><?php the_title(); ?></h1>
									<span style="text-align:justify;font-family: Lato; font-size:14px;line-height:150%"><?php the_content(); ?></span>
									<?php 
									$the_post_id = get_the_ID();
									$tags = wp_get_post_terms($the_post_id, 'initiative_tags', ['']);
									
									if(empty($tags) || ! is_array($tags)){
										echo "No Tags";
									}else{

										foreach($tags as $key => $posttags){
											?>
											<a href="<?php echo get_term_link($posttags->term_id, 'initiative_tags'); ?>" target="_blank" 
											style="background: #EFF3F5;border: 1px solid #D8E3E8;box-sizing: border-box;border-radius: 8px; color:#0B4F6D;padding:8px"><?php echo esc_html($posttags->name); ?></a>
											
										<?php 
											
										}
									} ?>
									<br><br>
									<hr style="border: 1px solid #BEC5CC; height:0;margin-bottom:7px"/>
									<p style="line-height:20px;font-size:14px;margin-bottom:0"><span><b>GGRC priorities: </b></span> <?php the_field('ggrc-priorities'); ?></p>
									<hr style="border: 1px solid #BEC5CC; height:0;margin-top:7px"/>
									<br><br>
									</div>
									<div class="col-md-6 col-lg-6 col-sm-12">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>" />
									</div>
								</div>
																
						<?php } ?>

						<div class="row" style="margin-top:60px">	
												
							<div class="col-md-3 col-lg-3 col-sm-12" id="initiative-contact">
								<h5>People for Initiative</h5>
								<p><b>Contacts for initiative</b></p>
								<?php $post_id = get_the_ID();
										$author_id = get_post_field( 'post_author', $post_id );
										$author_name = get_the_author_meta( 'display_name', $author_id );
											
										echo get_avatar( get_the_author_meta('ID'), 60);										
								?>
								<div style="float:left;margin-left:8px;line-height:18px">
									<p style="margin-bottom:0;"><b><?php echo $author_name ?></b></p>
									<p style="margin-bottom:0;">title</p>
									<p style="margin-bottom:0;">organisation</p>
								</div>
								<div style="float:left;margin-top:20px">									
									<a href="#" target="_blank" style="color:#0B4F6D !important;font-size:12px;margin-right:18px">view profile</a>
									<a href="#" target="_blank" style="background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%);
									box-shadow: 2px 3px 9px rgba(11, 79, 109, 0.2);border-radius: 30px;color:#fff;padding:7px;"> send message</a>
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
