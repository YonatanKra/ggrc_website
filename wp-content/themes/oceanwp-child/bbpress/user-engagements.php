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
    <div class="col-lg-9 col-md-12 col-sm-12">
		<div id="bbp-user-engagements" class="bbp-user-engagements">
			<p class="no-margin-bottom"><b>Same expertise as you</b></p>
			<hr/>

			<div class="row bbp-user-section no-margin-right no-margin-left">

				<?php

				$args = array(
					'role__in'    => array('Member', 'Advisor'),
					'orderby' => 'user_nicename',
					'order'   => 'ASC'
				);

				$users = get_users( $args );

				foreach ( $users as $user ) { ?>
					<div class="col-md-12 col-lg-6 col-sm-12 mb-20" id="initiative-contact">
						<?php										
								echo get_avatar($user->ID, 60);										
						?>
					
						<div class="initiative-contact-details">
							<p class="no-margin-bottom"><b><?php echo $user->display_name ?></b></p>
							<p class="no-margin-bottom">title</p>
							<p class="no-margin-bottom">organisation</p>
						</div>
						
					</div>
					<?php
				}

				?>

			</div>

			<p class="no-margin-bottom mt-20"><b>Located near you</b></p>
			<hr/>

			<div class="row bbp-user-section no-margin-right no-margin-left">

				<?php
				$args = array(
					'role__in'    => array('Member', 'Advisor'),
					'orderby' => 'user_nicename',
					'order'   => 'ASC'
				);

				$users = get_users( $args );

				foreach ( $users as $user ) { ?>
					<div class="col-md-12 col-lg-6 col-sm-12 mb-20" id="initiative-contact">
						<?php										
								echo get_avatar($user->ID, 60);										
						?>
					
						<div class="initiative-contact-details">
							<p class="no-margin-bottom"><b><?php echo $user->display_name ?></b></p>
							<p class="no-margin-bottom">title</p>
							<p class="no-margin-bottom">organisation</p>
						</div>
						
					</div>
					<?php
				}

				?>

			</div>

			<p class="no-margin-bottom mt-20"><b>Same sector</b></p>
			<hr/>

			<div class="row bbp-user-section no-margin-right no-margin-left">

					<?php

					$args = array(
						'role__in'    => array('Member', 'Advisor'),
						'orderby' => 'user_nicename',
						'order'   => 'ASC'
					);

					$users = get_users( $args );

					foreach ( $users as $user ) { ?>
						<div class="col-md-12 col-lg-6 col-sm-12 mb-20" id="initiative-contact">
							<?php										
									echo get_avatar($user->ID, 60);										
							?>
						
							<div class="initiative-contact-details">
								<p class="no-margin-bottom"><b><?php echo $user->display_name ?></b></p>
								<p class="no-margin-bottom">title</p>
								<p class="no-margin-bottom">organisation</p>
							</div>
							
						</div>
						<?php
					}

					?>
			</div>
		</div><!-- #bbp-user-engagements -->
	</div>
	<div class="col-lg-3 col-md-12 col-sm-12" id="connect-people">
		<p class="no-margin-bottom"><b>All members and experts</b></p>
        <hr/>

		<?php

		$args = array(
			'role__in'    => array('Member', 'Advisor'),
			'orderby' => 'user_nicename',
			'order'   => 'ASC'
		);

		$users = get_users( $args );

		foreach ( $users as $user ) { ?>
			<div class="col-md-12 col-lg-12 col-sm-12 mb-20" id="initiative-contact">
				<?php										
						echo get_avatar($user->ID, 60);										
				?>
			
				<div class="initiative-contact-details">
					<p class="no-margin-bottom"><b><?php echo $user->display_name ?></b></p>
					<p class="no-margin-bottom">title</p>
					<p class="no-margin-bottom">organisation</p>
				</div>
				
			</div>
			<?php
		}

		?>


	</div>
</div>

<?php do_action( 'bbp_template_after_user_engagements' );
