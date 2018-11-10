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
define('DB_NAME', 'cyberpol_wp806');

/** MySQL database username */
define('DB_USER', 'cyberpol_wp806');

/** MySQL database password */
define('DB_PASSWORD', 'w]Gp3ST@39');

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
define('AUTH_KEY',         '1m6is6nxhpwgp0m722e8axh5crlncsjjiuccaj9ds3mxrnrcd5akmuokt4o0ranw');
define('SECURE_AUTH_KEY',  'f43sz6dbzegcvmjqzgcqgdx3exrzfcaktkfw2f7fmfpdggmsafaavzkvdxuwqch1');
define('LOGGED_IN_KEY',    'nf2c9xq9juts6byjmrzxppxixz9wrljej3nnmo1zdtlpzgbhvdkfzixhhe8zgdjj');
define('NONCE_KEY',        'y9rwtjazeglpn0clrllw3jp9v4gshgl9crdyyip6jbuzrsu4gt4gbg1kkxmdgk0v');
define('AUTH_SALT',        'xrdcl2ujq2xg4unuelkdicia6lstgkqxjnrjo5ntc62rwby8zve1uarztiohwvhk');
define('SECURE_AUTH_SALT', 'cg4eju1kd7iudtsxryygansbq6gz2egp8wmujk1m26e5ed0kdfxuai9s1sdkojxv');
define('LOGGED_IN_SALT',   'ozypozbhvqgkmzv0k0lzp9vso510wl8d9lhpreuqnzrh8hqlhlkeji14lfwgl5a6');
define('NONCE_SALT',       'apxucikdmyfralrfe2nxqhinwoxfo7djp0zk9xtkfhqxrlnebfyntkzfk4ke3v3n');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wprs_';

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
