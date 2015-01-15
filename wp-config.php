<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'actoedit_act');

/** MySQL database username */
define('DB_USER', 'actoedit_actedit');

/** MySQL database password */
define('DB_PASSWORD', 'actoeditores8039876.');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'lg6$tG1ujw-uf<-n%P^E{#m7nC]6c-oAs%;VL?_nwQ!*ZCLawqK7J_eNN|$%vT-3');
define('SECURE_AUTH_KEY',  '$}dwC}DX^-1?+JAbUi*Z|Z;N|&M2q&W X,cw<b[wUsUz2-#1{w]tkGOjfCVtwgNX');
define('LOGGED_IN_KEY',    'I/!_0:=PBwTK+|$;Ft[w:pnVI] su_1!4`z]eX?&eO_r|-|e;[WE[_E^M~+ZZ,C/');
define('NONCE_KEY',        '.5{BU]80yw +rX-73^+8djcT0U!(<MHXAj0X(jiZ||0_/wVhcC|{Vv6Q8>oD1Ihs');
define('AUTH_SALT',        '%9#IbiGTW/GBsr_ae5fVJ,*^LhBC;=deHX/-8 XwqGU-i8*wM;^bmPOGUMa>`oRY');
define('SECURE_AUTH_SALT', 'GEYE)?foyLAgJ@RJsdEAPF6vg%iw#,IQzHdv9<OcR9_Ph a@B68hiDd#:U/>hehE');
define('LOGGED_IN_SALT',   ']0W<Y-,gD<w.VVoJLMEPbl-|-x-#r<++l<5lf#~?i;n[CK5#j^~;&3fSsDaWg|Ya');
define('NONCE_SALT',       '+sL]/+9YuL/]p`9,)63r[6^b{S0FW62OEWf}$_IT8eavgxSQ9&z/^.3R EsmQar;');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'act_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
