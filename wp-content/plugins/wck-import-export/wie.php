<?php

/*
    Plugin Name: WCK - Import Export Add-On
    Plugin URI: http://www.cozmoslabs.com/wck-custom-fields-custom-post-types-plugin/
	Description: This plugin adds a WCK subpage where you can Import and Export settings of WordPress Creation Kit.
	Author: Cozmoslabs, Cristophor Hurduban
	Version: 1.0.1
	Author URI: http://www.cozmoslabs.com
	License: GPL2


    == Copyright ==
    Copyright 2014 Cozmoslabs (www.cozmoslabs.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

/* define plugin directory */
define( 'WIE_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );

/* include content of Import and Export tabs */
require_once 'wie-import.php';
require_once 'wie-export.php';

/* add submenu page */
add_action( 'admin_menu', 'wie_register_submenu_page' );

function wie_register_submenu_page() {
	add_submenu_page( 'wck-page', __( 'Import and Export', 'wie' ), __( 'Import and Export', 'wie' ), 'manage_options', 'wie-import-export', 'wie_submenu_page_callback' );
}

function wie_submenu_page_callback() {
	wie_page();
}

/**
 * adds Import and Export tab
 *
 * @param string  $current  tab to display. default 'import'.
 */
function wie_tabs( $current = 'import' ) {
	$tabs = array(
		'import' => __( 'Import', 'wie' ),
		'export' => __( 'Export', 'wie' )
	);

	echo '<h2 class="nav-tab-wrapper">';
	foreach( $tabs as $tab => $name ) {
		$class = ( $tab == $current ) ? ' nav-tab-active' : '';
		echo "<a class='nav-tab$class' href='?page=wie-import-export&tab=$tab'>$name</a>";
	}
	echo '</h2>';
}

/* WCK Import and Export subpage content function */
function wie_page() {
	global $pagenow;
	?>

	<div class="wrap">
		<?php
		echo '<h2>';
		_e( 'Import and Export', 'wie' );
		echo '</h2>';

		if( isset ( $_GET['tab'] ) ) wie_tabs( $_GET['tab'] );
		else wie_tabs( 'import' );
		?>

		<form method="post" action="<?php admin_url( 'admin.php?page=wie-import-export' ); ?>" enctype= "multipart/form-data">
			<?php
			if( $pagenow == 'admin.php' && $_GET['page'] == 'wie-import-export' ) {
				if( isset ( $_GET['tab'] ) ) $tab = $_GET['tab'];
				else $tab = 'import';

				switch ( $tab ) {
					case 'export' :
						wie_export();
						break;
					case 'import' :
						wie_import();
						break;
				}
			}
			?>
		</form>
	</div>
<?php
}