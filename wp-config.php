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
define('DB_NAME', 'mingxiepiano');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '(fZgckW>[pG7)a1@U;vFrf`@BvU,Go%54thsHu~RpS+)[:zo!zW`i6=k>K=s`HqV');
define('SECURE_AUTH_KEY',  ',CE1EeSRRlA#sb7OCIQ{< eF=$3)X!CC|Ld.SMLvX>Tkx;:D7kZ<#u@!:U>5f}!r');
define('LOGGED_IN_KEY',    'Z/J2ttyta[<C1=bbfyAE=|C/U&q&>5:TbXX*FK@td|JU-H76PxzU5J6_Hr&?+v=k');
define('NONCE_KEY',        'v2W7yNd,#rBEp3>2:=;1r$Jl,%x5^L%#Q~15_E->o%d~h:it2A:qc6x-lrfX[hOS');
define('AUTH_SALT',        'l(**F-;aOj;E<D[9:6@A28Ksw9-;:CA PaPdZ[[7.GLsov%JDCIVY&coQ]K%8^ (');
define('SECURE_AUTH_SALT', 'g2$Q>wp7F1E rw]z@&ng(lnAu BdL@22WR`j5CL`RD;.>U<AYdau5OnUa^mKk^{+');
define('LOGGED_IN_SALT',   'oif`nDd4~b`h-?h`uAt[wz>tc_g^4@iFM,[v 6E>s?<~[aDEk>idzd<gqx>4DSv ');
define('NONCE_SALT',       '%:MMm0dcgA+4NLCoS3;e!U8$FlhFZ4N7ZEuc|:gP=b[eB!)A6ShS8.pJ<D.4C;yQ');

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
