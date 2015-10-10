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
              <div id="metaphor_gaestebuch" class="metaphor">
                <div class="image"></div>
                <div class="gradient"></div>
                <div class="text">G&auml;stebuch</div>
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
		
if (!isset($cmd)):
    
?>
                        <p>Es w&auml;re sch&ouml;n, wenn Sie einen Beitrag hinterlassen 
                          k&ouml;nnten. Danke!</p>
    <p>&nbsp;</p>
    <form action="<? echo $PHP_SELF ?>"  method="post"  name="gaestebuch" id="gaestebuch">    
      <input  type="hidden"  name="cmd"  value="send" />
                          <table border="0" cellspacing="10" cellpadding="0">
                            <tr> 
                              <td><p><strong>Name:</strong></p></td>
                              <td width="146"><input  name="name"  type="text" size="30" /></td>
                            </tr>
                            <tr> 
                              <td> <p><strong>E-mail:</strong></p></td>
                              <td><input  name="email"  type="text" size="30" /></td>
                            </tr>
                            <tr> 
                              <td><p><strong>Ort:</strong></p></td>
                              <td><input  name="ort"  type="text" size="30" /></td>
                            </tr>
                          </table>
                          <p> <strong>Beitrag: </strong></p>
                          <table width="400" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><textarea  name="beitrag"  cols="60"  rows="15"></textarea>
                                <br>
								<br>
                                <center>
                                  <input type="submit"  value="Abschicken" />
                                  <input type="reset"  value="L&ouml;schen" />
                        </center></td>
                            </tr>
                          </table>                
                            <?php    
// Eintrag abgesendet   
else:

function datum ($datum)
	{
	$jahr = strtok ($datum, "-");
	$monat = strtok ("-");
	$tag = strtok ("-");
	$datum = sprintf ("%d.%d.%d", $tag, $monat, $jahr);
	
	return $datum;
	}

function SpezialTranslate ($text)
	{
	$translation_table = array 
		(
		"" => "&Auml;",
		"" => "&Ouml;",
		"" => "&Uuml;",
		"" => "&auml;",
		"" => "&ouml;",
		"" => "&uuml;",
		"" => "&szlig;"
		);
	$text = strtr($text, $translation_table);
	
	return $text;	
	}
	
    $datum = date("Y-m-d");
	$name =  htmlentities("$name");
    $ort =  htmlentities("$ort");
	
	$beitrag = preg_replace ("|<[^>]+>|", "", $beitrag);
    $beitrag =  htmlentities("$beitrag");
	
	$titel = "Beitrag ";
	if (!empty ($name)) $titel .= "von $name, "; 
	if (!empty ($ort))	$titel .= "$ort, ";
	$titel .= datum($datum);
	
	$datumtext = datum($datum);
	
    mysql_query("INSERT into gaestebuch (titel, name, email, ort, beitrag, datum, datumtext) VALUES ('$titel', '$name', '$email', '$ort', '$beitrag', '$datum', '$datumtext');");
	echo mysql_error () . "<br>";
	
?>
                        </form>
                        <h2>Vielen Dank! Ihr Beitrag wurde ins G&auml;stebuch 
                          &uuml;bernommen.</h2><hr />

                        <h3>Folgende Werte wurden &uuml;bertragen:</h3>
                        <? 
echo "<p>\n";
if (!empty($name)) echo "<strong>Name:</strong>&nbsp;$name<br>\n";
if (!empty($email)) echo "<strong>E-Mail:</strong>&nbsp;<a  href=\"mailto:$email\">$email</a><br>\n";
if (!empty($ort)) echo "<strong>Ort:</strong>&nbsp;$ort<br>\n";
if (!empty($datumtext)) echo "<strong>Datum:</strong>&nbsp;$datumtext<br>\n";
echo "</p>\n";

echo "<p><strong>Ihr Beitrag:</strong><br>\n<br>\n\"$beitrag\"</p>\n";
?>
                        <h3><a href="gaestebuch.php">Zurck zum Gstebuch</a> 
                          <?    
endif;    
?>
                        </h3>
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
