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
define('DB_NAME', 'wordpress_plugin');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Kl!aS*X0tr?#:6FrVzc]s0Eq&])GUj{X|fiOhx+IrNCl%J2o{uoW99oXLL!I;,R2');
define('SECURE_AUTH_KEY',  'j3n:q[a`|x;9m]iak{kSwj5`#:g3XI,XE<jt]uyzzt8FAq6{TG49Qy3!)MHUIlhT');
define('LOGGED_IN_KEY',    'ovT9}|p;|0J8< -]N<V]_}iQaXXEgo}F3KFk-cx/L^szS)dvkiZ$X|&D5=m`|CIt');
define('NONCE_KEY',        '4cRW_.#NP1ru.S@hU ,^eCvEk7LdxpAu&2tOw]N3jzS,&qjL$!PQ68f!uz|ifc#~');
define('AUTH_SALT',        ')#yu<$X0kB5p}(_}5V#/6p8~~F8laC-8,Ue)P4s&N:m@4W*l{tS}2`[Hr)&1UEH>');
define('SECURE_AUTH_SALT', 'pu^5lk?ci[I&fu5NK.Z^69HTSM]iFXf 0d)o,OBoKQLz1#ICK1x;KZR~;8)>TpGx');
define('LOGGED_IN_SALT',   'W,=yCpezYr@=.!|nT>#i0aL/Z)kFV^)u{5@}l_l,Q2BkwzNH2}S_}]ph7[|O6-?9');
define('NONCE_SALT',       'nj(Rj+o4Aie9p;-MG0_~is0FE7Vx4Ym4JX@Ftq<A_jX?{UArx}xE+7|=PF$^d$03');

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
