<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'chamberonne' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&,b>Qh65OM#b]z|zG}{;[~=/ji5<krS471IL1hs2q+rITw%5`4,>/oDASj)hjd|7' );
define( 'SECURE_AUTH_KEY',  '%DtcRtMG~<LPog)pniaQx}0k7m:zPT{.N@-zLA5tZuKrmS$8R;u4cap[TwDWwOiU' );
define( 'LOGGED_IN_KEY',    'L-/Cwhm`kP=B,xd*M*L0X@30j]QyJZ?lQ+/y0k(e>3I #%{b!dVZ#YlbNw<8Vx)*' );
define( 'NONCE_KEY',        'F5A#$*%(V3Ina)t@;:o@zO>Fw?m-7d ibd01o_b>^b#+#cgFX:iVF|Kg$F)SQo`v' );
define( 'AUTH_SALT',        'ySl_[@gx|^G?2&?$Ts NI%&UEQ)!k`EC4Zp/Fp,?jIDO,_7Ls?Par@gRFP#j9-X@' );
define( 'SECURE_AUTH_SALT', 'J-[dNENh)=]y|z$P_KW&4BCVMDt:Jc@]4MaB#$`{Z#~jxiH`dGY]f|24k8Q]ox=c' );
define( 'LOGGED_IN_SALT',   '@<y4=l|2.zbC%7)j^L@O M2?*-5yiypG9TcYub!noZ}DhlQGL?9[;hJx[=qW[!S|' );
define( 'NONCE_SALT',       '1smyBn,*^r1`}%?Wk6o`f3%o*4f$J5IIp@@;QoU|FPOf@`4:lR~qIR~C+?9g}hoX' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
