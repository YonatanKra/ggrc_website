<?php

/* Template Name: InitiativeTemplate */ 


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
	<link rel="stylesheet" href="../wp-content/themes/oceanwp/assets/fontawesome-free-6.0.0-web/css/all.css">

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

				<?php //do_action( 'ocean_page_header' ); ?>
				<div style="height:250px; background: linear-gradient(0deg, rgba(255 255 255 / 80%), rgba(255 255 255 / 80%)), url(http://localhost/ggrc_website/wp-content/uploads/2022/01/Arctic-Terns-Steven-Calcote-scaled.jpg); background-size:cover;">
					<div class="row" style="padding-top: 12.5rem; padding-left:7%">
						<div class="col-lg-7 col-md-7 col-sm-12">
							<h6 style="margin-bottom:0">Suggest Initiatives</h6>
							<p style="margin:0px;font-size:12px"><b>Do you know of any interesting action around you promoting green recovery? Are you involved with an intervention? We want to know </b></p>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12">
							
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12">
							<button style="background-image: linear-gradient(to right, #023162 , #6292c5);border: none;border-radius: 30px;padding: 10px;color: #fff;"><b>Suggest an initiative</b></button>
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

				$args = array (
					'post_type'=> 'initiative'
				);

				$the_query = new WP_Query($args);

			?>

		<div class="row">
			<?php if($the_query->have_posts()){
				 while($the_query->have_posts()) {
					 $the_query->the_post(); ?>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div style="background-color:#fff;margin-bottom:15px;border-radius:5px;border:1px solid #ddd">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" width="100%" style="height:90px !important; object-fit:cover"/>
							
						<div style="padding:8px">
						<?php 
							
							$the_post_id = get_the_ID();
							$action = wp_get_post_terms($the_post_id, 'initiative_type', ['']);
							// $tags = wp_get_post_terms($the_post_id, 'post_tag', ['']);
							
							if(empty($action) || ! is_array($action)){
								echo "";
							}else{
								
								foreach($action as $key => $takeaction){
									
									?>
									<p style="margin-bottom:0px; display:inline;font-size:12px; color:#fff; background-color:orange;border-radius:10px;margin-top:-9rem;position:absolute;padding:0 4px "> 
									<i class="fa-solid fa-circle-exclamation"></i>	<?php echo esc_html($takeaction->name); ?></p>
								<?php 
									
								}
							}?>
							<p style="color:orange;font-size:10px;margin-bottom:0px"><b>30 Supporters</b></p>
								<p style="margin-bottom:5px"><b><?php the_title(); ?></b></p> 
								<?php the_excerpt(); ?>
								<hr style="margin:0px"/>
								<i class="fa-solid fa-map-location-dot"></i> <?php the_field('venue') ?><br>
								<i class="fa-solid fa-anchor"></i> <?php the_field('region') ?><br>
								
							</div>
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
