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

	<style>
		
		.widget-area.sidebar-primary {
			float: left !important;
			padding-right: 20px !important;
			padding-left:0 !important;
			width:25%;
		}

		.searchandfilter ul{
			display:grid;
		}

		.wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper{
			border-radius :5px;
		}
		input[type="button"], input[type="reset"], input[type="submit"], button[type="submit"], .button, 
		body div.wpforms-container-full .wpforms-form input[type=submit], body div.wpforms-container-full .wpforms-form button[type=submit], 
		body div.wpforms-container-full .wpforms-form .wpforms-page-button {
			background-color : #fff !important;
			color : #000 !important;
		}

		ul, ol {
			 margin: 0px;
		}

		form input[type="text"]{
			border-radius :5px !important;
			padding: 8px 8px !important;
			border-width: 1px 1px 1px 1px;
			border-color: #f1f1f1
		}

		input[type="submit"]{
			background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%);
			box-shadow: 2px 3px 9px rgba(11, 79, 109, 0.2);
			border: none;
			border-radius: 30px;
			padding: 10px;
			color: #fff !important;
			margin-top:10px;
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
				<div style="height:250px; background: linear-gradient(0deg, rgba(255 255 255 / 80%), rgba(255 255 255 / 80%)), url(http://localhost/ggrc_website/wp-content/uploads/2022/01/Arctic-Terns-Steven-Calcote-scaled.jpg); background-size:cover;">
					<div class="row" style="padding-top: 12.5rem; padding-left:7%">
						<div class="col-lg-7 col-md-7 col-sm-12">
							<h5 style="margin-bottom:0;font-size:22px !important">Suggest Initiatives</h5>
							<p style="margin:0px;font-size:14px"><b>Do you know of any interesting action around you promoting green recovery? Are you involved with an intervention? We want to know </b></p>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12">
							
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12">
							<a href="http://localhost/ggrc_website/suggest-an-initiative/" target="_blank"><button style="background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%);box-shadow: 2px 3px 9px rgba(11, 79, 109, 0.2);
							border: none;border-radius: 30px;padding: 10px;color: #fff;"><b>Suggest an initiative</b></button></a>
						</div>
					</div>
				
				</div>


	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">
		<div class="widget-area sidebar-primary">
		<?php echo do_shortcode( '[searchandfilter fields="search,initiative_type,initiative_tags" types=" 
		,checkbox,checkbox" headings=" ,Types,Related Tags"]' ); ?>
		</div>

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr" style="padding-left: 30px; border-left-width: 1px;float:left;padding-right: 0px;border-right-width: none;">

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
									<p style="margin-bottom:0px; display:inline;font-size:12px; color:#fff; background-color:#EF8607;border-radius:10px;margin-top:-9rem;position:absolute;padding:0 4px "> 
									<i class="fa-solid fa-circle-exclamation"></i>	<?php echo esc_html($takeaction->name); ?></p>
								<?php 
									
								}
							}?>
							<p style="color:#DC9C05;font-size:10px;margin-bottom:0px"><b>30 Supporters</b></p>
								<p style="margin-bottom:5px;"><b><?php the_title(); ?></b></p> 
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

		

	</div><!-- #content-wrap -->

	<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php get_footer(); ?>
