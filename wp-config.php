<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'lidersbor');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '123456');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DR(_tB7?6p=_GMyh0JW6-tWp*`XF@-m|#OP0^<TooG)dEKO/_{Loo{vM-;*LU&L}');
define('SECURE_AUTH_KEY',  'KWJj~y#+i|HyvE4kxd|v}/ ywkk?$+Ec;1fJ+@$,JiHEAkq1*sG?Lj.|uFz%e+W ');
define('LOGGED_IN_KEY',    '|V+7MrZtElil@,f?K[X*F6pvC;L?{3gd?)P)da{*O%*~y3_0/ ,UAsp5A$tct_8^');
define('NONCE_KEY',        '~}R+9mlWJ+{Z8isJ=`vi~[o6a3ly=GFwt*T!?xGo!Px#-}|by0aQ+n*JuR=k4)+~');
define('AUTH_SALT',        'Mv(_p`})ki+QZl;~o|XY[UT_8,WZCF`|,r]i_xcUdrxVo[L2)xKOi(V+Z.Zk]5D-');
define('SECURE_AUTH_SALT', '>3ee}C~7+S,1bn +T|r}*tpg,(9+dEQR:=HvR%~ouU&7|dZT+>HJb}>B+,a-n8T(');
define('LOGGED_IN_SALT',   '~}Un5-]sR`X&?k1{|z51eU|Vy4}dYP^5/$!#0Q)c@df!>i%$CQQxi19RogJ&A2D{');
define('NONCE_SALT',       '!Fmc6p6`nu_}3:xM(&tO)icu`!c&l5YGvrDod[C@/:8&7xk0aB-inAr/^sz`>9:c');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
