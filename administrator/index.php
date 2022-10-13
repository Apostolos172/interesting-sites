<?php
require_once('./libraries/php/login_functions.inc.php'); // library
$url = absolute_url('site/index.php');
//print $url;
header('Location: ' . $url);
exit();
