<?php

/* Template Name: AboutUsTemplate */ 


?>

<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<style type="text/css">
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


	<div class="about-banner pt-150 pb-100">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12">
				
				<h2 class="mt-30">About the Global Green Recovery Collaborative</h2>
				
			</div>
		</div>
	</div>
				

	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr no-border">

			<?php do_action( 'ocean_before_content' ); ?>
		
			<div id="content" class="site-content clr">				

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<div class="row">

				<?php
				// Elementor `single` location.
				if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

					// Start loop.
					while ( have_posts() ) :
						the_post(); ?>
						<div class="col-lg-6 col-md-12 col-sm-12">
							<?php the_content(); ?>
						</div>

						<?php

					endwhile;

				}
				?>

					<div class="col-lg-6 col-md-12 col-sm-12">
						<h4>Support the GGRC</h4>
						<p>The launch of the GGRC is made possible by a grant from the Sansom Conservation Leadership Alumni Fund.</p>

						<p>We are seeking additional funding to allow us to grow. If you are interested in partnering with us as a funder, please contact us directly at <a href="mailto:greenrecoverycollaborative@gmail.com">greenrecoverycollaborative@gmail.com</a>. </p>

						<div class="ggrc-faq">
	            			<h3>GGRC FAQs</h3>
	            			<p>Learn more! Check out our FAQs.</p>
	            			<button class="no-border-all"><a href="" class="ggrc-btn-blue-sm">FAQS</a></button>
            			
            			</div>

            			<div class="ggrc-newsletter">
	            			<h3>Newsletter</h3>
	            			<p>Do you want updates on our latest featured events, initiatives, and opportunities. Subscribe to our newsletter!</p>
	            			<input type="email" name="email" required="required" placeholder="Email:">
	            			<button class="no-border-all"><a href="" class="ggrc-btn-blue-sm">Submit</a></button>
            			
            			</div>

					</div>
				</div>

				<?php do_action( 'ocean_after_content_inner' ); ?>

				

			</div><!-- #content -->

			<?php do_action( 'ocean_after_content' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'ocean_after_primary' ); ?>

	</div><!-- #content-wrap -->

			<section>
				<div class="volunteer-about mb-60 p-150-lr">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 align-center">
							<p class="mb-30">We are looking for committed volunteers to support and contribute to the GGRC. Volunteer to expand our reach and impact.</p>
							<a href="" class="ggrc-btn-blue-md">Volunteer with us</a>
						</div>
					</div>
				</div>
			</section>

			<section class="container">
				<div class="row mb-60">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h2 class="align-center">Team & Advisors</h2>
						<hr/>
						<h4 class="align-center">Leadership Team</h4>
						<div class="row mb-60">
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Rosalind.png" class="profile-pic">
									<h4 class="align-center mt-80">Rosalind Helfand</h4>
									<p class="align-center"><b>USA</b></p>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Ravi.png" class="profile-pic">
									<h4 class="align-center mt-80">Ravi Prasad</h4>
									<p class="align-center"><b>Fiji</b></p>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/IrisD.png" class="profile-pic">
									<h4 class="align-center mt-80">Iris Dicke</h4>
									<p class="align-center"><b>Netherland</b></p>
								</div>
							</div>
						
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Lucia.png" class="profile-pic">
									<h4 class="align-center mt-80">Lucia Norris-Crespo</h4>
									<p class="align-center"><b>Ecuador</b></p>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Roberta.png" class="profile-pic">
									<h4 class="align-center mt-80">Roberta Kamille Pennell</h4>
									<p class="align-center"><b>Belize</b></p>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Carolina.png" class="profile-pic">
									<h4 class="align-center mt-80">Carolina Sotos-Varga</h4>
									<p class="align-center"><b>Belizes</b></p>
								</div>
							</div>
						</div>

						<hr>
						<h4 class="align-center">Communications</h4>

						<div class="row mb-60 p-170-lr">
							<div class="col-lg-6 col-md-12 col-sm-12 mt-150">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Janet.png" class="profile-pic">
									<h4 class="align-center mt-80">Janet Taylor</h4>
									<p class="align-center"><b>South Africa</b></p>
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12 mt-150">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Alastair.png" class="profile-pic">
									<h4 class="align-center mt-80">Alastair Jones</h4>
									<p class="align-center"><b>Australia</b></p>
								</div>
							</div>
						</div>

						<div class="row mb-60 p-170-lr">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<hr>
								<h4 class="align-center">Advisors</h4>
								<div class="team-blocks mt-150">
									<img src="../wp-content/uploads/team/Noa.png" class="profile-pic">
									<h4 class="align-center mt-80">Noa Steiner</h4>
									<p class="align-center"><b>Israel</b></p>
								</div>
							</div> 
							<div class="col-lg-6 col-md-12 col-sm-12">
								<hr>
								<h4 class="align-center">Interns</h4>
								<div class="team-blocks mt-150">
									<img src="../wp-content/uploads/team/NoImg.png" class="profile-pic">
									<h4 class="align-center mt-80">Rachel Chandra</h4>
									<p class="align-center"><b>Fiji</b></p>
								</div>
							</div>
							
						</div>

						<hr/>
						<h4 class="align-center">Web Team</h4>
						<div class="row mb-60">
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/IrisL.png" class="profile-pic">
									<h4 class="align-center mt-80">Iris Livneh</h4>
									<p class="align-center"><b>Israel</b></p>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/Dana.png" class="profile-pic">
									<h4 class="align-center mt-80">Dana Dellus-Neeman</h4>
									<p class="align-center"><b>Israel</b></p>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/NoImg.png" class="profile-pic">
									<h4 class="align-center mt-80">Shavnita Dutt</h4>
									<p class="align-center"><b>Fiji</b></p>
								</div>
							</div>
						
							<div class="col-lg-4 col-md-6 col-sm-12 mt-100">
								<div class="team-blocks">
									<img src="../wp-content/uploads/team/NoImg.png" class="profile-pic">
									<h4 class="align-center mt-80">Yonatan Kra</h4>
									<p class="align-center"><b>Israel</b></p>
								</div>
							</div>
						</div

					</div>
					
				</div>
				
			</section>

	<?php do_action( 'ocean_after_content_wrap' ); ?>

	

<?php get_footer(); ?>
