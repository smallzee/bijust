<?php 
	session_start();
	require_once 'func.php';
	define('Env', 'onlin');

    date_default_timezone_set("Africa/Lagos");

    define( 'TIMEBEFORE_NOW','Just now' );
    define( 'TIMEBEFORE_MINUTE','{num} minute ago' );
    define( 'TIMEBEFORE_MINUTES','{num} minutes ago' );
    define( 'TIMEBEFORE_HOUR', '{num} hour ago' );
    define( 'TIMEBEFORE_HOURS', '{num} hours ago' );
    define( 'TIMEBEFORE_YESTERDAY', 'yesterday' );
    define( 'TIMEBEFORE_FORMAT',  '%e %b' );
    define( 'TIMEBEFORE_FORMAT_YEAR', '%e %b, %Y' );

    define( 'TIMEBEFORE_DAYS',    '{num} days ago' );
    define( 'TIMEBEFORE_WEEK',    '{num} week ago' );
    define( 'TIMEBEFORE_WEEKS',   '{num} weeks ago' );
    define( 'TIMEBEFORE_MONTH',   '{num} month ago' );
    define( 'TIMEBEFORE_MONTHS',  '{num} months ago' );

    // website configs
    define('WEB_EMAIL',"support@bitjust.net");
    define("WEB_TITLE", "BiJust");
    define("USER_SESSION_HOLDER", "bj_user");
    define("ADMIN_SESSION_HOLDER", "bj_admin");
    define("DB_PREFIX", "bj_");
    define("HOME_DIR", "http://freelance.rr/web/bijust/");

    // template config
    define("TEMPLATE", HOME_DIR."template/");
    define("CSS_FOLDER_TEMPLATE",TEMPLATE."css/");
    define("JS_FOLDER_TEMPLATE",TEMPLATE."js/");
    // end template config

	if (Env == "online") {
        define('SERVICE', HOME_DIR.'service/');

		define('DB_HOST', 'localhost');
	    define('DB_TABLE', 'bijustne_main');
	    define('DB_USER', 'bijustne_main');
	    define('DB_PASSWORD', '&vX_2E8]=[AG');


	}else{
        define('DB_HOST', 'localhost');
	    define('DB_TABLE', 'web_bijust');
	    define('DB_USER', 'root');
	    define('DB_PASSWORD', '');

    }

	try {
	    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_TABLE, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	}
	
	catch (PDOException $e){
	    die('<br/><center><font size="15">Could not connect with database</font></center>');
	}

 ?>