<?php

/**
 * Archive Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<style>
	.page-header{
		display:none;
	}

	.content-area{
		padding-right: 0px;
    	border-right-width: 0px;
	}

	.bbp-author-avatar{
		display:none;
	}
</style>

<div class="row mt-60">
	<div class="col-md-4 col-lg-4 col-sm-12">
		<h2>Discuss</h2>
		<p>The Global Green Recovery Collaborative invites members to share ideas for green recovery, collaboration, and resources. </p>

		<p>Register and create your profile to participate in discussions.</p>

		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<a href="#" class="initiative-website">Community guidelines</a>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12 mt-30">
				<a href="<?php echo site_url('/user-login') ?>"><button class="ggrc-btn-white-md">Log In</button></a>
			</div>
		</div>

		<div class="row mt-60 suggest-discussion">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<h3 class="no-margin-bottom">Suggest a new discussion board</h3>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12">
				<p>GGRC members are invited to share ideas for green recovery, collaboration, and resources.</p>

				<p>Register and create your profile to suggest a discussion topic.</p>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12">
			<a href="../suggest-a-discussion-board" target="_blank"><button class="ggrc-btn-blue-sm">Suggest</button></a>
			</div>
		</div>
		
	</div>
	<div class="col-md-8 col-lg-8 col-sm-12">
		<div class="row mb-20">
		<div class="col-md-6 col-lg-3 col-sm-12">
				<select name="region">
					<option>Region</option>
					<option>Test</option>
				</select>
			</div>
			<div class="col-md-6 col-lg-3 col-sm-12">
				<select name="topic">
					<option>Topic</option>
					<option>Test</option>
				</select>
			</div>
			<div class="col-md-6 col-lg-3 col-sm-12">
				<select name="concept">
					<option>Concept</option>
					<option>Test</option>
				</select>
			</div>
			<div class="col-md-6 col-lg-3 col-sm-12">
				<select name="publish_date">
					<option>Date Published</option>
					<option>Test</option>
				</select>
			</div>
		</div>
		<div id="bbpress-forums" class="bbpress-wrapper">

			<!-- <?php //if ( bbp_allow_search() ) : ?>

				<div class="bbp-search-form">

					<?php //bbp_get_template_part( 'form', 'search' ); ?>

				</div>

			<?php //endif; ?> -->

			<?php //bbp_breadcrumb(); ?>

			<?php do_action( 'bbp_template_before_topic_tag_description' ); ?>

			<?php if ( bbp_is_topic_tag() ) : ?>

				<?php bbp_topic_tag_description( array( 'before' => '<div class="bbp-template-notice info"><ul><li>', 'after' => '</li></ul></div>' ) ); ?>

			<?php endif; ?>

			<?php do_action( 'bbp_template_after_topic_tag_description' ); ?>

			<?php do_action( 'bbp_template_before_topics_index' ); ?>

			<?php if ( bbp_has_topics() ) : ?>

				<?php //bbp_get_template_part( 'pagination', 'topics'    ); ?>

				<?php bbp_get_template_part( 'loop',       'topics'    ); ?>

				<?php bbp_get_template_part( 'pagination', 'topics'    ); ?>

			<?php else : ?>

				<?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>

			<?php endif; ?>

			<?php do_action( 'bbp_template_after_topics_index' ); ?>

		</div>
	</div>
</div>
