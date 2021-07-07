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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'projects_wordpress_gelpax' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@1?<*qAso#06}f4;^$1X#q<bHSa{~vh(viG2/_WxWy,b(D+E>8`I~e7! ld=8p-;' );
define( 'SECURE_AUTH_KEY',  'h6za}gdX@hOTa7w~j<VXyAGk{#%p[Dp`!ZiX3`LO&UdWbXW8k#vwQ<.`E13)_7Lp' );
define( 'LOGGED_IN_KEY',    '=?5NQ7v]>u+/]nPoyf7%qD]u3zx+S=t8.;lxx%8X>.5#@h#fz9t9i.ye^3CA_G%z' );
define( 'NONCE_KEY',        '>rPyGaeeU15jtdcP}u@-Y;|KvGxhLFi=^gl]0}!0$_NjR0H=[2v5JFUq2x)%AOCt' );
define( 'AUTH_SALT',        '/]{%qWB1ED!oi*IwAhN0k9#E T#`4c);a@g].V;fEgE7A)(a`rabX}yzyvGsW0tv' );
define( 'SECURE_AUTH_SALT', '-nWeFo8/4AhJDqDBtJ:.+j{;NXD.`uC`,4F[t- )R)2N{6LQanKTfC,kgtO:zplB' );
define( 'LOGGED_IN_SALT',   'b_<H@^tP=lp4Akd&W)}|4oC4MT@r)&,:(9uzYh@XPE0^;Kb:YbLz$6/HLP|Db7lM' );
define( 'NONCE_SALT',       'tX-|=WQ3Q?u=#_W}.p?W:;xO1{2{K;LNNW_GGvW0bF-=BN}V9YU|rK|CpX|o29>l' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'gl_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

define( 'WP_HOME', 'http://175.176.184.243:2021/projects/wordpress/gelpax/' );
define( 'WP_SITEURL', 'http://175.176.184.243:2021/projects/wordpress/gelpax/' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


