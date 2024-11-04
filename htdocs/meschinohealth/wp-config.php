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
define('DB_NAME', 'mh');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '@jLnWsjyF09`,I`)0g,E[q[fIsCsA]7V@%J^CH6nSLoSF |/sR]9K8#qeh/^_+E>');
define('SECURE_AUTH_KEY',  '#BKtcRo^K@x5r=CmQ]u5fc+06 gx4 54#tPuXWo5I&?v;6Fe*=Iso<?nVQ SV4P{');
define('LOGGED_IN_KEY',    'BBg]_5Rn8E?OY<@U-:0l<v,l6KMx(F;~S<P?{k!ISN+1iP9[8qeec]XIarZeY1q^');
define('NONCE_KEY',        '>I3UsMAat2!{6qz-r6[t;8l`:8dv[#DiI,)p9HpzEfcvm^XLSnF7P.*:MYqY(_PQ');
define('AUTH_SALT',        'Bs ^@%kASwD/v{6iHrmqzKyZ+NIC`}!tz0EVZtPXwm2reDQQ@H;n{=:3iWFq[F,O');
define('SECURE_AUTH_SALT', '9XBjZ+0qQ|d{[I$ -tG:rs[N=@LxYmo@<8EWd9#bv) Y.^4t,.Yd.YouN[SHp*f0');
define('LOGGED_IN_SALT',   'q#e[jtNkQKP-{=(ti46!$VL`wFHt~/$KRkg:Q^VC7`DaH<80bz7TQVVFXb4.Z`;I');
define('NONCE_SALT',       '@M4MOiZa *yGd)`Rgr&{oOmnsa$)TuH!aNS?8aJIq)Mza<~k8}y&(G}I`yA/[i$%');

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
