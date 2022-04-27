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

	.forminator-ui#forminator-module-1345.forminator-design--default .forminator-input, .forminator-ui#forminator-module-1345.forminator-design--default .forminator-textarea, .forminator-ui#forminator-module-1345.forminator-design--default select.forminator-select2 + .forminator-select .selection .select2-selection--single[role="combobox"] .select2-selection__rendered{
		background: rgba(255, 255, 255, 0.75);
		border: 1px solid #ACB4BD;
		box-sizing: border-box;
		border-radius: 10px;
	}

	.forminator-ui#forminator-module-1345.forminator-design--default .forminator-button-submit{
		background: #FFFFFF !important;
		border: 5px solid #0B4F6D;
		box-sizing: border-box;
		border-radius: 50px;
		padding: 15px 20px;
		position: relative;
		font-size: 20px !important;
		color: #0B4F6D !important;
		font-family: 'Arvo' !important;
	}

	.forminator-ui#forminator-module-1345.forminator-design--default .forminator-button-next, .forminator-ui#forminator-module-1345.forminator-design--default .forminator-button-back, .forminator-ui#forminator-module-1345.forminator-design--default .forminator-button-submit{
		padding: 10px 15px;
		position: relative;
		display:block;
		background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%);
		box-shadow: 2px 3px 9px rgba(11, 79, 109, 0.2);
		border-radius: 30px;
	}

	.forminator-row{
		margin-bottom: 15px !important;
	}

	.forminator-ui.forminator-custom-form[data-design=default] .forminator-multiselect{
		max-height: 110px;
	}
</style>


<button class="trigger ggrc-btn-blue-md">Click here to register!</button>
<div class="modal" style="overflow-y: scroll;">
    <div class="modal-content">
        <span class="close-button">×</span>
		<img src="<?php echo site_url( '/wp-content/uploads/2022/01/logo-32x32.png', null ) ?>" class="center-element">
        <h2 class="align-center">Become a member!</h2>

        <?php echo do_shortcode('[forminator_form id="1345"]'); 

		?>

		 <div class="align-center">
	        <a href="<?php echo get_site_url(null, '/user-login', null); ?>">Login here</a>
	    </div>
		<!-- <form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
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
		</form> -->
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
