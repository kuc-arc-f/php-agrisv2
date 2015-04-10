<?php
define("OK_CODE" ,  1 );
define("NG_CODE" ,  0 );

define("SYS_DB_HOST", "host123");
define("SYS_DB_NAME", "db123");
define("SYS_DB_USER", "user123");
define("SYS_DB_PASS", "pass123");

define("CONT_NAME", "/agrisv2" );

//CODE
define("ER_STAT_000" , "000" ); //zero
define("ER_STAT_101" , "101" ); //DB-Error
define("ER_STAT_102" , "102" ); //Nothing ,mc-ID
define("ER_STAT_103" , "103" ); //給水なし、ＭＣ有り
define("ER_STAT_104" , "104" ); // Auth-error
 
define("ROOT_DIR"   , $_SERVER['DOCUMENT_ROOT'] . "/..");
define("BM_ROOT_DIR", $_SERVER['DOCUMENT_ROOT'] . CONT_NAME );


define("BM_ROOT_URL",  CONT_NAME );

define("PUBLIC_DIR"  , ROOT_DIR ."/public");
define("PUBLIC_URL"  , BM_ROOT_URL ."/public");

define("LOG_FLG"     , true);
define("LOG_FNAME"   , BM_ROOT_DIR . "/log/error_php.log");				// エラー用ログファイルパス

//URL
define("YT_SERVER_NAME", $_SERVER['SERVER_NAME']);

// Cook
$i_cook_exp = 3600 * 24 * 360;
define("SYS_COOK_EXPR",  $i_cook_exp);
define("SYS_COOK_USER" ,"sys_user_id");
define("SYS_COOK_PASS" ,"sys_user_pass");

//Seesion
define("SESS_USER_NAME" ,"sess_user_name");

define("YT_LIMIT_DAY_NUM" , $i_cook_exp);
define("YT_LIMIT_REG_NUM" , 5);
define("YT_LIMIT_REG_USER_NUM" , 100);
define("YT_LIMIT_REG_TR_NUM"   , 1000 );

define("BM_FORM_TYP_NEW"    , 1 );
define("BM_FORM_TYP_EDIT"   , 2 );


//Message
define("MSG_001"   , "Copyright 2009-2015 ,Inc. All right reserved. ");
define("MSG_002"   , "Copyright KUC architect fukuoka Inc.");

define("MSG_YT_ERROR_01"   , "。");
?>