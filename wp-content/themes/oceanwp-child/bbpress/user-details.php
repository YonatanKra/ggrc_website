<?php

/**
 * User Details
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_user_details' ); ?>

<style>

	#bbp-single-user-details{
		background: #fff;
		box-shadow: 2px 4px 17px 1px rgb(0 0 0 / 13%);
		border-radius: 3px;
		height: 100%;
	}

	#bbp-user-avatar{
		width: 100% !important;
	}

	.avatar-150{
		border: 3px solid #EF8607 !important;
		border-radius : 50%;
		display: block !important;
		margin: 20px auto !important;
		position: relative;
	}
	
</style>

<div id="bbp-single-user-details">
	<div id="bbp-user-avatar">
		<span class='vcard'>
			<a class="url fn n" href="<?php bbp_user_profile_url(); ?>" title="<?php bbp_displayed_user_field( 'display_name' ); ?>" rel="me">
				<?php echo get_avatar( bbp_get_displayed_user_field( 'user_email', 'raw' ), apply_filters( 'bbp_single_user_details_avatar_size', 150 ) ); ?>
			</a>
		</span>
	</div>
	<h4 class="align-center">Hi <?php bbp_displayed_user_field( 'display_name' ); ?>!</h4>
	
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 align-center">
			<p>Dashboard</p>
			<p>Messages</p>
			<p>Connect to people</p>
			<p>Events</p>
			<p>Discussion board</p>
			<p>Settings</p>
		</div>
	</div>

</div>

<?php do_action( 'bbp_template_after_user_details' );
