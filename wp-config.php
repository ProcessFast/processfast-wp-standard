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
define( 'DB_NAME', 'wp-processfast' );

/** MySQL database username */
define( 'DB_USER', 'wordpressDbUser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'WTffjrp8DUKPJEovmjbtaukch' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', 'utf8mb4_unicode_ci' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'lhY-+x=/;2=.9JU{#+^<~2&<3XB(,dIqPuB#VE]3IPmViJ0GkZ3f*<8W}!Q]r}t8');
define('SECURE_AUTH_KEY',  'Pn|hvBhQZrc-7h/2kZaTe9K-al4F%X|rQWXF/k- W%QTIK8V%NPI{OLkLM{:| +e');
define('LOGGED_IN_KEY',    'uF6IY_Uj80a-dgK@ca9]I3GrRqD%]|NKox5N- =E?`zC)bY2_k<R2pmS3v8|IX<|');
define('NONCE_KEY',        'f7{x$7?Qy!K8<4HIbb?Ri:]3uT2sw1WD#LJLI72|ZJC+&jt=eSQAH6OkZI@|;;={');
define('AUTH_SALT',        'v-UX:9g/@%~o^(SuOTJ]}FG5nAO++Epw{hl$^*B}DCktAv4$UNwEsdu],|JJh`vl');
define('SECURE_AUTH_SALT', ':N!`X#vNKGzkR+d<z3o22c2W{BTBh0~H+o}&{<5)Y==+D6$x5}_ l?:V~C;!8laF');
define('LOGGED_IN_SALT',   '9T5{ioPKw ={N#+0-A4cjab=gH|3-4D#=Vi4_U5~vDGgh%HKE%$%8>^LcHR~l42_');
define('NONCE_SALT',       'oHcVTdQJU/f`uj2W?D;+hcRuclp|x@)YM]9bOI{|=l]XGB4My]o6ik7@y[v>5uq5');



/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/** Disable Automatic Updates Completely */
define( 'AUTOMATIC_UPDATER_DISABLED', False );

/** Define AUTOMATIC Updates for Components. */
define( 'WP_AUTO_UPDATE_CORE', 'minor' );



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
