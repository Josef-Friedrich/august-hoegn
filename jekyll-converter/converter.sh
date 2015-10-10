#! /usr/bin/php
<?php

function query($query) {
	$server = 'localhost';
	$user   = 'august_hoegn';
	$pass   = 'xZXyM7fb8tnR9dG2';
	$dbase  = 'august_hoegn';

	$conn = mysqli_connect($server, $user, $pass);
	mysqli_select_db($conn, $dbase);

	if ($result = mysqli_query($conn, "SELECT * FROM kompositionen;")) {
		$rows = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}
	else {
		return false;
	}
}

function generate_entry($key, $value) {
	return $key . ': ' . $value . "\n";
}

function wrap($data) {
	return '---' . "\n" . $data . '---' . "\n";
}

function generate_document($row) {
	$output = '';
	foreach ($row as $key => $value) {
		$output .= generate_entry($key, $value);
	}
 	file_put_contents($row['id'] . '.html', wrap($output));
}


$rows = query("SELECT * FROM kompositionen;");

foreach ($rows as $row) {
	generate_document($row);
}



