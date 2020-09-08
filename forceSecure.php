<?php 
if ( (! empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') ||
     (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ||
     (! empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ) {
  // ok, all good
} else {
    $location = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: '.$location);
    exit;
}
?>