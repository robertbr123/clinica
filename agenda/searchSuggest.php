<?php
   
	include "../lib/config.inc.php";
	include "../lib/func.inc.php";
	include "../lib/classes.inc.php";
	require_once '../lang/'.$idioma.'.php';
	header("Content-type: text/html; charset=ISO-8859-1", true);
    if (isset($_GET['search']) && $_GET['search'] != '') {
        $search = addslashes($_GET['search']);
        $suggest_query = mysql_query("SELECT codigo, nome FROM pacientes WHERE nome like '".$search."%' OR codigo = '".$search."' ORDER BY nome LIMIT 5");
        while($suggest = mysql_fetch_array($suggest_query)) {
            echo $suggest['nome'].' - '.$suggest['codigo']."\n";
        }
    }
?>
