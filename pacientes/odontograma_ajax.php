<?php
   
	include "../lib/config.inc.php";
	include "../lib/func.inc.php";
	include "../lib/classes.inc.php";
	require_once '../lang/'.$idioma.'.php';
	header("Content-type: text/html; charset=ISO-8859-1", true);
	if(!checklog()) {
		die($frase_log);
	}
	$acao = '&acao=editar';
	$paciente = new TPacientes();
    $query = mysql_query("SELECT * FROM odontograma WHERE codigo_paciente = ".$_GET['codigo']) or die('Line 39: '.mysql_error());
    while($row = mysql_fetch_assoc($query)) {
        $dente[$row['dente']] = $row['descricao'];
    }
	$strLoCase = encontra_valor('pacientes', 'codigo', $_GET['codigo'], 'nome').' - '.$_GET['codigo'];
?>
<link href="../css/smile.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style4 {color: #FFFFFF}
-->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="conteudo">
  <tr>
    <td width="100%">&nbsp;&nbsp;&nbsp;<img src="pacientes/img/pacientes.png" alt="<?php echo $LANG['patients']['manage_patients']?>"> <span class="h3"><?php echo $LANG['patients']['manage_patients']?> &nbsp;[<?php echo $strLoCase?>] </span></td>
  </tr>
</table>
<div class="conteudo" id="table dados">
<br />
<?php include('submenu.php')?>
<br />
<table width="610" border="0" align="center" cellpadding="0" cellspacing="0" class="tabela_titulo">
  <tr>
    <td height="26">&nbsp;<?php echo $LANG['patients']['odontogram']?></td>
  </tr>
</table>
<table width="610" border="0" align="center" cellpadding="0" cellspacing="0" class="tabela">
  <tr>
    <td>
      <form id="form2" name="form2" method="POST" action="pacientes/incluir_ajax.php<?php echo $frmActEdt?>" onsubmit="formSender(this, 'conteudo'); return false;"><br /><fieldset>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background: url('pacientes/img/odontograma.gif') center center no-repeat;">
        <tr>
          <td width="35%" align="right">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
    for($i = 18; $i != 49; $i++) {
?>
              <tr>
                <td width="100%" align="right" style="height: 25px" valign="middle">
                  <input type="text" name="dente[<?php echo $i?>]" value="<?php echo $dente[$i]?>" class="forms" <?php echo $disable?>
                  onblur="Ajax('pacientes/atualiza', 'pacientes_atualiza', 'descricao='%2Bthis.value%2B'&codigo_paciente=<?php echo $_GET['codigo']?>&dente=<?php echo $i?>');" />
                </td>
              </tr>
<?php
        if($i == 11) {
            $i = 40;
        }
        if($i < 40) {
            $i -= 2;
        }
    }
?>
            </table>
          </td>
          <td width="30%" align="center">

          </td>
          <td width="35%" align="center">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
    for($i = 28; $i != 39; $i++) {
?>
              <tr>
                <td width="100%" align="left" style="height: 25px" valign="middle">
                  <input type="text" name="dente[<?php echo $i?>]" value="<?php echo $dente[$i]?>" class="forms" <?php echo $disable?>
                  onblur="Ajax('pacientes/atualiza', 'pacientes_atualiza', 'descricao='%2Bthis.value%2B'&codigo_paciente=<?php echo $_GET['codigo']?>&dente=<?php echo $i?>');" />
                </td>
              </tr>
<?php
        if($i == 21) {
            $i = 30;
        }
        if($i < 30) {
            $i -= 2;
        }
    }
?>
            </table>
          </td>
        </tr>
      </table>
    </form>
    </td>
  </tr>
    <tr>
      <td align="right"> <br />
        <img src="../imagens/icones/imprimir.gif"> <a href="relatorios/odontograma.php?codigo=<?php echo $_GET['codigo']?>" target="_blank"><?php echo $LANG['patients']['print_odontogram']?></a>&nbsp;
      </td>
    </tr>
</table>
<div id="pacientes_atualiza"></div>
