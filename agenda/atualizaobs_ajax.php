<?php
   
	include "../lib/config.inc.php";
	include "../lib/func.inc.php";
	include "../lib/classes.inc.php";
	require_once '../lang/'.$idioma.'.php';
	header("Content-type: text/html; charset=ISO-8859-1", true);
	if(!checklog()) {
		die($frase_log);
	}
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
        $obs = $_GET['obs'];
    } else {
        $obs = utf8_decode($_GET['obs']);
    }
	$sql = "UPDATE agenda_obs SET obs = '".$obs."' WHERE data = '".$_GET['data']."' AND codigo_dentista = '".$_GET['codigo_dentista']."'";
	$query = mysql_query($sql) or die('Line 44: '.mysql_error());
?>
