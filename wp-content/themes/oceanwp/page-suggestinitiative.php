<?php

/* Template Name: SuggestInitiative */ 

?>
<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="../wp-content/themes/oceanwp/assets/bootstrap-4.4.1-dist/css/bootstrap-grid.css">

	<style>
		.fep-container input[type="text"], .fep-container textarea,.fep-container select{
			width:100% !important;
		}
		label[for=venue], input#fep-venue, label[for=region], textarea#fep-ggrc-priorities, select#fep-region, label[for=ggrc-priorities],
		textarea#fep-initiative-goal, label[for=initiative-goal], input#initiative_custom_fieldsadditional_resources, label[for=additional-resources], 
		a#upload_additional-resources_button, p.description, input#fep-types-of-action_join-the-campaign, input#fep-types-of-action_sign-the-petition,
		input#fep-types-of-action_sign-the-letter, label[for=types-of-action]
		{
			display:none !important;
		}

	</style>
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

				

	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr" style="max-width:100%; border:none">
			<div >
					<div class="row" style="padding-top: 8rem;margin-bottom:4rem; width:65%; position:relative; display:block; margin-left:auto; margin-right:auto">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<h6 style="margin-bottom:0;font-size:30px">Suggest an Initiatives</h6>
							<p style="margin:0px;font-size:14px"><b>We encourage you to help us reach initiatives that we wouldn’t know of. We at the GGRC aim to connect as many people as we can and we need help with that. Feel free to suggest any initiative that follow our community guidelines, we’ll review it and be in touch.</b></p>
						</div>
						
					</div>
				
				</div>

			<?php do_action( 'ocean_before_content' ); ?>
		
			<div id="content" class="site-content clr" style="width:65%; position:relative; display:block; margin-left:auto; margin-right:auto;padding-right: 15px;
    padding-left: 15px;">

				<?php do_action( 'ocean_before_content_inner' ); ?>

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
