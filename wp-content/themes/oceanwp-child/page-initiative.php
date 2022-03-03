<?php

/* Template Name: InitiativeTemplate */ 


?>

<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */

get_header("initiatives");
?>
				<div class="small_header">
					<div class="row">
						<div class="col-lg-7 col-md-7 col-sm-12">
							<h3>Suggest Initiatives</h5>
							<p>Do you know of any interesting action around you promoting green recovery? Are you involved with an intervention? We want to know</p>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12">
							
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12">
							<a href="../suggest-an-initiative" target="_blank"><button>Suggest an initiative</button></a>
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

		<div id="primary" class="content-area clr initiative-list-area">

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
									<i class="ggrc-icon ggrc-icon-exclamation-mark"></i> <?php echo esc_html($take_action->name); ?></p>
								<?php 
									
								}
							}?>
							<p class="initiative-supporters">30 Supporters</p>
								<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
								<?php the_excerpt(); ?>
								<hr class="no-margin"/>
								<i class="ggrc-icon ggrc-icon-map"></i> <?php the_field('venue') ?><br>
								<i class="ggrc-icon ggrc-icon-users"></i> <?php the_field('region') ?><br>
								
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
