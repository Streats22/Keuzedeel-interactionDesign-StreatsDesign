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
define('DB_NAME', 'DB4137119');

/** MySQL database username */
define('DB_USER', 'U4137119');

/** MySQL database password */
define('DB_PASSWORD', 'yjETRAJ7cV4KL87yA');

/** MySQL hostname */
define('DB_HOST', 'rdbms.strato.de');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '^JFqrLycF5n#SCIKCJAtQ@DQIFhSE!sXnV1v2UQ!ARbBSF#35xgKufl9Lv%pNZ3V');
define('SECURE_AUTH_KEY',  'Nbrcd#nPL(p)Gja)5U8pBgoNPs3XVydOx^h!R^b#8Jrlso0Qy8MBo%)WrE(HV5t4');
define('LOGGED_IN_KEY',    '0k0krV)ERoY1VOSl6)b1^Y^azhC)loGaKIhvdLqSvjKKzeHQ&m*S&@AcfpYjon7q');
define('NONCE_KEY',        'ZO21*M9^0FdydqlZ5*%gJ1EumUaA!415UjYelvju4OC^%C7c*HYjjx316emK7RJ6');
define('AUTH_SALT',        'b4B)O0x5kFJNCPbRJI45sWxPV%0#!XS9Kjx1WF8Pury(@HOG#HEiKQm0JHJyKV3K');
define('SECURE_AUTH_SALT', '7@56Gd6^dtNE%&k&hh0sP%kzzy1RcrY(GGsNtJM0v!0bN(n#p(HSRGJAfP86)rFt');
define('LOGGED_IN_SALT',   '71wClM@)TyLIUuR5M6TJYsO*pigtYp4YgGOW*@ax1)o^m3aZpRv*2RJBrvii@xUb');
define('NONCE_SALT',       'HUD1Q(pI1#(lUVQ@^xpJKXT0RuCoYbEOPaLSiIgRcowWN76W55x3ROx*Kyz%e2Da');
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

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');

define( "WP_AUTO_UPDATE_CORE", 'minor' );

