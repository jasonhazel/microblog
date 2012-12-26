<?php
date_default_timezone_set('America/New_York');
header('Access-Control-Allow-Origin: http://mrhazel.com');

$f3=require('lib/base.php');

require('app/.config.php');
require('app/routes.php');

$f3->run();
