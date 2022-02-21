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
		.small_header {
			height:250px; 
			background: linear-gradient(0deg, rgba(255 255 255 / 80%), rgba(255 255 255 / 80%)), url(http://localhost/ggrc_website/wp-content/uploads/2022/01/Arctic-Terns-Steven-Calcote-scaled.jpg); 
			background-size:cover;
		}
		
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

		@media only screen and (min-width: 960px){
			.content-area, .content-left-sidebar .content-area{
				width:75%
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
