<html>
<head>
<title>Gravando em arquivo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
	function completa_branco($valor) {
		if (strlen($valor)<30) {
			for ($i=1;$i<=30-strlen($valor);$i++) 
				$valor .= " ";
		}
		return($valor);
	}
	$conn = mysql_connect('localhost','','');
	mysql_select_db('estoque',$conn);
	
	$f = fopen('dump.txt','w+');
	$sql = "select * from funcionarios where sexo = 'M'";
	$rs = mysql_query($sql,$conn);
	
	echo '**** Iniciando o processo de exportação, aguarde... ****';
	echo "<BR><BR>";
	
	while ($dados = mysql_fetch_array($rs)) {
		$matricula = $dados['MATRICULA'];
		$nome = completa_branco($dados['NOME']);
		$sexo = $dados['SEXO'];
		
		echo "Lendo Matrícula: $matricula **** Nome: $nome **** Sexo: $sexo **** ...";
		
		echo "<BR>";
		
		fwrite($f,"$matricula $nome $sexo".chr(13).chr(10));
	}
	fclose($f);
	mysql_free_result($rs);
	mysql_close($conn);
	echo "<hr>";
	echo "<b>ARQUIVO DUMP.TXT CRIADO</b>";
?>
</html>
