<?php

session_start();
require('assets/dbConfig.php');

define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'] . '/hackerfest/');
define('SITE_PATH', 'http://127.0.0.1/bits_and_piece2/');
define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH . 'images/posts/');

define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH . 'images/posts/');