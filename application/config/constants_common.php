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
define("CLUB_VIEWS", "clubs");

define("ADMIN_LAYOUT", "layouts/administrator");
define("CLUB_LAYOUT", "layouts/clubs");
define("ADMIN_LOGIN", "Adminlogin");
define("CLUB_LOGIN", "Clubs/login");
define("ADMIN_DASH", "Administrator/Dashboard");
define("ADMIN_URL", "Administrator");
define("CLUB_URL", "Clubs");
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

define("CLUBS_UP_PATH", ROOT_PATH . "images/" . UPLOADS_FOLDER . "/clubs");
define("CLUBS_SHOW_PATH",HTTP . HTTP_HOST . "/images/" . UPLOADS_FOLDER . "/clubs");

define("OFFER_UP_PATH", ROOT_PATH . "/images/" . UPLOADS_FOLDER . "/offers");
define("OFFER_SHOW_PATH",HTTP . HTTP_HOST . "/images/" . UPLOADS_FOLDER . "/offers");

define("ATTACHMENTS_UP_PATH", ROOT_PATH . "images/" . UPLOADS_FOLDER . "/attachments");
define("ATTACHMENTS_SHOW_PATH",HTTP . HTTP_HOST . "/images/" . UPLOADS_FOLDER . "/attachments");

define("CARD_UP_PATH", ROOT_PATH . "images/" . UPLOADS_FOLDER . "/cards");
define("CARD_SHOW_PATH",HTTP . HTTP_HOST . "/images/" . UPLOADS_FOLDER . "/cards");

define("PASSPORT_UP_PATH", ROOT_PATH . "images/" . UPLOADS_FOLDER . "/passport");
define("PASSPORT_SHOW_PATH",HTTP . HTTP_HOST . "/images/" . UPLOADS_FOLDER . "/passport");

define("SPONSOR_UP_PATH", ROOT_PATH . "images/" . UPLOADS_FOLDER . "/sponsor");
define("SPONSOR_SHOW_PATH",HTTP . HTTP_HOST . "/images/" . UPLOADS_FOLDER . "/sponsor");

define("CLUB_CERTI_UP_PATH", ROOT_PATH . "images/" . UPLOADS_FOLDER . "/certificate");
define("CLUB_CERTI_SHOW_PATH",HTTP . HTTP_HOST . "/images/" . UPLOADS_FOLDER . "/certificate");

define("MEMBER_UP_PATH", ROOT_PATH . "images/" . UPLOADS_FOLDER . "/members");
define("MEMBER_SHOW_PATH",HTTP . HTTP_HOST . "/images/" . UPLOADS_FOLDER . "/members");

define("CARD_TEMPLATE", ROOT_PATH . "images/templates/id_template.png");
define("FONT_TEMPLATE", ROOT_PATH . "images/templates/RobotoCondensed.ttf");

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
define("TBL_MESSAGES", "tbl_messages");
define("TBL_CLUB_LOGS", "tbl_club_logs");
define("TBL_VISA_IMAGES", "tbl_members_visa_images");
define("TBL_SPONSOR_IMAGES", "tbl_members_sponsor_images");

define("TBL_TEMP_MEMBERS", "tbl_temp_members");
