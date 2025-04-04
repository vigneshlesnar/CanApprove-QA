<?php
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
define( 'DB_NAME', 'canapprove_blog' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '|aKEc!T.jn{-fpo(kE!{V^HDRqD[4sVA@9t~xOsWvZ[%2T]V/aSHwRt@~z?^kC2T' );
define( 'SECURE_AUTH_KEY',  '[Rm%|^s|>XTd^*:5qB9+>%s@A6SD*yj>/7k63_Ci~5e~Y,Yc0jQ!`r4H$WKt`?8q' );
define( 'LOGGED_IN_KEY',    'XHtawz(p?YxA,X Ba5z9C*d7>1:4P($IK+:esJX98%%M>[Pfr+EC!S]&zxZ7|j!x' );
define( 'NONCE_KEY',        ';+pHhv].#tb#]cx5%1O/[#K;l7X35fGPsra1z9Mez.93,p]p7,]G-z9i(M*_3HRE' );
define( 'AUTH_SALT',        'y+*aWjd.eHhGoL9s!XDBBOzpsk=kQ+SPZ=}1Aj.:YaG9e3AOD#xJm3EtBQGJ?_HC' );
define( 'SECURE_AUTH_SALT', 'KeVt}|*NjT?2}9lpZ|6BVTYfsUjFB;fC$F~0d6e]uMc4$ifQ+DFMB;a`SG/N)/?$' );
define( 'LOGGED_IN_SALT',   '`X4w|?F[VV~_n4S<)#d9A(K/{/P6Xv[@j%awRRoiykq>Qme:d?Y(*P.<hb^`Goy~' );
define( 'NONCE_SALT',       '|y47{r@JX:!5`SCEcV6J}AB>*>wcMakFwO1orq@iK4,rXw4PE^Y E3c8PA{&;=Ap' );

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
$table_prefix = 'cb_';

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
