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
	<link rel="stylesheet" href="../wp-content/themes/oceanwp/assets/bootstrap-4.4.1-dist/css/bootstrap-grid.css">

	<?php wp_head(); ?>
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

				<?php do_action( 'ocean_page_header' ); ?>


	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr">

			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="site-content clr">

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php

				$args = array (
					'post_type'=> 'news'
				);

				$the_query = new WP_Query($args);

			?>
			 <div class="row">
			<?php if($the_query->have_posts()){
				 while($the_query->have_posts()) {
					 $the_query->the_post(); ?>
					<div class="col-lg-6 col-md-6 col-sm-12">
					<div style="background-color:#fff;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-bottom:15px;border-radius:5px;padding:15px;">
					<h2><?php the_title(); ?></h2> 
					<?php 
					$the_post_id = get_the_ID();
					$news_agencies = get_post_meta($the_post_id, 'news');
					$tags = wp_get_post_terms($the_post_id, 'post_tag', ['']);
					if(empty($news_agencies) || ! is_array($news_agencies)){
						echo "No news agency";
					}else{
						foreach($news_agencies[0] as $newsagency){
							?>
							<a href="<?php echo $newsagency['Link'] ?>" target="_blank"><img src="<?php echo z_taxonomy_image_url($newsagency['Agency']); ?>" width="10%" /></a>
							
						<?php 
						}
					} ?> <br><br> <?php

					if(empty($tags) || ! is_array($tags)){
						echo "No Tags";
					}else{
						
						foreach($tags as $key => $posttags){
							
							
							?>
							<b><a href="<?php echo get_term_link($posttags->term_id, 'post_tag'); ?>" target="_blank" style="border: 1px solid #ccc; border-radius: 8px; padding:8px; margin-left:5px; background-color:#5ba3bb94; color:#275f87"><?php echo esc_html($posttags->name); ?></a></b>
							
						<?php 
							
						}
					}
					?>
					
				</div>
				</div>
			<?php } ?>
			<?php } ?>

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
