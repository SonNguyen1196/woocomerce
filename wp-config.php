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
define( 'DB_NAME', 'e_shopper' );

/** MySQL database username */
define( 'DB_USER', 'nns' );

/** MySQL database password */
define( 'DB_PASSWORD', '1234' );

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
define( 'AUTH_KEY',         'JQ&e<^AMn=C$YI>%c_Lvv5r@o`%YRjM)[o}SH@zR>k=^405O=.42fF4|s e&+UMg' );
define( 'SECURE_AUTH_KEY',  ']EJ~>L4*HXa<6|#G#fR`oTZ)`FJov,R+g-`JBbh-Me:,n##}yt]y&xuh$]@/Sh$8' );
define( 'LOGGED_IN_KEY',    '~.n6Ty$N_-5$gyiG{Y3-f[ Y[Mb>p.F~WR[|aDst}_+] oFs[]RVX!79fVLde?qS' );
define( 'NONCE_KEY',        '~4x251)N32J5ykhtt-|aMxRh/}ZHO#/f |_gW>5?Th+,7RGq=_UKz<-6r9:;U7BT' );
define( 'AUTH_SALT',        'qK[Y}PttF0A)C*gcmCYJ,^8db]c[1@EjU*,jU!!4gOw_6!P3bz+~UX.nhKrVzb}x' );
define( 'SECURE_AUTH_SALT', 'Gqq_q2Dl,O]imTLkM@8gyme%&}?:1yO!#dbc$V}=;avei~VZ).FLjlVy=hxvR.Vh' );
define( 'LOGGED_IN_SALT',   'W$oj=YOBD_X9p1X`m1lOYVP3RpfvzXIhd$7^/FHe:o;6`WVR`b24ks+E+_V94jry' );
define( 'NONCE_SALT',       'Qed7;nQ#^4z=<& *b6tAa)KDgvYS/uC~Xd!%R>zf2ULRV{*YJe+h:g^5KU56Y.kw' );

/**#@-*/

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
