<?php

/* Template Name: NewsTemplate */ 


?>

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
</head>

<style type="text/css">
	
	#agency div {
	    margin-right:10px !important;
	}

	#site-navigation-wrap .dropdown-menu>li>a{
		padding: 0px 8px !important;		
	}

</style>

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

				<?php

					$args = array (
						'post_type'=> 'news'
					);

					$the_query = new WP_Query($args);

					$first_post = $the_query->posts[0];

					//var_dump($first_post);

				?>

				<div class="news_header pt-150">
					<div class="row">
						<div class="col-lg-6 col-md-7 col-sm-12">
							<div class="news-box p-20" >
								<h3><?php echo $first_post->post_title; ?></h3> 
								<p><?php echo $first_post->post_content; ?></p> 
								<?php 
								$the_firstpost_id = $first_post->ID;
								$news_agencies = get_post_meta($the_firstpost_id, 'news');
								$tags = wp_get_post_terms($the_firstpost_id, 'post_tag', ['']);
								?>
									<div class="row mb-20 me-0 ms-0" id="agency">
									<?php
									if(empty($news_agencies) || ! is_array($news_agencies)){
										echo " ";
									}else{
										foreach($news_agencies[0] as $newsagency){
											?>
											<div class="col-lg-5 col-md-6 col-sm-12 agency-list">
												<i class="ggrc-icon ggrc-external-link"></i> <a href="<?php echo $newsagency['Link'] ?>" target="_blank"><img src="<?php echo z_taxonomy_image_url($newsagency['Agency']); ?>" /></a>
											</div>
											
											
										<?php 
										}
									}
									?>
									</div>
									<div>
									<?php
									if(empty($tags) || ! is_array($tags)){
										echo " ";
									}else{
										
										foreach($tags as $key => $posttags){							
											
											?>
											<p style="display: inline;"><a href="<?php echo get_term_link($posttags->term_id, 'post_tag'); ?>" target="_blank" class="tags"><?php echo esc_html($posttags->name); ?></a></p>
											
										<?php 
											
										}
									}
									?>
									</div>
							</div>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-12">
							
						</div>
					</div>
				
				</div>


	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr">

			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="site-content clr">

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php

					$args1 = array (
						'post_type'=> 'news',
						'post__not_in' => array($the_firstpost_id)
					);

					$the_query1 = new WP_Query($args1);

					

				?>

			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12">
					<div class="row">
					<?php if($the_query1->have_posts()){
						 while($the_query1->have_posts()) {
							 $the_query1->the_post(); ?>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="news-box">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="initiative-cover"/>
								<p class="mb-0"><b><?php the_title(); ?></b></p> 
								<?php the_content(); ?>
								<?php 
								$the_post_id = get_the_ID();
								$news_agencies = get_post_meta($the_post_id, 'news');
								$tags = wp_get_post_terms($the_post_id, 'post_tag', ['']);
								?>
									<div class="mb-20">
									<?php
									if(empty($news_agencies) || ! is_array($news_agencies)){
										echo " ";
									}else{
										foreach($news_agencies[0] as $newsagency){
											?>
											<div class="col-lg-12 col-md-12 col-sm-12 agency-list">
												<i class="ggrc-icon ggrc-external-link"></i> <a href="<?php echo $newsagency['Link'] ?>" target="_blank"><img src="<?php echo z_taxonomy_image_url($newsagency['Agency']); ?>" /></a>
											</div>
											
										<?php 
										}
									}
									?>
									</div>
									<hr class="mb-20" />
									<div>
									<?php
									if(empty($tags) || ! is_array($tags)){
										echo " ";
									}else{
										
										foreach($tags as $key => $posttags){							
											
											?>
											<p style="display: inline;"><a href="#" target="_blank" class="tags"><?php echo esc_html($posttags->name); ?></a></p>
											
										<?php 
											
										}
									}
									?>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } ?>

					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12">
					<h3>Upcoming Events</h3>
					<p class="links"><a href="../events-calendar">go to calendar</a></p>
					<?php echo do_shortcode('[MEC id="1355"]'); ?>
				</div>
				
			</div>
			 

			<?php

				
			
				// Elementor `single` location.
				if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

					// Start loop.
					while ( have_posts() ) :
						the_post();

						get_template_part( 'partials/page/layout' );

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
