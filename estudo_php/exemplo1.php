<html>
<head>
<title>Exemplo 1</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
	echo "Bem vindo ao meu site<br><br>";
?>
<?php
	echo "<b>Bem vindo ao meu site</b><br><br>";
	$tempo = "Internacional";
	echo "$tempo<br>";
?>
<p> 
  <script language="php">
	echo "Bem vindo ao meu site<br><br>";
	echo "<br>A data atual �: <b>" . date("d/m/Y") . "</b><br>";
	# coment�rio
	// coment�rio
	/* coment�rio
	coment�rio */
	$flag = true;
	echo $flag."<br>";
	print false."<br>";
	$cidade = "Camocim"; $nome = "Marcius"; $estado = "CE";
	echo $nome." � natural de ".$cidade." no ".$estado."<br>";
	$valor1 = 40;
	$valor2 = 20;
	$valor3 = $valor1 % $valor2;
	echo "<b>Resto da divis�o:</b> $valor3<br>";
	if ($valor3 == 0)
		print "Divis�o inteira: $valor1 / $valor2";
	else
		echo "Divis�o N�O inteira";
	print "<br>";
	/*
	|| ou or -> operador l�gico OU
	&& ou and -> operador l�gico E
	xor -> operador l�gico OU EXCLUSIVO */
	$total = (24/8)*2;
	($total == 6)?($correto=true):($correto=false);
	if ($correto) {
		echo "O total est� correto";
		echo "<br>";
	}
	echo "<br><b>N�meros pares at� 100:</b></br>";
	for ($i=0;$i<=100;$i++) {
		if ($i % 2 == 0)
			echo "<u><b>".$i."</b></u>";
		else
			echo $i;
		echo " ";
	}
	echo "<hr>";
	$num1 = 0;
	$num2 = 528;
	$final = 876;
	$continuar=true;
	while($continuar) {
		if (($num1+$num2)==$final) {
			echo "$num1 que somado com $num2 � igual a $final<br>";
			$continuar = false;
		}
		else
			$num1++;
	}
	echo "<hr>";
	print "<b>RECEBENDO UM CAMPO DE UM FORM EM UMA VARI�VEL</b><br>";
	print "<b>Obs:</b> Para que esse exemplo funcione, � preciso por <b>register_globals = on</b></br>";
	print "<br>";
	if (isset($txtnome)) 
		print "Ol�, <b>$nome</b>, seja bem vindo ao site!";
	else
		print "<b>N�O FUNCIONOU:</b> Digite no navegador algo como:<br>
			http://localhost/estudo_php/exemplo1.php?txtnome=Marcius";
	echo "<hr>";
	$elementos = array("M�rcio","Anr�a","N�dia","Paula","Carla");
	for ($i=0;$i<sizeof($elementos);$i++)
		print "$elementos[$i]<br>";
	echo "<br>O segundo elemento � <b>$elementos[1]</b>. O array tem ".count($elementos)." elementos.<hr>";
	foreach($elementos as $chave=>$valor)
		echo $valor." Posi��o: ".$chave."<br>";
	echo "<hr>";
	function imprime_linha($linha = "Testanto uma fun��o no PHP (com par�metros opcionais)") {
		echo $linha;
	}
	imprime_linha(); echo "<hr>";
	function impares($menor,$maior) {
		$ret = "";
		for ($i=$menor;$i<=$maior;$i++) 
			if (($i % 2) != 0)
				$ret .= $i." ";
		return $ret;
	}
	echo "<b>IMPRIMINDO IMPARES ATRAV�S DE UMA FUN��O</b><BR>";
	echo "Limite inferior: <b>5</b>; Limite superior: <b>15</b>:<br>";
	echo impares(5,15); echo "<hr>";
	$frase = "Uso de vari�veis dentro de fun��es com <b>GLOBAL</b><br>";
	function mostra_frase() {
		global $frase;
		echo "$frase<hr>";
	}
	mostra_frase();
	define("FRASE","Definindo constantes");
	function completa() {
		echo FRASE.". <b>VIS�VEIS AT� DENTRO DE FUN��ES.</B><HR>";
	}
	completa();
</script>
</p>
<hr>
<strong>TRABALHANDO COM FORMS</strong><br>
<form name="form1" method="post" action="result_form1_exemplo1.php">
  Digite seu nome: 
  <input name="txtnome" type="text" id="txtnome" size="50" maxlength="50">
  <input type="submit" name="Submit" value="Enviar">
  <? if (isset($erro)) echo "<br><font color='#FF0000'><b>$erro</b></font>";?>
</form>
<hr>
<p><strong>FORMUL&Aacute;RIO COM BOT&Otilde;ES DE OP&Ccedil;&Atilde;O (RADIO BUTTON)</strong></p>
<form name="form2" method="post" action="result_form2_exemplo1.php">
  Qual o sistema operacional favorito? <br>
  <br> 
    <label> 
    <input name="sistema" type="radio" value="Windows" checked>
    Windows</label><br>
    <label> 
    <input type="radio" name="sistema" value="Linux">
    Linux</label><br>
    <label> 
    <input type="radio" name="sistema" value="Unix">
    Unix</label>
  <br><br>
    
  <input type="submit" name="Submit2" value="Enviar">
</form>
<hr>
<p><strong>FORMUL&Aacute;RIO COM CAIXA DE SELE&Ccedil;&Atilde;O (CHECKBOX)</strong></p>
<form name="form3" method="post" action="result_form3_exemplo1.php">
  <p>Quais linguagens de programa&ccedil;&atilde;o voc&ecirc; usa? 
    <input name="ling[]" type="checkbox" id="ling[]" value="C++">
    C++ 
    <input name="ling[]" type="checkbox" id="ling[]" value="Visual Basic">
    Visual Basic 
    <input name="ling[]" type="checkbox" id="ling[]" value="Delphi">
    Delphi </p>
  <p>
    <input type="submit" name="Submit3" value="Enviar">
  </p>
</form>
<hr>
<p><strong></strong></p>
</body>
</html>
