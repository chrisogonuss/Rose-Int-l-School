<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rosemaryejiogu' );

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
define( 'AUTH_KEY',         'W{MN:4)|N7wCeg1,M?[u<k7fVP4CKf0$G~ A/H!Ya~`7ZJ/LuqxM8tl.Ba!4Hi/A' );
define( 'SECURE_AUTH_KEY',  '<2HSMKJ1h+-)Pb]uPES$MJ/Whz5Sd)?FtX&h;Y((A1U8DDBNGHJu]@&d3^!>Zg$&' );
define( 'LOGGED_IN_KEY',    '~59AgDqBWqF(qerVa4_<$MLx&D0C0z4d0`2:|37O6bD,il!aj;r<t`op85&?o+u~' );
define( 'NONCE_KEY',        '2y[PD4DYd`|MGf L&V??a%H8iMGYO~jIIG/%i.*o{x5,p`*dF|JPqXQgSZJHc$Uw' );
define( 'AUTH_SALT',        '6@O)0||Fy}Q/9J:xZjTACg(:4@v7+cfPnOe08k!K4HuW^m:$5qbaPwuDBkg/06wz' );
define( 'SECURE_AUTH_SALT', ']Nh1:RcrV1.>YE?jYp1WD+TQCg@PNj;c}}BUU@:-.6{mN]#IBednI6]aqlnfk237' );
define( 'LOGGED_IN_SALT',   '{.zC*x/7V$o*ixZ1DZaj>}UJEA#:L,dlWoCQ}FN-71mvi$8wdz90$s5yDU(=.Gd/' );
define( 'NONCE_SALT',       'wT<QA>9hs+pK_(rTxz2+Y1.jam1j#Y9Z1d8,T#j7Xj6I/~a/vsa[+O5]~i<H{$DA' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
