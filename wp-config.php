<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',          ' A*fUr7QF-#J hg6i)k.A4$[.<y^g6zZ(H:S8+*sEx8(g7> DTHFpKxB&ofT?D+1' );
define( 'SECURE_AUTH_KEY',   'Wq]/Yrt)/hvOW%ZJ3GzboSc_Ybl,XdQaD?u%T>NlCa;qWSM7K]~ _|SwT~guN8%*' );
define( 'LOGGED_IN_KEY',     '^XRzH*QPxKYV1u;c,eb`?1OY/34w176U{yE3K2}0!<U3KPt!q)v9GHU}tdQFtF;{' );
define( 'NONCE_KEY',         '@|I>&eXqnv0p:-%^Hz4I&.z BJG/7-IyqVb726/~3ZUx63]}qJrG=#?cgjZ1Y>z=' );
define( 'AUTH_SALT',         '_-V5lL)a,>iS~=l2S|1!Fzm9eB}SV2#P11YLJ?pbZ5fk>w=|kGySCf5)Rrz[u(A7' );
define( 'SECURE_AUTH_SALT',  'n*FuaH|zCzr3coX)E5~f%.N>J/Bf3@?rQBj/yg+s4GvF~|+NX$A|MmTr7|7<MGZX' );
define( 'LOGGED_IN_SALT',    'FKhQ3&Q%9`P^lUZgj(Gra{4(k`O5$R,]Q/oXXr![jBaDgb_Z!OtV:4c@Fl9&N$Ld' );
define( 'NONCE_SALT',        'x:-PXzQuae@GvU3C$hmGIcn(cXdKVdiq).RCG::b0S0&4`4`z]h_3[N5&,8ZkY8O' );
define( 'WP_CACHE_KEY_SALT', '5`Ybh5a+CmXJhf.!k0y/f[Z,tN!FQdW{2<h?X FD3wAK,x-?haxy2w|NP#FHfwaq' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
	define( 'WP_DEBUG_LOG', true );
	define( 'WP_DEBUG_DISPLAY', true );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
