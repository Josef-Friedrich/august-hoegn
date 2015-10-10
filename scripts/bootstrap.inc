<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include_once ('open.inc');
include_once ('classes.php');
include_once ('functions.php');
include_once ('arrays.inc');

$tm = new TitleManager;
$tm->url = $_SERVER['REQUEST_URI'];
$tm->ip = $_SERVER['REMOTE_ADDR'];

?>
