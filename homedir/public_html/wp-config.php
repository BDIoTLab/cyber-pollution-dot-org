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
define('DB_NAME', 'cyberpol_wp728');

/** MySQL database username */
define('DB_USER', 'cyberpol_wp728');

/** MySQL database password */
define('DB_PASSWORD', '0X)spm!S65');

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
define('AUTH_KEY',         'smqec2git7rdlgnj7eldqi6bkrktl9tlzmkotascornpj2fdpezgskxfaodvv4vr');
define('SECURE_AUTH_KEY',  'wip8janberaijngxnts9lfskbm2edtlxmncxwg85eqmnravfqzrpiz84tasosdrk');
define('LOGGED_IN_KEY',    '9ucd1g1gfg7khzuxbjutl3n8pjd26w0o1qosmby0uy0cuwvlgeyiy4zrgj1buu9w');
define('NONCE_KEY',        'jhl4le6pyokvgrw9c4gfjzhh8catx5qbraheqaaf4ysuoap7vsxkx9ertgjl4tjo');
define('AUTH_SALT',        'wk8pwl55jjdzoscmealzdfjekvdmbbixons1i4hkqf4ienc5vgsqrdprdjohaak4');
define('SECURE_AUTH_SALT', 'aacdzqst8w3ynepuqepvbh9gwn5ueeyl4pdohl2s3mvxxscbfmx4dc7hrnanhr83');
define('LOGGED_IN_SALT',   'uu4fzqyk3s3mmscojvfsnenmp2nqijn5jl1jvmyrstgmpfabfxkwliknqwdrizci');
define('NONCE_SALT',       'enxxbnlpv6qaesldsuwoogdeudvznmwomdwnf6upylejigimusl4k6akfacdwaln');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpja_';

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
