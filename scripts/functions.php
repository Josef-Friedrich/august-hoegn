<?php

/************************************************************************************************************************************
 *
 *		K O M P O S I T I O N E N
 *
 ************************************************************************************************************************************/

function kompositionen_titel ($row)
{
  return werke_titel ($row);
}

/************************************************************************************************************************************/

function kompositionen_ssort ($echo_ja = "0")
{
  $counter = 1;
  $result = mysql_query ("SELECT * FROM gattungen ORDER BY sortierung");
  while ($row = mysql_fetch_array ($result))
  {
    $result2 = mysql_query ("SELECT * FROM kompositionen WHERE gattungen_id = '$row[id]' ORDER BY gatt_nr, opus");
    while ($row2 = mysql_fetch_array ($result2))
    {
      mysql_query ("UPDATE kompositionen SET ssort = '$counter' WHERE id = '$row2[id]'");
      $counter++;
       
      if ($echo_ja == 1) echo "$counter $row2[titel]<br>";
    }
  }
}


function kompositionen_imslp ($row) {
  if(!empty($row['imslp'])){
    print '<h2>Die Komposition bei 
    <a href="http://imslp.org/wiki/Category:H%C3%B6gn,_August">IMSLP</a></h2>
    <a href="' 
    . $row['imslp'] . 
    '"><img src="images/imslp.png"> IMSLP: ' 
    . $row['titel'] . 
     '</a><br>';
  }
}

function kompositionen_wikicommons ($row) {
  if(!empty($row['wikicommons'])){
    // Workaround wegen Probleme mit Zeichensatz
    print '<h2>Die Komposition bei 
    <a href="http://commons.wikimedia.org/wiki/Category:August_H%C3%B6gn">Wikicommons</a></h2>
    <a href="http://commons.wikimedia.org/wiki/File:'
     . $row['wikicommons'] .
     '"><img src="images/wikicommons.png"> Wikicommons: '
      . $row['titel'] . 
       '</a>';
  }
}

/************************************************************************************************************************************/


function kompositionen_besetzung ($row)
{
  global $array_besetzung;
  foreach ($array_besetzung as $key => $value)
  {
    if ($row[$key] == 1) $besetzung .= $value .",&nbsp;";
  }
  $pos = strrpos ($besetzung, ",");
  $besetzung = substr ($besetzung, 0, $pos);
  return $besetzung;
}

/************************************************************************************************************************************/

function kompositionen_bes_grup ($row)
{
  return bes_grup ($row);
}

/************************************************************************************************************************************/

function kompositionen_bes_grup_u_inst ($row)
{
  return bes_grup_u_inst ($row);
}

/************************************************************************************************************************************/

function kompositionen_bes_grup2 ($row)
{
  return bes_grup ($row, 2);
}

/************************************************************************************************************************************/

function kompositionen_bes_grup_u_inst2 ($row)
{
  return bes_grup_u_inst ($row, 2);
}

/************************************************************************************************************************************/

function kompositionen_fundorttext ($row)
{
  global $array_kom_fundort;
  $x = $row[kom_fundort];
  $output = "$array_kom_fundort[$x]";

  return $output;
}


/************************************************************************************************************************************/


function kompositionen_status ($row, $gif = TRUE)
{

  /* fragmentarisch */

  if ($row[status] == "1") {
    ($gif) ? $output = "<img src=\"images/fragmentarisch.png\">" : $output = "fragmentarisch erhalten";
  }

  /* verloren */

  if ($row[status] == "2") {
    ($gif) ? $output = "<img src=\"images/x.png\">" : $output = "verloren";
  }

  /* editiert */

  $path = "files/kompositionen/" . $row[id];
  $fd = @opendir ($path);
  unset($array);
  while ($filename = @readdir ($fd)) {
    if (strpos($filename, "pdf")) {
      $array[] = $filename;
    }
  }
  @closedir ($fd);

  if (isset ($array)) {
    ($gif) ? $output = "<img src=\"images/editiert.png\">" : $output = "editiert";
  }

  if (!$gif && !empty($output)) $output = "<b>Status:</b>&nbsp;" . $output;
  return $output;
}

/************************************************************************************************************************************/

function kompositionen_jpg ($row)
{
  return Jpg ($row, "kompositionen");
}

/************************************************************************************************************************************/

function kompositionen_pdf ($row)
{
  return Pdf ($row, "kompositionen");
}

/*************************************************************************************************************************************/

function kompositionen_gif ($row)
{
  return Gif ($row, "kompositionen");
}

/*************************************************************************************************************************************/

function kompositionen_file ($row)
{
  global $array_noten;
  $path = "files/kompositionen/" . $row[id];
  $fd = @opendir ($path);
  unset($array);
  while ($filename = @readdir ($fd))
  {
    if (strpos($filename, "pdf"))
    {
      $filename_short = substr ($filename, 0, 1);
      $array[] = array ($filename_short,  "$array_noten[$filename_short]");
    }
  }
  @closedir ($fd);
  if (is_array ($array))$output = serialize ($array);

  return $output;
}

/************************************************************************************************************************************
 *
 *		A R R A N G E M E N T S
 *
 ************************************************************************************************************************************/

function arrangements_titel ($row)
{
  $result = mysql_query ("SELECT * FROM komponisten WHERE id ='$row[komponisten_id]'");
  $komponisten_row = mysql_fetch_array ($result);
  if (empty($komponisten_row[nachname]) AND empty($komponisten_row[vorname]))
  {
    $output .= "Anonymus";
  }
  else
  {
    $output .= "$komponisten_row[nachname]";
    if (!empty ($komponisten_row[vorname]))$output .= ", " . substr ($komponisten_row[vorname], 0, 1) . ".";
  }
  $output .= " - " . werke_titel ($row);

  return $output;
}

/************************************************************************************************************************************/

function arrangements_titelwerk ($row)
{
  $output = werke_titel ($row);

  return $output;
}

/************************************************************************************************************************************/

function arrangements_komponisten_idtext ($row)
{
  $result = mysql_query ("SELECT * FROM komponisten WHERE id ='$row[komponisten_id]'");
  $komponisten_row = mysql_fetch_array ($result);

  $result = mysql_query ("SELECT * FROM komponisten WHERE id ='$row[komponisten_id]'");
  $row = mysql_fetch_array ($result);

  return komponisten_titel_kurz ($row);
}

/************************************************************************************************************************************/

function arrangements_bes_grup ($row)
{
  return bes_grup ($row);
}

/************************************************************************************************************************************/

function arrangements_bes_grup_u_inst ($row)
{
  return bes_grup_u_inst ($row);
}

/************************************************************************************************************************************/

function arrangements_bes_grup2 ($row)
{
  return bes_grup ($row, 2);
}

/************************************************************************************************************************************/

function arrangements_bes_grup_u_inst2 ($row)
{
  return bes_grup_u_inst ($row, 2);
}
/************************************************************************************************************************************/

function arrangements_jpg ($row)
{
  return Jpg ($row, "arrangements");
}

/************************************************************************************************************************************/

function arrangements_pdf ($row)
{
  return Pdf ($row, "arrangements");
}

/*************************************************************************************************************************************/

function arrangements_gif ($row)
{
  return Gif ($row, "arrangements");
}

/************************************************************************************************************************************
 *
 *		R E Z I P I E R T E   K O M P O S I T I O N E N
 *
 ************************************************************************************************************************************/

function rezeptionen_titel ($row)
{
  $result = mysql_query ("SELECT * FROM komponisten WHERE id ='$row[komponisten_id]'");
  $komponisten_row = mysql_fetch_array ($result);
  $output .= komponisten_titel_kurz ($komponisten_row) . " - " . werke_titel ($row);

  return $output;
}

/************************************************************************************************************************************/

function rezeptionen_titelwerk ($row)
{
  return werke_titel ($row);
}

/************************************************************************************************************************************/

function rezeptionen_komponisten_idtext ($row)
{
  $result = mysql_query ("SELECT * FROM komponisten WHERE id ='$row[komponisten_id]'");
  $row = mysql_fetch_array ($result);

  return komponisten_titel_kurz ($row);
}

/************************************************************************************************************************************/


function rezeptionen_bes_grup ($row)
{
  return bes_grup ($row);
}

/************************************************************************************************************************************/

function rezeptionen_bes_grup_u_inst ($row)
{
  return bes_grup_u_inst ($row);
}

/************************************************************************************************************************************/

function rezeptionen_hoegnspuren ($row)
{
  if (!empty ($row[einband])) $output .= "handschriftlich angefertiger Einband,&nbsp;\n";
  if (!empty ($row[stempel])) $output .= "Stempel August H&ouml;gns,&nbsp;\n";
  if (!empty ($row[eintragungen])) $output .= "Eintragungen im Notentext,&nbsp;\n";
  if (!empty ($row[abschriften])) $output .= "Abschriften,&nbsp;\n";

  return $output;
}

/************************************************************************************************************************************
 *
 *		K O M P O N I S T E N
 *
 ************************************************************************************************************************************/

function komponisten_titel ($row)
{
  $output .= "$row[nachname]";
  if (!empty ($row[vorname])) $output .= ", $row[vorname]";
  if (!empty ($row[geburtsdatum]) AND !empty ($row[sterbedatum]) AND $row[geburtsdatum] !== "0000-00-00") $output .= " (".datum ($row[geburtsdatum]) . " - " . datum ($row[sterbedatum]) . ")";

  return $output;
}

/************************************************************************************************************************************/

function komponisten_titel_kurz ($row)
{
  $output .= "$row[nachname]";
  $namensteile = explode (" ", $row[vorname]);
  foreach ($namensteile as $einzelname)
  {
    $zusammengesetzte_initialen .= substr ($einzelname, 0, 1) . ". ";
  }
  if (!empty ($row[vorname])) $output .= ", $zusammengesetzte_initialen";

  return $output;
}

/************************************************************************************************************************************
 *
 *		D O K U M E N T E
 *
 ************************************************************************************************************************************/

function dokumente_titel ($row)
{
  global $array_dok_art;
  switch ($row[dok_art])
  {

    case 1:

      $output  = "$array_dok_art[1] von ";
      /***********/
      $output .= "$row[feld1] an ";
      /***********/
      $output .= "$row[feld2], ";
      /***********/
      $output .= datum ($row);
      break;

    case 2:

      $output  = "Zeitungsartikel aus $row[feld1], ";
      /***********/
      $output .= datum ($row);
      break;

    case 3:

      $output = "$row[feld1]";
      break;

  }

  return $output;
}

/************************************************************************************************************************************/

function dokumente_thematiktext ($row)
{
  global $array_thematik;
  $x = $row[thematik];
  $output = "$array_thematik[$x]";

  return $output;
}

/************************************************************************************************************************************/

function dokumente_dok_fundorttext ($row)
{
  global $array_dok_fundort;
  $x = $row[dok_fundort];
  $output = "$array_dok_fundort[$x]";

  return $output;
}


/************************************************************************************************************************************/

function dokumente_gif($row) {
  $path = "files/dokumente";
  $fd = opendir ($path);
  while ($filename = readdir ($fd)) {
    if (preg_match ("#^" . $row['id'] . "(_.)*_klein\.gif#", $filename)) {
      $filename_short = substr ($filename, 0, strrpos ($filename, "_"));
      $output .= '<a href="files/dokumente/' . $filename_short . '_gross.gif"><img src="files/dokumente/' . $filename . '"></a> ';
    }
  }
  closedir ($fd);

  return '<p>' . $output . '</p>';
}

/************************************************************************************************************************************
 *
 *		K O R R E S P O N D E N Z
 *
 ************************************************************************************************************************************/

function korrespondenz_titel ($row)
{
  global $array_kor_art;

  $x = $row[kor_art];
  $output  = "$array_kor_art[$x] von ";
  $output .= "$row[sender] an ";
  $output .= "$row[empfaenger], ";
  $output .= datum($row);

  return $output;
}

/************************************************************************************************************************************
 *
 *		I N T E R V I E W S
 *
 ************************************************************************************************************************************/

function interviews_titel ($row)
{
  $output = "Interview mit $row[interviewter], " . datum ($row);

  return $output;
}

/************************************************************************************************************************************/

function interviews_datumtext ($row)
{
  $output = datum($row, 0);

  return $output;
}

/************************************************************************************************************************************/

function interviews_todestagtext ($row)
{

  $output = datum($row[todestag], 2);

  return $output;
}


/************************************************************************************************************************************/

function interviews_jpg ($row)
{
  $output = "<p>\n";
  $path = "images/projekt-interviews/$row[id]";
  $fd = opendir ($path);
  while ($filename = readdir ($fd))
  {
    if (strpos($filename, "_klein.jpg"))
    {
      $pos = strrpos ($filename, "_");
      $filename_short = substr ($filename, 0, $pos);
      $output .= "<a href=\"$path/$filename_short" . "_gross.jpg\"><img src=\"$path/$filename\" border=\"0\" align=\"absmiddle\"></a>&nbsp;&nbsp;\n";
    }
  }
  closedir ($fd);

  $output .= "</p>\n";

  return $output;
}

/************************************************************************************************************************************/

function interviews_audio($row) {
  return '<audio src="' . $row['audio'] . '" controls="controls">
Ihr Browser unterstützt das Audioelement nicht.
</audio>';
}


/************************************************************************************************************************************
 *
 *		W I E D E R A U F F U E H R U N G E N
 *
 ************************************************************************************************************************************/

function wiederauffuehrungen_titel ($row)
{
  $result = mysql_query ("SELECT titel FROM kompositionen WHERE id ='$row[kompositionen_id]'");
  $kompositionen_row = mysql_fetch_array ($result);

  $output = "$kompositionen_row[titel] am " . datum($row);

  return $output;
}

function wiederauffuehrungen_kompositionen_idtext ($row)
{
  $result = mysql_query ("SELECT titel FROM kompositionen WHERE id ='$row[kompositionen_id]'");
  $kompositionen_row = mysql_fetch_array ($result);

  $output = "$kompositionen_row[titel]";

  return $output;
}

function wiederauffuehrungen_datumtext ($row)
{
  $output = datum($row, 0);

  return $output;
}


/************************************************************************************************************************************
 *
 *		G Ä S T E B U C H
 *
 ************************************************************************************************************************************/

function gaestebuch_titel ($row)
{
  $output .= "Beitrag ";
  if (!empty ($row[name])) $output .= "von $row[name], ";
  if (!empty ($row[ort]))	$output .= "$row[ort], ";
  $output .= datum($row);

  return $output;
}

/************************************************************************************************************************************/

function gaestebuch_datumtext ($row)
{
  return datum($row);
}
/************************************************************************************************************************************
 *
 *		D A N K
 *
 ************************************************************************************************************************************/

function dank_titel ($row)
{
  $output = "$row[nachname], $row[vorname]";

  return $output;
}

/************************************************************************************************************************************
 *
 *		S U C H M A S C H I N E N
 *
 ************************************************************************************************************************************/

function suchmaschinen_titel ($row)
{
  $output = "$row[pattern]";

  return $output;
}

/************************************************************************************************************************************
 *
 *		W I K I W E R K E
 *
 ************************************************************************************************************************************/

function wikiwerke_titel ($row)
{
  $output .= "*''$row[titel_werk]";
  if (!empty ($row[untertitel])) $output .= " - $row[untertitel]";
  $output .= ".'' ";
  if (!empty ($row[enthalten])) $output .= "In: $row[enthalten], ";
  if (!empty ($row[auflage])) $output .= "$row[auflage]. Auflage, ";
  if (!empty ($row[verlag])) $output .= "$row[verlag], ";
  if (!empty ($row[ort])) $output .= "$row[ort], ";
  if (!empty ($row[jahr])) $output .= "$row[jahr], ";
  if (!empty ($row[seiten]))
  {
    if (!preg_match ("/-/", $row[seiten]))
    {
      $output .= "$row[seiten] Seiten, ";
    }
    else
    {
      $output .= "Seite $row[seiten], ";
    }
  }

  if (!empty ($row[serie])) $output .= "($row[serie]), ";
  if (!empty ($row[isbn])) $output .= "($row[isbn]), ";

  $output = substr ($output, 0, - 2);

  return $output;
}

/************************************************************************************************************************************/

function wikiwerke_gattung ($row)
{
  if (preg_match ("/(lieder)/i", $row[urtext])) $gattung = "Lieder";
  if (preg_match ("/(klavier|piano)/i", $row[urtext])) $gattung = "Klaviermusik";
  if (preg_match ("/(orgel|organum)/i", $row[urtext])) $gattung = "Orgelmusik";
  if (preg_match ("/(gesang|sing|sopran|alt|tenor|bass)/i", $row[urtext])) $gattung = "Vokalmusik";
  if (preg_match ("/(messe|missa)/i", $row[urtext])) $gattung = "Messe";
  if (preg_match ("/(requiem|defunctis)/i", $row[urtext])) $gattung = "Requiem";

  return $gattung;
}

/************************************************************************************************************************************/

function wikiwerke_opus ($row)
{
  preg_match ("/(op\.?|opus)\s?([0-9]*)/i", $row[urtext], $matches);

  return $matches[2];
}

/************************************************************************************************************************************
 *
 *		A L L E   T A B E L L E N
 *
 ************************************************************************************************************************************/
/************************************************************************************************************************************
 *
 *		W E R K E T I T E L
 *
 ************************************************************************************************************************************/

function werke_titel ($row)
{
  global $array_tonart;
  $result = mysql_query ("SELECT * FROM gattungen WHERE id ='$row[gattungen_id]'");
  $gattungen_row = mysql_fetch_array ($result);


  if (!empty ($row[titel_def]))
  {
    $output  .= "$row[titel_def] ";
  }
  else
  {
    $output  .= "$gattungen_row[titel_fuer_titel] ";
  }
  if (!empty ($row[gatt_nr])) $output .= "Nr. $row[gatt_nr] ";
  if (!empty ($row[titelliedtextja])) $output .=  "&quot;" . Liedtext ($row[liedtext]) . "&quot; ";
  if (!empty ($row[tonart]))
  {
    $x = $row[tonart];
    $output .= "$array_tonart[$x] ";
  }
  if (!empty ($row[opus])) $output .= "op. $row[opus] ";
  if (!empty ($row[opuszusatz])) $output .= "$row[opuszusatz] ";
  if (!empty ($row[opusnummer])) $output .= "Nr. $row[opusnummer]";

  return $output;
}

/************************************************************************************************************************************
 *
 *		S O R T I E R U N G
 *
 ************************************************************************************************************************************/

function sortierung ($table, $echo_ja = "0")
{
  global $array_tabellen_sortierung;

  $output .= "<h2>$table geordnet nach $array_tabellen_sortierung[$table]</h2>\n";

  $query_ausdruck = "SELECT * FROM $table";
  if (isset($array_tabellen_sortierung[$table]))
  {
    $query_ausdruck .= " ORDER BY {$array_tabellen_sortierung[$table]}";
  }


  $result = mysql_query ($query_ausdruck);
  $number = mysql_num_rows ($result);
  for ($i = 0; $i < $number; $i++)
  {
    if ($i > 0)
    {
      mysql_data_seek ($result, $i - 1);
      $previous_row = mysql_fetch_array($result);
    }

    mysql_data_seek ($result, $i);
    $row = mysql_fetch_array($result);

    if ($i < $number)
    {
      @mysql_data_seek ($result, $i + 1);
      $next_row = mysql_fetch_array($result);
    }

    mysql_query ("UPDATE $table SET previous = '$previous_row[id]', next = '$next_row[id]' WHERE id = '$row[id]'");
    $output .= "previous = '$previous_row[id]', id = '$row[id]' next = '$next_row[id]' " . mysql_error () . "<br>\n";
  }

  if ($echo_ja == 1) echo $output;
}

/************************************************************************************************************************************
 *
 *		B E S E T Z U N G
 *
 ************************************************************************************************************************************/

function bes_grup($row, $fassung = 1)
{
  global $array_besetzung;

  switch ($fassung)
  {
    case 1:
      $array = unserialize ($row[bes_ser]);
      break;

    case 2:
      $array = unserialize ($row[bes_ser2]);
      break;

    case 3:
      $array = $row;
      break;
  }

  if (!empty ($array))
  {
    foreach ($array as $key1 => $value1)
    {
      $output .= "$array_besetzung[$key1], ";
    }
    $output = substr ($output, 0, -2);
  }

  return $output;
}

/************************************************************************************************************************************/

function bes_grup_u_inst ($row, $fassung = 1)
{
  global $array_besetzung;

  switch ($fassung)
  {
    case 1:
      $array = unserialize ($row[bes_ser]);
      break;

    case 2:
      $array = unserialize ($row[bes_ser2]);
      break;

    case 3:
      $array = $row;
      break;
  }

  if (!empty ($array))
  {
    foreach ($array as $key1 => $value1)
    {
      unset ($output_instrumente);
      $output .= "$array_besetzung[$key1] ";
      foreach ($value1 as $key2 => $value2)
      {

        if ($key1 !== $key2)
        {
          $output_instrumente .= "$array_besetzung[$key2], ";
        }
      }
      $output_instrumente = substr ($output_instrumente, 0, -2);
      if (!empty ($output_instrumente))
      {
        $output .= "($output_instrumente); ";
      }
    }
  }

  $output = substr ($output, 0, -2);

  return $output;
}

/************************************************************************************************************************************
 *
 *		L I E D T E X T
 *
 ************************************************************************************************************************************/

function Liedtext ($liedtext)
{
  $pos = strpos ($liedtext, "<br>");
  if (strpos ($liedtext, "<br>"))
  {
    $output = substr ($liedtext, 0, $pos);
    $satzzeichentest = substr ($output, -1);
    if ($satzzeichentest == "," OR $satzzeichentest == ".")
    {
      $output = substr ($liedtext, 0, $pos - 1);
    }
  }
  else
  {
    $output = $liedtext;
  }

  return $output;
}

/************************************************************************************************************************************
 *
 *		D A T E I F O R M A T E
 *
 ************************************************************************************************************************************/

function Jpg ($row, $table)
{
  $output = "<p>";
  if (empty ($row[bildverweis]))
  {
    $bildverzeichnis = $row[id];
  }
  else
  {
    $bildverzeichnis = $row[bildverweis];
  }
  $path = "files/$table/" . $bildverzeichnis;
  $fd = @opendir ("$path");
  while ($filename = @readdir ($fd))
  {
    if (strpos($filename, "_klein.jpg"))
    {
      $pos = strpos ($filename, "_");
      $filename_short = substr ($filename, 0, $pos);
      $output .= "<a href=\"$path/$filename_short" . "_gross.jpg\"><img src=\"$path/$filename\" border=\"0\" >&nbsp;&nbsp;</a>";
    }
  }
  @closedir ($fd);
  $output .= "</p>\n";

  return $output;
}

/************************************************************************************************************************************/

function Pdf ($row, $table, $download = FALSE)
{
  global $array_noten;
  $path = "files/$table/" . $row[id];
  $row[bes_grup_u_inst] = str_replace("; ", "<br>", $row[bes_grup_u_inst]);
  $fd = @opendir ($path);
  unset($array);

  ($download == TRUE) ? $download_title = $row[titel] : $download_title = "kostenloses Auff&uuml;hrungsmaterial";

  while ($filename = @readdir ($fd))
  {
    if (strpos($filename, "pdf"))
    {
      $prefix = "<h2>" . $download_title . "</h2>\n<table class=\"pdf-table\">\n";
      $filename_short = substr ($filename, 0, 1);
       
      $path = "files/kompositionen/" . $row[id] . "/$filename";
       
      (empty ($array_noten[$filename_short])) ? $pdf_file_name = "Noten" : $pdf_file_name = $array_noten[$filename_short];
      $output .= "<tr>\n\t<td><a href=\"$path\"><img src=\"images/pdf_gross.png\"></a></td>\n";
      $output .= "\t<td><a href=\"$path\">" . $pdf_file_name . "</a></td>\n</tr>";
      $suffix = "\n</table>\n";
    }
  }
  @closedir ($fd);

  $output = $prefix . $output . $suffix;

  return $output;
}

/*************************************************************************************************************************************/

function Gif ($row, $table, $column = 4)
{
  global $array_noten;

  $path = "files/$table/" . $row[id];
 	$fd = @opendir ($path);
 	while ($filename = @readdir ($fd))
 	{
 	  if (strpos($filename, "gif"))
 	  {
 	    $array[] = $filename;
 	  }
 	}
 	if (isset ($array))
 	{
 	  $output .= "<h2>Handschiften-Scanns</h2>\n";
 	}

 	foreach ($array_noten as $key => $value)
 	{
 	  unset ($array);
 	  $fd = @opendir ($path);
 	  while ($filename = @readdir ($fd))
 	  {
 	    if (strpos ($filename, "klein.gif") && preg_match ("#^" . $key . "_#", $filename))
 	    {
 	      $array[] = $filename;
 	    }
 	  }
 	  if (isset ($array))
 	  {
 	    $number = count ($array);
 	    $output .= "<h3>$value</h3>\n";
 	    $output .= "<table class=\"scan-table\">\n<tr>\n";
 	    for ($i = 1; $i <= $number; $i++)
 	    {
 	      $sub = $i - 1;
 	      $pos = strrpos ($array[$sub], "_");
 	      $filename = substr ($array[$sub], 0, $pos);
 	      $output .= "\t<td><a href=\"files/$table/$row[id]/$filename" . "_gross.gif\"><img src=\"files/$table/$row[id]/$array[$sub]\"></a></td>\n";
 	      $int = $i / $column;
 	      if (is_int($int))
 	      {
 	        $output .= "</tr>\n<tr>\n";
 	      }
 	    }
 	    $output .= "</tr>\n</table>\n";
 	  }
 	}
 	@closedir ($fd);

 	return $output;
}

/*************************************************************************************************************************************/

function datum ($row, $stellen = "1")
{
  if (is_array ($row))
  {
    $jahr = strtok ($row['datum'], "-");
  }
  else
  {
    $jahr = strtok ($row, "-");
  }
  $monat = strtok ("-");
  $tag = strtok ("-");

  $array_monat = array
   
  (
				"01" => "Jan.",
				"02" => "Feb.",
				"03" => "Mrz.",
				"04" => "Apr.",
				"05" => "Mai.",
				"06" => "Jun.",
				"07" => "Jul.",
				"08" => "Aug.",
				"09" => "Sep.",
				"10" => "Okt.",
				"11" => "Nov.",
				"12" => "Dez.",
  );

  if ($row['datum'] == "0000-00-00")
  {
    $neuesdatum = "o. D.";
  }
  elseif ($tag == "00")
  {
    $neuesdatum = $array_monat[$monat] ;
    if ($monat !== "00") $neuesdatum .= " ";
    $neuesdatum .= $jahr;
  }
  else
  {
    if ($stellen == "0")
    {
      $neuesdatum = sprintf ("%02d.%02d.%04d", $tag, $monat, $jahr);
    }
    else
    {
      $neuesdatum = sprintf ("%d.%d.%d", $tag, $monat, $jahr);
    }
  }

  return $neuesdatum;
}

/*************************************************************************************************************************************/

function AbfrageArrays($abfrage_tabelle, $sortierung, $abgefragete_tabelle, $abgefragte_spalte, $titel_umschalter = 0)
{

  $result = mysql_query ("SELECT * FROM $abfrage_tabelle ORDER BY $sortierung");
  while ($row = mysql_fetch_array ($result))
  {
    $abgefragte_result = mysql_query ("SELECT * FROM $abgefragete_tabelle WHERE $abgefragte_spalte = '$row[id]'");
    $abgefragte_row = mysql_fetch_array ($abgefragte_result);
    if (!empty ($abgefragte_row))
    {
      if ($titel_umschalter == 1)
      {
        $array_abteilung[$row[id]] = $row[titel_kurz];
      }
      else
      {
        $array_abteilung[$row[id]] = $row[titel];
      }
    }
  }

  return $array_abteilung;
}


?>