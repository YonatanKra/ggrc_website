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

	<style>
		.fep-container input[type="text"], .fep-container textarea,.fep-container select{
			width:100% !important;
		}
		label[for=venue], input#fep-venue, label[for=region], textarea#fep-ggrc-priorities, select#fep-region, label[for=ggrc-priorities],
		textarea#fep-initiative-goal, label[for=initiative-goal], input#initiative_custom_fieldsadditional_resources, label[for=additional-resources], 
		a#upload_additional-resources_button, p.description
		{
			display:none !important;
		}

		.fep-container .mb-right-column {
			width: 100% !important;
			float: none !important;
		}

		.fep-container label{
			width:fit-content !important;

		}

		.wck-checkboxes{
			display:inline-flex !important;
			float: right;
		}

		/* #fep-contact-mode{
			width:40% !important
		} */
		
		.wck-checkboxes > div:first-of-type{
			margin-right:20px
		}

		input, select, textarea{
			border-radius :5px !important;
		}

		#submit_suggest-an-initiative{
			
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