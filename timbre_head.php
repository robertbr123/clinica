<?php

	//include "../lib/config.inc.php";
	//include "../lib/func.inc.php";
	//include "../lib/classes.inc.php";
	//header("Content-type: text/html; charset=ISO-8859-1", true);
	//if(!checklog()) {
	//	die($frase_log);
	//}
	$clinica = new TClinica();
	$clinica->LoadInfo();
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gerenciador Clinico - <?php echo $LANG['general']['administration_in_your_hands']?></title>
<link rel="SHORTCUT ICON" href="favicon.ico">
<link href="../css/smile.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../lib/script.js"></script>
</head>
<body style="background-color: #FFFFFF">
<table align="center" width="700" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left">
      <table align="center" width="700" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" colspan="2" style="border-bottom: 2px solid #000000;">
            <?php echo (($clinica->Logomarca != '')?'<img src="../configuracoes/verfoto_p.php" border="0" alt="Logomarca de '.$clinica->Fantasia.'">':'')?>
            <font size="2"><b><?php echo $clinica->Fantasia?></b></font>
          </td>
        </tr>
        <tr>
          <td width="70%">
            <font size="1">
            <?php echo $clinica->Endereco.' :: '.$clinica->Bairro.' :: '.$clinica->Cidade.' :: '.$clinica->Estado.' :: CEP '.$clinica->Cep.' :: '.$clinica->Pais?>
            </font>
          </td>
          <td width="30%" align="right">
            <font size="1">
            <?php echo $clinica->Telefone1?>
            </font>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
    <br />&nbsp;
    </td>
  </tr>
  <tr>
    <td height="760" valign="top" align="left">
