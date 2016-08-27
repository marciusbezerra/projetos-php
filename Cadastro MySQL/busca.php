<html>
<head>
<title>Resultado da busca</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>
<?
$conn = mysql_connect('localhost','','');
mysql_select_db('estoque');
$qry = mysql_query("SELECT CODIGO, PRIM_NOME, ULT_NOME, FONE1 FROM CLIENTES WHERE (PRIM_NOME
                   LIKE '%".$HTTP_POST_VARS['Nome']."%' OR ULT_NOME LIKE '%".$HTTP_POST_VARS['Nome']."%')
                   ORDER BY PRIM_NOME, ULT_NOME",$conn);
$cont = mysql_num_rows($qry);
?>
<body bgcolor='#FFFFFF'>
<p align='center'><font size='4' face='Verdana, Arial, Helvetica, sans-serif'><strong>LISTAGEM 
  LOCALIZADA</strong></font></p>
<p align='center'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>
<? if ($cont == 0) {echo "Não foi localizado nenhum nome</font></p>"; }
else
{ echo "Foram localizados $cont nome(s)</font></p>";
echo "<div align='center'>
  <table width='75%' border='0' cellpadding='0' cellspacing='0'>
    <tr bgcolor='#006699'> 
      <td><div align='center'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong><font color='#FFFFFF'>MATR&Iacute;CULA</font></strong></font></div></td>
      <td><font size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong><font color='#FFFFFF'>NOME 
        COMPLETO</font></strong></font></td>
      <td><div align='center'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong><font color='#FFFFFF'>TELEFONE</font></strong></font></div></td>
    </tr>";
while ($row = mysql_fetch_array($qry))
   echo "<tr> 
      <td><div align='center'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>$row[0]</font></div></td>
      <td><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>".convert_cyr_string($row[1].' '.$row[2],'i','')."</font></td>
      <td><div align='center'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>$row[3]</font></div></td>
    </tr>";
echo "  </table>
</div>";
mysql_free_result($qry);
mysql_close($conn);
}
?>
<p align='center'>&nbsp;</p>
</body>
</html>
