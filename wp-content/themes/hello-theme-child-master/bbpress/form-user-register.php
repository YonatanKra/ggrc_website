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
	.forminator-ui#forminator-module-1345.forminator-design--default .forminator-textarea{
		min-height:70px !important;
		height: 70px !important;
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
		max-height: 110px !important;
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
