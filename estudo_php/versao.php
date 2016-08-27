<html>
<head>
<title>PHP Vers&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
  <?
	echo "<div align='center'><b>Este servidor fornece suporte ao PHP " . phpversion() . "</b><br>";
	echo "Dica: é preciso por <b>register_globals = on</b> para que o que for postado, se torne variáveis<br><br><br></div>";
	echo phpinfo();
?>
</body>
</html>
