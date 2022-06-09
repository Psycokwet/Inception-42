<?php
 /**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', DB_NAME );

/** MySQL database username */
define( 'DB_USER', DB_USER_NAME );

/** MySQL database password */
define( 'DB_PASSWORD', DB_USER_PWD );

/** MySQL hostname */
define( 'DB_HOST', DB_HOST );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Pa3[O3rr_=j?mm8(ej$Ln0oH^G,+[P:jL@e+F%h-{VW084;J~1+IK%^_+O( P~Rq');
define('SECURE_AUTH_KEY',  'JarXww:RdfNAF-}V<F/p:3dbc~b86&>cS_`XW]Oe4b%I$0ioz6Qbq=!Zb..tImlr');
define('LOGGED_IN_KEY',    '<D-zX+%a&NspVjYmNyQ=|fezWNy%OxB&+MPAYUk~b]k){I~<]+;ty|#U)fT.{Os.');
define('NONCE_KEY',        't^xCLWI->q]M}/>-uy6;PzGq$=(+S9JjH=NZ:qo-O%-+-+n+V?[DU<V+~Am[mLmW');
define('AUTH_SALT',        '(w9Ys~yrIEF^HE(|r^]1h9iI2^Y6@x-c`33c)JjYD^v.K*g8:k.!5z4a2tBrTk(#');
define('SECURE_AUTH_SALT', ';<fd|drD!OG8iS`/wCwLq$!U`&ML|v=N`,XI?+.|9@N?`,e?28U5w7PX^A?BO`EM');
define('LOGGED_IN_SALT',   'j8+_:i,-:_a:Ecn6QcfqupRbcw(=v2a./ximJjv0 c8vBx^~^J+!ppD{q17@/5:?');
define('NONCE_SALT',       'u7{A-{*&-vzl0EgCL_uu<!l3@!-|fzOGIRA |oFHtF%.DHa6V@*kXY|Pmq+=|i+h');
	

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
