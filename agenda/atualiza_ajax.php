<?php
   
	include "../lib/config.inc.php";
	include "../lib/func.inc.php";
	include "../lib/classes.inc.php";
	require_once '../lang/'.$idioma.'.php';
	header("Content-type: text/html; charset=ISO-8859-1", true);
	if(!checklog()) {
		die($frase_log);
	}
	$agenda = new TAgendas();
	$agenda->LoadAgenda($_GET['data'], $_GET['hora'], $_GET['codigo_dentista']);
	if(isset($_GET['descricao'])) {
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
            $agenda->SetDados('descricao', $_GET['descricao']);
        } else {
            $agenda->SetDados('descricao', utf8_decode ( htmlspecialchars( utf8_encode($_GET['descricao']) , ENT_QUOTES | ENT_COMPAT, 'utf-8') ));
        }
        //echo '<script>alert("'.$agenda->RetornaDados('descricao').'")</script>';
        if($_GET['codigo_paciente'] == '') {
            $_GET['codigo_paciente'] = 0;
            //echo '<script>alert("'.$agenda->RetornaDados('codigo_paciente').'")</script>';
        }
        $agenda->SetDados('codigo_paciente', $_GET['codigo_paciente']);
	} elseif(isset($_GET['procedimento'])) {
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
            $agenda->SetDados('procedimento', $_GET['procedimento']);
        } else {
            $agenda->SetDados('procedimento', utf8_decode($_GET['procedimento']));
        }
	} elseif(isset($_GET['faltou'])) {
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
            $agenda->SetDados('faltou', $_GET['faltou']);
        } else {
            $agenda->SetDados('faltou', utf8_decode($_GET['faltou']));
        }
        //echo '<script>alert("'.$agenda->RetornaDados('faltou').'")</script>';
	}
	$agenda->Salvar();
?>
