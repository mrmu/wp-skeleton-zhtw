<?php
// ===================================================
// 載入資料庫資訊及本機開發參數
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
	include( dirname( __FILE__ ) . '/local-config.php' );
} else {
	define( 'WP_LOCAL_DEV', false );
	define( 'DB_NAME', '%%DB_NAME%%' );
	define( 'DB_USER', '%%DB_USER%%' );
	define( 'DB_PASSWORD', '%%DB_PASSWORD%%' );
	define( 'DB_HOST', 'localhost' );
}

// ========================
// 自訂WP_CONTENT路徑
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content' );

// =========================================================
// 建立資料表時預設的文字編碼及資料庫對照型態。如果不確定請勿更改。
// =========================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', 'utf8_unicode_ci');

// ==============================================================
// 認證唯一金鑰設定。
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         'Rl;{Fw|J2JK]d_KkF`F7{X-Gcvh /[GRapT(}8HJ949qLb75K][s|/cG});lP`hu');
define('SECURE_AUTH_KEY',  '*D/KF;0x S}%}|WKRMJCd{tlg_o.[-h^~W]@o>P[UA!m+c5Vl=+J3smP$Y-r2eiC');
define('LOGGED_IN_KEY',    'PvO{)3Ry:v+h0#jYxP9((eunE:LG^[Vk`5F#<3V+,U*)O![yPwF [~@e~8,3 |R@');
define('NONCE_KEY',        'Kxto!-d2K:}L=3tkV8:>XwF>-mX5T@IRcNqDf_[Su/xfKz]b)OsUE$ ia9uyI#3W');
define('AUTH_SALT',        'PB9K|,- +L]`7qERl[h+W7tBAO--u-R>Lve%]tex57pCX!G^b%fOB<@41r<`L|nB');
define('SECURE_AUTH_SALT', 'ZuKn@ceD[o&pq^+LAv?B@q)Lcpr>x,kg-]s`.yf~$[94U0 p-h V/9u &y83)|o{');
define('LOGGED_IN_SALT',   'Ls<dLcokWql-;E>`}W]MxmIG:G:g&]e$+|UNrhG+:qR`4,H%61k(:$lmCu=LY=It');
define('NONCE_SALT',       'gR.{#MJA->xQ;+P~~}&!-cC0rkxRs%BJM=Ma[_f!.L-m|| TS_!o7>0XtZ#C1x#?');

// ==============================================================
// WordPress 資料表前綴。
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'wp_';

// =========================================
// WordPress 本地化語言設定。預設為正體中文。
// =========================================
define( 'WPLANG', 'zh_TW' );

/**
 * WordPress 自動儲存間隔
 *
 * 當您編輯文章時 WordPress 使用 Ajax 技術自動地定時幫您儲存文章草稿。
 * 您可更改數值以延長或減少自動儲存的時間間隔。
 * 預設儲存間隔為 60 秒。
 */
//define('AUTOSAVE_INTERVAL', 60 );  // 單位：秒

/**
 * WordPress 文章版本設定
 *
 * WordPress 預設會幫您儲存舊版的文章與分頁，以便您之後可以回復到先前的版本。
 * 這功能可關閉，或是指定最大版本數量。
 * 預設為開啟，若要關閉請將它設為 false。
 * 若您想指定指定最大版本數量，請設個整數。
 */
//define('WP_POST_REVISIONS', true );

/**
 * 快取
 *
 * 若 WP_CACHE 值為 true，當它執行 wp-settings.php 時會把 wp-content/advanced-cache.php 一起執行。
 * 許多快取外掛會要求您將這個值設為 true。
 */
//define('WP_CACHE', false);

/**
 * 啟用多網誌站台與網誌網路功能
 *
 * 若 WP_ALLOW_MULTISITE 值為 true 可啟用多網誌站台功能。
 */
//define('WP_ALLOW_MULTISITE', false);


// ===========
// Hide errors
// ===========
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
// define( 'WP_DEBUG', true );

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
define( 'WP_STAGE', '%%WP_STAGE%%' );
define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
