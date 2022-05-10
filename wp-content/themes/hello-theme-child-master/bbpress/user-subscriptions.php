<?php

/**
 * User Subscriptions
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_user_subscriptions' ); ?>

<style type="text/css">
	
	.forminator-ui#forminator-module-1341.forminator-design--flat .forminator-label {
	    font-size: 16px;
	    color: #333;
	}

	.forminator-ui.forminator-custom-form[data-design=flat] .forminator-checkbox .forminator-checkbox-box {
		
		height: 16px;
		border-radius: 4px;
	}

	#forminator-module-1341.forminator-design--flat .forminator-pagination-steps .forminator-step .forminator-step-dot, 
	#forminator-module-1341.forminator-design--flat .forminator-pagination-steps .forminator-break:before {
	    background-color: #518d2b;
	}

	#forminator-module-1341.forminator-design--flat .forminator-pagination-steps .forminator-step .forminator-step-label {
	    color: #60b044;
	}

	.forminator-ui#forminator-module-1341.forminator-design--flat .forminator-button-next, .forminator-ui#forminator-module-1341.forminator-design--flat .forminator-button-back, .forminator-ui#forminator-module-1341.forminator-design--flat .forminator-button-submit{
		background: linear-gradient(80.63deg, #0B4F6D 26.04%, #0F7AA9 99.31%);
		box-shadow: 2px 3px 9px rgba(11, 79, 109, 0.2);
		border-radius: 30px;
	}

	table#advisor-info tr td:first-child{
		color:#0B4F6D;
		font-weight: bold;
	}

	table#advisor-info td{
		border-bottom: none;
	}

	table#advisor-info {
		font-size: 16px;
	}
</style>

		<div id="bbp-user-subscriptions" class="bbp-user-subscriptions p-20">

			<p class="mb-0"><b>Advisor Information</b></p>
			<hr/>

			<!-- <?php //bbp_get_template_part( 'form', 'topic-search' ); ?>

			
			<div class="bbp-user-section">

				<?php //if ( bbp_get_user_forum_subscriptions() ) : ?>

					<?php //bbp_get_template_part( 'loop', 'forums' ); ?>

				<?php //else : ?>

					<?php //bbp_get_template_part( 'feedback', 'no-forums' ); ?>

				<?php //endif; ?>

			</div>

			<h2 class="entry-title"><?php //esc_html_e( 'Subscribed Topics', 'bbpress' ); ?></h2>
			<div class="bbp-user-section">

				<?php //if ( bbp_get_user_topic_subscriptions() ) : ?>

					<?php //bbp_get_template_part( 'pagination', 'topics' ); ?>

					<?php //bbp_get_template_part( 'loop',       'topics' ); ?>

					<?php //bbp_get_template_part( 'pagination', 'topics' ); ?>

				<?php //else : ?>

					<?php //bbp_get_template_part( 'feedback', 'no-topics' ); ?>

				<?php //endif; ?>

			</div> -->


			<?php 

				$advisor_request = check_users_advisor_request();


				if ($advisor_request) {
					echo "<table id='advisor-info'>";
					echo "<tbody>";
					echo "<tr>";
					echo "<td>Listing as : </td>";
					echo "<td>".$advisor_request['radio-1']."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Expertise : </td>";
					echo "<td>".$advisor_request['checkbox-2']."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Providing expretise : </td>";
					echo "<td>".$advisor_request['checkbox-3']."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Area of expertise description : </td>";
					echo "<td>".$advisor_request['textarea-1']."</td>";
					echo "</tr>";
					echo "<tr>";
					if (!empty($advisor_request['textarea-2'])) {		
					
						echo "<td>Opportunity to connect : </td>";
						echo "<td>".ucfirst($advisor_request['checkbox-4']).". ". ucfirst($advisor_request['textarea-2']). "</td>";
					}else{
						echo "<td>Opportunity to connect : </td>";
						echo "<td>".ucfirst($advisor_request['checkbox-4']).". </td>";
					}
					echo "</tr>";
					echo "<tr>";
					echo "<td>Way of contact : </td>";
					echo "<td>".$advisor_request['text-3']."</td>";
					echo "</tr>";
					echo "</tbody>";

					echo "</table>";
					
				}
				else{
					echo do_shortcode('[forminator_form id="1341"]');
				}

			?>
		</div><!-- #bbp-user-subscriptions -->

<?php do_action( 'bbp_template_after_user_subscriptions' ); ?>
