<html>
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="index.css">
</head>
<body>

<?php
session_start();
if (isset($_POST['name'])){
	$fd = fopen($_SESSION['login'].".txt", 'w') or die("Помилка");
	$str = "Email: ".$_SESSION['login']."\nІм'я: ".$_POST['name']."\nВік: ".$_SESSION['age']."\nТелефон: ".$_POST['tel']."\nКурс: ".$_POST['course']."\nГрупа: ".$_POST['group']."\nСпеціальність: ".$_POST['spec'];
	fwrite($fd, $str);
	fclose($fd);
	echo "<div class='myclase'>Файл записано!</div>";
	return;
}

?>

<form class='myclase' method='post'>
<?php
//session_start();
$_SESSION['age'] = $_POST['age'];
if ($_SESSION['age'] < 18 || $_SESSION['age'] > 60) {
		echo "<div class='myclase'>Ви не пройшли авторизацію.</div>";
	}
	else {
		
		$fd = fopen("file.txt", 'r') or die("Помилка");
		//$str = "<form method='post'>";
while(!feof($fd))
{   
    $str = htmlentities(fgets($fd));
	if (stristr($str, "/t") !== false) {
		$nam = stristr($str, "/name");
		$nam =  str_replace("/name|","", $nam);
		$nam = trim($nam);
		$str = str_replace("/name|", "", $str);
		$str = str_replace($nam, "", $str);
		$str = str_replace("/t", "<br><input type='text' name='$nam' />", $str);
	}
	if (stristr($str, "/b") !== false) {
		$str = str_replace("/b", "<br>", $str);
	}
	
	if (stristr($str, "/r") !== false) {
		 $str = str_replace("/r", "", $str);
		 $str = str_replace("\n", "", $str);
		 $str = "<input type='radio' name='spec' value='$str' />$str";
		//$str = str_replace("/r", "<input type='radio' name='spec' value='", $str);
		//$str = $str."' />";
	}
    echo $str;
	
}
fclose($fd);
echo "<br><br><button type='submit'>Записати</button><br><br><a href='email.php'>Надіслати листа на пошту</a>
</form>";
	}
?>
</body>
</html>