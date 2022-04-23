<?php

/* include import class */
require_once 'inc/class-wie-import.php';

/* Import tab content function */
function wie_import() {
	if( isset( $_POST['cozmos-import'] ) ) {
		if( $_FILES['cozmos-upload'] ) {
			$wie_cpts = array(
				'wck-meta-box',
				'wck-frontend-posting',
				'wck-option-page',
				'wck-option-field',
				'wck-swift-template'
			);

			$wie_json_upload = new WCK_IE_Import( $wie_cpts );
			$wie_json_upload->upload_json_file();
			/* show error/success messages */
			$wie_messages = $wie_json_upload->get_messages();
			foreach ( $wie_messages as $wie_message ) {
				echo '<div id="message" class=';
				echo $wie_message['type'];
				echo '>';
				echo '<p>';
				echo $wie_message['message'];
				echo '</p>';
				echo '</div>';
			}
		}
	}
	?>
	<p><?php _e( 'Import WordPress Creation Kit options from a .json file. This allows you to easily import the configuration from another site.', 'wie' ); ?></p>
	<form name="wie-upload" method="post" action="" enctype= "multipart/form-data">
		<div class="wrap">
			<input type="file" name="cozmos-upload" value="cozmos-upload" id="cozmos-upload" />
		</div>
		<div class="wrap">
			<input class="button-secondary" type="submit" name="cozmos-import" value=<?php _e( 'Import', 'wie' ); ?> id="cozmos-import" onclick="return confirm( '<?php _e( 'This will overwrite your old WCK settings! Are you sure you want to continue?', 'wie' ); ?>' )" />
		</div>
	</form>
	<?php
}