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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'NoCM8DqsvHnQ1LWDs2MFmaOPnEr/m9Fid1oVnq5/dPJ+BxYBFBzbrlNEAW8ygw+JW2WbsFDxoB9bjAjjYfc+ww==');
define('SECURE_AUTH_KEY',  'mVpWomvyg2iV0pND9ao9eVPEN+Er0c32r8go3VaA/OIvyol0e+F+2dNtEefmvVNGtn0iyqL2dSj5SC9z0CdW3A==');
define('LOGGED_IN_KEY',    'BCANm8GY2NNW3j+yq1iR4e0nuAkbu1BLqKXYgF4S+9ucMttG8YIrkZYryhui3rT9K2YWKueA4LGdPyB5Wb8aqg==');
define('NONCE_KEY',        'wB4XdwjYlZortaA//bpo+vGF1jIvGBfZYDQ8Fo6RCkRWFRFcdPYDR3gSMPhJ8SxaVFuzMJ4quJfEieEi7FLIkQ==');
define('AUTH_SALT',        'EmQrWm4494DwAmU9viwSjdboXCdgtolX0XpxjeTmBP7dHbGOH9mfogBhixnCLpEutGV7BzEHnYmwRcaVGE7U3A==');
define('SECURE_AUTH_SALT', 'nbSwDGaTeHZVm5Bwmf2fZ/5u57OuxeMvDmM+FXThDjrpp/6Jt/2Dj/BLLidroGfdtxTp9eGDx0kbFkitGuRP2g==');
define('LOGGED_IN_SALT',   'NFHIydv1au1DUjk0bc90nbk42zRGYW9IAjkjU5RwTKUnyf5a2wioK8OfBZu6lSohqyy5lBjgjQ/Y+q1hyIa6Qw==');
define('NONCE_SALT',       'Qr8j8gDGpx+NVCxy7O2Y2QlqjhzMwBRK9B/6nmKynt7F9F3fga7wkoMfPttlHMRF6+arQzO398nH+D2kMv65Mw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'upi_';

//define( 'WP_DEBUG', true );



/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
