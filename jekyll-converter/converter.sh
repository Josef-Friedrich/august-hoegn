#! /usr/bin/php
<?php

$server = 'localhost';
$user   = 'august_hoegn';
$pass   = 'xZXyM7fb8tnR9dG2';
$dbase  = 'august_hoegn';

$conn = mysqli_connect($server, $user, $pass);
mysqli_select_db($conn, $dbase);

if ($result = mysqli_query($conn, "SELECT * FROM kompositionen;")) {
	while ($row = mysqli_fetch_assoc($result)) {
		$filename = $row['id'] . '.html';
		$output = '';
		foreach ($row as $key => $value) {
			$output .= $key . ': ' . $value . "\n\n";
		}
		file_put_contents($filename, $output);
	}
	mysqli_free_result($result);
}

