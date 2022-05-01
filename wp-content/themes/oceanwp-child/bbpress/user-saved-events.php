<?php

/* Template Name: UserEventsTemplate */ 

/**
 * User Events
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_user_subscriptions' ); ?>



		<div id="bbp-user-subscriptions" class="bbp-user-subscriptions p-20">

			<p class="no-margin-bottom"><b>Events</b></p>
			<hr/>

			<!-- <?php //bbp_get_template_part( 'form', 'topic-search' ); ?> -->
			

			?>
		</div><!-- #bbp-user-subscriptions -->

<?php do_action( 'bbp_template_after_user_subscriptions' ); ?>
