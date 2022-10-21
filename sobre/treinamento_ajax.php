<?php
   
	include "../lib/config.inc.php";
	include "../lib/func.inc.php";
	include "../lib/classes.inc.php";
	require_once '../lang/'.$idioma.'.php';
	header("Content-type: text/html; charset=ISO-8859-1", true);
?>
<div class="conteudo" id="conteudo_central">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="conteudo">
    <tr>
      <td width="74%">&nbsp;&nbsp;&nbsp;<img src="sobre/img/treinamento.png" alt="Sobre"> <span class="h3"><?php echo $LANG['training_and_support']['training_and_support']?></span></td>
      <td width="7%" valign="bottom">&nbsp;</td>
      <td width="19%" valign="bottom">&nbsp;</td>
    </tr>
  </table>
<div class="conteudo" id="table dados"><br />
  <div class="sobre" id="sobre">
    <p>&nbsp;</p>
    <fieldset>
  <legend><?php echo $LANG['training_and_support']['training_and_suporte']?></legend>
  <p><?php echo $LANG['training_and_support']['the_development_team']?></p>
  <p><?php echo $LANG['training_and_support']['all_the_development']?></p>
  <p><?php echo $LANG['training_and_support']['dont_lose_the_opportunity']?></p>
  <p><?php echo $LANG['training_and_support']['training_is_fudamental']?></p>
  <p><?php echo $LANG['training_and_support']['more_information']?><br />
    <br />
  </p>
    </fieldset>
  </div>
</div>
