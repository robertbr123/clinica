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
      <td height="26">&nbsp;<?php echo $LANG['patients']['radiograph']?></td>
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
    $query = mysql_query("SELECT * FROM radiografias WHERE codigo = '".$_GET['codigo_foto']."'") or die(mysql_error());
    $row = mysql_fetch_array($query);
?>
              <td align="left">
                <a href="javascript:Ajax('pacientes/radio', 'conteudo', 'codigo=<?php echo $_GET['codigo']?>&acao=editar&modelo=<?php echo $row['modelo']?>');"><< Voltar</a>
              </td>
            </tr>
            <tr>
              <td width="100%" align="center" valign="top">
                <img src="pacientes/verfoto_r.php?codigo=<?php echo $row['codigo']?>&tamanho=thumb" border="0"><BR>
                <font size="1"><?php echo $row['legenda']?><br /><?php echo converte_data($row['data'], 2)?></font><br><br>
                <?php echo ((verifica_nivel('pacientes', 'E'))?'<a href="pacientes/excluirfotos_r_ajax.php?codigo='.$_GET['codigo'].'&codigo_foto='.$row['codigo'].'&modelo='.$_GET['modelo'].'" onclick="return confirmLink(this)" target="iframe_upload">'.$LANG['patients']['delete_radiograph'].'</a>':'')?>
                <br />
                <br />
                <a href="pacientes/verfoto_r.php?codigo=<?php echo $row['codigo']?>" target="_blank"><?php echo $LANG['patients']['view_radiograph_in_original_size']?></a>
              </td>
           </tr>
        </table>
        <br />
        <iframe name="iframe_upload" width="1" height="1" frameborder="0" scrolling="No"></iframe>
          <form id="form2" name="form2" method="POST" action="pacientes/incluirradiodiagnostico_ajax.php?codigo=<?php echo $row['codigo']?>" enctype="multipart/form-data" target="iframe_upload"> <?php/*onsubmit="Ajax('arquivos/daclinica/arquivos', 'conteudo', '');">*/?>
  		  <table width="310" border="0" align="center" cellpadding="0" cellspacing="0">
    		<tr align="center">
              <td width="70%"><?php echo $LANG['patients']['radio_diagnosis']?> <br />
                <textarea cols="50" rows="8" class="forms" <?php echo $disable?> name="texto"><?php echo $row['diagnostico']?></textarea>
              </td>
            </tr>
            <tr align="center">
              <td width="30%"> <br />
                <input type="submit" name="Salvar" id="Salvar" value="<?php echo $LANG['patients']['save']?>" class="forms" <?php echo $disable?>>
              </td>
            </tr>
          </table>
          </form>
          <br />
        </fieldset>
        <br />
        <div align="center"><a href="relatorios/radiodiagnostico.php?codigo=<?php echo $row['codigo']?>" target="_blank"><?php echo $LANG['patients']['print'].' '.$LANG['patients']['radio_diagnosis']?></a></div>
        <br />
      </td>
    </tr>
  </table>
