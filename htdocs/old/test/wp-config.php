<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/www/tddstands.com.ar/htdocs/test/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'tdd_db2');

/** MySQL database username */
define('DB_USER', 'usrdb_tddstands');

/** MySQL database password */
define('DB_PASSWORD', 't4ll3rd1s3n0');

/** MySQL hostname */
define('DB_HOST', '192.168.0.58');

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
define('AUTH_KEY',         'X|:-+9HThn.Y!edP8>#SZ`ryDfu<B!u$Qa[DDh=HP`kejf(-{L@-Sym//DDhDd@d');
define('SECURE_AUTH_KEY',  '5Kewe$42>Wn@%Z{J;z[A`/k;~c[Oq7%_4O9p6n&/5~yio!+(xZZc+(lL5g&KSlaA');
define('LOGGED_IN_KEY',    'D>__Uou#LhC$@R 2,=n@{%j5BpsbzgJ@tu9WP-oSft&E-PsmqX+@-O/n= RV}uE!');
define('NONCE_KEY',        'eM@`pQpI]34bS&U!1*j#=~u4HcM(xo{`Wj$Uvy`tH06*kxVWhhD}N0tPsJXo[~S+');
define('AUTH_SALT',        'D-2So kl3)n-9c[,oAJM5pbFmM,?2,B.!90uq,H2VgX^P?k>Lf]xRRe*(H+N}<P|');
define('SECURE_AUTH_SALT', ':l1DUiqo0S931<mKun,t:Q+>c[@{?thgrEj}L-@Rn|ZV:{/BtEZ!uDT(n1k-sB/M');
define('LOGGED_IN_SALT',   'cUV1+U.z4X/dzm4j}NI-UV>7-|b0b<XRXd5}Zr<3H3;}E:TLEQuQS|pY_4$-Fb?X');
define('NONCE_SALT',       './mBrodmQ=tn3,F ne9,@au4Vg6aL_S1rP{ce+|f>?7uwXE4$tn.Ng&_nh,bhE-!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
