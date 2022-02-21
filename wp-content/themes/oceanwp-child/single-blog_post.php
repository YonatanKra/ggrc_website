
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

	<link rel="stylesheet" href="../../wp-content/themes/oceanwp/assets/fontawesome-free-6.0.0-web/css/all.css">

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

		@media only screen and (min-width: 960px){
			.content-area, .content-left-sidebar .content-area{
				width:75%
			}
			.widget-area.sidebar-primary {
				width: 25%;
			}
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

				<div style="height:300px; background: linear-gradient(0deg, rgba(255 255 255 / 80%), rgba(255 255 255 / 80%)), url(http://localhost/ggrc_website/wp-content/uploads/2022/01/Arctic-Terns-Steven-Calcote-scaled.jpg); background-size:cover; border-bottom:2px solid #EF8607"></div>

	<?php do_action( 'ocean_before_content_wrap' ); ?>
	<?php while ( have_posts() ) :
						the_post(); ?>
	<div style="margin-top:-10.8rem; height:108px; background-color:#fff; z-index:10; position:relative; width:65%; margin-left:5%;
	border:2px solid #EF8607;border-bottom:none;border-radius:4px 4px 0px 0px; padding:5px">
	<p><?php 
	$the_post_id = get_the_ID();
	$blogcat = wp_get_post_terms($the_post_id, 'blog-category', ['']);
	
	if(empty($blogcat) || ! is_array($blogcat)){
		echo "No blog category";
	}else{
		
		foreach($blogcat as $key => $blogcategory){
				if($blogcategory->name == "Blog")	{	
			?>
			<p style="text-align:center;color:#EF8607;font-weight:bold"><?php echo esc_html($blogcategory->name); ?></p>
			
		<?php 
				} elseif ($blogcategory->name == "Testimonials"){
					?>
			<p style="text-align:center;color:#789B18;font-weight:bold"><?php echo esc_html($blogcategory->name); ?></p>
			
		<?php
				} else{
					?>
			<p style="text-align:center;color:#0B4F6D;font-weight:bold"><?php echo esc_html($blogcategory->name); ?></p>
			
		<?php
				}
		}
	} ?>
	</p>
	<h2 style="text-align:center"><?php the_title(); ?></h2>
	<hr style="margin:5px 0px"/>
	<div style="text-align:center">
		<p style="display:inline; margin-right:20px">Published : <?php the_time('F j, Y'); ?></p> <p style="display:inline;margin-right:20px"> <i class="fa fa-heart"></i> 2 Likes</p> <p style="display:inline"><i class="fa fa-share-alt"></i> 5 Shares</p>
	</div>
	<hr style="margin:5px 0px"/>
	</div>
	

	<?php endwhile; ?>
	<div id="content-wrap" class="container clr" style="padding-top:100px">

		<?php do_action( 'ocean_before_primary' ); ?>

		
		<div id="primary" class="content-area clr" >

			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="site-content clr">

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php
				// Elementor `single` location.
				if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

					// Start loop.
					while ( have_posts() ) :
						the_post();

						if ( is_singular( 'download' ) ) {

							// EDD Page.
							get_template_part( 'partials/edd/single' );

						} elseif ( is_singular( 'page' ) ) {

							// Single post.
							//get_template_part( 'partials/page/layout' );

						} elseif ( is_singular( 'oceanwp_library' ) || is_singular( 'elementor_library' ) ) {

							// Library post types.
							//get_template_part( 'partials/library/layout' );

						} else {

							// All other post types.
							get_template_part( 'partials/single/layout', get_post_type() );

						}

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
