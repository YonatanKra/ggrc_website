<?php

/**
 * User Registration Form
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<style>
	form textarea{
		min-height:40px
	}

	.bbp-submit-wrapper{
		width:100%
	}
</style>

<button class="trigger">Click here to register!</button>
<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
		<img src="<?php echo site_url( '/wp-content/uploads/2022/01/logo-32x32.png', null ) ?>" class="center-element">
        <h3 class="align-center">Become a member!</h3>
		<form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
			<fieldset class="bbp-form">

				<?php do_action( 'bbp_template_before_register_fields' ); ?>

				<div class="bbp-template-notice mt-20">
					<ul>
						<li><?php esc_html_e( 'Your username must be unique, and cannot be changed later.',                        'bbpress' ); ?></li>
						<li><?php esc_html_e( 'We use your email address to email you a secure password and verify your account.', 'bbpress' ); ?></li>
					</ul>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="bbp-firstname">
							<input type="text" name="user_fname" placeholder="First Name" value="<?php bbp_sanitize_val( 'user_fname' ); ?>" size="20" id="user_fname" maxlength="100" autocomplete="off" required />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="bbp-lastname">
							<input type="text" name="user_lname" placeholder="Last Name" value="<?php bbp_sanitize_val( 'user_lname' ); ?>" size="20" id="user_lname" maxlength="100" autocomplete="off" required />
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="bbp-username">
							<input type="text" name="user_login" placeholder="Username" value="<?php bbp_sanitize_val( 'user_login' ); ?>" size="20" id="user_login" maxlength="100" autocomplete="off" required />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="bbp-email">
							<input type="email" name="user_email" placeholder="Email" value="<?php bbp_sanitize_val( 'user_email' ); ?>" id="user_email" maxlength="100" autocomplete="off" required />
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="bbp-title">
							<input type="text" name="title" placeholder="Job Title" value="<?php bbp_sanitize_val( 'user_title' ); ?>" id="title" maxlength="100" autocomplete="off" required />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="bbp-organisation">
							<input type="text" name="organisation" placeholder="Organisation" value="<?php bbp_sanitize_val( 'user_organisation' ); ?>" id="organisation" maxlength="100" autocomplete="off" required />
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="bbp-country">
							<input type="text" name="country" placeholder="Country" value="<?php bbp_sanitize_val( 'user_country' ); ?>" id="country" maxlength="100" autocomplete="off" required />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="bbp-bio">
							<textarea name="bio" row="2" placeholder="Short Bio" id="bio" required><?php bbp_sanitize_val( 'user_bio' ); ?></textarea>
						</div>
					</div>
				</div>


				<?php do_action( 'register_form' ); ?>

				<div class="bbp-submit-wrapper">

					<button type="submit" name="user-submit" class="submit user-submit ggrc-btn-white-lg center-element"><?php esc_html_e( 'Register', 'bbpress' ); ?></button>

					<?php bbp_user_register_fields(); ?>

				</div>

				<?php do_action( 'bbp_template_after_register_fields' ); ?>

			</fieldset>
		</form>
    </div>
</div>


<script>

	const modal = document.querySelector(".modal");
	const trigger = document.querySelector(".trigger");
	const closeButton = document.querySelector(".close-button");

	function toggleModal() {
		modal.classList.toggle("show-modal");
	}

	function windowOnLoad(event) {
		if (event.target === modal) {
			toggleModal();
		}
	}
	
	window.addEventListener("load", toggleModal);
	closeButton.addEventListener("click", toggleModal);
	window.addEventListener("load", windowOnLoad);
	trigger.addEventListener("click", toggleModal);

</script>
