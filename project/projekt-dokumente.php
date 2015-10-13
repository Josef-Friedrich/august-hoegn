---
Title:
metaphor_image: projekt
metaphor_text: Projekt
---

<?php
include_once ('scripts/bootstrap.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de"><!-- InstanceBegin template="/Templates/hauptvorlage.dwt" codeOutsideHTMLIsLocked="false" -->
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
              <div id="metaphor_dokumente" class="metaphor">
                <div class="image"></div>
                <div class="gradient"></div>
                <div class="text">Dokumente</div>
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
        <div id="col3_content" class="clearfix"> <!-- InstanceBeginEditable name="Pfeile" -->
            <!-- InstanceEndEditable --> <!-- InstanceBeginEditable name="textbereich" -->
<?php
$tm->HtmlTitle('headline');
?>
                        <table>
                          <tr>
                            <th width="210" valign="top"><a href="images/projekt-dokumente/dokumente_gross.jpg"><img src="images/projekt-dokumente/dokumente_klein.jpg" width="200" height="187" border="0" /></a></th>
                            <th><p>ordnen nach:</p>
                              <ul>
                                <li><a href="projekt-dokumente.php" <?php if (!isset($_GET['order'])) echo "class=\"agross\"" ?>>Thematik</a></li>
                                <li><a href="projekt-dokumente.php?order=datum" <?php if ($_GET['order'] == "datum") echo "class=\"agross\"" ?>>Datum</a></li>
                                <li><a href="projekt-dokumente.php?order=dok_art" <?php if ($_GET['order'] == "dok_art") echo "class=\"agross\"" ?>>Dokumentart</a></li>
                                <li><a href="projekt-dokumente.php?order=hoegnbriefe" <?php if ($_GET['order'] == "hoegnbriefe") echo "class=\"agross\"" ?>>Briefe von/an H&ouml;gn</a></li>
                                <li><a href="projekt-dokumente.php?order=fundort" <?php if ($_GET['order'] == "fundort") echo "class=\"agross\"" ?>>Fundorten</a></li>
                              </ul>
                            <p><a href="projekt-dokumente-fundorte.php">Fundorte der Dokumente</a></p>                            </th>
                          </tr>
                        </table>
<?php

$table = new Tabelle;
$table->Tabelle = "dokumente";
$table->Sortierung = "datum";
$table->path = "projekt-dokumente-einzeln.php";
$table->Spalten = array
	(
	"\$columnn_content = datum (\$row, 0);" => "Datum",
	"titel" => "Titel"
	);

echo "<br><strong>Anzahl der Dokumente:</strong>&nbsp;&nbsp;alle:&nbsp;" .
		$table->DatasetQuantity () . "&nbsp;&nbsp;Briefe:&nbsp;" .
		$table->DatasetQuantity ("dok_art", 1) . "&nbsp;&nbsp;Zeitungsartikel:&nbsp;" .
		$table->DatasetQuantity ("dok_art", 2);

switch ($_GET['order'])
	{
	default:
	$table->SortierArray = $array_thematik;
	$table->SortierArraySpalte = "thematik";
	break;

	case "datum":
	break;

	case "dok_art":
	$table->SortierArray = $array_dok_art;
	$table->SortierArraySpalte = "dok_art";
	break;

	case "hoegnbriefe":
	$table->SortierArray = array
		(
		"a" => "Briefe von August H&ouml;gn",
	 	"b" => "Briefe an August H&ouml;gn"
		);

	$table->SortierQuery = array
		(
		"a" => "WHERE feld1 = 'August H&ouml;gn'",
		"b" => "WHERE feld2 = 'August H&ouml;gn'"
		);

	$table->SortierArraySpalte = "feld1";
	break;

	case "fundort":
	$table->SortierArray = $array_dok_fundort;
	$table->SortierArraySpalte = "dok_fundort";
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
