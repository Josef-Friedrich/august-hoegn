<?php
include_once ('scripts/bootstrap.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de"><!-- InstanceBegin template="/Templates/hauptvorlage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>
<?php
$tm->HtmlTitle();		
?>
</title>
<!-- InstanceEndEditable -->
<!-- add your meta tags here -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link  href="//fonts.googleapis.com/css?family=Tangerine:bold" rel="stylesheet" type="text/css">
<link href="css/my_layout.css" rel="stylesheet" type="text/css">
<!--[if lte IE 7]>
<link href="../css/patches/patch_my_layout.css" rel="stylesheet" type="text/css">
<![endif]-->
<script src="js/lib/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/lib/jquery.backgroundPosition.js" type="text/javascript"></script>
<script src="js/metaphor.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>
<body>
<a name="top" id="top"></a>
<div class="page_margins">
  <div class="page">
    <div id="header">
      <div class="subcolumns">
        <div id="header_col1"><a href="index.php"></a></div>
        <div id="header_col2"><a href="index.php">August H&ouml;gn (1878 - 1961)<br>
          Leben und Werk</a></div>
        <div id="header_col3"> <!-- InstanceBeginEditable name="metaphernfenster" -->
          <div id="metaphor_kompositionen" class="metaphor">
            <div class="image"></div>
            <div class="gradient"></div>
            <div class="text">Kompositionen</div>
            <div class="corner_patch"></div>
          </div>
          <!-- InstanceEndEditable --> </div>
      </div>
    </div>
    <div id="main">
      <div id="col1">
        <div id="col1_content" class="clearfix">
          <div id="col1r1">
            <div id="corner_patch2"></div>
            <ul>
              <li><a href="inhalt.php">Inhalt</a></li>
            </ul>
          </div>
          <div id="col1r2">
            <div id="corner_patch3"></div>
            <ul>
              <li><a href="leben.php">Leben</a>
                <ul>
                  <li><a href="leben-biographie.php">Biographie</a></li>
                  <li><a href="leben-hoegn-portrait.php">Fotos</a></li>
                </ul>
              </li>
              <li><a href="werk.php">Werk</a>
                <ul>
                  <li><a href="werk-kompositionen.php">Kompositionen</a></li>
                  <li><a href="werk-geschichtswerk.php">Geschichtswerk</a></li>
                </ul>
              </li>
              <li><a href="projekt.php">Projekt</a>
                <ul>
                  <li><a href="projekt-dokumente.php">Dokumente</a></li>
                  <li><a href="projekt-interviews.php">Interviews</a></li>
                </ul>
              </li>
              <li><a href="download.php">Download</a></li>
            </ul>
          </div>
          <div id="col1r3">
            <div id="corner_patch4"></div>
            <ul>
              <li><a href="links.php">Links</a></li>
              <li><a href="gaestebuch.php">G&auml;stebuch</a></li>
              <li><a href="impressum.php">Impressum</a></li>
              <li><a href="kontakt.php">Kontakt</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div id="col3">
        <div id="corner_patch1"></div>
        <div id="col3_content" class="clearfix"> <!-- InstanceBeginEditable name="Pfeile" --> <!-- InstanceEndEditable --> <!-- InstanceBeginEditable name="textbereich" -->
          <?php
$tm->HtmlTitle('headline');
?>
          <table>
            <tr>
              <th width="210" valign="top"><a href="images/werk-kompositionen/kompositionen_stapel_gross.jpg"><img src="images/werk-kompositionen/kompositionen_stapel_klein.jpg" width="200" height="169" border="0" /></a></th>
              <th><p>ordnen nach:</p>
                <ul>
                  <li><a href="werk-kompositionen.php" <?php if (!isset($_GET['order'])) echo "class=\"agross\"" ?>>Gattungen</a></li>
                  <li><a href="werk-kompositionen.php?order=id" <?php if ($_GET['order'] == "id") echo "class=\"agross\"" ?>>Identifikations-Nr.</a></li>
                  <li><a href="werk-kompositionen.php?order=opus" <?php if ($_GET['order'] == "opus") echo "class=\"agross\"" ?>> Opus-Zahlen</a></li>
                  <li><a href="werk-kompositionen.php?order=tonart" <?php if ($_GET['order'] == "tonart") echo "class=\"agross\"" ?>>Tonart</a></li>
                  <li><a href="werk-kompositionen.php?order=fundort" <?php if ($_GET['order'] == "fundort") echo "class=\"agross\"" ?>> Fundorten</a></li>
                </ul>
                <p><a href="werk-fundorte.php">Fundorte der Kompositionen</a></p>
                <p><img src="images/editiert.png" /> Werk ist editiert und Notenmaterial kann kostenlos 
                  downgeloadet werden.<br>
                  <img src="images/fragmentarisch.png" /> Werk ist fragmentarisch erhalten oder <img src="images/x.png" /> verloren gegangen.<br>
                </p></th>
            </tr>
          </table>
          <?php

$table = new Tabelle;
$table->Tabelle = "kompositionen";
$table->Sortierung = "ssort";
$table->path = "werk-kompositionen-einzeln.php";
$table->Spalten = array 	
	(
	// Raute $ bedeutet Funktion, anstonsten Name der Tabellenspalte
	"\$columnn_content = kompositionen_status (\$row);" => "",
	"titel" => "Titel",
	"\$columnn_content = bes_grup (\$row);" => "Besetzung",
	);

echo "<br><strong>Anzahl der Kompositionen:</strong>&nbsp;&nbsp;alle:&nbsp;" . 
		$table->DatasetQuantity () .  "&nbsp;&nbsp;fragmentarisch erhalten:&nbsp;" . 
		$table->DatasetQuantity ("status", "1") . "&nbsp;&nbsp;verloren:&nbsp;" . 
		$table->DatasetQuantity ("status", "2");
echo "\n<hr>\n";                   

switch ($_GET['order'])
	{
	default:
	$table->SortierArray = AbfrageArrays("gattungen", "sortierung", $table->Tabelle, "gattungen_id");
	$table->SortierArraySpalte = "gattungen_id";
	break;
	
	case "opus":
	$table->Sortierung = "opus";
	$table->Spalten = array 	
		(
	    "\$columnn_content = kompositionen_status (\$row);" => "",
		"opus" => "op.",
		"titel" => "Titel",
	    "\$columnn_content = bes_grup (\$row);" => "Besetzung",
		);
	break;
	
	case "tonart":
	$table->SortierArray = $array_tonart;
	$table->SortierArraySpalte = "tonart";
	break;

	
	case "id":
	$table->Spalten = array 	
		(
	    "\$columnn_content = kompositionen_status (\$row);" => "",
		"id" => "ID",
		"titel" => "Titel",
	    "\$columnn_content = bes_grup (\$row);" => "Besetzung",
		);
$table->Sortierung = "id";
	break;
		
	case "fundort":
	$table->SortierArray = $array_kom_fundort;
	$table->SortierArraySpalte = "kom_fundort";
	break;
	}
	
echo $table->TableOutput ();
						 
?>
          <!-- InstanceEndEditable --> </div>
        <!-- IE Column Clearing -->
        <div id="ie_clearing"> &#160; </div>
      </div>
    </div>
    <!-- begin: #footer -->
    <div id="footer"> <a href="#top">nach oben ↑</a> ● ● ● <a href="inhalt.php">Inhalt</a> ● <a href="leben.php">Leben</a> ● <a href="werk.php">Werk</a> ● <a href="projekt.php">Projekt</a> ● <a href="download.php"> Download </a> ● ● ●                  
      Layout basiert auf <a href="http://www.yaml.de/">YAML</a> </div>
  </div>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-5171937-2");
pageTracker._trackPageview();
</script>
</body>
<!-- InstanceEnd --></html>
