<?php
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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_yulstay' );

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
define( 'AUTH_KEY',         '}(CQ.X+g`wU&9h(8@(w1ZGz^5qw+W]}-anU8#Z 6}3MiX& ]sy]m3D|N}Y_yUa8J' );
define( 'SECURE_AUTH_KEY',  '/T65Vu7eOKIc%i{d+k5thr:/$e?EEt|PI39)m Y)EXrTeSP4]EwWRo[{UB>Yqn/g' );
define( 'LOGGED_IN_KEY',    'I-58Ku0iH=^x!XN3NNY+9nt.x~De9uy9MV4piSe~2P*lS:8pzey4G97^y4z& 3nV' );
define( 'NONCE_KEY',        '?a>&+10s .?hix,z,Dw;Y7-ES2cqLE:W*1,o !o7PhUzZn:K0uzs^3D-BJbZZp+y' );
define( 'AUTH_SALT',        'jlg u+E?)_<SU>`^>gyR[iXjVIWCb~qY0O5]V(e0,8AB*;C]hi)$?S$z.4Ian8)#' );
define( 'SECURE_AUTH_SALT', '[X}5-8OiDfQhSZg6Fxv=(&3@cztN;o|;@7qVs, +Y]iHnI>_&z_8|[xPhRjs0Z~j' );
define( 'LOGGED_IN_SALT',   '@D^Ph@!W%OAs)f_;+VnlY*qFaq~!ANMNl(,G(Av*t~(?S98)lf]ScMd3Ky&w&O(F' );
define( 'NONCE_SALT',       'U/*8^u`/yDFZTzsK>63)WIzNf!$NxLw{jO89+$PY*KZl[`>DNKCJ!)fn;`e$0FAm' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
