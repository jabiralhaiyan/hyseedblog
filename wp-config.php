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
define('DB_NAME', 'hyseedblog');

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
define('AUTH_KEY',         '88TC6_6/26R:3B3U3vwk!p1Hkoui% ilotDV{B;:09hc Z6J2qNwIwCIXB1#N@{t');
define('SECURE_AUTH_KEY',  'M+^,7cWvcw#B5E+1`(hKsW4$fhvKv,j<^Gd}o4_uq6f$a1tV,l.HF`Sg1M5r]0sp');
define('LOGGED_IN_KEY',    'nqHkZnBW=>[gl3vp02j/SJoC~F{,|^[ufF.BYC<bg@w9g?$m=e+P4+$1Rk^%437b');
define('NONCE_KEY',        'GEWL)XjCB8VHKKD4~/RvRt5Ya^2Ch]iWzhIk,XtDM}-{zy[(E8GM[|fgDQA_$MuZ');
define('AUTH_SALT',        '4&x+jl-fi-Y{NnTMSiAAHU8qI]<z|8oIhN,Q^a|,^bgPE;R?EJv,x`!Vc,>8a1;r');
define('SECURE_AUTH_SALT', 'C>uMB~=A4Vw#Lz#h?5Aq{A[C}wQ&aajbj2B?+[t,mJIw2Hk@Eo ~#3K[F}ne2hTq');
define('LOGGED_IN_SALT',   '(J=fw0~!%m]6>k} >1U-qo?rRWVN&]tzaLA{L*x:AG(01h;i5jMp^C|&oAtDTxOh');
define('NONCE_SALT',       'KVLqFN5w9u>UwQPg-|_IZL7JqNYoFg7UF0XuH+QJSIkYmN`+YC&wr?y8f?.c>@J(');

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
