<?
	$txtnome = trim($txtnome);
	if (strlen($txtnome) == 0) {
		$erro = "Você não digitou valor no campo NOME";
		header("location: exemplo1.php?erro=".URLEncode("$erro"));
	}
	else {
?>
<html>
<head>
<title>RESULTADO DO FORM DO EXEMPLO 1</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p><strong>RESULTADO DO FORM DO EXEMPLO 1</strong></p>
<p>O Nome digitado foi: <strong><? echo $txtnome; ?></strong></p>
<hr>
<p><strong></strong></p>
</body>
</html>
<? } ?>