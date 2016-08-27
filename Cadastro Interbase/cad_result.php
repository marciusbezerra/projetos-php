<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>CADASTRO DE CLIENTES PHP</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>
<?
   $prim_nome   = trim($HTTP_POST_VARS['PrimNome']);
   $ult_nome    = trim($HTTP_POST_VARS['UltNome']);
   $dia         = $HTTP_POST_VARS['Dia'];
   $mes         = $HTTP_POST_VARS['Mes'];
   $ano         = $HTTP_POST_VARS['Ano'];
   $dt_nasc     = $mes.'/'.$dia.'/'.$ano;
   $endereco    = trim($HTTP_POST_VARS['Endereco']);
   $complemento = trim($HTTP_POST_VARS['Complemento']);
   $cod_cidade  = $HTTP_POST_VARS['Cidade'];
   $cep         = trim($HTTP_POST_VARS['CEP']);
   $fone1       = trim($HTTP_POST_VARS['Fone1']);
   $fone2       = trim($HTTP_POST_VARS['Fone2']);
   $fax         = trim($HTTP_POST_VARS['Fax']);
   $celular     = trim($HTTP_POST_VARS['Celular']);
   $email       = trim($HTTP_POST_VARS['EMail']);

   $i = 0;

   $erros = array();

   if (strlen($prim_nome) == 0) {
      $erros[$i] = 'Esqueçeu de digitar o primeiro nome';
      $i++;
   }
   if (strlen($ult_nome == '')) {
      $erros[$i] = 'Esqueceu de digitar o segundo nome';
      $i++;
   }
   if (!(checkdate($mes,$dia,$ano))) {
      $erros[$i] = 'A data não parece ser válida';
      $i++;
   }
   if (strlen($email) == 0) {
      $erros[$i] = 'Esqueceu digitar o e-mail';
      $i++;
   }
   else {
      if ((!(strstr($email,'@'))) || (substr($email,0,1) == '@') || (substr($email, strlen($email)-1,1) == '@')) {
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
  OCORRERAM AS SEGUINTES FALTAS:</strong></font></p>
<p align='center'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Pressione 
  voltar no navegador</font></strong></p>
<div align='center'>
  <table width='75%' border='1'>
    <tr> 
      <td><ul>";
   for ($i=0;$i<$num_erros;$i++) 
      echo "
          <li>
            <div align='center'><font color='#FF0000'>".$erros[$i]."</font></div>
          </li>";
echo "        </ul></td>
    </tr>
  </table>
</div>";
}
else {

$conn = ibase_connect('localhost:c:/Servicos/Para o CD RW/Prog/Delphi/Controle de estoque (BDE Interbase)/CONTROLEESTOQUE.GDB', 'sysdba', 'masterkey');
$qry = ibase_prepare($conn, "INSERT INTO CLIENTES (PRIM_NOME, ULT_NOME, DATA_NASCMENTO, ENDERECO, 
                COMPLEMENTO, COD_CIDADE, CEP, FONE1, FONE2, FAX, CELULAR, EMAIL) 
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
$trans = ibase_trans($conn);
ibase_execute($qry,$prim_nome,$ult_nome,$dt_nasc,$endereco,$complemento,$cod_cidade,$cep,$fone1,$fone2,$fax,
              $celular,$email);
ibase_commit($trans);
ibase_free_query($qry);

$qry = ibase_prepare($conn,"SELECT CODIGO, NOME FROM CIDADES WHERE CODIGO = ?");
$rs = ibase_execute($qry, $cod_cidade);

$row = ibase_fetch_row($rs);

ibase_free_result($rs);
ibase_free_query($qry);
ibase_close($conn);

$nome_cidade = $row[1];

echo "<p align='center'><font size='4' face='Verdana, Arial, Helvetica, sans-serif'><strong>SEUS 
  DADOS FORAM CADASTROS COM SUCESSO</strong></font></p>
<form name='form2' method='post' action=''>
  <table border='0' align='center' cellpadding='2' cellspacing='2'>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>Primeiro 
          nome:</strong></font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$prim_nome."</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>&Uacute;ltimo 
          nome:</strong></font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$ult_nome."</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Data 
          de nascimento:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$dt_nasc."</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Endere&ccedil;o:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$endereco."</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Complemento:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$complemento."</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Cidade:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$nome_cidade."</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>CEP:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$cep."</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Fone 
          #1:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$fone1."</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Fone 
          #2:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$fone2."</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Fax:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$fax."</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Celular:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$celular."</font></td>
    </tr>
    <tr> 
      <td><div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>E-Mail:</font></div></td>
      <td><font face='Verdana, Arial, Helvetica, sans-serif'>".$email."</font></td>
    </tr>
  </table>
  <p align='center'>&nbsp; </p>
</form>";
}
?>
<p>&nbsp;</p>
</body>
</html>
