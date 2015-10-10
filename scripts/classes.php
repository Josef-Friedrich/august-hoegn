<?php

class Tabelle
{

  var $table;
  var $Sortierung;
  var $path;
  var $SortierArray;
  var $SortierArraySpalte;
  var $SortierQuery;
  var $columnn;

  function DatasetQuantity($column = "_", $wert = "_") {
    $queryausdruck = "SELECT COUNT(id) FROM $this->Tabelle";
    if (($column !== "_") AND ($wert !== "_"))$queryausdruck .= " WHERE $column = '$wert'";
    $result  =  mysql_query($queryausdruck);
    $row  =  mysql_fetch_row($result);
    $output = "<strong>$row[0]</strong>";

    return $output;
  }

  /************************************************************************************************************************************/


  function ArrayCounter() {
    return count($this->Spalten);
  }

  /************************************************************************************************************************************/

  function TdTags($code) {
    return "\t\t<td>" . $code . "</td>\n";
  }

  /************************************************************************************************************************************/

  function ThTags($code) {
    return "\t\t<th>" . $code . "</th>\n";
  }

  /************************************************************************************************************************************/

  function TdColspanTags($code) {
    return "\t\t<th colspan=\"" . $this->ArrayCounter () . "\"><h2>" . $code . "</h2></th>\n";
  }

  /************************************************************************************************************************************/

  function TrTags($code) {
    return "\t<tr>\n" . $code. "\t</tr>\n";
  }

  /************************************************************************************************************************************/

  function TableTags($code) {
    return "<table class=\"overview-table\">\n" . $code . "</table>\n";
  }

  /************************************************************************************************************************************/

  function Link($titel, $id) {
    return "<a href=\"$this->path?id=$id\">" . $titel . "<a/>";
  }

  /************************************************************************************************************************************/

  function ColumnCaption() {
    foreach ($this->Spalten as $value) {
      $value = "<p>$value</p>";
      $output .= $this->ThTags ($value);
    }
    $output = $this->TrTags ($output);

    return $output;
  }

  /************************************************************************************************************************************/

  function QueryString($SortierArrayKey = 0) {
    $QueryString = "SELECT * FROM $this->Tabelle ";
    if (isset ($this->SortierArraySpalte))
    {
      if (isset ($this->SortierQuery)) {
        $QueryString .= $this->SortierQuery[$SortierArrayKey];
      }
      else {
        $QueryString .= "WHERE $this->SortierArraySpalte = '$SortierArrayKey'";
      }
    }
    if (isset($this->Sortierung)) {
      $QueryString .= "ORDER BY $this->Sortierung ASC";
    }
    return $QueryString;
  }

  /************************************************************************************************************************************/

  function TableRows($SortierArrayKey = 0) {
    $result  =  mysql_query ($this->QueryString ($SortierArrayKey));
    $output = '';
    $TdReihe = '';
    while  ($row  =  mysql_fetch_array($result)) {
      unset ($TdReihe);
      foreach ($this->Spalten as $column => $value) {
        if ($column == "titel" OR $column == "titelwerk") {
          $columnn_content = $this->Link ($row[$column], $row['id']);
        }
        else {
          // vorangestellte Raute $ kennzeichnet eine Funktion
          $pos = strpos($column, '$');
          if ($pos !== FALSE) {
            eval($column);
          } else {
            if (!empty($row[$column])) {
              $columnn_content = $row[$column];
            }
            else {
              $columnn_content = "";
            }
          }
        }
        $TdReihe .= $this->TdTags ($columnn_content);
      }
      $output .= $this->TrTags ($TdReihe);
    }
    return $output;
  }

  /************************************************************************************************************************************/

  function SortArrayRows() {
    foreach ($this->SortierArray as $key => $value) {
      $output .= $this->TrTags ($this->TdColspanTags ($value));
      $output .= $this->TableRows ($key);
    }

    return $output;
  }

  /************************************************************************************************************************************/

  function TableOutput() {
    $output = $this->ColumnCaption ();
    if (!isset($this->SortierArray)) {
      $output .= $this->TableRows ();
    }
    else {
      $output .= $this->SortArrayRows ();
    }
    $output = $this->TableTags ($output);

    return $output;
  }

  /************************************************************************************************************************************/

}

class TitleManager
{
  var $url ;
  var $ip;
  var $row = 0;
  var $path = "";

  /************************************************************************************************************************************/

  function FilenameExtractor($array_loesch_abzug = 0) {
    // z. B. "/leben/hoegn_portrait.php"
    preg_match ('#/([^/]*)\.php#', $this->url, $filename);

    return $filename[1];
  }

  /************************************************************************************************************************************/

  function HtmlTitle($op = 'title', $url = '') {
    global $headline;

    (empty($url)) ? $filename = $this->FilenameExtractor() : $filename = $url;

    foreach ($headline as $key => $value) {
      if (in_array($filename, $value)) $right_key = $key;
    }
    if(isset($_GET['id']) && strpos($filename, "einzeln")) {
      preg_match ("#-([a-z]*)-einzeln#", $filename, $database);
      $row  = mysql_fetch_array ( mysql_query("SELECT titel FROM " . $database[1] . " WHERE id=" . $_GET['id']));
      $output = $row['titel'];
    } else {
      $output = $headline[$right_key][2];
    }

    if ($op == 'title') print "A. H&ouml;gn - " . $output;
    if ($op == 'headline') print "\t\t\t<h1>" . $output . "</h1>\n";
    if ($op == 'link') { return $output; }
  }

  /************************************************************************************************************************************/

  function RubricHeadline($text) {
    echo  "<h2>$text</h2>\n";
  }

  /************************************************************************************************************************************/

  function RubricLink ($filename, $bildname = "0") {
    global $headline;

    $link_text = $this->HtmlTitle('link', $filename);
    $output = '<table><tr valign="top">';
   	$output .= '<td width="105"><a href="' . $filename . '.php"><img src="images/' . $filename . '/index.jpg"></a></td>';
    $output .= '<td><a href="' . $filename . '.php">' . $link_text;
    $output .= '</a></td>';
    $output .= '</tr></table>';
     
    echo $output;
  }

}

class IndexManager {

  function ArrayFill() {
    global $headline;
    global $array_tabellen_sortierung;

    foreach ($headline as $array) {
      list ($file_name, $format, $text) = $array;
      preg_match ("#-([a-z]*)-einzeln#", $file_name, $database);

      if (strpos($file_name, "einzeln")) {
        $format = $format + 1;
        $result  =  mysql_query("SELECT * FROM " . $database[1] . " ORDER BY " . $array_tabellen_sortierung[$database[1]]);
        while ($row = mysql_fetch_array ($result)) {
          $output = "\$headline_array[] = array(\"$file_name\", \"$format\", \"$row[titel]\", \"$row[id]\");\n";
          eval ($output);
        }
      }
      else  {
        $output = "\$headline_array[] = array(\"$file_name\", \"$format\", \"$text\", \"\");\n";
        eval ($output);
      }
    }
    return $headline_array;
  }
   
  /************************************************************************************************************************************/

  function Link($file_name, $format, $text, $id) {
    global $array_tabellen_sortierung;

    $output = "<a href=\"";

    if (!empty ($file_name)) $output .= $file_name;
    (is_numeric($id)) ? $output .= ".php?id=$id" : $output .= ".php";

    $output .= "\" class=\"shift" . $format . "\">" . $text . "</a><br>";

    return $output;
  }

  /************************************************************************************************************************************/

  function IndexOfContents() {
    $array = $this->ArrayFill();
    $output = '';
    foreach ($array as $array) {
      list ($file_name, $format, $text, $id) = $array;
      $output .= $this->Link ($file_name, $format, $text, $id);
    }
    return $output;
  }

  /************************************************************************************************************************************/
}

?>