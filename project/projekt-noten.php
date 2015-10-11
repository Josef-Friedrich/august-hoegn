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
          <div id="metaphor_projekt" class="metaphor">
            <div class="image"></div>
            <div class="gradient"></div>
            <div class="text">Projekt</div>
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
          <p>Wenn Sie die Noten der &quot;Josephi-Messe&quot; bestellen m&ouml;chten, wenden Sie sich bitte an <a href="http://www.comes-verlag.de">www.comes-verlag.de</a>: </p>
          <table>
            <tr>
              <td>COMES-Verlag<br>
                Postfach 2416<br>
                83426 Bad Reichenhall</td>
              <td>Tel: +49 (0) 8651 62256 <br>
                Fax: +49 (0) 8651 69913<br>
                <a href="mailto:rudolf.weikl@comes-verlag.de">rudolf.weikl@comes-verlag.de</a></td>
            </tr>
          </table>
          <h1>August H&ouml;gn - <em>&quot;Josephi-Messe&quot; </em> </h1>
          <p>F&uuml;r vier Singstimmen, zwei Posaunen, zwei Tenorh&ouml;rner, zwei Trompeten, zwei Violinen, Tuba und Orgel. </p>
          <table>
            <tr>
              <td><img src="images/projekt-noten/josephi-messe.jpg" /></td>
              <td><p>Jahrelang war das sp&auml;tromantische Werk verschollen. Nun haben wir die Messe aufgefunden und wieder aufgelegt. </p>
                <p>Baldur Bokelt, der erfolgreiche Kritiker der &quot;S&uuml;ddeutschen Zeitung&quot; schrieb: &quot;Diese Messe von August H&ouml;gn ist ein kostbares Kleinod s&uuml;ddeutscher Kirchen musik, die den Ch&ouml;ren viel Freude bereiten wird&quot;. </p></td>
            </tr>
          </table>
          <p>Herausgeber Josef Friedrich </p>
          <p>Partitur mit CD f&uuml;r die Stimmen </p>
          <p>ISBN 3-88820-017-2 </p>
          <p><strong>Preis: 29,00 Euro </strong></p>
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
