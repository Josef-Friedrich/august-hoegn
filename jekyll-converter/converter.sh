#! /usr/bin/php
<?php

$server = 'localhost';
$user   = 'august_hoegn';
$pass   = 'xZXyM7fb8tnR9dG2';
$dbase  = 'august_hoegn';

if ($conn = @mysqli_connect($server, $user, $pass)) {
  mysqli_select_db($conn, $dbase);
}
else {
  die('Die Verbindungsaufnahme zur Datenbank ist fehlgeschlagen');
}

if ($result = mysqli_query($conn, "SELECT DATABASE()")) {
    $row = mysqli_fetch_row($result);
    printf("Default database is %s.\n", $row[0]);
    mysqli_free_result($result);
}


print('lol');
