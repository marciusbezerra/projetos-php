<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>CADASTRO DE CLIENTES PHP</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body bgcolor='#FFFFFF'>
<p align='center'><font size='4' face='Verdana, Arial, Helvetica, sans-serif'><strong>CADASTRO 
  DE CLIENTES</strong></font></p>
<form name='form2' method='post' action='cad_result.php'>
  <table border='0' align='center' cellpadding='0' cellspacing='0'>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>Primeiro 
          nome:</strong></font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <input name='PrimNome' type='text' id='PrimNome' size='30' maxlength='30'>
        </font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>&Uacute;ltimo 
          nome:</strong></font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <input name='UltNome' type='text' id='UltNome' size='30' maxlength='30'>
        </font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Data 
          de nascimento:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <select name='Dia' id='Dia'>
<?
    for ($i=1;$i<=31;$i++)
       echo "       <option value='".$i."'>".$i."</option>";
?>
        </select>
        / 
        <select name='Mes' id='Mes'>
<?
    for ($i=1;$i<=12;$i++)
       echo "       <option value='".$i."'>".$i."</option>";
?>
        </select>
        / 
        <select name='Ano' id='Ano'>
<?
    for ($i=1900;$i<=2004;$i++)
       echo "        <option value='".$i."'>".$i."</option>";
?>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Endere&ccedil;o:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <textarea name='Endereco' cols='50' rows='4' id='Endereco'></textarea>
        </font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Complemento:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <input name='Complemento' type='text' id='Complemento' size='30' maxlength='30'>
        </font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Cidade:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <select name='Cidade' id='Cidade'>
<?
   $conn = ibase_connect('localhost:c:/Servicos/Para o CD RW/Prog/Delphi/Controle de estoque (BDE Interbase)/CONTROLEESTOQUE.GDB','sysdba','masterkey');
   $qry = ibase_prepare($conn,"SELECT CODIGO, (NOME || ' - ' || UF) AS NOME_UF FROM CIDADES ORDER BY NOME");
   $rs = ibase_execute($qry);
   while ($row = ibase_fetch_row($rs))
      echo "       <option value='".$row[0]."'>".$row[1]."</option>";
   ibase_free_result($rs);
   ibase_free_query($qry);
   ibase_close($conn);
?>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>CEP:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <input name='CEP' type='text' id='CEP' size='8' maxlength='8'>
        </font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Fone 
          #1:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <input name='Fone1' type='text' id='Fone1' size='15' maxlength='15'>
        </font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Fone 
          #2:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <input name='Fone2' type='text' id='Fone2' size='15' maxlength='15'>
        </font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Fax:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <input name='Fax' type='text' id='Fax' size='15' maxlength='15'>
        </font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Celular:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <input name='Celular' type='text' id='Celular' size='15' maxlength='15'>
        </font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>E-Mail:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'> 
        <input name='EMail' type='text' id='EMail' value='@' size='70' maxlength='255'>
        </font></td>
    </tr>
  </table>
  <p align='center'> 
    <input type='submit' name='Submit' value='Salvar'>
    <input type='reset' name='Submit2' value='Limpar'>
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
