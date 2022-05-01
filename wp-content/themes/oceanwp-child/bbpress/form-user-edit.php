<?php

/**
 * bbPress User Profile Edit Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>
<style type="text/css">
	label[for=basic-local-avatar] {
		display: none !important;
	}

	.avatar img{
		border-radius: 50%;
		margin-bottom: 15px;
	}

	label{
		color: #0B4F6D;
		font-weight: bold;
		font-size: 14px !important
	}

	form{
		font-size: 14px !important;
	}

	#bbpress-forums #bbp-your-profile fieldset label[for]{
		width: 30%;
	}

	button{
		background-color: #0b4f6d !important;
		border-radius: 30px;
	}

	input, textarea, select{
		background: #FFFFFF !important;
		border: 1px solid #BEC5CC;
		box-sizing: border-box;
		border-radius: 10px !important;
		padding: 15px !important;
	}

	#bbpress-forums #bbp-user-wrapper h2.entry-title, #bbpress-forums #bbp-user-wrapper h3{
		text-align: center;
	}

	#email{
		pointer-events: none;
		cursor: not-allowed;
	}
</style>


<form id="bbp-your-profile" method="post" enctype="multipart/form-data">
	<p><b>General member information</b></p>
	<hr>

	<!-- <h2 class="entry-title"><?php bbp_is_user_home_edit()
		? esc_html_e( 'About Yourself', 'bbpress' )
		: esc_html_e( 'About the user', 'bbpress' );
	?></h2> -->
	<div class="row">
		<div class="col-lg-4 col-md-12 col-sm-12">
			<fieldset class="bbp-form">
				<legend><?php bbp_is_user_home_edit()
					? esc_html_e( 'About Yourself', 'bbpress' )
					: esc_html_e( 'About the user', 'bbpress' );
				?></legend>

				<?php do_action( 'bbp_user_edit_before_about' ); ?>
				

				<?php do_action( 'bbp_user_edit_after_about' ); ?>

			</fieldset>
		</div>
		<div class="col-lg-8 col-md-12 col-sm-12">

			<?php do_action( 'bbp_user_edit_before' ); ?>

			<fieldset class="bbp-form">
				<legend><?php esc_html_e( 'Name', 'bbpress' ) ?></legend>

				<?php do_action( 'bbp_user_edit_before_name' ); ?>

				<div>
					<label for="first_name"><?php esc_html_e( 'First Name', 'bbpress' ) ?></label>
					<input type="text" name="first_name" id="first_name" value="<?php bbp_displayed_user_field( 'first_name', 'edit' ); ?>" class="regular-text" />
				</div>

				<div>
					<label for="last_name"><?php esc_html_e( 'Last Name', 'bbpress' ) ?></label>
					<input type="text" name="last_name" id="last_name" value="<?php bbp_displayed_user_field( 'last_name', 'edit' ); ?>" class="regular-text" />
				</div>

				<div>
					<label for="nickname"><?php esc_html_e( 'Nickname', 'bbpress' ); ?></label>
					<input type="text" name="nickname" id="nickname" value="<?php bbp_displayed_user_field( 'nickname', 'edit' ); ?>" class="regular-text" />
				</div>

				<div>
					<label for="display_name"><?php esc_html_e( 'Display Name', 'bbpress' ) ?></label>

					<?php bbp_edit_user_display_name(); ?>

				</div>

				<div>
					<label for="job_title"><?php esc_html_e( 'Job Title', 'bbpress' ) ?></label>
					<input type="text" name="job_title" id="job_title" value="<?php bbp_displayed_user_field( 'job_title', 'edit' ); ?>" class="regular-text" />
				</div>

				<div>
					<label for="organization"><?php esc_html_e( 'Organization', 'bbpress' ) ?></label>
					<input type="text" name="organization" id="organization" value="<?php bbp_displayed_user_field( 'organization', 'edit' ); ?>" class="regular-text" />
				</div>

				<div>
					<label for="country"><?php esc_html_e( 'Country', 'bbpress' ) ?></label>
					<input type="text" name="country" id="country" value="<?php bbp_displayed_user_field( 'country', 'edit' ); ?>" class="regular-text" />
				</div>


				<div>
					<label for="region"><?php esc_html_e( 'Region of interest', 'bbpress' ) ?></label>
					<input type="text" name="region" id="region" value="<?php bbp_displayed_user_field( 'region', 'edit' ); ?>" class="regular-text" />
				</div>


				<?php do_action( 'bbp_user_edit_after_name' ); ?>

			</fieldset>


			<fieldset class="bbp-form no-padding-top">
				<legend><?php esc_html_e( 'Contact Info', 'bbpress' ) ?></legend>

				<?php do_action( 'bbp_user_edit_before_contact' ); ?>

				<div>
					<label for="url"><?php esc_html_e( 'Website', 'bbpress' ) ?></label>
					<input type="text" name="url" id="url" value="<?php bbp_displayed_user_field( 'user_url', 'edit' ); ?>" maxlength="200" class="regular-text code" />
				</div>

				<?php foreach ( bbp_edit_user_contact_methods() as $name => $desc ) : ?>

					<div>
						<label for="<?php echo esc_attr( $name ); ?>"><?php echo apply_filters( 'user_' . $name . '_label', $desc ); ?></label>
						<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" value="<?php bbp_displayed_user_field( $name, 'edit' ); ?>" class="regular-text" />
					</div>

				<?php endforeach; ?>

				<?php do_action( 'bbp_user_edit_after_contact' ); ?>

				<div>
					<label for="description"><?php esc_html_e( 'Biographical Info', 'bbpress' ); ?></label>
					<textarea name="description" id="description" rows="5" cols="30"><?php bbp_displayed_user_field( 'description', 'edit' ); ?></textarea>
				</div>

			</fieldset>
		</div>
	</div>
	

	<h2 class="entry-title"><?php esc_html_e( 'Account Information', 'bbpress' ) ?></h2>

	<fieldset class="bbp-form">
		<legend><?php esc_html_e( 'Account', 'bbpress' ) ?></legend>

		<?php do_action( 'bbp_user_edit_before_account' ); ?>

		<div>
			<label for="user_login"><?php esc_html_e( 'Username', 'bbpress' ); ?></label>
			<input type="text" name="user_login" id="user_login" value="<?php bbp_displayed_user_field( 'user_login', 'edit' ); ?>" maxlength="100" disabled="disabled" class="regular-text" />
		</div>

		<div>
			<label for="email"><?php esc_html_e( 'Email', 'bbpress' ); ?></label>
			<input type="text" name="email" id="email" value="<?php bbp_displayed_user_field( 'user_email', 'edit' ); ?>" maxlength="100" class="regular-text" autocomplete="off" />
		</div>

		<?php bbp_get_template_part( 'form', 'user-passwords' ); ?>

		<div>
			<label for="locale"><?php esc_html_e( 'Language', 'bbpress' ) ?></label>

			<?php bbp_edit_user_language(); ?>

		</div>

		<?php do_action( 'bbp_user_edit_after_account' ); ?>

	</fieldset>

	<?php if ( ! bbp_is_user_home_edit() && current_user_can( 'promote_user', bbp_get_displayed_user_id() ) ) : ?>

		<h2 class="entry-title"><?php esc_html_e( 'User Role', 'bbpress' ) ?></h2>

		<fieldset class="bbp-form">
			<legend><?php esc_html_e( 'User Role', 'bbpress' ); ?></legend>

			<?php do_action( 'bbp_user_edit_before_role' ); ?>

			<?php if ( is_multisite() && is_super_admin() && current_user_can( 'manage_network_options' ) ) : ?>

				<div>
					<label for="super_admin"><?php esc_html_e( 'Network Role', 'bbpress' ); ?></label>
					<label>
						<input class="checkbox" type="checkbox" id="super_admin" name="super_admin"<?php checked( is_super_admin( bbp_get_displayed_user_id() ) ); ?> />
						<?php esc_html_e( 'Grant this user super admin privileges for the Network.', 'bbpress' ); ?>
					</label>
				</div>

			<?php endif; ?>

			<?php bbp_get_template_part( 'form', 'user-roles' ); ?>

			<?php do_action( 'bbp_user_edit_after_role' ); ?>

		</fieldset>

	<?php endif; ?>

	<?php do_action( 'bbp_user_edit_after' ); ?>

	<fieldset class="submit">
		<legend><?php esc_html_e( 'Save Changes', 'bbpress' ); ?></legend>
		<div>

			<?php bbp_edit_user_form_fields(); ?>

			<button type="submit" id="bbp_user_edit_submit" name="bbp_user_edit_submit" class="button submit user-submit"><?php bbp_is_user_home_edit()
				? esc_html_e( 'Update Profile', 'bbpress' )
				: esc_html_e( 'Update User',    'bbpress' );
			?></button>
		</div>
	</fieldset>
</form>


