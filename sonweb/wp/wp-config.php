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
define('DB_NAME', 'eggricol_wp996');

/** MySQL database username */
define('DB_USER', 'eggricol_wp996');

/** MySQL database password */
define('DB_PASSWORD', 'S[3F9Z88(p');

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
define('AUTH_KEY',         'zpvts1hqoqrh3ianfp71m1paadpafdho4n57h8w5reaqvwnzcufev8t27s9mllrd');
define('SECURE_AUTH_KEY',  'orlvxyf0zanzfulfzw1glcnbxvw3woybbkn2tily5lvxqolho8gtrayblvgn9vjx');
define('LOGGED_IN_KEY',    '05tucdngqwjdxfnawfmxfatvzwed2xkhtbiupbev8w0qvrlkpp7k5mj1o7riesjh');
define('NONCE_KEY',        'rtjzh1yjlrfpdgzqwzl5wg7tzyqxmjpe2gcxlmordmvipehltirrxcpsjcudejaa');
define('AUTH_SALT',        'jbsqgvb3wkvsof4rwmk6mbr2dxfubgeka9xahexlfilsyrc5arrr4giuhbgcnjsp');
define('SECURE_AUTH_SALT', 'h3bpixvp8vbqsibi0z5ztydxdojps5onb1fxfbskkdj9vta68xrjtoy9bvounnk3');
define('LOGGED_IN_SALT',   'woxpgshos0jgvodwumppzak8yyrjrjbhllcoyqmpxryz66sf3kvusjjgzhh0ghug');
define('NONCE_SALT',       'k5tojdymzxbm6kikaoonpnkqiu45yfc10iirneyd7wwznu3tzkm6hyflg3amnbzv');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpy9_';

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
