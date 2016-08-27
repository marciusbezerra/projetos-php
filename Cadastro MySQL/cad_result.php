<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>CADASTRO DE CLIENTES PHP</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>
<?
$prim_nome = trim($HTTP_POST_VARS['PrimNome']);
$ult_nome = trim($HTTP_POST_VARS['UltNome']);
$dia = $HTTP_POST_VARS['Dia'];
$mes = $HTTP_POST_VARS['Mes'];
$ano = $HTTP_POST_VARS['Ano'];
$dt_nasc = $ano.'/'.$mes.'/'.$dia;
$endereco = trim($HTTP_POST_VARS['Endereco']);
$complemento = trim($HTTP_POST_VARS['Complemento']);
$cod_cidade = $HTTP_POST_VARS['Cidade'];
$cep = trim($HTTP_POST_VARS['CEP']);
$fone1 = trim($HTTP_POST_VARS['Fone1']);
$fone2 = trim($HTTP_POST_VARS['Fone2']);
$fax = trim($HTTP_POST_VARS['Fax']);
$celular = trim($HTTP_POST_VARS['Celular']);
$email = trim($HTTP_POST_VARS['EMail']);

$i = 0;
$erros = array();

if (strlen($prim_nome)==0) {
   $erros[$i] = 'Faltou o primeiro nome';
   $i++;
}
if (strlen($ult_nome)==0) {
   $erros[$i] = 'Fatou o segundo nome';
   $i++;
}
if (!(checkdate($mes,$dia,$ano))) {
   $erros[$i] = 'Data inválida';
   $i++;
}
if (strlen($email)==0) {
   $erros[$i] = 'Faltou o e-mail';
   $i++;
}
else {
   if (((!strstr($email,'@'))) || (substr($email,0,1)=='@') || (substr($email,strlen($email)-1,1) == '@')) {
      $erros[$i] = 'E-Mail inválido';
      $i++;
   }
}
$num_erros = sizeof($erros);
?>
<body bgcolor='#FFFFFF'>
<?
if ($num_erros > 0) {
echo "<p align='center'><font size='4' face='Verdana, Arial, Helvetica, sans-serif'><strong>
  OCORRERAM ALGUNS ERROS:</strong></font></p>
<div align='center'>
  <table width='75%' border='1'>
    <tr> 
      <td><ul>";
for ($i=0;$i<$num_erros;$i++) 
    echo "
          <li>
            <div align='center'><font color='#FF0000'>$erros[$i]</font></div>
          </li>";

echo "        </ul></td>
    </tr>
  </table>
</div>";
}
else {
$conn = mysql_connect('localhost','','');
mysql_select_db('estoque',$conn);

$qry = mysql_query("SELECT MAX(CODIGO) FROM CLIENTES", $conn);
$row = mysql_fetch_array($qry);
$codigo = $row[0] + 1;

mysql_free_result($qry);

mysql_query("INSERT INTO CLIENTES (CODIGO, PRIM_NOME, ULT_NOME, DATA_NASCMENTO, ENDERECO, COMPLEMENTO, COD_CIDADE,
            CEP, FONE1, FONE2, FAX, CELULAR, EMAIL)
            VALUES ($codigo, '".convert_cyr_string($prim_nome,'i','')."', 
            '".convert_cyr_string($ult_nome,'i','')."', 
            '$dt_nasc',
            '".convert_cyr_string($endereco,'i','')."',
            '".convert_cyr_string($complemento,'i','')."', 
            $cod_cidade,
            '$cep',
            '$fone1',
            '$fone2',
            '$fax',
            '$celular',
            '$email')");

$qry = mysql_query("SELECT NOME FROM CIDADES WHERE CODIGO = $cod_cidade", $conn);

$row = mysql_fetch_array($qry);

mysql_free_result($qry);
mysql_close($conn);

$nome_cidade = $row[0];

echo "<p align='center'><font size='4' face='Verdana, Arial, Helvetica, sans-serif'><strong>SEUS 
  DADOS FORAM CADASTROS COM SUCESSO</strong></font></p>
<p align='center'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Pressione 
  voltar no navegador</font></strong></p>
<form name='form2' method='post' action=''>
  <table border='0' align='center' cellpadding='2' cellspacing='2'>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>Primeiro 
          nome:</strong></font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$prim_nome</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>&Uacute;ltimo 
          nome:</strong></font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$ult_nome</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Data 
          de nascimento:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$dt_nasc</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Endere&ccedil;o:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$endereco</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Complemento:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$complemento</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Cidade:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$nome_cidade</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>CEP:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$cep</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Fone 
          #1:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$fone1</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Fone 
          #2:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$fone2</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Fax:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$fax</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Celular:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$celular</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>E-Mail:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>$email</font></td>
    </tr>
  </table>
  <p align='center'>&nbsp; </p>
</form>";
}
?>
<p>&nbsp;</p>
</body>
</html>
