<html>
<head>
<title>Resultado da busca</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>
<?
   $conn = ibase_connect('localhost:c:/Servicos/Para o CD RW/Prog/Delphi/Controle de estoque (BDE Interbase)/CONTROLEESTOQUE.GDB','SYSDBA','masterkey', 'ISO8859_1');

   $qry = ibase_prepare($conn, "SELECT COUNT(CODIGO) FROM CLIENTES WHERE UPPER(NOME_COMPLETO) LIKE '%".strtoupper($HTTP_POST_VARS['Nome'])."%'");
   $rs = ibase_execute($qry);

   //Pega o número de registros
   $cont = ibase_fetch_row($rs);

   ibase_free_result($rs);
   ibase_free_query($qry);

   $qry = ibase_prepare($conn, "SELECT CODIGO, NOME_COMPLETO, FONE1 FROM CLIENTES WHERE UPPER(NOME_COMPLETO) LIKE '%".strtoupper($HTTP_POST_VARS['Nome'])."%'");
   $rs = ibase_execute($qry);
?>
<body bgcolor='#FFFFFF'>
<p align='center'><font size='4' face='Verdana, Arial, Helvetica, sans-serif'><strong>LISTAGEM 
  LOCALIZADA</strong></font></p>
<p align='center'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>
<? if ($cont[0] == 0) { echo "Nenhum registro encontrado</font></p>";} 
   else
   { echo "Foram localizados $cont[0] nome(s)";
     echo "</font></p> 
<div align='center'>
  <table width='75%' border='0' cellpadding='0' cellspacing='0'>
    <tr bgcolor='#006699'> 
      <td><div align='center'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong><font color='#FFFFFF'>MATR&Iacute;CULA</font></strong></font></div></td>
      <td><font size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong><font color='#FFFFFF'>NOME 
        COMPLETO</font></strong></font></td>
      <td><div align='center'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong><font color='#FFFFFF'>TELEFONE</font></strong></font></div></td>
    </tr>"; 
    while ($row = ibase_fetch_row($rs)) {
      echo "    <tr> 
      <td><div align='center'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>".$row[0]."</font></div></td>
      <td><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>".$row[1]."</font></td>
      <td><div align='center'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>".$row[2]."</font></div></td>
    </tr>";
    }
   }
   ibase_free_result($rs);
   ibase_free_query($qry);
   ibase_close($conn);
   
?>
  </table>
</div> 
<p align='center'>&nbsp;</p>
</body>
</html>
