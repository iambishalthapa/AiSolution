<?php
define( 'WP_CACHE', false ); // Added by WP Rocket

/**
 * The base configuration for WordPress
 */

// ** Database settings - You can get this info from your web host ** //
define( 'DB_NAME', 'ai_solution' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 */
define( 'AUTH_KEY',         'F({5a`%f_k<i$oJ@F5SBjex:pRjRqqCbLcmZU|QKCSd*>fJxI4B68b%x}(t.3`Q:' );
define( 'SECURE_AUTH_KEY',  '/O#npBE(XG6avw1S4sbU[?.bX=nv4`P.u:XfjG5xt87sA;@T!L)tS98Q$w~8jHOB' );
define( 'LOGGED_IN_KEY',    'PuO~h6Zkm3>[OR5_3`AF{,fM6&H{H(NB+G[yl#z+-BfefWfSKG9Y1|0akv;]:a+h' );
define( 'NONCE_KEY',        'N7x=,j}#rX(Q`,_+j*-J Sw.!7,-]?/ptfL9ga6vJ1B,>n6_E<CR[}o5]. GT0Q(' );
define( 'AUTH_SALT',        ']E&)-hX|(/!zy 4ZerGZ208mo:ym/~6<.[0{R$+pK,szJ!(Q$p)Nh?L^4OqaLZc*' );
define( 'SECURE_AUTH_SALT', '%W:xrm~kGEGGqmVyDLj*#&?3WnF$gx*i>2#.F*eXa!;Ws,MM~P@4gPPM9IrJ-qqn' );
define( 'LOGGED_IN_SALT',   '.15/L-)7BO-t.wlhh7ULbqBO4,A}`;{sLv(@f#-/h:0*45`>)%r/^):mm/$MS&u<' );
define( 'NONCE_SALT',       '2v~+@wV2?i[jI%}M+]!8ceJD0b$|a!/ym.7e*N)OlC&-x1c^`%L{c7 nBxARHNy~' );

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

/**
 * Debugging mode.
 */
define( 'WP_DEBUG', true ); // Enable debugging
define( 'WP_DEBUG_LOG', true ); // Log errors to wp-content/debug.log
define( 'WP_DEBUG_DISPLAY', false ); // Don't display errors on the frontend
define( 'SCRIPT_DEBUG', true ); // Force use of non-minified files for debugging

/**
 * PHP Memory Limit.
 */
define( 'WP_MEMORY_LIMIT', '256M' );

/**
 * Enable/Disable file modifications (optional).
 */


/**
 * Set up WordPress vars and included files.
 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
