<?php
include_once ('scripts/bootstrap.inc');

$result = mysql_query('SELECT * FROM interviews WHERE id=' . $_GET['id']);
$row = mysql_fetch_array($result);

$tm->row = $row;
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
              <div id="metaphor_interviews" class="metaphor">
                <div class="image"></div>
                <div class="gradient"></div>
                <div class="text">Interviews</div>
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
                        <div id="arrow-wrapper">
                            <div class="arrow"><?php if (!empty ($row['previous'])) echo "<a href=\"projekt-interviews-einzeln.php?id=" . $row['previous'] . "\"><img src=\"images/gross_orange_links.png\"></a>"; ?></div>
                            <div class="arrow"><a href="projekt.php"><img src="images/gross_orange_oben.png"/></a></div>
                            <div class="arrow"><?php if (!empty ($row['next'])) echo "<a href=\"projekt-interviews-einzeln.php?id=" . $row['next'] . "\"><img src=\"images/gross_orange_rechts.png\"></a>"; ?></div>
                        </div>                 
            <!-- InstanceEndEditable --> <!-- InstanceBeginEditable name="textbereich" -->
                      <td align="left" valign="top"> 
            <?php

$tm->HtmlTitle('headline');

if (!empty ($row[jpg])) echo interviews_jpg ($row);
if (!empty ($row[audio])) echo '<p>Das Interview anh&ouml;ren: </p>' . interviews_audio($row);
echo "<h2>Informationen zur Person:</h2>\n";
echo "<p>";
if (!empty ($row[interviewter])) echo "<b>Name:</b>&nbsp;$row[interviewter]<br>\n";
if (!empty ($row[jahrgang]))echo "<b>Jahrgang:</b>&nbsp;$row[jahrgang]<br>\n";
if (!empty ($row[interviewalter]))echo "<b>Alter zum Zeitpunkt des Interviews:</b>&nbsp;$row[interviewalter]<br>\n";
if ($row[todestagtext] !== "0000")echo "<b>verstorben am:</b>&nbsp;" . interviews_todestagtext ($row) . "<br>\n";
if (!empty ($row[bezug]))echo "<b>Bezug zu Högn:</b>&nbsp;$row[bezug]<br><br>\n";
echo "\n</p><h2>Informationen zum Interview:</h2><p>\n";
if (!empty ($row[datum]))echo "<b>Datum:</b>&nbsp;" . datum ($row, 0) . "<br>\n";
if (!empty ($row[ort]))echo "<b>Ort:</b>&nbsp;$row[ort]<br>\n";
if (!empty ($row[dauergesamt]))echo "<b>Gesamt-Dauer des mitgeschnitten Interviews:</b>&nbsp;$row[dauergesamt] Minuten<br>\n";
if (!empty ($row[dauer]))echo "<b>Dauer (Högn-Bezug):</b>&nbsp;$row[dauer] Minuten\n";

echo "</p>";
//if (!empty ($row[mp3]))echo "<hr><h2>Kostproben aus dem Interview</h2>\n$row[mp3]\n";
if (!empty ($row[text]))echo "\n\n<h2>Transkription des Interviews:</h2>\n$row[text]\n";
				
		
?>            <!-- InstanceEndEditable --> </div>
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
