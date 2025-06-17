<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

define( 'ITSEC_ENCRYPTION_KEY', 'WmVBPUBJYFcwL15RKiN5WClpW1thPCEgJVZ4Kn5da1AuNHJbSzg0LlU3TXNdTFlUVnEtRkB6WCZpNFspTn5XSQ==' );

define( 'WP_CACHE', true ); // Added by WP Rocket

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
define( 'DB_NAME', 'harvard' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'iTt34vnnFKaAUbbrCB5MTU3APIqFNyqKpSTyNh39RBHzrSGGKcPyn3jTRCcouiZ1' );
define( 'SECURE_AUTH_KEY',  '6d7JHGriDw0pAsAaNuZiUzSgyW1NKkjN3OV4vi5XxEyw821eh3pzFz87zGFEHIbV' );
define( 'LOGGED_IN_KEY',    'woYEXJfU15OFNlp21UOLjDdwrFZxHRQR8oJSSY1rcLFbdLHtvwRmW7lpAZjdlc8W' );
define( 'NONCE_KEY',        'dcA9pXMcNSCHaY8RPA5bTGhCFueWg2IJvR0PpatTSJWqECpFdNvXuy6yzLV6us0Y' );
define( 'AUTH_SALT',        'U2bCQbjvBGpJxAOHEfkBtIkJTiskQaAAUlAMVmWlyHdF6u7RW60x4ZPHxxxYCIb1' );
define( 'SECURE_AUTH_SALT', 'MPQwHiV4JqzlwxUibmTfW1VY8Wnb0ytOLIePPcyvfPDk1V5LhtGZ6BHYZURBTjxO' );
define( 'LOGGED_IN_SALT',   'TqTVkWq6dLt8U1EfRkltqpDdvxL7Cl27wvjuvBxxXrGZRJ0wcNKKvLpJaiwLXYB2' );
define( 'NONCE_SALT',       'a1YKlsYn33KsUNMXfJ7VM5SAUWPuOmAKLcBexEFhGcR6c8vZJdImn6eBNhUE9XYZ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

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
