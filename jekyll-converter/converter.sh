#! /usr/bin/php
<?php

$query = '
SELECT
	id,
	titel AS title,
	imslp
FROM kompositionen';

function query($query) {
	$server = 'localhost';
	$user   = 'august_hoegn';
	$pass   = 'xZXyM7fb8tnR9dG2';
	$dbase  = 'august_hoegn';

	$conn = mysqli_connect($server, $user, $pass);
	mysqli_select_db($conn, $dbase);

	if ($result = mysqli_query($conn, $query)) {
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
	if (!empty($value)) {
		return $key . ': ' . $value . "\n";
	}
	else {
		return '';
	}
}

function wrap($data) {
	return '---' . "\n" . $data . '---' . "\n";
}

function generate_document($row) {
	$output = '';
	foreach ($row as $key => $value) {
		$output .= generate_entry($key, $value);
	}
 	file_put_contents('../_compositions/' . $row['id'] . '.html', wrap($output));
}


$rows = query($query);

foreach ($rows as $row) {
	generate_document($row);
}



