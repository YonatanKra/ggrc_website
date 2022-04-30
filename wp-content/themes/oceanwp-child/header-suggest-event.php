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

	<style>

		#wck-fep-login-form ul li{
		 	overflow: visible !important;
		 }

		 #wck-fep-login-form input[type=submit]{
		 	margin-top: 20px;
		 }


		 #wck-fep-login-form ul li{
		 	overflow: visible !important;
		 }

		.fep-container input[type="text"], .fep-container textarea,.fep-container select{
			width:100% !important;
		}
		
		p.description, label[for=who-can-attend-the-event], #fep-who-can-attend-the-event, label[for=upload-past-event-video], #fep-upload-past-event-video, .wck-fep-message, #wck-fep-show-register-form , #rememberme, label[for=rememberme]
		{
			display:none !important;
		}

		.fep-container .mb-right-column {
			width: 100% !important;
		}

		.fep-container label{
			width:fit-content !important
		}

		input, select, textarea{
			border-radius :5px !important;
		}

		.wck-radiobuttons{
			display:inline-flex !important;
			float: right;			
		}
		
		.wck-radiobuttons > div:first-of-type{
			margin-right:20px
		}


		#submit_suggest-an-event{
			
			padding: 16px 46px;
			margin-left:auto;
			width: 160px;
			height: 56px;
			margin-right:auto;
			position:relative;
			display:block;
			background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%);
			box-shadow: 2px 3px 9px rgba(11, 79, 109, 0.2);
			border-radius: 30px !important;			
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