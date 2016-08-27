<html>
<head>
<title>Banco Interbase (IMasters.gdb)</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
	$banco = 'localhost:C:/Servicos/Para o CD RW/Prog/Interbase/imasters.gdb';
	$usuario = 'SYSDBA';
	$senha = 'masterkey';
	$conn = ibase_connect($banco,$usuario,$senha);
	$qry = ibase_prepare($conn,"SELECT * FROM COLUNISTAS ORDER BY NOME");
	$rs = ibase_execute($qry);
?>
<body bgcolor="#FFFFFF">
<p align="center"><strong><font size="6">Dados retirados do banco Interbase (IMasters.gdb) 
  </font></strong></p>
<hr>
<table width="75%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr bordercolor="#CCCCCC" bgcolor="#009999"> 
    <td><strong><font color="#FFFFFF">Colunista</font></strong></td>
    <td><strong><font color="#FFFFFF">Assunto</font></strong></td>
  </tr>
  <? while ($row = ibase_fetch_row($rs)) {?>
  <tr bordercolor="#CCCCCC"> 
    <td><font face="Courier New, Courier, mono"><? echo $row[0] ?></font></td>
    <td><font face="Courier New, Courier, mono"><? echo $row[1] ?></font></td>
  </tr>
  <? } ?>
</table>
<hr>
<?
	ibase_free_result($rs);
	ibase_free_query($qry);
	ibase_close($conn);
?>
<p align="center"><font size="1" face="Geneva, Arial, Helvetica, sans-serif"><strong>Copyright 
  (c) por Marcius C. Bezerra</strong></font></p>
</body>
</html>
