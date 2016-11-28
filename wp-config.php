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
define('DB_NAME', 'majkidymain');

/** MySQL database username */
define('DB_USER', 'majkidysystemacc');

/** MySQL database password */
define('DB_PASSWORD', 'Bv8o\\Z[8cW4%oo');

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
define('AUTH_KEY',         'Fg9Ep8 <UJlVpG1%zq =D!CN<b.)^A^*j2o(<e--&}[${,e:c^ZvC;RtpC@xf&c,');
define('SECURE_AUTH_KEY',  '4s`:FYlJk$NZX>b1rqq>+yp^&s-_jF&7xFD[7*4.-3I5Hz{`V!X;(?.^ O~zT.|=');
define('LOGGED_IN_KEY',    'kO<GW%CxUK!g^4.9Jy>Xy`hF?A<*>ypX2i;OcvOWJ5%CWOJ2?1~u{{(g45Y1SJ.R');
define('NONCE_KEY',        'q#JQyanJ-485;OIXD:cYQfvnZ.4=~{)*4~g0|ucD1!Iv?xn>v<F}1|IeeK.GGIj,');
define('AUTH_SALT',        'KdmOd9u%)KNDxiRc C,U[#X!!+Ec9o50qn/J9~MOdT2%h49_Z4IMb.6hcm1{uOX)');
define('SECURE_AUTH_SALT', '#2Olqr:`rp(>d{#4k(5t}c/hRBoQ1jBp?gYE.4O1e(LxnjZQ? {n.0rGO#3;.W/a');
define('LOGGED_IN_SALT',   'H>PmU8{7EOuRL@8u@[>[+(>:_7d>}c]QJei0o=jXv-W}JY3J;Y.*Y#!i5y3(4`Qz');
define('NONCE_SALT',       'iELFXBE#U-A770E}@oSp=NzNczm]n9tH8YK,|*TWv=rQD=$W1W9j:Y%o7zu]]T1Z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
