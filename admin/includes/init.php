<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', "C:\wamp\www\Gallery");
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', "C:\wamp\www\Gallery\admin\includes");

ob_start();
require_once "functions.php";
require_once "new_config.php";
require_once "database.php";
require_once "entity.php";
require_once "user.php";
require_once "session.php";
require_once "photo.php";
require_once "comment.php";
require_once "paginate.php";

?>