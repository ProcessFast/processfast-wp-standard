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
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'f!*#3 >bnz>xiFn S>nS2&v09G>l^1eXFU?HYG<l8.&}.,6,cbh6A))l$9|0O>Yk' );
define( 'SECURE_AUTH_KEY',   'QV[T26oZfMKL-ffhApS %x8^r:7,SR$~$sDO5X`Z7,uQ%^1ZuKFd.LlcfzM}@?.,' );
define( 'LOGGED_IN_KEY',     '{r|=1R<qDiS*$@;=5Sv;>y}_=X{!lh9[K[Zxz:KEN=^~,1RFc/$lx^S+J88r8QCW' );
define( 'NONCE_KEY',         '}=Fj.jk9X;,.2r^;%) #+cWHY>.:k--JA DlE5v9@7Y]sNK5tsq@z@Xx7a%A&FXy' );
define( 'AUTH_SALT',         'Ay9*2h[Y]!?.~)jGC%:PBc&1QuG*cCu-|vL&Wm,BoIc5y}-^yqOqU]-LLLe&dn;T' );
define( 'SECURE_AUTH_SALT',  'UeU=+lPT`e;(nyBt|HvDh)e3!]eY]>*xrpwG.,E:*]JtOLHw3D.7+fDNZD/x04**' );
define( 'LOGGED_IN_SALT',    'L=Z YH*B{L[#b0+D72*w7%ZRK?Z|<MW7Mu5lBi,dw`TT9+Q[u8G@4h;FSp%?rd:+' );
define( 'NONCE_SALT',        ']<YF$7]9#sWbu]/H0#IYzKyq4Un<e.bxi<3/CJiL}:aZHFm[=XN0m*?Sk<7]40?j' );
define( 'WP_CACHE_KEY_SALT', '#FD&ZyJ.pU!h_=6Yq0zzaNMvf(93F|HJ$+/?a7&fi~{~,$wosN$SmGn;7V0%lZhb' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
