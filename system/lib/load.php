<?php

//function include_all_once ($pattern) {
//    foreach (glob($pattern) as $file) { // remember the { and } are necessary!
//        include $file;
//    }
//}
#include_all_once('./models/*.php');
#include 'models/db.php';
#include 'rss_parser/FeedForAll_XMLParser.inc.php';


require 'config.php';
require 'connect_db.php';
require 'request.php';

?>