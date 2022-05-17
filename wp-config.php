<?php
define( 'WP_CACHE', false ); // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ggrc' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'C}pwk FO&VGvW(7-}Vt+&%?HuP+jS/Q==;ja^3_C/x_~2^>y,MbpXkll}d}6kcmH' );
define( 'SECURE_AUTH_KEY',  'jN6^G?pQp_6.EyZxE$vK!mT0lCEVmAJ*+m[0UVg(y{C=cB;,/mvKr4C$E|!}7*F1' );
define( 'LOGGED_IN_KEY',    '.sMWTRtPVU  ~SeZ*<#9!1.q*?A/I~{ IE<uY_ZdP6lV[+tcjOa&R+1D]FO$;[HY' );
define( 'NONCE_KEY',        '/xXPS;7Ou`d]P)c-xQ[f8$@zizo`bxeA660=whu9*:jS/8IzsI-i8r-~LQ73T<_/' );
define( 'AUTH_SALT',        'sPS&Q+zm/{8&:Kpy>T=2],azp1IGV.6%4xv)KqIn#?RP c~wHN3k[@zxkkR#TthS' );
define( 'SECURE_AUTH_SALT', 'I_$L8H!TuOtUF._}0$S+~3L!{[vw.0?]iz G=A(//nb2G>ki+/:_[c.)pqN3+AV|' );
define( 'LOGGED_IN_SALT',   '7:Q/3_JyWX@ilHBraU.kS^nr4%7YN9>@z0zr8_r4n.A86El<&RmB]g9(S7nuz_e,' );
define( 'NONCE_SALT',       'G~OD[`I0}D@79T.t+TMt;-q7r@o#nK|;Gmw&bt!37Jcr4(a2>Mf!wbe86ZgfhUT!' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ggrc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
