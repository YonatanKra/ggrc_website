<?php

/* include export class */
require_once 'inc/class-wie-export.php';

/* add scripts */
add_action( 'admin_init', 'wie_export_our_json' );

/* export class arguments and call */
function wie_export_our_json() {
	if( isset( $_POST['cozmos-export'] ) ) {
		$wie_args = array(
			'options' => array(
				'wck_serial',
				'wck_serial_status',
				'wck_cptc',
				'wck_tools',
				'wck_ctc'
			),
			'cpts' => array(
				'wck-meta-box',
				'wck-frontend-posting',
				'wck-option-page',
				'wck-option-field',
				'wck-swift-template'
			)
		);

		$wck_prefix = 'WCK_';
		$wie_json_export = new WCK_IE_Export( $wie_args );
		$wie_json_export->download_to_json_format( $wck_prefix );
	}
}

/* Export tab content function */
function wie_export() {
	?>
	<p><?php _e( 'Export WordPress Creation Kit options as a .json file. This allows you to easily import the configuration into another site.', 'wie' ); ?></p>
	<div class="wrap">
		<form action="" method="post"><input class="button-secondary" type="submit" name="cozmos-export" value=<?php _e( 'Export', 'wie' ); ?> id="cozmos-export" /></form>
	</div>
<?php
}