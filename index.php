<?php
include_once ('scripts/bootstrap.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<!-- InstanceBegin template="/Templates/hauptvorlage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>August H&ouml;gn - Leben und Werk</title>
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
          <div id="metaphor_augusthoegn" class="metaphor">
            <div class="image"></div>
            <div class="gradient"></div>
            <div class="text">August H&ouml;gn</div>
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
          <h1>Der <em>Mozart</em> von Ruhmannsfelden</h1>
          <p>Leben und Werk des Schulrektors, 
            Heimatforschers und Komponisten August H&ouml;gn (1878 - 1961)</p>
          <?php
						$fd = opendir ("images/index");
						while ($hoegn_bild = readdir ($fd)) {
							if (strpos($hoegn_bild, ".jpg")) {
								$hoegn_bilder_array[] = $hoegn_bild;
								}
							}
							
						shuffle ($hoegn_bilder_array);
							
						for ($i = 0; $i < 3; $i++) {
							echo "<img src=\"images/index/$hoegn_bilder_array[$i]\" height=\"300\">&nbsp;&nbsp;\n";
							}	
						?>
          <h2>Das Buch "Der <em>Mozart</em> von Ruhmannsfelden"</h2>
          <a href="projekt-buch.php">
          <?php
						$hoegn_bilder_array = array();
						$fd = opendir ("images/buchbilder");
						while ($hoegn_bild = readdir ($fd)) {
							if (strpos($hoegn_bild, ".jpg")) {
								$hoegn_bilder_array[] = $hoegn_bild;
								}
							}
							
						shuffle ($hoegn_bilder_array);
							
						for ($i = 0; $i < 2; $i++) {
							echo "<img src=\"images/buchbilder/$hoegn_bilder_array[$i]\" height=\"300\">&nbsp;&nbsp;\n";
							}	
						?>
          </a>
          <p>Josef Friedrich, Verlag Karl Stutz, Passau 2007, ISBN 978-3-88849-961-6, 9,90 &euro; </p>
          <p><a href="projekt-buch.php" class="agross">⇨ Das Buch &quot;Der <em>Mozart</em> von Ruhmannsfelden&quot; bestellen</a></p>
          <h2>August H&ouml;gn - Josephi-Messe F-Dur op. 62 </h2>
          <p><a href="projekt-noten.php"><img src="images/projekt-noten/josephi-messe.jpg" /></a></p>
          <p>Herausgeber: Josef Friedrich, Comes-Verlag, Bad Reichenhall 2007, Partitur mit CD f&uuml;r die Stimmen, ISBN 3-88820-017-2;  29,00 &euro;</p>
          <p><a href="projekt-noten.php">⇨ Die Noten der &quot;Josephi-Messe&quot; bestellen</a></p>
          <h2>Neuigkeiten:</h2>
          <ul>
            <li>01.09.2010: Die Homepage wurde von Grund auf überarbeitet.</li>
            <li>30.03.2007: Buchpr&auml;sentation &quot;Der Mozart von Ruhmannsfelden&quot; in Deggendorf </li>
            <li>18.03.2007: Buchpr&auml;sentation  &quot;Der Mozart von Ruhmannsfelden&quot; in Ruhmannsfelden</li>
            <li>29.11.2005: &uuml;ber 50 neue <a href="projekt-dokumente.php">Dokumente</a> aus den Personalakt und den Spruchkammerakt online! </li>
            <li>05.04.2005: Die Zulassungsarbeit &uuml;ber August H&ouml;gn ist fertig! </li>
            <li>09.02.2005: <a href="projekt-interviews-einzeln.php?id=26">Interview mit H&ouml;gn Gro&szlig;-Nichte Eva Ertl </a></li>
            <li>28.12.2004: <a href="projekt-interviews-einzeln.php?id=24">Interview 
              mit Johann Glasschr&ouml;der</a></li>
            <li>28.12.2004: <a href="projekt-interviews-einzeln.php?id=23">Interview 
              mit Josef Raster</a></li>
            <li>02.12.2004: <a href="projekt-interviews-einzeln.php?id=21">Interview 
              mit H&ouml;gn-Enkelin Lilo Leuze</a></li>
            <li>23.11.2004: <a href="projekt-interviews-einzeln.php?id=20">Interview 
              mit H&ouml;gn-Enkelin Gertraud von Molo</a></li>
            <li> 09.11.2004: <a href="projekt-dokumente-einzeln.php?id=95">Dokument 
              &uuml;ber eine Auff&uuml;hrung eines Singspiels unter 
              H&ouml;gn </a></li>
            <li>27.10.2004: <a href="projekt-interviews.php">Alle 
              18 Interviews sind transkribiert</a><br>
              <br>
            </li>
          </ul>
          </td>
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
<!-- InstanceEnd -->
</html>
