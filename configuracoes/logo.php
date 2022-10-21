<?php
   /**
    * Gerenciador Cl�nico Odontol�gico
    * Copyright (C) 2006 - 2009
    * Autores: Ivis Silva Andrade - Engenharia e Design(ivis@expandweb.com)
    *          Pedro Henrique Braga Moreira - Engenharia e Programa��o(ikkinet@gmail.com)
    *
    * Este arquivo � parte do programa Gerenciador Cl�nico Odontol�gico
    *
    * Gerenciador Cl�nico Odontol�gico � um software livre; voc� pode
    * redistribu�-lo e/ou modific�-lo dentro dos termos da Licen�a
    * P�blica Geral GNU como publicada pela Funda��o do Software Livre
    * (FSF); na vers�o 2 da Licen�a invariavelmente.
    *
    * Este programa � distribu�do na esperan�a que possa ser �til,
    * mas SEM NENHUMA GARANTIA; sem uma garantia impl�cita de ADEQUA��O
    * a qualquer MERCADO ou APLICA��O EM PARTICULAR. Veja a
    * Licen�a P�blica Geral GNU para maiores detalhes.
    *
    * Voc� recebeu uma c�pia da Licen�a P�blica Geral GNU,
    * que est� localizada na ra�z do programa no arquivo COPYING ou COPYING.TXT
    * junto com este programa. Se n�o, visite o endere�o para maiores informa��es:
    * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html (Ingl�s)
    * http://www.magnux.org/doc/GPL-pt_BR.txt (Portugu�s - Brasil)
    *
    * Em caso de d�vidas quanto ao software ou quanto � licen�a, visite o
    * endere�o eletr�nico ou envie-nos um e-mail:
    *
    * http://www.smileodonto.com.br/gco
    * smile@smileodonto.com.br
    *
    * Ou envie sua carta para o endere�o:
    *
    * Smile Odontol�ogia
    * Rua Laudemira Maria de Jesus, 51 - Lourdes
    * Arcos - MG - CEP 35588-000
    *
    *
    */
	include "../lib/config.inc.php";
	include "../lib/func.inc.php";
	include "../lib/classes.inc.php";
	require_once '../lang/'.$idioma.'.php';
	header("Content-type: text/html; charset=ISO-8859-1", true);
	$caminho = "logo.jpg";
	if($_GET['confirm_del'] == "delete\')") {
        $sql = "UPDATE `dados_clinica` SET `logomarca` = ''";
        mysql_query($sql) or die(mysql_error());
	}
	if(isset($_POST['send'])) {
		if($_FILES['foto']['name'] != "" && ($_FILES['foto']['type'] == 'image/gif' || $_FILES['foto']['type'] == 'image/pjpeg' || $_FILES['foto']['type'] == 'image/jpeg' || $_FILES['foto']['type'] == 'image/png')) {
			$foto = imagecreatefromall($_FILES['foto']['tmp_name'], $_FILES['foto']['name']);
			$factor = imagesx($foto)/imagesy($foto);
            $siz_x = 100;
			$siz_y = round($siz_x/$factor);
			$imagem = imagecreate($siz_x, $siz_y);
			$white = imagecolorallocatealpha($imagem, 255, 255, 255, 127);
			imagecopyresized($imagem, $foto, 0, 0, 0, 0, $siz_x, $siz_y, imagesx($foto), imagesy($foto));
            imagejpeg($imagem, 'logo.jpg');
            $img_data = addslashes(file_get_contents('logo.jpg'));
            $sql = "UPDATE `dados_clinica` SET `logomarca` = '".$img_data."'";
            unlink('logo.jpg');
            mysql_query($sql) or die(mysql_error());
		}
	}
	$disable = '';
	$href = 'href=';
	$onclick = 'onclick=';
	if(checknivel('Dentista') || checknivel('Funcionario') || $_GET['disabled'] == 'yes') {
		$disable = 'disabled';
		$href = '';
		$onclick = '';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gerenciador Cl�nico Odontol�gico Smile Odonto - Administra��o Odontol�gica Em Suas M�os</title>
<link href="../css/smile.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../lib/script.js.php"></script>
</head>
<body style="background-color: #F0F0F0"><center>
<?php
    $sql = "SELECT `logomarca` FROM `dados_clinica`";
    $query = mysql_query($sql) or die('Erro: '. mysql_error());
    $row = mysql_fetch_array($query);
	if($row['logomarca'] != '') {
		echo '<img src="verfoto_p.php" border="0">';
	}
?><br><br>
<form action="logo.php" method="POST" enctype="multipart/form-data" target="_self">
<input type="file" <?php echo $disable?> name="foto" size="8" class="forms"><br>
<input type="submit" <?php echo $disable?> class="forms" value="<?php echo $LANG['clinic_information']['save']?>" name="send"><BR><BR>
<a <?php echo $href?>"logo.php?" <?php echo $onclick?>"return confirmLink(this)"><?php echo $LANG['clinic_information']['delete_image']?></a>
</form>
</body>
</html>
