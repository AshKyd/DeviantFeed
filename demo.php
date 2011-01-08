<?php
define('DEVIANT_FEED','feed.rss');
/*
define('DEVIANT_FEED','http://backend.deviantart.com/rss.xml?q=gallery%3Atechtoucian+sort%3Atime&type=deviation&offset=0');
*/

require_once 'DeviantFeed.php';
require_once 'DeviantFile.php';
require_once 'DeviantItem.php';
require_once 'DeviantRights.php';

$foo = new DeviantFeed();
$foo->loadFeed(DEVIANT_FEED);
print_r($foo);
