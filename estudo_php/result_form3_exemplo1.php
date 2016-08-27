<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<hr>
<p><strong>VOC&Ecirc; USA A(S) LINGUAGEM(S):</strong><br><br> 
<?
	if (isset($ling)) 
		for ($i=0;$i<sizeof($ling);$i++)
			echo $ling[$i]."<br>";
	else
		echo "NENHUMA!";
?>
</p>
<hr>
</body>
</html>
