<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
  $server = 'localhost';
  $user   = 'root';
  $pass   = '';
  $dbase  = 'august-hoegn-db';
}
else {
  $server = 'localhost';
  $user   = 'august_hoegn';
  $pass   = 'xZXyM7fb8tnR9dG2';
  $dbase  = 'august_hoegn';
}

if ($conn = @mysql_connect($server, $user, $pass)) {
  mysql_select_db($dbase, $conn);
}
else {
  die('Die Verbindungsaufnahme zur Datenbank ist fehlgeschlagen');
}

?>
