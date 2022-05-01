<?php

/**
 * User Topics Created
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

//do_action( 'bbp_template_before_user_topics_created' ); ?>

<style>

	#fep-header, #fep-menu-toggle-button, #fep-footer, .fep-action-table, .fep-cb, #fep-notification-bar, .fep-cb-check-uncheck-all-div label, .fep-message-head, .fep-filter-heads-div, .fep-messagebox-search-form-field, .fep-message-toggle-all{
		display: none !important;
	}

	.fep-table-row{
		height: 75px;
		padding: 10px;
	}

	.fep-avatar-1, .fep-avatar-2{
		float: left
	}

	.fep-avatar-2{
		margin-left: -25px;
		margin-right: 40px;
	}

	.fep-avatar-1 img, .fep-avatar-2 img{
		border-radius: 50%;
	}

	.fep-message-date, .fep-unread-class{
		float: right
	}

	.fep-unread-class{
		color: #ef8607;
		font-weight: bold;
	}

	.fep-message-author, .fep-column-title, .fep-message-expert, .participants{
		font-size: 16px !important;

	}

	.fep-message-title-heading{
		text-transform:capitalize;
		font-size: 24px;
		padding: 5px 10px;
		background-color: rgb(11 79 109 / 14%) !important;
		border-left: 2px solid #0b4f6d;
		color: #28647e;
	}

	#fep-menu .fep-button, .fep-button, button[type="submit"]{
		border-radius: 30px;
    	border: 2px solid #0b4f6d;
    	background-color: #fff;
    	color: #0b4f6d;
    	font-size: 16px;
    	font-family: 'Lato';
    	margin-bottom: 20px;
	}

	#fep-menu .fep-button:hover, .fep-button-active{
		background-color: #0b4f6d;
		color: #fff;
		font-size: 16px;
		border-radius: 30px;
	}

	.fep-label{
		font-size: 16px;
	}

	.fep-field{
		margin-bottom: 20px;
	}

	.fep-form input[type="text"], .fep-form textarea{
		border-radius: 5px;
	}

	#fep-result ul{
		background: #dcdcdc !important;
    	padding: 5px !important;
    	font-size: 16px;
	}

	#fep-result li a{
		padding: 5px !important;
		color: #0b4f6d !important;
	}

	form textarea{
		min-height: 80px !important;
		height: 80px !important;
	}

	.author{
		color: #535F6C;
		font-size: 16px;
	}

	.fep-per-message .fep-message-title{
		background-color: #fff;
		padding: 10px;
	}

	.fep-per-message-top{
		margin-bottom: 25px !important;
	}

	.fep-message-content{
		background: #FFF3D7;
	    border-radius: 10px 10px 10px 0px;
	    padding: 20px;
	    width: 70%;
	}

	.fep-per-message-own .fep-message-content{
	    background: #F2F7FC;
	    border-radius: 10px 10px 10px 0px;
	    padding: 20px;
	    width: 70%;
	}
</style>


<div id="bbp-user-topics-started" class="bbp-user-topics-started">

	<!-- <?php //bbp_get_template_part( 'form', 'topic-search' ); ?>

	<h2 class="entry-title"><?php esc_html_e( 'Forum Topics Started', 'bbpress' ); ?></h2> -->
	<div class="bbp-user-section">

		<?php //if ( bbp_get_user_topics_started() ) : ?>

			<?php //bbp_get_template_part( 'pagination', 'topics' ); ?>

			<?php //bbp_get_template_part( 'loop',       'topics' ); ?>

			<?php //bbp_get_template_part( 'pagination', 'topics' ); ?>

		<?php //else : ?>

			<?php //bbp_get_template_part( 'feedback', 'no-topics' ); ?>

		<?php //endif; ?>

		<?php echo do_shortcode('[front-end-pm]'); ?>
		
	</div>
</div><!-- #bbp-user-topics-started -->

<?php do_action( 'bbp_template_after_user_topics_created' );
