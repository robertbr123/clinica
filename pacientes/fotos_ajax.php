<?php
   
	include "../lib/config.inc.php";
	include "../lib/func.inc.php";
	include "../lib/classes.inc.php";
	require_once '../lang/'.$idioma.'.php';
	header("Content-type: text/html; charset=ISO-8859-1", true);
	if(!checklog()) {
		die($frase_log);
	}
	$strUpCase = "ALTERA��O";
	$strLoCase = encontra_valor('pacientes', 'codigo', $_GET['codigo'], 'nome').' - '.$_GET['codigo'];
	$acao = '&acao=editar';
?>
<link href="../css/smile.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style4 {color: #FFFFFF}
-->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="conteudo">
    <tr>
      <td width="100%">&nbsp;&nbsp;&nbsp;<img src="pacientes/img/pacientes.png" alt="<?php echo $LANG['patients']['manage_patients']?>"> <span class="h3"><?php echo $LANG['patients']['manage_patients']?> [<?php echo $strLoCase?>] </span></td>
    </tr>
  </table>
<div class="conteudo" id="table dados">
<br />
<?php include('submenu.php')?>
<br>
  <table width="610" border="0" align="center" cellpadding="0" cellspacing="0" class="tabela_titulo">
    
    <tr>
      <td height="26">&nbsp;<?php echo $LANG['patients']['photos']?></td>
    </tr>
  </table>
  <table width="610" border="0" align="center" cellpadding="0" cellspacing="0" class="tabela">
    <tr>
      <td>
        <br />
        <fieldset>
        <br />
          <table width="550" border="0" align="center">
            <tr>
<?php
	$i = 0;
	$query = mysql_query("SELECT * FROM `fotospacientes` WHERE `codigo_paciente` = '".$_GET['codigo']."' ORDER BY `codigo`") or die(mysql_error());
	while($row = mysql_fetch_array($query)) {
		if($i % 2 === 0) {
			echo '</tr><tr>';
		}
?>
              <td width="50%" align="center" valign="top">
               <img src="pacientes/verfoto.php?codigo=<?php echo $row['codigo']?>" border="0"><BR>
               <font size="1"><?php echo $row['legenda']?></font><br><br>
               <?php echo ((verifica_nivel('pacientes', 'E'))?'<a href="pacientes/excluirfotos_ajax.php?codigo='.$_GET['codigo'].'&codigo_foto='.$row['codigo'].'" onclick="return confirmLink(this)" target="iframe_upload">'.$LANG['patients']['delete_photo'].'</a>':'')?>
              </td>
<?php
		$i++;
	}
?>
           </tr>
        </table> 
        <br />
        </fieldset>
        <br />
        <iframe name="iframe_upload" width="1" height="1" frameborder="0" scrolling="No"></iframe>
          <form id="form2" name="form2" method="POST" action="pacientes/incluirfotos_ajax.php?codigo=<?php echo $_GET['codigo']?>" enctype="multipart/form-data" target="iframe_upload"> <?php/*onsubmit="Ajax('arquivos/daclinica/arquivos', 'conteudo', '');">*/?>
  		  <table width="310" border="0" align="center" cellpadding="0" cellspacing="0">
    		<tr align="center">
              <td width="70%"><?php echo $LANG['patients']['file']?> <br />
                <input type="file" size="20" name="arquivo" id="arquivo" class="forms" <?php echo $disable?> />
              </td>
            </tr>
    		<tr align="center">
              <td width="70%"><?php echo $LANG['patients']['legend']?> <br />
                <input type="text" size="33" name="legenda" id="legenda" class="forms" <?php echo $disable?> />
              </td>
            </tr>
            <tr align="center">
              <td width="30%"> <br />
                <input type="submit" name="Salvar" id="Salvar" value="<?php echo $LANG['patients']['save']?>" class="forms" <?php echo $disable?> />
              </td>
            </tr>
          </table>
          </form>
          <br />
      </td>
    </tr>
  </table>
