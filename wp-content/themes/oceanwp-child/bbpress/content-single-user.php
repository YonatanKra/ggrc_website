<?php

/**
 * Single User Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<style>

	.page-header {
		display:none;
	}

	#main{
		background:url('<?php echo site_url( '/wp-content/uploads/2022/03/UserProfileBg.svg', null ) ?>'); 
		height:auto;
		padding-top:50px;
		padding-bottom:30px;
		background-size:cover;
	}

	.content-area{
		padding-right: 0px;
		border-right-width: 0px;
	}

	#bbp-single-user-details{
		background: #fff;
		box-shadow: 2px 4px 17px 1px rgb(0 0 0 / 13%);
		border-radius: 3px;
		height: 100%;
	}

	#initiative-contact{
		padding :0px;
	}

	#bbp-user-body, #connect-people{
		background-color :#fff;
		border-radius :3px;
		padding :10px;
	}
	
</style>

<?php if ( bbp_is_single_user_profile()     ) {
	
			bbp_get_template_part( 'user', 'profile'         );
		} else{ ?>
<div id="bbpress-forums" class="bbpress-wrapper">

	<?php do_action( 'bbp_template_notices' ); ?>

	<?php do_action( 'bbp_template_before_user_wrapper' ); ?>

	<div id="bbp-user-wrapper">

		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12">
				<?php bbp_get_template_part( 'user', 'details' ); ?>
				
			</div>
			<div class="col-lg-9 col-md-8 col-sm-12">
				<?php if ( bbp_is_favorites()               ) bbp_get_template_part( 'user', 'dashboard'       ); ?>
				<?php if ( bbp_is_subscriptions()           ) bbp_get_template_part( 'user', 'subscriptions'   ); ?>
				<?php if ( bbp_is_single_user_engagements() ) bbp_get_template_part( 'user', 'engagements'     ); ?>
				<?php if ( bbp_is_single_user_topics()      ) bbp_get_template_part( 'user', 'topics-created'  ); ?>
				<?php if ( bbp_is_single_user_replies()     ) bbp_get_template_part( 'user', 'replies-created' ); ?>
				<?php if ( bbp_is_single_user_edit()        ) bbp_get_template_part( 'form', 'user-edit'       ); ?>
				
			</div>
		</div>
	</div>

	<?php do_action( 'bbp_template_after_user_wrapper' ); ?>

</div>

<?php } ?>
