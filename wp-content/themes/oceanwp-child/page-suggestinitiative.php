<?php

/* Template Name: SuggestInitiative */ 

get_header("suggest-initiative");
?>


				

	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr" style="max-width:100%; border:none">
			<div >
					<div class="row" style="padding-top: 8rem;margin-bottom:4rem; width:65%; position:relative; display:block; margin-left:auto; margin-right:auto">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<h6 style="margin-bottom:0;font-size:30px">Suggest an Initiative</h6>
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

	<input type="text" id="hirnesh" value="">

<?php get_footer(); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
	
	$(document).ready(function() {
		// console.log(156);
		// document.querySelector('#fep-post-title input').setAttribute('placeholder','$');
		// $("#hirnesh").val("hggjg");
		// window.onload = function () {
		// document.getElementById("fep-post-title").placeholder = "Type name here..";
        // }
		
	});
		
</script>