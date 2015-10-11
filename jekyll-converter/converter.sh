#! /usr/bin/php
<?php

$path = '/var/www/august-hoegn.tk/_compositions/';
$query = 'SELECT 
  id,
  titel as title,
  titeloriginal as title_original,
  imslp as imslp_project,
  wikicommons as wikicommons_file,
  opus,
  fundorttext as find_spot,
  bes_grup as instrumentation_groups,
  bes_grup_u_inst as instrumentation,
  textdichter as writer,
  liedtext as lyrics
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
		return $key . ': ' . "\"" . $value . "\"" . "\n";
	}
	else {
		return '';
	}
}

function wrap($data) {
	return '---' . "\n" . $data . '---' . "\n";
}

function generate_document($path, $row) {
	$output = '';
	foreach ($row as $key => $value) {
		
		$value = str_replace("\r\n","\n", $value);
		$value = html_entity_decode($value, ENT_COMPAT | ENT_HTML401, 'UTF-8');
		$output .= generate_entry($key, $value);
	}
	$output = iconv('ISO-8859-1', 'UTF-8', wrap($output));
 	file_put_contents($path . $row['id'] . '.html', $output);
}

$rows = query($query);

foreach ($rows as $row) {
	generate_document($path, $row);
}

