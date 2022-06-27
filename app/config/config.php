<?php
/** 
 * For the app route
**/

//Database parameters connection
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'forum');

//deifine it like a constant and direname remove content after last slash
define('APPROOT', dirname(dirname(__FILE__)));

//URL Root
define('URLROOT', 'http://localhost/forum');

//Site Name
define('SITENAME', 'Forum');

//App version
define('APP_VERSION', '1.0');