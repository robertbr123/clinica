<?php
   
	include "lib/config.inc.php";
    if(!$install) {
        header('Location: ./configurador.php');
    } else {
        //@unlink('./configurador.php');
    }
	include "lib/func.inc.php";
	include "lib/classes.inc.php";
	require_once 'lang/'.$idioma.'.php';
	header("Content-type: text/html; charset=ISO-8859-1", true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gerenciador Clinica Odonto</title>
<link rel="SHORTCUT ICON" href="favicon.ico">
<link href="css/smile.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="lib/script.js.php"></script>
<script language="javascript" type="text/javascript" src="lib/ajax_search.js"></script>
</head>
<body onload="MM_preloadImages('imagens/menu/inicio_f2.jpg','imagens/menu/arquivo_f2.jpg','imagens/menu/financeiro_f2.jpg','imagens/menu/atualizacoes_f2.jpg','imagens/menu/utilitarios_f2.jpg','imagens/menu/configuracoes_f2.jpg','imagens/menu/ajuda_f2.jpg','imagens/menu/sair_f2.jpg','imagens/menu/pacientes_f2.jpg','imagens/menu/pagamentos_f2.jpg','imagens/menu/fornecedores_f2.jpg','imagens/menu/caixa_f2.jpg','imagens/menu/agenda_f2.jpg','imagens/menu/estoque_f2.jpg','imagens/menu/telefones_f2.jpg'); javascript:Ajax('wallpapers/index', 'conteudo', '')">
  <input type="hidden" id="ScriptID" value="0" />
  <div class="topo" id="topo"> <img src="imagens/top_gerenciador_smile.jpg" alt="Smile Odonto" width="770" height="40" />
    <?php include "menu.php"; ?>
    <br />
</div>
<div class="conteudo" id="conteudo"></div>
  <div class="rodape" id="rodape"> <br />
      <?php echo $LANG['general']['smile_odontology']?> - <?php echo $LANG['general']['enhancing_your_smile']?> - <a href="http://www.linket.com.br" target="_blank">Linket Soluções Web </a><br>
      <br>
      <?php echo $LANG['general']['be_part_of_smile']?>
  </div>
</body>
</html>
