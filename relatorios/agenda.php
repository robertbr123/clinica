<?php
   /**
    * Gerenciador Cl?nico Odontol?gico
    * Copyright (C) 2006 - 2009
    * Autores: Ivis Silva Andrade - Engenharia e Design(ivis@expandweb.com)
    *          Pedro Henrique Braga Moreira - Engenharia e Programa??o(ikkinet@gmail.com)
    *
    * Este arquivo ? parte do programa Gerenciador Cl?nico Odontol?gico
    *
    * Gerenciador Cl?nico Odontol?gico ? um software livre; voc? pode
    * redistribu?-lo e/ou modific?-lo dentro dos termos da Licen?a
    * P?blica Geral GNU como publicada pela Funda??o do Software Livre
    * (FSF); na vers?o 2 da Licen?a invariavelmente.
    *
    * Este programa ? distribu?do na esperan?a que possa ser ?til,
    * mas SEM NENHUMA GARANTIA; sem uma garantia impl?cita de ADEQUA??O
    * a qualquer MERCADO ou APLICA??O EM PARTICULAR. Veja a
    * Licen?a P?blica Geral GNU para maiores detalhes.
    *
    * Voc? recebeu uma c?pia da Licen?a P?blica Geral GNU,
    * que est? localizada na ra?z do programa no arquivo COPYING ou COPYING.TXT
    * junto com este programa. Se n?o, visite o endere?o para maiores informa??es:
    * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html (Ingl?s)
    * http://www.magnux.org/doc/GPL-pt_BR.txt (Portugu?s - Brasil)
    *
    * Em caso de d?vidas quanto ao software ou quanto ? licen?a, visite o
    * endere?o eletr?nico ou envie-nos um e-mail:
    *
    * http://www.smileodonto.com.br/gco
    * smile@smileodonto.com.br
    *
    * Ou envie sua carta para o endere?o:
    *
    * Smile Odontol?ogia
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
	if(!checklog()) {
		die($frase_log);
	}
	include "../timbre_head.php";
	$sql = "SELECT nome FROM pacientes WHERE codigo = ".$_GET['codigo'];
	$query = mysql_query($sql) or die('Line 40: '.mysql_error());
	$row = mysql_fetch_array($query);
?>
<font size="3"><?php echo $LANG['reports']['scheduled_consultations_of']?> <b><?php echo $row['nome']?> [<?php echo $_GET['codigo']?>]</b></font><br /><br />
<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <th width="15%" align="left"><?php echo $LANG['reports']['date']?>
    </th>
    <th width="15%" align="left"><?php echo $LANG['reports']['time']?>
    </th>
    <th width="25%" align="left"><?php echo $LANG['reports']['procedure']?>
    </th>
    <th width="30%" align="left"><?php echo $LANG['reports']['professional']?>
    </th>
    <th width="15%" align="left"><?php echo $LANG['reports']['missed']?>
    </th>
  </tr>
<?php
    $i = 0;
    $sql = "SELECT * FROM v_agenda WHERE codigo_paciente = ".$_GET['codigo']." ORDER BY data ASC";
    $query = mysql_query($sql) or die('Line 60: '.mysql_error());
    while($row = mysql_fetch_array($query)) {
        if($i % 2 === 0) {
            $td_class = 'td_even';
        } else {
            $td_class = 'td_odd';
        }
?>
  <tr class="<?php echo $td_class?>" style="font-size: 12px">
    <td><?php echo converte_data($row['data'], 2)?>
    </td>
    <td><?php echo substr($row['hora'], 0, 5)?>
    </td>
    <td><?php echo $row['procedimento']?>
    </td>
    <td><?php echo (($row['sexo_dentista'] == 'Masculino')?'Dr.':'Dra.').' '.$row['nome_dentista']?>
    </td>
    <td><?php echo (($row['faltou'] == 'Sim')?'Sim':'')?>
    </td>
  </tr>
<?php
        $i++;
    }
?>
</table>
<script>
window.print();
</script>
<?php
    include "../timbre_foot.php";
?>
