<?php //namespace wa;
if(!defined('PORTAL_INDEX_FILE')){if(headers_sent()){echo '<header><meta http-equiv="refresh" content="0;url=../"></header>';}else{header('HTTP/1.0 301 Moved Permanently'); header('Location: ../');} die("<font size=+2>Access Denied!!</font>");}
use psm\users\users;


//throw new Exception('Division by zero.');
$users = new users();
echo 'works!!!';


?>