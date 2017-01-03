<?php
/*
|==========================================================================
| 						Website Settings
|==========================================================================
*/
define("SITE_NAME", "Aqautic Green Gate");
define("SITE_URL", "http://www.avenirevents.com/");
define("SITE_URL2", "www.avenirevents.com");
define("INFO_EMAIL", "avenirevents.com");
define("ADMIN_VERSION", "version 5.0.1");
define("NO_REPLY", "no-reply@avenirevents.com");
define("POWERED_MSG", "Copyright © ". date('Y') .", Powered By ");

/*
|--------------------------------------------------------------------------
| 	General Paths
|--------------------------------------------------------------------------
*/
define("HTTP", "http://");
define("HTTP_HOST", $_SERVER["HTTP_HOST"] . '/livework/swimfed');
define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . '/livework/swimfed/');
define("HOST_URL", HTTP . HTTP_HOST);
define("ADMIN_FOLDER", "administrator");
define("PUBLIC_FOLDER", "assets");
define("UPLOADS_FOLDER", "uploads");

define("ADMIN_VIEWS", "administrator");
define("SITE_VIEWS", "site");

define("ADMIN_LAYOUT", "layouts/administrator");
define("ADMIN_LOGIN", "Adminlogin");
define("ADMIN_DASH", "Administrator/Dashboard");
define("ADMIN_URL", "Administrator");
/*
|--------------------------------------------------------------------------
| 	Admin assets Paths
|--------------------------------------------------------------------------
*/
define("ADMIN_IMG_PATH", HTTP . HTTP_HOST . "/images/" . ADMIN_FOLDER);
define("ADMIN_CSS_PATH", HTTP . HTTP_HOST . "/css/" . ADMIN_FOLDER);
define("ADMIN_JS_PATH", HTTP . HTTP_HOST . "/js/" . ADMIN_FOLDER);

/*
|--------------------------------------------------------------------------
| 	Site assets Paths
|--------------------------------------------------------------------------
*/
define("JS_PATH", HTTP . HTTP_HOST . "/js/" . PUBLIC_FOLDER);
define("CSS_PATH", HTTP . HTTP_HOST . "/css/" . PUBLIC_FOLDER);
define("IMG_PATH", HTTP . HTTP_HOST . "/images/" . PUBLIC_FOLDER);
define("INCLUDE_PATH", ROOT_PATH . "/application/views/include");

define("PLUGINS_PATH", HTTP . HTTP_HOST . "/plugins");
define("MISC_PATH", ROOT_PATH . "/misc");
define("CLASSES_PATH", ROOT_PATH . "/classes");

define("IMG_UP_PATH", ROOT_PATH . "/images/" . UPLOADS_FOLDER);
define("IMG_SHOW_PATH", HTTP . HTTP_HOST . "/images/" . UPLOADS_FOLDER);
define("SITE_UP_PATH", ROOT_PATH . "/images/" . UPLOADS_FOLDER . "/site");

define("CLUBS_UP_PATH", ROOT_PATH . "/images/" . UPLOADS_FOLDER . "/clubs");
define("CLUBS_SHOW_PATH",HTTP . HTTP_HOST . "/images/" . UPLOADS_FOLDER . "/clubs");

define("OFFER_UP_PATH", ROOT_PATH . "/images/" . UPLOADS_FOLDER . "/offers");
define("OFFER_SHOW_PATH",HTTP . HTTP_HOST . "/images/" . UPLOADS_FOLDER . "/offers");

define("ONE_SIGNAL_APP_ID", 'bc3d4592-9fe0-4532-8f62-725f21162f54');
define("ONE_SIGNAL_AUTH_KEY", 'NGMzOTVhNjUtYmI1YS00NmJlLWJlOGYtN2ZmMDk2MjVjNWU2');
define("ONE_SIGNAL_USER_KEY", 'MDk2NTgzOGEtMWE2ZC00YWVjLTkxN2QtNzhlN2QyMTA5NWUz');
/*
|--------------------------------------------------------------------------
| Collections consts
|--------------------------------------------------------------------------
*/
define("TBL_USERS", "tbl_users");
define("TBL_LOGS", "tbl_admin_logs");
define("TBL_CLUBS", "tbl_clubs");
define("TBL_MEMBERS", "tbl_members");
define("OFFER_COLN", "offers");
define("REVIEWS_COLN", "reviews");
