<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'smartmux_shobdo_online');

/** MySQL database username */
define('DB_USER', 'smartmux_soadmin');

/** MySQL database password */
define('DB_PASSWORD', 'Smartmux1414');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'IGI*dm,V(++vd:]QFNNErD|kAYg1sQAYJ ^FBKu~]|R&+3-WEd<K`Wt{jeBiRN1&');
define('SECURE_AUTH_KEY',  'D-lt1y=c;]TOiU}pQ7yF//dL6hmXR;^Q:qTSU/f#]^~.EbKH{{$o#m1N@k-*u{6q');
define('LOGGED_IN_KEY',    '*[bZ7Q=~&e!hN?B:{gLK]>~s5N/-#Kq.N#5tt1b0G&0?-&(S6xgg|XR65E_911!:');
define('NONCE_KEY',        'vNZO5kP{8]XV|_TBIs6L|+gs^U|V@vQwE$j7.,E4rrA.Gw$|?1nWdA%[)13B+WG=');
define('AUTH_SALT',        '6RN5LefiABp-l$!<^r$;Z|4d$aU;9h #GbKDs7Uqx-c^$_6cf()9_-|4Ag6L]F)-');
define('SECURE_AUTH_SALT', '`IKtRvB|.oLD?52?pnO|{:>%e|&@~>CA=7qR4YS)tjU0zAHGfyuMM5GQt|9/-E2[');
define('LOGGED_IN_SALT',   '~RC}C,M;O2<dB8%mO=fycevzfg_l]&$ufp@b0 I/0Wt{6o>:D1md+YowPM2n[-?X');
define('NONCE_SALT',       '=0KXPxT*_N*AzZ[W%qx?F2-$=Zi>#Bs7-||lfmAwiGaJE817LqJ|_7.-nXY:[Wic');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
