<?php

/**
 * User Engagements
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_user_engagements' ); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
		<div id="bbp-user-engagements" class="bbp-user-engagements">
			<p class="no-margin-bottom"><b>All members</b></p>
			<hr/>

			<div class="row bbp-user-section no-margin-right no-margin-left">

				<?php

				$args = array(
					'role__in'    => array('Member', 'Advisor', 'Administrator'),
					'orderby' => 'display_name',
					'order'   => 'ASC',
					'exclude' => array(get_current_user_id())
				);

				$users = get_users( $args );

				foreach ( $users as $user ) { ?>
					<div class="col-md-12 col-lg-6 col-sm-12 mb-20" id="initiative-contact">
						<?php										
								echo get_avatar($user->ID, 60);										
						?>
					
						<a href="<?php echo site_url( '/forums/users/'. $user->user_nicename, null ) ?>"><div class="initiative-contact-details">
							<p class="no-margin-bottom"><b><?php echo $user->display_name ?></b></p>
							<p class="no-margin-bottom"><?php echo $user->job_title ?></p>
							<p class="no-margin-bottom"><?php echo $user->organization ?></p>
						</div></a>
						
					</div>
					<?php
				}

				?>

			</div>

		</div><!-- #bbp-user-engagements -->
	</div>
	
</div>

<?php do_action( 'bbp_template_after_user_engagements' );
