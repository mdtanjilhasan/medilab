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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'medilab_new' );

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
define( 'AUTH_KEY',         '>cvKiU@X,$MNF~#k7([j(..luU1W;ln5T.?249J|T&e]TriT!G6]Z}IXKph;Fn!|' );
define( 'SECURE_AUTH_KEY',  'Y9qAN(Y6h<(BXpzAwp</b#a^}I/VBn1NQ??{a4-T=sHjBTnEvv2T&1L#u.,%m41{' );
define( 'LOGGED_IN_KEY',    '8pz`>3wso-~Sz_~,f0Zn`cXCQ+_mzGVsvRjfBxo=GYeMmL1c6#Emj$VwT=<j-OX(' );
define( 'NONCE_KEY',        'B^LAt3* FZ7V!wyZ*7<YE^(`}Guj-Qo&kT;9GLkBfZO/xSD}e^}a*q5 7~T-<1w!' );
define( 'AUTH_SALT',        'hbiZnU_PFJ/;X70RiL7O0F_9oQ-L,QE)N+l*h.[`7PF}n=o4ZDt)AdHOi*QH.t[,' );
define( 'SECURE_AUTH_SALT', '<::THeK+p^2:2si0li;-&vJO3Nz`z82B<.Sr]}DDb@39JnO-;Z)K!Qlq<+`Pn{sH' );
define( 'LOGGED_IN_SALT',   'zO0?huKvDvQW%Q;:vU0E#n(/}k;^.@i}GnTOFV_5wLX7k3TWXjd)=:>3S^y.~bik' );
define( 'NONCE_SALT',       '4{Nq*XS$u{E5RrMVydQ`+A(Ch;GR_pO.~~8{(^c.}Le2jJLQ~|<AdW+Zv|9tZ9l:' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'medilab_new_';

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
