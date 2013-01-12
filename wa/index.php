<?php namespace wa;
if(!defined('PORTAL_INDEX_FILE')){if(headers_sent()){echo '<header><meta http-equiv="refresh" content="0;url=../"></header>';}else{header('HTTP/1.0 301 Moved Permanently'); header('Location: ../');} die("<font size=+2>Access Denied!!</font>");}
// web auction plus
define('WA_VERSION', '1.2.0');


// load config.php
$config = \psm\config::loadConfig('config.php');

//throw new \Exception('Division by zero.');
$users = \psm\users::loadUsers();
echo 'works!!!';


?>